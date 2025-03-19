//Profile setting image start
document.getElementById("imageUpload").addEventListener("change", function (event) {
   const input = event.target;
   const reader = new FileReader();

   reader.onload = function (e) {
       document.getElementById("imagePreview").src = e.target.result;
   };

   //Check if a file is selected
   if (input.files && input.files[0]) {
       reader.readAsDataURL(input.files[0]);
   }
});
//End profile setting image

//Start image after clicking show
function previewImages(event) {
    const files = event.target.files;
    const previewContainer = document.getElementById('imagePreviewContainer');
    
    // Clear previous images
    previewContainer.innerHTML = '';

    if (files.length > 0) {
        for (let i = 0; i < files.length; i++) {
            const file = files[i];
            const reader = new FileReader();

            reader.onload = function(e) {
                const img = document.createElement('img');
                img.src = e.target.result;
                img.style.maxWidth = '100px'; // Set image size
                img.style.margin = '5px';
                img.style.border = '1px solid #ddd';
                img.style.padding = '5px';

                previewContainer.appendChild(img);
            };

            reader.readAsDataURL(file);
        }
    }
}
//End image after clicking show