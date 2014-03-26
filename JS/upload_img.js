var idFile = 0;
window.addEventListener('load', function(){
  _('images').addEventListener('change', selectFiles, false);
}, false);

function _(elem){
  return document.getElementById(elem);
}

function selectFiles(){
  var files = _('images').files;
  var i;
  for(i=0; i < files.length; i++){
    uploadFile(files[i], idFile+i);
  }
  idFile += i;
  console.log(_('images').files);
  
  
}


function uploadFile(file, id){
  var data = new FormData();
  var li = _('image-list').appendChild(document.createElement('li'));
  li.id = 'vignette' + id;
  var p = li.appendChild(document.createElement('p'));
  p.appendChild(document.createTextNode(file.name));
  var pb = li.appendChild(document.createElement('progress'));
  pb.id = 'pb' + id; // pb : progresseBar
  pb.value = 0;
  pb.max = 100;
  if(window.FileReader) {
          reader = new FileReader();
          reader.onloadend = function (e) {
            var i = id;
              showUploadedItem(e.target.result, i);
          };
          reader.readAsDataURL(file);
   }


  data.append('images['+id+']', file);

  var xhr = new XMLHttpRequest(); // Regarder si il existe !!
  xhr.upload.paramsId = id; // Attribue créée, pour être récupérer dans progressHandler
  xhr.upload.addEventListener('progress', progressHandler, false);
  xhr.addEventListener('load', completHandler, false);
  xhr.addEventListener('error', errorHandler, false);
  xhr.addEventListener('abort', abortHandler, false);

  xhr.open('POST', 'index.php?page=upload_img');
  xhr.send(data);
  
}

function progressHandler(ev){
  var pourcentage = Math.round((ev.loaded / ev.total) * 100);
  _('pb'+ ev.target.paramsId).value = pourcentage;
}
// Téléchargement terminé
function completHandler(ev){}

function errorHandler(){
  console.log('Erreur dans l\'upload de l\'image');
  _('response').innerHTML = 'Erreur dans le chargemnt d\'une image';
}
function abortHandler(){
  console.log('Upload annulé');
}



function showUploadedItem(source, id) {
  div = _('vignette'+id);
  img = document.createElement('img');
  img.src = source;
    img.className = 'vignette';
  div.insertBefore(img, div.firstChild);  
}