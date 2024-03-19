/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!**************************************!*\
  !*** ./resources/js/admin/custom.js ***!
  \**************************************/
$(function () {
  $('.delete-item-btn').click(function (e) {
    var _this = this;
    e.preventDefault();
    Swal.fire({
      title: "Are you sure?",
      html: "Are you sure to delete this item?",
      icon: "question",
      buttonsStyling: false,
      showCancelButton: true,
      confirmButtonText: "Yes, delete it!",
      cancelButtonText: 'No, cancel it',
      customClass: {
        confirmButton: "btn btn-danger",
        cancelButton: 'btn btn-info'
      }
    }).then(function (result) {
      if (result.isConfirmed) {
        $.ajax({
          type: 'DELETE',
          url: $(_this).attr('href'),
          data: {
            '_token': $(_this).attr('data-token')
          },
          success: function success() {
            window.location.reload();
          },
          error: function error() {
            Swal.fire({
              text: "Error while processing, Kindly try again!",
              icon: "error",
              buttonsStyling: false,
              confirmButtonText: "Ok, got it!",
              customClass: {
                confirmButton: "btn btn-primary"
              }
            });
          }
        });
      }
    });
  });
  $('.delete-media-btn').click(function (e) {
    var _this2 = this;
    e.preventDefault();
    Swal.fire({
      title: "Are you sure?",
      html: "Are you sure to delete this file?",
      icon: "question",
      buttonsStyling: false,
      showCancelButton: true,
      confirmButtonText: "Yes, delete it!",
      cancelButtonText: 'No, cancel it',
      customClass: {
        confirmButton: "btn btn-danger",
        cancelButton: 'btn btn-info'
      }
    }).then(function (result) {
      if (result.isConfirmed) {
        var thumb = $(_this2).closest('.thumb');
        // $(this)data-reload="true"

        $.ajax({
          type: 'DELETE',
          url: $(_this2).attr('href'),
          data: {
            '_token': $(_this2).attr('data-token')
          },
          success: function success() {
            thumb.hide();
          },
          error: function error() {
            Swal.fire({
              text: "Error while processing, Kindly try again!",
              icon: "error",
              buttonsStyling: false,
              confirmButtonText: "Ok, got it!",
              customClass: {
                confirmButton: "btn btn-primary"
              }
            });
          }
        });
      }
    });
  });
});
/******/ })()
;