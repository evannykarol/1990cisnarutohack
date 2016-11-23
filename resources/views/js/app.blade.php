@foreach($Crud as $Cruds)
function <%ucfirst($Cruds->title)%>ControllerCrud($scope, $uibModal, $compile, DTOptionsBuilder, DTColumnBuilder){
    var vm = this;
    vm.delete = deleteRow;
    vm.dtInstance = {};
    vm.datas = {};
    vm.dtOptions = DTOptionsBuilder.fromSource('<%$Cruds->title%>/query')
        .withPaginationType('full_numbers')
        .withOption('createdRow', createdRow)
        .withOption('responsive', true)         
        .withOption('processing', true);
    vm.dtColumns = [
	    DTColumnBuilder.newColumn(null).notSortable()
        .renderWith(actionsHtml).withOption('width','10px')
        .withOption('className', 'text-center').withTitle('ACTION'),
        @foreach($Crudtables as $Crudtable)
          @if($Crudtable->id_crud == $Cruds->id)
            DTColumnBuilder.newColumn('<%$Crudtable->name%>').withTitle('<%strtoupper($Crudtable->name)%>'),
          @endif
        @endforeach
    ];
    $scope.edit = function (datas) {
        var modalInstance = $uibModal.open({
            templateUrl: '<%$Cruds->title%>/modal',            
            controller: Data<%$Cruds->title%>ControllerCrud,
            windowClass: "animated fadeInDown",
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
            templateUrl: '<%$Cruds->title%>/modal',            
            controller: New<%$Cruds->title%>ControllerCrud,
            windowClass: "animated fadeInDown",
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
function Data<%$Cruds->title%>ControllerCrud($scope, editId, table, $http, $uibModalInstance) {
	$scope.datas = {};
	$scope.datas.delete ='yes';
  $scope.loading = 'yes';   
    $http.get('<%$Cruds->title%>/'+editId+'/edit')
    .success(function(response){
        $scope.datas.id = response.id;
        @foreach($Crudtables as $Crudtable)
          @if($Crudtable->id_crud == $Cruds->id)
            $scope.datas.<%$Crudtable->name%> = response.<%$Crudtable->name%>;
          @endif
        @endforeach
        $scope.loading = 'no'; 
        $scope.view = 'yes';     
    });
    $scope.cancel = function () {
        $uibModalInstance.dismiss('cancel');
    };
    $scope.delete = function (id) {
    	swal({
		  title: "¿Esta seguro sea Eliminar?",
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
			$http.get('<%$Cruds->title%>/'+id+'/delete')
	    	.then(function successCallback(response) {
	                table.reloadData();
	                sweetAlert('Correctamente', "", "success");
	                $uibModalInstance.dismiss('cancel');
	          }, function errorCallback(response) {
				sweetAlert("Oops...", "", "error");
	          });
		  }
		});
    };
    $scope.submit = function() {
      $scope.btnload = true;      
         $http({
          method  : 'POST',
          url     : '<%$Cruds->title%>/'+$scope.datas.id+'/update',
          data    : $scope.datas,
          headers : { 'Content-Type': 'application/x-www-form-urlencoded' } 
         }).then(function successCallback(response) {
                $scope.btnload = false;
                sweetAlert(response.data, "", "success"); 
                table.reloadData();
                $uibModalInstance.dismiss('cancel');
          }, function errorCallback(response) {
                $scope.btnload = false; 
                sweetAlert("Oops...", "Something went wrong!", "error");
          });          
    };
};
function New<%$Cruds->title%>ControllerCrud($scope, table, $http, $uibModalInstance){
	$scope.datas = {};
	$scope.datas.delete ='no';
  $scope.view = 'yes';
  $scope.loading = 'no'; 
	$scope.cancel = function () {
	        $uibModalInstance.dismiss('cancel');
	    };
    $scope.submit = function() {
         $scope.btnload = true;      
         $http({
          method  : 'POST',
          url     : '<%$Cruds->title%>',
          data    : $scope.datas,
          headers : { 'Content-Type': 'application/x-www-form-urlencoded' } 
         }).then(function successCallback(response) {
              table.reloadData();
	            sweetAlert(response.data, "", "success");
	            $uibModalInstance.dismiss('cancel');
              $scope.btnload = false; 
          }, function errorCallback(response) {
              $scope.btnload = false;
 				     sweetAlert("Oops...", "Something went wrong!", "error");
          });          
    };
}
@endforeach
angular
    .module('inspinia')
    @foreach($Crud as $Cruds)
    .controller('<%ucfirst($Cruds->title)%>ControllerCrud', <%ucfirst($Cruds->title)%>ControllerCrud)
    @endforeach
