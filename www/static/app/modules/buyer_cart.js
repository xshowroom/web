/*! xshowroom - v1.0.0 - 2016-01-15 */angular.module("xShowroom.buyer.cart",["xShowroom.i18n","xShowroom.directives","mgcrea.ngStrap"]).controller("BuyerCartCtrl",["$scope","$modal","$filter","Cart",function(a,b,c,d){d.findAll().success(function(d){return"object"!=typeof d||d.status?void b({title:c("translate")("modal__title__ERROR"),content:c("translate")("modal__msg__error__SYSTEM_ERROR"),show:!0}):void(a.collections=d.data)})}]);