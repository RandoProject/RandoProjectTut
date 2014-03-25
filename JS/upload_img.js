var idFile = 0;
window.addEventListener('load', function(){
  _('file').addEventListener('change', selectFiles, false);
}, false);

function _(elem){
  return document.getElementById(elem);
}

function selectFiles(){
  var files = _('file').files;
  var i;
  for(i=0; i < files.length; i++){
    uploadFile(files[i], idFile+i);
  }
  idFile += i;
  console.log(_('file').files);

  
}


function uploadFile(file, id){
  var data = new FormData();
  var div = _('myForm').appendChild(document.createElement('div'));
  div.id = 'vignette' + id;
  var p = div.appendChild(document.createElement('p'));
  p.appendChild(document.createTextNode(file.name));
  var pb = div.appendChild(document.createElement('progress'));
  pb.id = 'pb' + id; // pb : progresseBar
  pb.value = 0;
  pb.max = 100;

  if(window.FileReader ) {
          reader = new FileReader();
          reader.onloadend = function (e) {
            var i = id;
              showUploadedItem(e.target.result, i);
          };
          reader.readAsDataURL(file);
        }

  data.append('file['+id+']', file);

  var xhr = new XMLHttpRequest(); // Regarder si il existe !!
  xhr.upload.paramsId = id; // Attribue créée, pour être récupérer dans progressHandler
  xhr.upload.addEventListener('progress', progressHandler, false);
  xhr.addEventListener('load', completHandler, false);
  xhr.addEventListener('error', errorHandler, false);
  xhr.addEventListener('abort', abortHandler, false);

  xhr.open('POST', '../Controller/c_upload_img.php');
  xhr.send(data);
  
}

function progressHandler(ev){
  _('status_bytes').innerHTML = ev.loaded + ' bytes chargés sur ' + ev.total;
  var pourcentage = Math.round((ev.loaded / ev.total) * 100);
  _('pb'+ ev.target.paramsId).value = pourcentage;
  _('status').innerHTML = pourcentage + '% uploadé... Patientez';
}
// Téléchargement terminé
function completHandler(ev){
  _('status').innerHTML = ev.target.responseText;
  _('progressBar').value = 0;
  var p = _('container').appendChild(document.createElement('p'));
  p.appendChild(document.createTextNode(ev.target.responseText));
}
function errorHandler(){
  _('status').innerHTML = 'Echec de l\'upload';
}
function abortHandler(){
  _('status').value = 'Upload annulé';
}



function showUploadedItem(source, id) {
  div = _('vignette'+id);
  img = document.createElement('img');
  img.src = source;
    img.className = 'vignette';
    img.style.width = '200px';
  div.insertBefore(img, div.firstChild);  
}