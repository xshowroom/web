/*! xshowroom - v1.0.0 - 2016-01-15 */angular.module("xShowroom.admin",["ngCookies","xShowroom.i18n","xShowroom.directives","xShowroom.services","mgcrea.ngStrap"]).controller("AdminUserMgrCtrl",["$scope","$filter","Admin",function(a,b,c){a.clickUser=function(a,b,c){userId=a,storeId=b,brandId=c},a.adminAllowUser=function(){c.allowUser({userId:userId}).success(function(a){return"object"!=typeof a||a.status?void $modal({title:b("translate")("modal__title__ERROR"),content:a.msg,show:!0}):void window.location.reload()})},a.adminRejectUser=function(){c.rejectUser({userId:userId}).success(function(a){return"object"!=typeof a||a.status?void $modal({title:b("translate")("modal__title__ERROR"),content:a.msg,show:!0}):void window.location.reload()})}}]);