/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, { enumerable: true, get: getter });
/******/ 		}
/******/ 	};
/******/
/******/ 	// define __esModule on exports
/******/ 	__webpack_require__.r = function(exports) {
/******/ 		if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 			Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 		}
/******/ 		Object.defineProperty(exports, '__esModule', { value: true });
/******/ 	};
/******/
/******/ 	// create a fake namespace object
/******/ 	// mode & 1: value is a module id, require it
/******/ 	// mode & 2: merge all properties of value into the ns
/******/ 	// mode & 4: return value when already ns object
/******/ 	// mode & 8|1: behave like require
/******/ 	__webpack_require__.t = function(value, mode) {
/******/ 		if(mode & 1) value = __webpack_require__(value);
/******/ 		if(mode & 8) return value;
/******/ 		if((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
/******/ 		var ns = Object.create(null);
/******/ 		__webpack_require__.r(ns);
/******/ 		Object.defineProperty(ns, 'default', { enumerable: true, value: value });
/******/ 		if(mode & 2 && typeof value != 'string') for(var key in value) __webpack_require__.d(ns, key, function(key) { return value[key]; }.bind(null, key));
/******/ 		return ns;
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "/";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 0);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/jq-global.js":
/*!***********************************!*\
  !*** ./resources/js/jq-global.js ***!
  \***********************************/
/*! no static exports found */
/***/ (function(module, exports) {

$(document).ready(function () {
  $('.lazy').Lazy();
  $('.menu-nav-toggle').on('click', function () {
    $(this).toggleClass('active');
    $('.nav-container').toggleClass('active');
  });
  $('.search-collapse').on('click', function (e) {
    e.preventDefault();
    $('.search-container').addClass('active');
  });
  $('.search-container .dismiss').on('click', function (e) {
    e.preventDefault();
    $('.search-container').removeClass('active');
  });
});

/***/ }),

/***/ "./resources/sass/app.scss":
/*!*********************************!*\
  !*** ./resources/sass/app.scss ***!
  \*********************************/
/*! no static exports found */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ "./resources/sass/pages/about.scss":
/*!*****************************************!*\
  !*** ./resources/sass/pages/about.scss ***!
  \*****************************************/
/*! no static exports found */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ "./resources/sass/pages/contact.scss":
/*!*******************************************!*\
  !*** ./resources/sass/pages/contact.scss ***!
  \*******************************************/
/*! no static exports found */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ "./resources/sass/pages/gallery.scss":
/*!*******************************************!*\
  !*** ./resources/sass/pages/gallery.scss ***!
  \*******************************************/
/*! no static exports found */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ "./resources/sass/pages/hampers.scss":
/*!*******************************************!*\
  !*** ./resources/sass/pages/hampers.scss ***!
  \*******************************************/
/*! no static exports found */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ "./resources/sass/pages/home.scss":
/*!****************************************!*\
  !*** ./resources/sass/pages/home.scss ***!
  \****************************************/
/*! no static exports found */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ "./resources/sass/pages/under-const.scss":
/*!***********************************************!*\
  !*** ./resources/sass/pages/under-const.scss ***!
  \***********************************************/
/*! no static exports found */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ 0:
/*!******************************************************************************************************************************************************************************************************************************************************************************************!*\
  !*** multi ./resources/js/jq-global.js ./resources/sass/app.scss ./resources/sass/pages/home.scss ./resources/sass/pages/about.scss ./resources/sass/pages/under-const.scss ./resources/sass/pages/gallery.scss ./resources/sass/pages/contact.scss ./resources/sass/pages/hampers.scss ***!
  \******************************************************************************************************************************************************************************************************************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

__webpack_require__(/*! C:\Users\MineAim\Desktop\projects\sweetestaffair\resources\js\jq-global.js */"./resources/js/jq-global.js");
__webpack_require__(/*! C:\Users\MineAim\Desktop\projects\sweetestaffair\resources\sass\app.scss */"./resources/sass/app.scss");
__webpack_require__(/*! C:\Users\MineAim\Desktop\projects\sweetestaffair\resources\sass\pages\home.scss */"./resources/sass/pages/home.scss");
__webpack_require__(/*! C:\Users\MineAim\Desktop\projects\sweetestaffair\resources\sass\pages\about.scss */"./resources/sass/pages/about.scss");
__webpack_require__(/*! C:\Users\MineAim\Desktop\projects\sweetestaffair\resources\sass\pages\under-const.scss */"./resources/sass/pages/under-const.scss");
__webpack_require__(/*! C:\Users\MineAim\Desktop\projects\sweetestaffair\resources\sass\pages\gallery.scss */"./resources/sass/pages/gallery.scss");
__webpack_require__(/*! C:\Users\MineAim\Desktop\projects\sweetestaffair\resources\sass\pages\contact.scss */"./resources/sass/pages/contact.scss");
module.exports = __webpack_require__(/*! C:\Users\MineAim\Desktop\projects\sweetestaffair\resources\sass\pages\hampers.scss */"./resources/sass/pages/hampers.scss");


/***/ })

/******/ });