$(document).ready(function() {
    //Delete galleries record
    $(".delete-gallery").click(function() {
        var categoryId = $(this).data("id"); 
        //SweetAlert confirmation
        Swal.fire({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover this gallery!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#d33",
            cancelButtonColor: "#3085d6",
            confirmButtonText: "Yes, delete it!"
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: "delete-gallery",
                    type: "POST",
                    data: { category_id: categoryId },
                    success: function(response) {
                        Swal.fire("Deleted!", "The gallery has been deleted.", "success")
                        .then(() => {
                            location.reload();
                        });
                    },
                    error: function() {
                        Swal.fire("Error!", "Something went wrong. Try again.", "error");
                    }
                });
            }
        });
    });

    //Delete image record
    $(document).ready(function() {
        $(".delete-image").click(function() {
            //Get image ID from the button
            var imageId = $(this).data("image_id"); 
            //SweetAlert confirmation
            Swal.fire({
                title: "Are you sure?",
                text: "Once deleted, you will not be able to recover this image!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#d33",
                cancelButtonColor: "#3085d6",
                confirmButtonText: "Yes, delete it!"
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: "delete-image", 
                        type: "POST",
                        data: { image_id: imageId }, 
                        success: function(response) {
                            Swal.fire("Deleted!", "The Image has been deleted.", "success")
                            .then(() => {
                                location.reload();
                            });
                        },
                        error: function() {
                            Swal.fire("Error!", "Something went wrong. Try again.", "error");
                        }
                      
                    });
                }
            });
        });
    });    

    //Delete category record
    $(".delete-category").click(function() {
        //Get image ID from the button
        var id = $(this).data("id"); 
        //SweetAlert confirmation
        Swal.fire({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover this category!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#d33",
            cancelButtonColor: "#3085d6",
            confirmButtonText: "Yes, delete it!"
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: "delete-category",
                    type: "POST",
                    data: { id: id },
                    success: function(response) {
                        Swal.fire("Deleted!", "The Category has been deleted.", "success")
                        .then(() => {
                            location.reload();
                        });
                    },
                    error: function() {
                        Swal.fire("Error!", "Something went wrong. Try again.", "error");
                    }
                });
            }
        });
    });
});