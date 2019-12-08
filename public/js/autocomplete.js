(window["webpackJsonp"] = window["webpackJsonp"] || []).push([["/js/autocomplete"],{

/***/ "./resources/js/autocomplete.js":
/*!**************************************!*\
  !*** ./resources/js/autocomplete.js ***!
  \**************************************/
/*! no static exports found */
/***/ (function(module, exports) {

$(document).ready(function () {
  $('#name').keyup(function () {
    var query = $(this).val();

    if (query !== '') {
      var _token = $('input[name="_token"]').val();

      $.ajax({
        url: 'autocomplete/fetch',
        method: "POST",
        data: {
          query: query,
          _token: _token
        },
        success: function success(data) {
          $('#productList').fadeIn();
          $('#productList').html(data);
        }
      });
    }
  });
  $(document).on('click', 'li', function () {
    $('#name').val($(this).text());
    $('#productList').fadeOut();
  });
});

/***/ }),

/***/ 1:
/*!********************************************!*\
  !*** multi ./resources/js/autocomplete.js ***!
  \********************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! C:\laragon\www\invoice_system\resources\js\autocomplete.js */"./resources/js/autocomplete.js");


/***/ })

},[[1,"/js/manifest"]]]);