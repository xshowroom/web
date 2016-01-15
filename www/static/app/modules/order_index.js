angular.module(
    'xShowroom.order.index', 
    [
     	'xShowroom.i18n', 'xShowroom.directives', 'xShowroom.services',
     	'mgcrea.ngStrap', 'ui.uploader'
    ]
)
.controller(
    'OrderIndexCtrl',
    [
        '$scope', '$element', '$window', '$timeout',
        '$modal', '$filter', '$q', 'Order', 'uiUploader',
        function (
        	$scope, $element, $window, $timeout,
        	$modal, $filter, $q, Order, uiUploader
        ) {
        	var init = function (){
        		Order.findOne({
        			orderId: $scope.orderId
        		}).success(function(res){
        			if (typeof(res) != 'object' || res.status) {
        				$modal({title: 'Error Info', content: '订单获取失败，请检查！', show: true});
     					return;
     				}
        			$scope.processes = Order.getProcessByCollectionType(res.data.collection_mode);
        			
        			res.data.order_status = parseInt(res.data.order_status);
        			
        			var totalQuantity = 0;
        			
         			for(var id in res.data.productions) {
         				var info = res.data.productions[id];
         				var sizes = [];
         				var detail = {};
         				var quantity = 0;
         				for(var size in info.sizeCode) {
         					sizes.push(size);
         				};
         				for(var i = 0, len = info.detail.length; i < len; i++) {
         					if (!detail[info.detail[i]['color']]){
         						detail[info.detail[i]['color']] = {};
         					}
         					detail[info.detail[i]['color']][info.detail[i]['size_code']] = info.detail[i]['buy_num'];
         					quantity += parseInt(info.detail[i]['buy_num']);
         				};
         				res.data.productions[id].quantity = quantity;
         				res.data.productions[id].size = sizes;
         				res.data.productions[id].detail = detail;
         				totalQuantity += quantity;
         			}
         			res.data.quantity = totalQuantity;
        			$scope.order = res.data;
        			
        			$scope.statusIndex = $scope.processes.indexOf(res.data.order_status);
        		});
        	};
        	
        	$element.on('change', '#invoice-file', function(e){
        		$scope.$emit('uploading.start');
        		var self = $(this);
				var files = e.target.files;
				if (!files.length){
					$scope.$emit('uploading.end');
					return;
				}
				var error = {
					index: -1
				}
				$scope.colorErrorMsg = [];
				var timeout = $timeout(function(){
					timeout = null;
        		}, 30000, true);
        		
        		if(files[0].type !== 'application/pdf'){
					$modal({title: 'Error Info', content: '上传PDF文件格式错误，请重新上传！', show: true});
					$scope.$apply();
					self.val('');
					$scope.$emit('uploading.end');
				    return; 
				}
        		if(files[0].size / 1024 / 1024 > 2){
					$modal({title: 'Error Info', content: '上传PDF文件不得大于2MB，请重新上传！', show: true});
					$scope.$apply();
					self.val('');
					$scope.$emit('uploading.end');
				    return; 
				}
        		
				uiUploader.removeAll();
				uiUploader.addFiles(files);
                uiUploader.startUpload({
                    url: '/api/upload/pdf',
                    onCompleted: function(file, response) {
                    	if (!timeout) {
                    		$modal({title: 'Error Info', content: '上传文件超时，请重新上传！', show: true});
            				$scope.$apply();
            				self.val('');
            				$scope.$emit('uploading.end');
            				return;
                    	}
                    	response = JSON.parse(response);
                    	if (response.status != 0) {
                    		$modal({title: 'Error Info', content: '上传文件失败，请重新上传！', show: true});
        					$scope.$apply();
        					self.val('');
        					$scope.$emit('uploading.end');
                    		return;
                    	}
                    	$scope.order.invoice_url = response.data;
                    	$scope.$apply();
                    	
                    	$scope.$emit('uploading.end');
                    	$timeout.cancel(timeout);
                    	timeout = null;
                    }
                });
			});
        	
        	$scope.updateStatus = function(){
        		Order.updateStatus({
        			orderId: $scope.orderId,
        			orderStatus:  $scope.processes[$scope.statusIndex + 1]
        		}).success(function(res){
        			if (typeof(res) != 'object' || res.status) {
        				$modal({title: 'Error Info', content: res.msg, show: true});
     					return;
     				}
        			$window.location.reload();
        		});
        	};
        	
        	$scope.updateInvoice = function(){
        		if (!$scope.order.invoice_url){
        			$modal({title: 'Error Info', content: '尚未提交invoice相关文件', show: true});
        			return;
        		}
        		Order.updateInvoice({
        			orderId: $scope.orderId,
        			invoiceUrl: $scope.order.invoice_url
        		}).success(function(res){
        			if (typeof(res) != 'object' || res.status) {
        				$modal({title: 'Error Info', content: res.msg, show: true});
     					return;
     				}
        			$modal({title: 'Submit successfully', content: '提交invoice成功！', show: true});
        		});
        	};
        	
        	$scope.updateShipNo = function(){
        		if (!$scope.order.shipNo){
        			$modal({title: 'Error Info', content: '运单信息尚未填写', show: true});
        			return;
        		}
        		Order.updateShipNo({
        			orderId: $scope.orderId,
        			shipNo: $scope.order.shipNo
        		}).success(function(res){
        			if (typeof(res) != 'object' || res.status) {
        				$modal({title: 'Error Info', content: res.msg, show: true});
     					return;
     				}
        			$scope.updateStatus();
        		});
        	};
        	
        	$scope.updateComments = function(){
        		Order.updateComments({
					orderId: $scope.orderId,
					comments: $scope.order.comments
				}).success(function(res){
        			if (typeof(res) != 'object' || res.status) {
        				$modal({title: 'Error Info', content: res.msg, show: true});
     					return;
     				}
        			$scope.updateStatus();
        		});
        	};
        	
        	$scope.updateShipAmountComments = function(){
        		if (!$scope.order.shipNo && !/^\d+$/.test($scope.order.shipAmount)){
        			$modal({title: 'Error Info', content: '运费信息尚未填写或有非数字内容', show: true});
        			return;
        		}
        		$q.all([
					Order.updateShipAmount({
						orderId: $scope.orderId,
						shipAmount: $scope.order.shipAmount
					}),
					Order.updateComments({
						orderId: $scope.orderId,
						comments: $scope.order.comments
					})
        		]).then(function(res){
        			for (var i = 0, len = res.length; i < len; i++) {
        				if (typeof(res[i].data) != 'object' || res[i].data.status) {
            				$modal({title: 'Error Info', content: res[i].data.msg, show: true});
         					return;
         				}
        			}
        			$scope.updateStatus();
        		});
        		
        	};
        	
        	init();
        }
    ]
);