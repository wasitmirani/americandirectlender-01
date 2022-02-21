"use strict";
(self["webpackChunk"] = self["webpackChunk"] || []).push([["resources_js_components_backend_pages_setting_PasswordComponent_vue"],{

/***/ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/backend/components/BreadcrumbComponent.vue?vue&type=script&lang=js&":
/*!*********************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/backend/components/BreadcrumbComponent.vue?vue&type=script&lang=js& ***!
  \*********************************************************************************************************************************************************************************************************************************************/
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
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = ({
  props: ['activename', 'previous'],
  name: "Breadcrumb"
});

/***/ }),

/***/ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/backend/pages/setting/PasswordComponent.vue?vue&type=script&lang=js&":
/*!**********************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/backend/pages/setting/PasswordComponent.vue?vue&type=script&lang=js& ***!
  \**********************************************************************************************************************************************************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _components_BreadcrumbComponent_vue__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../../components/BreadcrumbComponent.vue */ "./resources/js/components/backend/components/BreadcrumbComponent.vue");
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
  components: {
    Breadcrumb: _components_BreadcrumbComponent_vue__WEBPACK_IMPORTED_MODULE_0__["default"]
  },
  data: function data() {
    return {
      passwords: {},
      user: {},
      errors: {},
      file: ""
    };
  },
  methods: {
    updatePassword: function updatePassword(e) {
      var _this = this;

      e.preventDefault();
      var formData = new FormData();
      formData = Object.assign(this.passwords, formData);
      axios.post('/password/setting/' + this.user.id, formData).then(function (res) {
        _this.$root.alertNotificationMessage(res.status, "Password Updated Successfully");

        setTimeout(function () {
          _this.$router.push({
            name: 'users'
          });
        }, 1000);
      })["catch"](function (err) {
        if (err.response.status == 422) {
          _this.errors = err.response.data.errors;
          return _this.$root.alertNotificationMessage(err.response.status, err.response.data.errors);
        }

        _this.$root.alertNotificationMessage(err.response.status, err.response.data);
      });
    },
    handleFileUpload: function handleFileUpload() {
      this.file = this.$refs.file.files[0];
    },
    updateProfile: function updateProfile(e) {
      var _this2 = this;

      e.preventDefault();
      var formData = new FormData();
      formData.append('email', this.user.email);
      formData.append('name', this.user.name);
      formData.append('thumbnail', this.file);
      formData.append('image', this.user.thumbnail);
      formData.append('about_me', this.user.user_info.about_me);
      axios.post('/profile/setting/' + this.user.id, formData, {
        headers: {
          'Content-Type': 'multipart/form-data'
        }
      }).then(function (res) {
        _this2.$root.alertNotificationMessage(res.status, "Profile Updated Successfully");

        setTimeout(function () {
          _this2.$router.push({
            name: 'home'
          });
        }, 1000);
      })["catch"](function (err) {
        if (err.response.status == 422) {
          _this2.errors = err.response.data.errors;
          return _this2.$root.alertNotificationMessage(err.response.status, err.response.data.errors);
        }

        _this2.$root.alertNotificationMessage(err.response.status, err.response.data);
      });
    }
  },
  mounted: function mounted() {
    var _this3 = this;

    axios.get("/profile/setting").then(function (res) {
      _this3.user = res.data.user;
    })["catch"](function (err) {
      if (err.response.status == 422) {
        _this3.errors = err.response.data.errors;
        return _this3.$root.alertNotificationMessage(err.response.status, err.response.data.errors);
      }

      _this3.$root.alertNotificationMessage(err.response.status, err.response.data);
    });
  }
});

/***/ }),

/***/ "./resources/js/components/backend/components/BreadcrumbComponent.vue":
/*!****************************************************************************!*\
  !*** ./resources/js/components/backend/components/BreadcrumbComponent.vue ***!
  \****************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _BreadcrumbComponent_vue_vue_type_template_id_53d59af2___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./BreadcrumbComponent.vue?vue&type=template&id=53d59af2& */ "./resources/js/components/backend/components/BreadcrumbComponent.vue?vue&type=template&id=53d59af2&");
/* harmony import */ var _BreadcrumbComponent_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./BreadcrumbComponent.vue?vue&type=script&lang=js& */ "./resources/js/components/backend/components/BreadcrumbComponent.vue?vue&type=script&lang=js&");
/* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! !../../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */
;
var component = (0,_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _BreadcrumbComponent_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _BreadcrumbComponent_vue_vue_type_template_id_53d59af2___WEBPACK_IMPORTED_MODULE_0__.render,
  _BreadcrumbComponent_vue_vue_type_template_id_53d59af2___WEBPACK_IMPORTED_MODULE_0__.staticRenderFns,
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/components/backend/components/BreadcrumbComponent.vue"
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (component.exports);

/***/ }),

/***/ "./resources/js/components/backend/pages/setting/PasswordComponent.vue":
/*!*****************************************************************************!*\
  !*** ./resources/js/components/backend/pages/setting/PasswordComponent.vue ***!
  \*****************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _PasswordComponent_vue_vue_type_template_id_7a93db82___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./PasswordComponent.vue?vue&type=template&id=7a93db82& */ "./resources/js/components/backend/pages/setting/PasswordComponent.vue?vue&type=template&id=7a93db82&");
/* harmony import */ var _PasswordComponent_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./PasswordComponent.vue?vue&type=script&lang=js& */ "./resources/js/components/backend/pages/setting/PasswordComponent.vue?vue&type=script&lang=js&");
/* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! !../../../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */
;
var component = (0,_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _PasswordComponent_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _PasswordComponent_vue_vue_type_template_id_7a93db82___WEBPACK_IMPORTED_MODULE_0__.render,
  _PasswordComponent_vue_vue_type_template_id_7a93db82___WEBPACK_IMPORTED_MODULE_0__.staticRenderFns,
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/components/backend/pages/setting/PasswordComponent.vue"
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (component.exports);

/***/ }),

/***/ "./resources/js/components/backend/components/BreadcrumbComponent.vue?vue&type=script&lang=js&":
/*!*****************************************************************************************************!*\
  !*** ./resources/js/components/backend/components/BreadcrumbComponent.vue?vue&type=script&lang=js& ***!
  \*****************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_0_rules_0_use_0_node_modules_vue_loader_lib_index_js_vue_loader_options_BreadcrumbComponent_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!../../../../../node_modules/vue-loader/lib/index.js??vue-loader-options!./BreadcrumbComponent.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/backend/components/BreadcrumbComponent.vue?vue&type=script&lang=js&");
 /* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (_node_modules_babel_loader_lib_index_js_clonedRuleSet_5_0_rules_0_use_0_node_modules_vue_loader_lib_index_js_vue_loader_options_BreadcrumbComponent_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/components/backend/pages/setting/PasswordComponent.vue?vue&type=script&lang=js&":
/*!******************************************************************************************************!*\
  !*** ./resources/js/components/backend/pages/setting/PasswordComponent.vue?vue&type=script&lang=js& ***!
  \******************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_0_rules_0_use_0_node_modules_vue_loader_lib_index_js_vue_loader_options_PasswordComponent_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../../node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!../../../../../../node_modules/vue-loader/lib/index.js??vue-loader-options!./PasswordComponent.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/backend/pages/setting/PasswordComponent.vue?vue&type=script&lang=js&");
 /* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (_node_modules_babel_loader_lib_index_js_clonedRuleSet_5_0_rules_0_use_0_node_modules_vue_loader_lib_index_js_vue_loader_options_PasswordComponent_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/components/backend/components/BreadcrumbComponent.vue?vue&type=template&id=53d59af2&":
/*!***********************************************************************************************************!*\
  !*** ./resources/js/components/backend/components/BreadcrumbComponent.vue?vue&type=template&id=53d59af2& ***!
  \***********************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "render": () => (/* reexport safe */ _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_BreadcrumbComponent_vue_vue_type_template_id_53d59af2___WEBPACK_IMPORTED_MODULE_0__.render),
/* harmony export */   "staticRenderFns": () => (/* reexport safe */ _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_BreadcrumbComponent_vue_vue_type_template_id_53d59af2___WEBPACK_IMPORTED_MODULE_0__.staticRenderFns)
/* harmony export */ });
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_BreadcrumbComponent_vue_vue_type_template_id_53d59af2___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../../node_modules/vue-loader/lib/index.js??vue-loader-options!./BreadcrumbComponent.vue?vue&type=template&id=53d59af2& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/backend/components/BreadcrumbComponent.vue?vue&type=template&id=53d59af2&");


/***/ }),

/***/ "./resources/js/components/backend/pages/setting/PasswordComponent.vue?vue&type=template&id=7a93db82&":
/*!************************************************************************************************************!*\
  !*** ./resources/js/components/backend/pages/setting/PasswordComponent.vue?vue&type=template&id=7a93db82& ***!
  \************************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "render": () => (/* reexport safe */ _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_PasswordComponent_vue_vue_type_template_id_7a93db82___WEBPACK_IMPORTED_MODULE_0__.render),
/* harmony export */   "staticRenderFns": () => (/* reexport safe */ _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_PasswordComponent_vue_vue_type_template_id_7a93db82___WEBPACK_IMPORTED_MODULE_0__.staticRenderFns)
/* harmony export */ });
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_PasswordComponent_vue_vue_type_template_id_7a93db82___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../../../node_modules/vue-loader/lib/index.js??vue-loader-options!./PasswordComponent.vue?vue&type=template&id=7a93db82& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/backend/pages/setting/PasswordComponent.vue?vue&type=template&id=7a93db82&");


/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/backend/components/BreadcrumbComponent.vue?vue&type=template&id=53d59af2&":
/*!**************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/backend/components/BreadcrumbComponent.vue?vue&type=template&id=53d59af2& ***!
  \**************************************************************************************************************************************************************************************************************************************************/
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
    _c("div", { staticClass: "col-sm-6" }, [
      _c("h3", [_vm._v(_vm._s(_vm.activename))]),
      _vm._v(" "),
      _c(
        "ol",
        { staticClass: "breadcrumb" },
        [
          _c(
            "li",
            { staticClass: "breadcrumb-item" },
            [
              _c(
                "router-link",
                { attrs: { to: "/", "data-bs-original-title": "", title: "" } },
                [_vm._v("Home")]
              )
            ],
            1
          ),
          _vm._v(" "),
          _vm._l(_vm.previous, function(item) {
            return _c(
              "li",
              { key: item.id, staticClass: "breadcrumb-item active" },
              [
                _c("router-link", { attrs: { to: item.link } }, [
                  _vm._v(_vm._s(item.name))
                ])
              ],
              1
            )
          }),
          _vm._v(" "),
          _c("li", { staticClass: "breadcrumb-item active" }, [
            _c("a", { attrs: { href: "javascript:void(0)" } }, [
              _vm._v(_vm._s(_vm.activename))
            ])
          ])
        ],
        2
      )
    ])
  ])
}
var staticRenderFns = []
render._withStripped = true



/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/backend/pages/setting/PasswordComponent.vue?vue&type=template&id=7a93db82&":
/*!***************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/backend/pages/setting/PasswordComponent.vue?vue&type=template&id=7a93db82& ***!
  \***************************************************************************************************************************************************************************************************************************************************/
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
  return _c(
    "div",
    [
      _c("Breadcrumb", { attrs: { activename: "Settings" } }),
      _vm._v(" "),
      _c("div", { staticClass: "container-fluid" }, [
        _c("div", { staticClass: "row" }, [
          _c("div", { staticClass: "col-xl-12 xl-100 col-lg-12 box-col-12" }, [
            _c("div", { staticClass: "card" }, [
              _vm._m(0),
              _vm._v(" "),
              _c("div", { staticClass: "card-body" }, [
                _c("div", { staticClass: "tabbed-card" }, [
                  _vm._m(1),
                  _vm._v(" "),
                  _c(
                    "div",
                    {
                      staticClass: "tab-content",
                      attrs: { id: "pills-clrtabContent1" }
                    },
                    [
                      _c(
                        "div",
                        {
                          staticClass: "tab-pane fade show active",
                          attrs: {
                            id: "pills-clrhome1",
                            role: "tabpanel",
                            "aria-labelledby": "pills-clrhome-tab1"
                          }
                        },
                        [
                          _c("div", { staticClass: "card-body" }, [
                            _c("form", [
                              _c("div", { staticClass: "row mb-2" }, [
                                _c("div", { staticClass: "profile-title" }, [
                                  _c("div", { staticClass: "media" }, [
                                    _c("img", {
                                      staticClass: "img-70 rounded-circle",
                                      attrs: {
                                        alt: "",
                                        src: _vm.user.thumbnail
                                      }
                                    }),
                                    _vm._v(" "),
                                    _c("div", { staticClass: "media-body" }, [
                                      _c(
                                        "h3",
                                        {
                                          staticClass: "mb-1 f-20 txt-primary"
                                        },
                                        [_vm._v(_vm._s(_vm.user.name))]
                                      ),
                                      _vm._v(" "),
                                      _c("p", { staticClass: "f-12" })
                                    ])
                                  ])
                                ])
                              ]),
                              _vm._v(" "),
                              _c("div", { staticClass: "mb-3" }, [
                                _c("h6", { staticClass: "form-label" }, [
                                  _vm._v("Name")
                                ]),
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
                                      _vm.$set(
                                        _vm.user,
                                        "name",
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
                                      _vm.$set(
                                        _vm.user,
                                        "email",
                                        $event.target.value
                                      )
                                    }
                                  }
                                })
                              ]),
                              _vm._v(" "),
                              _c("div", { staticClass: "mb-3" }, [
                                _c("label", { staticClass: "form-label" }, [
                                  _vm._v("Image")
                                ]),
                                _vm._v(" "),
                                _c("input", {
                                  ref: "file",
                                  staticClass: "form-control",
                                  attrs: { type: "file", id: "file" },
                                  on: {
                                    change: function($event) {
                                      return _vm.handleFileUpload()
                                    }
                                  }
                                })
                              ]),
                              _vm._v(" "),
                              _c("div", { staticClass: "form-footer" }, [
                                _c(
                                  "button",
                                  {
                                    staticClass: "btn btn-primary btn-block",
                                    attrs: { type: "button" },
                                    on: { click: _vm.updateProfile }
                                  },
                                  [_vm._v("Save")]
                                )
                              ])
                            ])
                          ])
                        ]
                      ),
                      _vm._v(" "),
                      _c(
                        "div",
                        {
                          staticClass: "tab-pane fade",
                          attrs: {
                            id: "pills-clrprofile1",
                            role: "tabpanel",
                            "aria-labelledby": "pills-clrprofile-tab1"
                          }
                        },
                        [
                          _c("div", { staticClass: "card-body" }, [
                            _c("form", [
                              _c("div", { staticClass: "mb-3" }, [
                                _c("label", { staticClass: "form-label" }, [
                                  _vm._v("Enter Password")
                                ]),
                                _vm._v(" "),
                                _c("input", {
                                  directives: [
                                    {
                                      name: "model",
                                      rawName: "v-model",
                                      value: _vm.passwords.password,
                                      expression: "passwords.password"
                                    }
                                  ],
                                  staticClass: "form-control",
                                  attrs: {
                                    type: "password",
                                    placeholder: "Enter Password"
                                  },
                                  domProps: { value: _vm.passwords.password },
                                  on: {
                                    input: function($event) {
                                      if ($event.target.composing) {
                                        return
                                      }
                                      _vm.$set(
                                        _vm.passwords,
                                        "password",
                                        $event.target.value
                                      )
                                    }
                                  }
                                }),
                                _vm._v(" "),
                                _vm.errors.password
                                  ? _c("span", { staticClass: "text-danger" }, [
                                      _vm._v(_vm._s(_vm.errors.password[0]))
                                    ])
                                  : _vm._e()
                              ]),
                              _vm._v(" "),
                              _c("div", { staticClass: "mb-3" }, [
                                _c("label", { staticClass: "form-label" }, [
                                  _vm._v("Confirm Password")
                                ]),
                                _vm._v(" "),
                                _c("input", {
                                  directives: [
                                    {
                                      name: "model",
                                      rawName: "v-model",
                                      value:
                                        _vm.passwords.password_confirmation,
                                      expression:
                                        "passwords.password_confirmation"
                                    }
                                  ],
                                  staticClass: "form-control",
                                  attrs: {
                                    type: "password",
                                    placeholder: "Confirm Password"
                                  },
                                  domProps: {
                                    value: _vm.passwords.password_confirmation
                                  },
                                  on: {
                                    input: function($event) {
                                      if ($event.target.composing) {
                                        return
                                      }
                                      _vm.$set(
                                        _vm.passwords,
                                        "password_confirmation",
                                        $event.target.value
                                      )
                                    }
                                  }
                                })
                              ]),
                              _vm._v(" "),
                              _c("div", { staticClass: "form-footer" }, [
                                _c(
                                  "button",
                                  {
                                    staticClass: "btn btn-primary btn-block",
                                    on: { click: _vm.updatePassword }
                                  },
                                  [_vm._v("Update")]
                                )
                              ])
                            ])
                          ])
                        ]
                      )
                    ]
                  )
                ])
              ])
            ])
          ])
        ])
      ])
    ],
    1
  )
}
var staticRenderFns = [
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "card-header pb-0" }, [
      _c("h5", { staticClass: "pull-left" }, [_vm._v("Settings")])
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c(
      "ul",
      {
        staticClass: "pull-right nav nav-pills nav-primary",
        attrs: { id: "pills-clrtab1", role: "tablist" }
      },
      [
        _c("li", { staticClass: "nav-item" }, [
          _c(
            "a",
            {
              staticClass: "nav-link active",
              attrs: {
                id: "pills-clrhome-tab1",
                "data-bs-toggle": "pill",
                href: "#pills-clrhome1",
                role: "tab",
                "aria-controls": "pills-clrhome1",
                "aria-selected": "true"
              }
            },
            [_vm._v("Update Profile")]
          )
        ]),
        _vm._v(" "),
        _c("li", { staticClass: "nav-item" }, [
          _c(
            "a",
            {
              staticClass: "nav-link",
              attrs: {
                id: "pills-clrprofile-tab1",
                "data-bs-toggle": "pill",
                href: "#pills-clrprofile1",
                role: "tab",
                "aria-controls": "pills-clrprofile1",
                "aria-selected": "false"
              }
            },
            [_vm._v("Update Password")]
          )
        ])
      ]
    )
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