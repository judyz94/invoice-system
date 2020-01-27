(window["webpackJsonp"] = window["webpackJsonp"] || []).push([["/js/delete-modal"],{

/***/ "./resources/js/delete-modal.js":
/*!**************************************!*\
  !*** ./resources/js/delete-modal.js ***!
  \**************************************/
/*! no static exports found */
/***/ (function(module, exports) {

$('#confirmDeleteModal').on('show.bs.modal', function (e) {
  $('#deleteForm').attr('action', $(e.relatedTarget).data('route'));
});

/***/ }),

/***/ 1:
/*!*****************************************!*\
  !*** multi ./resources/js/delete-modal ***!
  \*****************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! C:\laragon\www\invoice_system\resources\js\delete-modal */"./resources/js/delete-modal.js");


/***/ })

},[[1,"/js/manifest"]]]);