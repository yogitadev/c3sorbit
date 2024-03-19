$(function () {
    $('.delete-item-btn').click(function (e) {

        e.preventDefault();

        Swal.fire({
            title: `Are you sure?`,
            html: `Are you sure to delete this item?`,
            icon: "question",
            buttonsStyling: false,
            showCancelButton: true,
            confirmButtonText: "Yes, delete it!",
            cancelButtonText: 'No, cancel it',
            customClass: {
                confirmButton: "btn btn-danger",
                cancelButton: 'btn btn-info'
            }
        }).then((result) => {
            if (result.isConfirmed) {


                $.ajax({
                    type: 'DELETE',
                    url: $(this).attr('href'),
                    data: {
                        '_token': $(this).attr('data-token')
                    },
                    success: function () {
                        window.location.reload();
                    },
                    error: function () {
                        Swal.fire({
                            text: "Error while processing, Kindly try again!",
                            icon: "error",
                            buttonsStyling: false,
                            confirmButtonText: "Ok, got it!",
                            customClass: {
                                confirmButton: "btn btn-primary"
                            }
                        });
                    },
                });
            }
        });
    });


    $('.delete-media-btn').click(function (e) {

        e.preventDefault();

        Swal.fire({
            title: `Are you sure?`,
            html: `Are you sure to delete this file?`,
            icon: "question",
            buttonsStyling: false,
            showCancelButton: true,
            confirmButtonText: "Yes, delete it!",
            cancelButtonText: 'No, cancel it',
            customClass: {
                confirmButton: "btn btn-danger",
                cancelButton: 'btn btn-info'
            }
        }).then((result) => {
            if (result.isConfirmed) {

                let thumb = $(this).closest('.thumb');
                // $(this)data-reload="true"

                $.ajax({
                    type: 'DELETE',
                    url: $(this).attr('href'),
                    data: {
                        '_token': $(this).attr('data-token')
                    },
                    success: function () {
                        thumb.hide();
                    },
                    error: function () {
                        Swal.fire({
                            text: "Error while processing, Kindly try again!",
                            icon: "error",
                            buttonsStyling: false,
                            confirmButtonText: "Ok, got it!",
                            customClass: {
                                confirmButton: "btn btn-primary"
                            }
                        });
                    },
                });
            }
        });
    });

});
