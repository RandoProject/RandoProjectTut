
window.addEventListener('load', function(){
  var input = document.getElementById("images");
  var formdata = false;
  var inputSubmit = document.getElementById('submitRando');
  inputSubmit.addEventListener('click', function(){
    document.getElementById('insert_rando').submit(); // On envoie le formulaire
  }, false);


  if (window.FormData) {
    formdata = new FormData();
    document.getElementById("upl").style.display = "none";
  }

  if (input.addEventListener) {
 
    input.addEventListener("change", function (evt) {
      var len = this.files.length, img, reader, file;
      document.getElementById("response").appendChild(document.createTextNode('Chargement . . .'));
       
      for (var i=0; i < len; i++ ) {
        file = this.files[i];
     
          if ( window.FileReader ) {
            reader = new FileReader();
            reader.onloadend = function (e) { 
              showUploadedItem(e.target.result);
            };
            reader.readAsDataURL(file);
          }
          if (formdata) {
            formdata.append("images[]", file);
          }
      }
      if (formdata) {
        $.ajax({
          url: "Controller/c_upload_img.php",
          type: "POST",
          data: formdata,
          processData: false,
          contentType: false,
          success: function (res) {
            document.getElementById("response").innerHTML = res; 
          }
        });
}
         
    }, false);
  }

}, false);


function showUploadedItem(source) {
  var list = document.getElementById("image-list"),
      li   = document.createElement("li"),
      img  = document.createElement("img");
    img.src = source;
    img.className = 'vignette';
    li.appendChild(img);
  list.appendChild(li);
}
