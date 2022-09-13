//  Image Upload
$(document).ready(function() {
    if (window.File && window.FileList && window.FileReader) {
      $("#image").on("change", function(e) {
        var files = e.target.files, filesLength = files.length;
          if (filesLength>4) {
            $('.validation').css('display','block');
          }else{
            $('.validation').css('display','none');
            for (var i = 0; i < 4; i++) {
            var f = files[i];
            var fileReader = new FileReader();
            fileReader.onload = (function(e) {
              var file = e.target;
              
              $("<div class=\gallery col-2 item-gallery\">"+
                "<span class=\"pip\">" +
                "<img class=\"imageThumb\" src=\"" + e.target.result + "\" title=\"" + file.name + "\"/>" +
                "<br/><span class=\"remove btn btn-danger\">Remove image</span>" +
                "</span>"+
                "</div>").insertAfter("#imagepreview");
              
                $(".remove").click(function(){
                $(this).parent(".pip").remove();
              });
              
            });
              fileReader.readAsDataURL(f);
          }
        }
        
        
      });
    } else {
      alert("Your browser doesn't support to File API")
    }
  });

                            
