/*
 * ATTENTION: An "eval-source-map" devtool has been used.
 * This devtool is neither made for production nor for readable output files.
 * It uses "eval()" calls to create a separate source file with attached SourceMaps in the browser devtools.
 * If you are trying to read the output file, select a different devtool (https://webpack.js.org/configuration/devtool/)
 * or disable the default devtool with "devtool: false".
 * If you are looking for production-ready output files, see mode: "production" (https://webpack.js.org/configuration/mode/).
 */
/******/ (() => { // webpackBootstrap
/******/ 	"use strict";
/******/ 	var __webpack_modules__ = ({

/***/ "./resources/assets/core/js/custom/documentation/documentation.js":
/*!************************************************************************!*\
  !*** ./resources/assets/core/js/custom/documentation/documentation.js ***!
  \************************************************************************/
/***/ (() => {

eval("\n\nvar KTLayoutDocumentation = function () {\n  var _init = function _init(element) {\n    var elements = element;\n\n    if (typeof elements === 'undefined') {\n      elements = document.querySelectorAll('.highlight');\n    }\n\n    if (elements && elements.length > 0) {\n      for (var i = 0; i < elements.length; ++i) {\n        var highlight = elements[i];\n        var copy = highlight.querySelector('.highlight-copy');\n\n        if (copy) {\n          var clipboard = new ClipboardJS(copy, {\n            target: function target(trigger) {\n              var highlight = trigger.closest('.highlight');\n              var el = highlight.querySelector('.tab-pane.active');\n\n              if (el == null) {\n                el = highlight.querySelector('.highlight-code');\n              }\n\n              return el;\n            }\n          });\n          clipboard.on('success', function (e) {\n            var caption = e.trigger.innerHTML;\n            e.trigger.innerHTML = 'copied';\n            e.clearSelection();\n            setTimeout(function () {\n              e.trigger.innerHTML = caption;\n            }, 2000);\n          });\n        }\n      }\n    }\n  };\n\n  return {\n    init: function init(element) {\n      _init(element);\n    }\n  };\n}(); // On document ready\n\n\nKTUtil.onDOMContentLoaded(function () {\n  KTLayoutDocumentation.init();\n});//# sourceURL=[module]\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJmaWxlIjoiLi9yZXNvdXJjZXMvYXNzZXRzL2NvcmUvanMvY3VzdG9tL2RvY3VtZW50YXRpb24vZG9jdW1lbnRhdGlvbi5qcy5qcyIsIm1hcHBpbmdzIjoiQUFBYTs7QUFFYixJQUFJQSxxQkFBcUIsR0FBRyxZQUFXO0FBQ25DLE1BQUlDLEtBQUssR0FBRyxTQUFSQSxLQUFRLENBQVNDLE9BQVQsRUFBa0I7QUFDMUIsUUFBSUMsUUFBUSxHQUFHRCxPQUFmOztBQUVBLFFBQUssT0FBT0MsUUFBUCxLQUFvQixXQUF6QixFQUF1QztBQUNuQ0EsTUFBQUEsUUFBUSxHQUFHQyxRQUFRLENBQUNDLGdCQUFULENBQTBCLFlBQTFCLENBQVg7QUFDSDs7QUFFRCxRQUFLRixRQUFRLElBQUlBLFFBQVEsQ0FBQ0csTUFBVCxHQUFrQixDQUFuQyxFQUF1QztBQUNuQyxXQUFNLElBQUlDLENBQUMsR0FBRyxDQUFkLEVBQWlCQSxDQUFDLEdBQUdKLFFBQVEsQ0FBQ0csTUFBOUIsRUFBc0MsRUFBRUMsQ0FBeEMsRUFBNEM7QUFDeEMsWUFBSUMsU0FBUyxHQUFHTCxRQUFRLENBQUNJLENBQUQsQ0FBeEI7QUFDQSxZQUFJRSxJQUFJLEdBQUdELFNBQVMsQ0FBQ0UsYUFBVixDQUF3QixpQkFBeEIsQ0FBWDs7QUFFQSxZQUFLRCxJQUFMLEVBQVk7QUFDUixjQUFJRSxTQUFTLEdBQUcsSUFBSUMsV0FBSixDQUFnQkgsSUFBaEIsRUFBc0I7QUFDbENJLFlBQUFBLE1BQU0sRUFBRSxnQkFBU0MsT0FBVCxFQUFrQjtBQUN0QixrQkFBSU4sU0FBUyxHQUFHTSxPQUFPLENBQUNDLE9BQVIsQ0FBZ0IsWUFBaEIsQ0FBaEI7QUFDQSxrQkFBSUMsRUFBRSxHQUFHUixTQUFTLENBQUNFLGFBQVYsQ0FBd0Isa0JBQXhCLENBQVQ7O0FBRUEsa0JBQUtNLEVBQUUsSUFBSSxJQUFYLEVBQWtCO0FBQ2RBLGdCQUFBQSxFQUFFLEdBQUdSLFNBQVMsQ0FBQ0UsYUFBVixDQUF3QixpQkFBeEIsQ0FBTDtBQUNIOztBQUVELHFCQUFPTSxFQUFQO0FBQ0g7QUFWaUMsV0FBdEIsQ0FBaEI7QUFhQUwsVUFBQUEsU0FBUyxDQUFDTSxFQUFWLENBQWEsU0FBYixFQUF3QixVQUFTQyxDQUFULEVBQVk7QUFDaEMsZ0JBQUlDLE9BQU8sR0FBR0QsQ0FBQyxDQUFDSixPQUFGLENBQVVNLFNBQXhCO0FBRUFGLFlBQUFBLENBQUMsQ0FBQ0osT0FBRixDQUFVTSxTQUFWLEdBQXNCLFFBQXRCO0FBQ0FGLFlBQUFBLENBQUMsQ0FBQ0csY0FBRjtBQUVBQyxZQUFBQSxVQUFVLENBQUMsWUFBVztBQUNsQkosY0FBQUEsQ0FBQyxDQUFDSixPQUFGLENBQVVNLFNBQVYsR0FBc0JELE9BQXRCO0FBQ0gsYUFGUyxFQUVQLElBRk8sQ0FBVjtBQUdILFdBVEQ7QUFVSDtBQUNKO0FBQ0o7QUFDSixHQXZDRDs7QUF5Q0EsU0FBTztBQUNISSxJQUFBQSxJQUFJLEVBQUUsY0FBU3JCLE9BQVQsRUFBa0I7QUFDcEJELE1BQUFBLEtBQUssQ0FBQ0MsT0FBRCxDQUFMO0FBQ0g7QUFIRSxHQUFQO0FBS0gsQ0EvQzJCLEVBQTVCLEMsQ0FpREE7OztBQUNBc0IsTUFBTSxDQUFDQyxrQkFBUCxDQUEwQixZQUFXO0FBQ2pDekIsRUFBQUEscUJBQXFCLENBQUN1QixJQUF0QjtBQUNILENBRkQiLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly8vLi9yZXNvdXJjZXMvYXNzZXRzL2NvcmUvanMvY3VzdG9tL2RvY3VtZW50YXRpb24vZG9jdW1lbnRhdGlvbi5qcz83ZTgyIl0sInNvdXJjZXNDb250ZW50IjpbIlwidXNlIHN0cmljdFwiO1xuXG52YXIgS1RMYXlvdXREb2N1bWVudGF0aW9uID0gZnVuY3Rpb24oKSB7XG4gICAgdmFyIF9pbml0ID0gZnVuY3Rpb24oZWxlbWVudCkge1xuICAgICAgICB2YXIgZWxlbWVudHMgPSBlbGVtZW50O1xuXG4gICAgICAgIGlmICggdHlwZW9mIGVsZW1lbnRzID09PSAndW5kZWZpbmVkJyApIHtcbiAgICAgICAgICAgIGVsZW1lbnRzID0gZG9jdW1lbnQucXVlcnlTZWxlY3RvckFsbCgnLmhpZ2hsaWdodCcpO1xuICAgICAgICB9XG5cbiAgICAgICAgaWYgKCBlbGVtZW50cyAmJiBlbGVtZW50cy5sZW5ndGggPiAwICkge1xuICAgICAgICAgICAgZm9yICggdmFyIGkgPSAwOyBpIDwgZWxlbWVudHMubGVuZ3RoOyArK2kgKSB7XG4gICAgICAgICAgICAgICAgdmFyIGhpZ2hsaWdodCA9IGVsZW1lbnRzW2ldO1xuICAgICAgICAgICAgICAgIHZhciBjb3B5ID0gaGlnaGxpZ2h0LnF1ZXJ5U2VsZWN0b3IoJy5oaWdobGlnaHQtY29weScpO1xuXG4gICAgICAgICAgICAgICAgaWYgKCBjb3B5ICkge1xuICAgICAgICAgICAgICAgICAgICB2YXIgY2xpcGJvYXJkID0gbmV3IENsaXBib2FyZEpTKGNvcHksIHtcbiAgICAgICAgICAgICAgICAgICAgICAgIHRhcmdldDogZnVuY3Rpb24odHJpZ2dlcikge1xuICAgICAgICAgICAgICAgICAgICAgICAgICAgIHZhciBoaWdobGlnaHQgPSB0cmlnZ2VyLmNsb3Nlc3QoJy5oaWdobGlnaHQnKTtcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICB2YXIgZWwgPSBoaWdobGlnaHQucXVlcnlTZWxlY3RvcignLnRhYi1wYW5lLmFjdGl2ZScpO1xuXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgaWYgKCBlbCA9PSBudWxsICkge1xuICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICBlbCA9IGhpZ2hsaWdodC5xdWVyeVNlbGVjdG9yKCcuaGlnaGxpZ2h0LWNvZGUnKTtcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICB9XG5cbiAgICAgICAgICAgICAgICAgICAgICAgICAgICByZXR1cm4gZWw7XG4gICAgICAgICAgICAgICAgICAgICAgICB9XG4gICAgICAgICAgICAgICAgICAgIH0pO1xuXG4gICAgICAgICAgICAgICAgICAgIGNsaXBib2FyZC5vbignc3VjY2VzcycsIGZ1bmN0aW9uKGUpIHtcbiAgICAgICAgICAgICAgICAgICAgICAgIHZhciBjYXB0aW9uID0gZS50cmlnZ2VyLmlubmVySFRNTDtcblxuICAgICAgICAgICAgICAgICAgICAgICAgZS50cmlnZ2VyLmlubmVySFRNTCA9ICdjb3BpZWQnO1xuICAgICAgICAgICAgICAgICAgICAgICAgZS5jbGVhclNlbGVjdGlvbigpO1xuXG4gICAgICAgICAgICAgICAgICAgICAgICBzZXRUaW1lb3V0KGZ1bmN0aW9uKCkge1xuICAgICAgICAgICAgICAgICAgICAgICAgICAgIGUudHJpZ2dlci5pbm5lckhUTUwgPSBjYXB0aW9uO1xuICAgICAgICAgICAgICAgICAgICAgICAgfSwgMjAwMCk7XG4gICAgICAgICAgICAgICAgICAgIH0pO1xuICAgICAgICAgICAgICAgIH1cbiAgICAgICAgICAgIH1cbiAgICAgICAgfVxuICAgIH1cblxuICAgIHJldHVybiB7XG4gICAgICAgIGluaXQ6IGZ1bmN0aW9uKGVsZW1lbnQpIHtcbiAgICAgICAgICAgIF9pbml0KGVsZW1lbnQpO1xuICAgICAgICB9XG4gICAgfTtcbn0oKTtcblxuLy8gT24gZG9jdW1lbnQgcmVhZHlcbktUVXRpbC5vbkRPTUNvbnRlbnRMb2FkZWQoZnVuY3Rpb24oKSB7XG4gICAgS1RMYXlvdXREb2N1bWVudGF0aW9uLmluaXQoKTtcbn0pOyJdLCJuYW1lcyI6WyJLVExheW91dERvY3VtZW50YXRpb24iLCJfaW5pdCIsImVsZW1lbnQiLCJlbGVtZW50cyIsImRvY3VtZW50IiwicXVlcnlTZWxlY3RvckFsbCIsImxlbmd0aCIsImkiLCJoaWdobGlnaHQiLCJjb3B5IiwicXVlcnlTZWxlY3RvciIsImNsaXBib2FyZCIsIkNsaXBib2FyZEpTIiwidGFyZ2V0IiwidHJpZ2dlciIsImNsb3Nlc3QiLCJlbCIsIm9uIiwiZSIsImNhcHRpb24iLCJpbm5lckhUTUwiLCJjbGVhclNlbGVjdGlvbiIsInNldFRpbWVvdXQiLCJpbml0IiwiS1RVdGlsIiwib25ET01Db250ZW50TG9hZGVkIl0sInNvdXJjZVJvb3QiOiIifQ==\n//# sourceURL=webpack-internal:///./resources/assets/core/js/custom/documentation/documentation.js\n");

/***/ })

/******/ 	});
/************************************************************************/
/******/ 	
/******/ 	// startup
/******/ 	// Load entry module and return exports
/******/ 	// This entry module can't be inlined because the eval-source-map devtool is used.
/******/ 	var __webpack_exports__ = {};
/******/ 	__webpack_modules__["./resources/assets/core/js/custom/documentation/documentation.js"]();
/******/ 	
/******/ })()
;