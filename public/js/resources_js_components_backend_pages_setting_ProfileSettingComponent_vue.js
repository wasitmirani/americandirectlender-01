"use strict";
(self["webpackChunk"] = self["webpackChunk"] || []).push([["resources_js_components_backend_pages_setting_ProfileSettingComponent_vue"],{

/***/ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/backend/pages/setting/ProfileSettingComponent.vue?vue&type=script&lang=js&":
/*!****************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/backend/pages/setting/ProfileSettingComponent.vue?vue&type=script&lang=js& ***!
  \****************************************************************************************************************************************************************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = ({
  data: function data() {
    return {
      user: {
        name: "",
        email: "",
        thumbnail: ""
      },
      errors: {}
    };
  },
  methods: {
    onSave: function onSave(e) {
      var _this = this;

      e.preventDefault();
      var formData = new FormData();
      formData.append('email', this.user.email);
      formData.append('name', this.user.name);
      formData.append('thumbnail', this.user.thumbnail);
      formData.append('about_me', this.user.user_info.about_me);
      formData.append('id', this.user.id);
      axios.post('/profile/setting/', formData).then(function (res) {
        _this.$root.alertNotificationMessage(res.status, "User has been Updated successfully");
      })["catch"](function (err) {
        if (err.response.status == 422) {
          _this.errors = err.response.data.errors;
          return _this.$root.alertNotificationMessage(err.response.status, err.response.data.errors);
        }

        _this.$root.alertNotificationMessage(err.response.status, err.response.data);
      });
    }
  },
  mounted: function mounted() {
    var _this2 = this;

    axios.get("/profile/setting").then(function (res) {
      _this2.user = res.data.user;
    })["catch"](function (err) {
      if (err.response.status == 422) {
        _this2.errors = err.response.data.errors;
        return _this2.$root.alertNotificationMessage(err.response.status, err.response.data.errors);
      }

      _this2.$root.alertNotificationMessage(err.response.status, err.response.data);
    });
  }
});

/***/ }),

/***/ "./resources/js/components/backend/pages/setting/ProfileSettingComponent.vue":
/*!***********************************************************************************!*\
  !*** ./resources/js/components/backend/pages/setting/ProfileSettingComponent.vue ***!
  \***********************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _ProfileSettingComponent_vue_vue_type_template_id_37122f36___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./ProfileSettingComponent.vue?vue&type=template&id=37122f36& */ "./resources/js/components/backend/pages/setting/ProfileSettingComponent.vue?vue&type=template&id=37122f36&");
/* harmony import */ var _ProfileSettingComponent_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./ProfileSettingComponent.vue?vue&type=script&lang=js& */ "./resources/js/components/backend/pages/setting/ProfileSettingComponent.vue?vue&type=script&lang=js&");
/* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! !../../../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */
;
var component = (0,_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _ProfileSettingComponent_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _ProfileSettingComponent_vue_vue_type_template_id_37122f36___WEBPACK_IMPORTED_MODULE_0__.render,
  _ProfileSettingComponent_vue_vue_type_template_id_37122f36___WEBPACK_IMPORTED_MODULE_0__.staticRenderFns,
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/components/backend/pages/setting/ProfileSettingComponent.vue"
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (component.exports);

/***/ }),

/***/ "./resources/js/components/backend/pages/setting/ProfileSettingComponent.vue?vue&type=script&lang=js&":
/*!************************************************************************************************************!*\
  !*** ./resources/js/components/backend/pages/setting/ProfileSettingComponent.vue?vue&type=script&lang=js& ***!
  \************************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_0_rules_0_use_0_node_modules_vue_loader_lib_index_js_vue_loader_options_ProfileSettingComponent_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../../node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!../../../../../../node_modules/vue-loader/lib/index.js??vue-loader-options!./ProfileSettingComponent.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/backend/pages/setting/ProfileSettingComponent.vue?vue&type=script&lang=js&");
 /* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (_node_modules_babel_loader_lib_index_js_clonedRuleSet_5_0_rules_0_use_0_node_modules_vue_loader_lib_index_js_vue_loader_options_ProfileSettingComponent_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/components/backend/pages/setting/ProfileSettingComponent.vue?vue&type=template&id=37122f36&":
/*!******************************************************************************************************************!*\
  !*** ./resources/js/components/backend/pages/setting/ProfileSettingComponent.vue?vue&type=template&id=37122f36& ***!
  \******************************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "render": () => (/* reexport safe */ _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_ProfileSettingComponent_vue_vue_type_template_id_37122f36___WEBPACK_IMPORTED_MODULE_0__.render),
/* harmony export */   "staticRenderFns": () => (/* reexport safe */ _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_ProfileSettingComponent_vue_vue_type_template_id_37122f36___WEBPACK_IMPORTED_MODULE_0__.staticRenderFns)
/* harmony export */ });
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_ProfileSettingComponent_vue_vue_type_template_id_37122f36___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../../../node_modules/vue-loader/lib/index.js??vue-loader-options!./ProfileSettingComponent.vue?vue&type=template&id=37122f36& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/backend/pages/setting/ProfileSettingComponent.vue?vue&type=template&id=37122f36&");


/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/backend/pages/setting/ProfileSettingComponent.vue?vue&type=template&id=37122f36&":
/*!*********************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/backend/pages/setting/ProfileSettingComponent.vue?vue&type=template&id=37122f36& ***!
  \*********************************************************************************************************************************************************************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "render": () => (/* binding */ render),
/* harmony export */   "staticRenderFns": () => (/* binding */ staticRenderFns)
/* harmony export */ });
var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c("div", [
    _c("div", { staticClass: "container-fluid" }, [
      _c("div", { staticClass: "edit-profile" }, [
        _c("div", { staticClass: "row" }, [
          _c("div", { staticClass: "col-xl-12" }, [
            _c("div", { staticClass: "card" }, [
              _vm._m(0),
              _vm._v(" "),
              _c("div", { staticClass: "card-body" }, [
                _c("form", [
                  _c("div", { staticClass: "row mb-2" }, [
                    _c("div", { staticClass: "profile-title" }, [
                      _c("div", { staticClass: "media" }, [
                        _c("img", {
                          staticClass: "img-70 rounded-circle",
                          attrs: { alt: "", src: _vm.user.thumbnail }
                        }),
                        _vm._v(" "),
                        _c("div", { staticClass: "media-body" }, [
                          _c("h3", { staticClass: "mb-1 f-20 txt-primary" }, [
                            _vm._v(_vm._s(_vm.user.name))
                          ]),
                          _vm._v(" "),
                          _c("p", { staticClass: "f-12" })
                        ])
                      ])
                    ])
                  ]),
                  _vm._v(" "),
                  _c("div", { staticClass: "mb-3" }, [
                    _c("h6", { staticClass: "form-label" }, [_vm._v("Name")]),
                    _vm._v(" "),
                    _c("input", {
                      directives: [
                        {
                          name: "model",
                          rawName: "v-model",
                          value: _vm.user.name,
                          expression: "user.name"
                        }
                      ],
                      staticClass: "form-control",
                      attrs: { name: "name", required: "" },
                      domProps: { value: _vm.user.name },
                      on: {
                        input: function($event) {
                          if ($event.target.composing) {
                            return
                          }
                          _vm.$set(_vm.user, "name", $event.target.value)
                        }
                      }
                    })
                  ]),
                  _vm._v(" "),
                  _c("div", { staticClass: "mb-3" }, [
                    _c("h6", { staticClass: "form-label" }, [_vm._v("Bio")]),
                    _vm._v(" "),
                    _c("textarea", {
                      directives: [
                        {
                          name: "model",
                          rawName: "v-model",
                          value: _vm.user.user_info.about_me,
                          expression: "user.user_info.about_me"
                        }
                      ],
                      staticClass: "form-control",
                      attrs: { rows: "5", name: "bio", required: "" },
                      domProps: { value: _vm.user.user_info.about_me },
                      on: {
                        input: function($event) {
                          if ($event.target.composing) {
                            return
                          }
                          _vm.$set(
                            _vm.user.user_info,
                            "about_me",
                            $event.target.value
                          )
                        }
                      }
                    })
                  ]),
                  _vm._v(" "),
                  _c("div", { staticClass: "mb-3" }, [
                    _c("label", { staticClass: "form-label" }, [
                      _vm._v("Email-Address")
                    ]),
                    _vm._v(" "),
                    _c("input", {
                      directives: [
                        {
                          name: "model",
                          rawName: "v-model",
                          value: _vm.user.email,
                          expression: "user.email"
                        }
                      ],
                      staticClass: "form-control",
                      attrs: {
                        type: "email",
                        placeholder: "your-email@domain.com",
                        name: "email",
                        required: ""
                      },
                      domProps: { value: _vm.user.email },
                      on: {
                        input: function($event) {
                          if ($event.target.composing) {
                            return
                          }
                          _vm.$set(_vm.user, "email", $event.target.value)
                        }
                      }
                    })
                  ]),
                  _vm._v(" "),
                  _vm._m(1),
                  _vm._v(" "),
                  _c("div", { staticClass: "form-footer" }, [
                    _c(
                      "button",
                      {
                        staticClass: "btn btn-primary btn-block",
                        attrs: { type: "button" },
                        on: { click: _vm.onSave }
                      },
                      [_vm._v("Save")]
                    )
                  ])
                ])
              ])
            ])
          ])
        ])
      ])
    ])
  ])
}
var staticRenderFns = [
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "card-header pb-0" }, [
      _c("h4", { staticClass: "card-title mb-0" }, [_vm._v("My Profile")]),
      _vm._v(" "),
      _c("div", { staticClass: "card-options" }, [
        _c(
          "a",
          {
            staticClass: "card-options-collapse",
            attrs: { href: "#", "data-bs-toggle": "card-collapse" }
          },
          [_c("i", { staticClass: "fe fe-chevron-up" })]
        ),
        _c(
          "a",
          {
            staticClass: "card-options-remove",
            attrs: { href: "#", "data-bs-toggle": "card-remove" }
          },
          [_c("i", { staticClass: "fe fe-x" })]
        )
      ])
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "mb-3" }, [
      _c("label", { staticClass: "form-label" }, [_vm._v("Image")]),
      _vm._v(" "),
      _c("input", {
        staticClass: "form-control",
        attrs: { type: "file", name: "thumbnail" }
      })
    ])
  }
]
render._withStripped = true



/***/ }),

/***/ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js":
/*!********************************************************************!*\
  !*** ./node_modules/vue-loader/lib/runtime/componentNormalizer.js ***!
  \********************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (/* binding */ normalizeComponent)
/* harmony export */ });
/* globals __VUE_SSR_CONTEXT__ */

// IMPORTANT: Do NOT use ES2015 features in this file (except for modules).
// This module is a runtime utility for cleaner component module output and will
// be included in the final webpack user bundle.

function normalizeComponent (
  scriptExports,
  render,
  staticRenderFns,
  functionalTemplate,
  injectStyles,
  scopeId,
  moduleIdentifier, /* server only */
  shadowMode /* vue-cli only */
) {
  // Vue.extend constructor export interop
  var options = typeof scriptExports === 'function'
    ? scriptExports.options
    : scriptExports

  // render functions
  if (render) {
    options.render = render
    options.staticRenderFns = staticRenderFns
    options._compiled = true
  }

  // functional template
  if (functionalTemplate) {
    options.functional = true
  }

  // scopedId
  if (scopeId) {
    options._scopeId = 'data-v-' + scopeId
  }

  var hook
  if (moduleIdentifier) { // server build
    hook = function (context) {
      // 2.3 injection
      context =
        context || // cached call
        (this.$vnode && this.$vnode.ssrContext) || // stateful
        (this.parent && this.parent.$vnode && this.parent.$vnode.ssrContext) // functional
      // 2.2 with runInNewContext: true
      if (!context && typeof __VUE_SSR_CONTEXT__ !== 'undefined') {
        context = __VUE_SSR_CONTEXT__
      }
      // inject component styles
      if (injectStyles) {
        injectStyles.call(this, context)
      }
      // register component module identifier for async chunk inferrence
      if (context && context._registeredComponents) {
        context._registeredComponents.add(moduleIdentifier)
      }
    }
    // used by ssr in case component is cached and beforeCreate
    // never gets called
    options._ssrRegister = hook
  } else if (injectStyles) {
    hook = shadowMode
      ? function () {
        injectStyles.call(
          this,
          (options.functional ? this.parent : this).$root.$options.shadowRoot
        )
      }
      : injectStyles
  }

  if (hook) {
    if (options.functional) {
      // for template-only hot-reload because in that case the render fn doesn't
      // go through the normalizer
      options._injectStyles = hook
      // register for functional component in vue file
      var originalRender = options.render
      options.render = function renderWithStyleInjection (h, context) {
        hook.call(context)
        return originalRender(h, context)
      }
    } else {
      // inject component registration as beforeCreate hook
      var existing = options.beforeCreate
      options.beforeCreate = existing
        ? [].concat(existing, hook)
        : [hook]
    }
  }

  return {
    exports: scriptExports,
    options: options
  }
}


/***/ })

}]);