function ProductoControllerCrud($scope, $uibModal, $compile, DTOptionsBuilder, DTColumnBuilder){
    var vm = this;
    vm.delete = deleteRow;
    vm.dtInstance = {};
    vm.datas = {};
    vm.dtOptions = DTOptionsBuilder.fromSource('producto/query')
        .withPaginationType('full_numbers')
        .withOption('createdRow', createdRow)
        .withOption('responsive', true)         
        .withOption('processing', true);
    vm.dtColumns = [
	    DTColumnBuilder.newColumn(null).notSortable()
        .renderWith(actionsHtml).withOption('width','10px')
        .withOption('className', 'text-center').withTitle('ACTION'),
        DTColumnBuilder.newColumn('nombre').withTitle('nombre'),
        DTColumnBuilder.newColumn('precio').withTitle('precio'),
        DTColumnBuilder.newColumn('checar').withTitle('checare'),
        DTColumnBuilder.newColumn('revisar').withTitle('revisar'),       
    ];

    $scope.edit = function (datas) {
        var modalInstance = $uibModal.open({
            templateUrl: 'producto/modal',            
            controller: DataProductoControllerCrud,
            windowClass: "animated fadeIn",
            resolve: {
                 editId: function () {
                   return datas;
                 },
                 table: function () {
                   return vm.dtInstance;
                 }
               }
        });
    };
    $scope.add = function () {
        var modalInstance = $uibModal.open({
            templateUrl: 'producto/modal',            
            controller: NewProductoControllerCrud,
            windowClass: "animated fadeIn",
            resolve: {
                 table: function () {
                   return vm.dtInstance;
                 }
               }
            });
    };
    function deleteRow(idaccessremote) {
        vm.dtInstance.reloadData();
    }
    function createdRow(row, data, dataIndex) {
        $compile(angular.element(row).contents())($scope);
    }
    function actionsHtml(data, type, full, meta) {
        vm.datas[data.id] = data;
        return '<button type="button" class="btn btn-success" ng-click="edit('+data.id+')">'+
               '<span class="fa fa-edit"></span>'+
               '</button>';
    }
};
function DataProductoControllerCrud($scope, editId, table, $http, $uibModalInstance) {
	$scope.datas = {};
	$scope.datas.delete ='yes';
    $http.get('producto/'+editId+'/edit')
    .success(function(response){
        $scope.datas.id                		= response.id;
        $scope.datas.nombre                 = response.nombre;
        $scope.datas.precio                 = response.precio;
        $scope.datas.checar                 = response.checar;
        $scope.datas.revisar                = response.revisar;
    });
    $scope.cancel = function () {
        $uibModalInstance.dismiss('cancel');
    };
    $scope.delete = function (id) {
    	swal({
		  title: "¿Esta seguro sea Eliminar?",
		  // text: "You will not be able to recover this imaginary file!",
		  type: "warning",
		  showCancelButton: true,
		  confirmButtonColor: "#DD6B55",
		  confirmButtonText: "Si",
		  cancelButtonText: "No",
		  closeOnConfirm: false,
		  closeOnCancel: true
		},
		function(isConfirm){
		  if(isConfirm){
			$http.get('producto/'+id+'/delete')
	    	.then(function successCallback(response) {
	                table.reloadData();
	                sweetAlert('Correctamente', "", "success");
	                $uibModalInstance.dismiss('cancel');
	          }, function errorCallback(response) {
				sweetAlert("Oops...", "Something went wrong!", "error");
	          });
		  }
		});
    };
    $scope.submit = function() {      
         $http({
          method  : 'POST',
          url     : 'producto/'+$scope.datas.id+'/update',
          data    : $scope.datas,
          headers : { 'Content-Type': 'application/x-www-form-urlencoded' } 
         }).then(function successCallback(response) {
                table.reloadData();
                $uibModalInstance.dismiss('cancel');
          }, function errorCallback(response) {
                sweetAlert("Oops...", "Something went wrong!", "error");
          });          
    };
};
function NewProductoControllerCrud($scope, table, $http, $uibModalInstance){
	$scope.datas = {};
	$scope.datas.delete ='no';
	$scope.cancel = function () {
	        $uibModalInstance.dismiss('cancel');
	    };
    $scope.submit = function() {      
         $http({
          method  : 'POST',
          url     : 'producto',
          data    : $scope.datas,
          headers : { 'Content-Type': 'application/x-www-form-urlencoded' } 
         }).then(function successCallback(response) {
                table.reloadData();
	            sweetAlert('Correctamente', "", "success");
	            $uibModalInstance.dismiss('cancel');
          }, function errorCallback(response) {
 				sweetAlert("Oops...", "Something went wrong!", "error");
          });          
    };
}
angular
    .module('inspinia')
    .controller('ProductoControllerCrud', ProductoControllerCrud)