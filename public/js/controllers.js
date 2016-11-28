function DashboardCtrl($scope, $http, $location)
{
  $scope.dashboard = {};
  $http.get('dashboard/query')
    .success(function(response){
    $scope.dashboard.user     = response.user;
    $scope.dashboard.messages = response.messages;
    // $scope.dashboard.user = response.moduls;
  });
};
function chartJsCtrl() 
{

    this.lineDataDashboard4 = {
        labels: ["January", "February", "March", "April", "May", "June", "July", "Agost", "Septiem", "Octub","November","December"],
        datasets: [
            {
                label: "Example dataset",
                fillColor: "rgba(220,220,220,0.5)",
                strokeColor: "rgba(220,220,220,1)",
                pointColor: "rgba(220,220,220,1)",
                pointStrokeColor: "#fff",
                pointHighlightFill: "#fff",
                pointHighlightStroke: "rgba(220,220,220,1)",
                data: [65, 59, 40, 51, 36, 25, 40, 40, 51, 36, 25, 40]
            },
            {
                label: "Example dataset",
                fillColor: "rgba(26,179,148,0.5)",
                strokeColor: "rgba(26,179,148,0.7)",
                pointColor: "rgba(26,179,148,1)",
                pointStrokeColor: "#fff",
                pointHighlightFill: "#fff",
                pointHighlightStroke: "rgba(26,179,148,1)",
                data: [48, 48, 60, 39, 56, 37, 30, 40, 51, 36, 25, 40]
            },
            {
                label: "Example dataset",
                fillColor: "rgba(226,179,148,0.5)",
                strokeColor: "rgba(226,179,148,0.7)",
                pointColor: "rgba(226,179,148,1)",
                pointStrokeColor: "#fff",
                pointHighlightFill: "#fff",
                pointHighlightStroke: "rgba(26,179,148,1)",
                data: [78, 48, 10, 39, 56, 37, 30, 40, 51, 36, 25, 40]
            }
        ]
    };

    /**
     * Options for Line chart
     */
    this.lineOptions = {
        scaleShowGridLines : true,
        scaleGridLineColor : "rgba(0,0,0,.05)",
        scaleGridLineWidth : 1,
        bezierCurve : true,
        bezierCurveTension : 0.4,
        pointDot : true,
        pointDotRadius : 4,
        pointDotStrokeWidth : 1,
        pointHitDetectionRadius : 20,
        datasetStroke : true,
        datasetStrokeWidth : 2,
        datasetFill : true
    };

};
///////////////////////
function MessagesCtrl($scope, $http, $location)
{
  // $scope.inbox = '20';
  $scope.messages = {};
  $http.get('messages/query')
    .success(function(response){
    $scope.messages.count = response.count;
    $scope.messages.messages = response.messages;
    // $scope.dashboard.user = response.moduls;
  });
}

///Usuarios y roles

function UsersCtrl($scope, $uibModal, $compile, DTOptionsBuilder, DTColumnBuilder,$location)
{
    var vm = this;
    vm.delete = deleteRow;
    vm.dtInstance = {};
    vm.user = {};
    vm.dtOptions = DTOptionsBuilder.fromSource('user/query')
        .withPaginationType('full_numbers')
        .withOption('createdRow', createdRow)        
        .withOption('processing', true);
    vm.dtColumns = [
        DTColumnBuilder.newColumn(null).notSortable()
            .renderWith(actionsHtml).withOption('className', 'text-center').withOption('width', '10px'),
        DTColumnBuilder.newColumn('Photo')
        .notSortable()
        .withOption('className', 'text-center')
        .renderWith(function(data, type, full) {
            if(data){
              return '<div class="lightBoxGallery">'+
              '<a href="img/perfil/'+full.Photo+'" data-gallery=""><img src="img/perfil/'+full.Photo+'" width="40px"></a></div>';
            }else{
                return '<img src="/img/perfil/default.jpg" class="img-thumbnail" width="40px">';
            }          
        }),
        DTColumnBuilder.newColumn('User'),
        DTColumnBuilder.newColumn('Name'),
        DTColumnBuilder.newColumn('Email'),  
        DTColumnBuilder.newColumn('Area'), 
        DTColumnBuilder.newColumn('Languaje'), 
        DTColumnBuilder.newColumn('Roles')   
    ];
    $scope.edit = function (id) {
        var modalInstance = $uibModal.open({
            templateUrl: 'user/modal',            
            controller: EditUserCtrl,
            windowClass: "animated fadeIn",
            size:"lg",
            resolve: {
                 editId: function () {
                   return id;
                 },
                 table: function () {
                   return vm.dtInstance;
                 }
               }
        });
    };
    $scope.add = function () {
        var modalInstance = $uibModal.open({
            templateUrl: 'user/modal',            
            controller: NewUserController,
            windowClass: "animated fadeIn",
            size:"lg",
            resolve: {
                 table: function () {
                   return vm.dtInstance;
                 }
               }
            });
    };
    function deleteRow(id) {
        vm.dtInstance.reloadData();
    };
    function createdRow(row, data, dataIndex) {
        $compile(angular.element(row).contents())($scope);
    };
    function actionsHtml(data, type, full, meta) {
        vm.user[data.Id] = data;
        return '<button type="button" class="btn btn-warning" ng-click="edit('+data.Id+')">'+
               '<span class="fa fa-edit"></span>'+
               '</button>';
    }
};
function EditUserCtrl($scope, editId, table, $http, $uibModalInstance) 
{
    $scope.user = {};
    $scope.delete = 'yes';
    $scope.load = 'yes';
    $scope.view='no';
    $http.get('roles/list')
    .success(function(response){
      $scope.RolesList      = response.roles; 
      $scope.LanguajeList   = response.languages;        
    });
    $http.get('user/'+editId+'/edit')
    .success(function(response){
        $scope.load = 'no';
        $scope.view='yes';
        $scope.user.Id                = response.Id;
        $scope.user.User              = response.User;
        $scope.user.Name              = response.Name;
        $scope.user.FirstName         = response.FirstName;        
        $scope.user.Email             = response.Email;
        $scope.user.Area              = response.Area;
        $scope.user.Roles             = response.Roles;
        $scope.user.Languaje          = response.Languaje;
        $scope.user.Status            = response.Status;
        
    });
    $scope.cancel = function () {
        $uibModalInstance.dismiss('cancel');
    };
    $scope.btndelete = function (Id) {
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
          $http.get('user/'+Id+'/destroy')
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
          url     : 'user/'+$scope.user.Id+'/update',
          data    : $scope.user,
          headers : { 'Content-Type': 'application/x-www-form-urlencoded' } 
         }).then(function successCallback(response) {
                table.reloadData();
                $scope.btnload = false;
                sweetAlert('Correctamente', "", "success");
          }, function errorCallback(response) {
                $scope.btnload = false;
                sweetAlert("Oops...", "Something went wrong!", "error"); 
          });          
    };
};
function NewUserController($scope, table, $http, $uibModalInstance)
{
    $scope.user = {};
    $scope.RolesList = {};
    $scope.LanguajeList = {};
    $scope.user.Roles= '1';
    $scope.user.Languaje= 'es';
    $scope.user.Status='active';
    $scope.delete ='no';
    $scope.load ='yes';    
    $http.get('roles/list')
    .success(function(response){
      $scope.RolesList      = response.roles; 
      $scope.LanguajeList   = response.languages;        
      $scope.view ='yes';
      $scope.load ='no';
    });
    $scope.cancel = function () {
      $uibModalInstance.dismiss('cancel');
    };
    $scope.submit = function() {
      $scope.btnload = true;      
      $http({
        method  : 'POST',
        url     : 'user',
        data    : $scope.user,
        headers : { 'Content-Type': 'application/x-www-form-urlencoded' } 
      }).then(function successCallback(response) {
            $scope.btnload = false;
              table.reloadData();
            sweetAlert('Correctamente', "", "success");
            $uibModalInstance.dismiss('cancel');
      }, function errorCallback(response) {
            $scope.btnload = false;
            sweetAlert("Oops...", "Something went wrong!", "error");
      });          
    };
}
function RolesCtrl($scope, $uibModal, $compile, DTOptionsBuilder, DTColumnBuilder,$location)
{
    var vm = this;
    vm.delete = deleteRow;
    vm.dtInstance = {};
    vm.roles = {};
    vm.dtOptions = DTOptionsBuilder.fromSource('roles/query')
        .withPaginationType('full_numbers')
        .withOption('createdRow', createdRow)      
        .withOption('processing', true);
    vm.dtColumns = [
        DTColumnBuilder.newColumn(null).notSortable()
        .renderWith(actionsHtml).withOption('className', 'text-center').withOption('width', '10px').withTitle('Actions'),
        DTColumnBuilder.newColumn('Name').withTitle('Name'),
        DTColumnBuilder.newColumn('Description').withTitle('Description') 
    ];
    $scope.edit = function (id) {
        var modalInstance = $uibModal.open({
            templateUrl: 'roles/modal',            
            controller: EditRolesCtrl,
            size:'lg',
            windowClass: "animated fadeIn",
            resolve: {
                 editId: function () {
                   return id;
                 },
                 table: function () {
                   return vm.dtInstance;
                 }
               }
        });
    };
    $scope.add = function () {
        var modalInstance = $uibModal.open({
            templateUrl: 'roles/modal',            
            controller: NewRolesController,
            size:'lg',
            windowClass: "animated fadeIn",
            resolve: {
                 table: function () {
                   return vm.dtInstance;
                 }
               }
            });      
    };
    function deleteRow(id) {
        vm.dtInstance.reloadData();
    };
    function createdRow(row, data, dataIndex) {
        $compile(angular.element(row).contents())($scope);
    };
    function actionsHtml(data, type, full, meta) {
        vm.roles[data.Id] = data;
        return '<button type="button" class="btn btn-warning" ng-click="edit('+data.Id+')">'+
               '<span class="fa fa-edit"></span>'+
               '</button>';
    }
};
function EditRolesCtrl($scope, editId, table, $http, $uibModalInstance) 
{
    $scope.roles = {};
    $scope.roles.Permission = {};
    $scope.delete = 'yes';
    $scope.load = 'yes';
    $scope.view='no';
    $http.get('roles/'+editId+'/edit')
    .success(function(response){
        $scope.load = 'no';
        $scope.view='yes';
        $scope.roles.Id                     = response.Id;
        $scope.roles.Name                   = response.Name;
        $scope.roles.Description            = response.Description;        
        $scope.roles.Permission             = response.Permission;
    });
    $scope.cancel = function () {
        $uibModalInstance.dismiss('cancel');
    };
    $scope.btndelete = function (Id) {
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
          $http.get('roles/'+Id+'/destroy')
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
          url     : 'roles/'+$scope.roles.Id+'/update',
          data    : $scope.roles,
          headers : { 'Content-Type': 'application/x-www-form-urlencoded' } 
         }).then(function successCallback(response) {
                table.reloadData();
                $scope.btnload = false;
                sweetAlert('Correctamente', "", "success");
          }, function errorCallback(response) {
                $scope.btnload = false;
                sweetAlert("Oops...", "Something went wrong!", "error"); 
          });          
    };
};
function NewRolesController($scope, table, $http, $uibModalInstance)
{
  $scope.roles = {};
  $scope.roles.Permission = {};
  $scope.delete ='no';
  $scope.view ='yes';
  $http.get('roles/list/moduls')
    .success(function(response){
        $scope.roles.Permission             = response.Permission;
    });
  $scope.cancel = function () {
          $uibModalInstance.dismiss('cancel');
      };
    $scope.submit = function() {
         $scope.btnload = true;      
         $http({
          method  : 'POST',
          url     : 'roles',
          data    : $scope.roles,
          headers : { 'Content-Type': 'application/x-www-form-urlencoded' } 
         }).then(function successCallback(response) {
              $scope.btnload = false;
                table.reloadData();
              sweetAlert('Correctamente', "", "success");
              $uibModalInstance.dismiss('cancel');
          }, function errorCallback(response) {
              $scope.btnload = false;
              sweetAlert("Oops...", "Something went wrong!", "error");
          });          
    };
}

///Final Usuarios y roles
function PerfilCtrl($scope,$http){
    $scope.loading ="yes"
    $scope.view ="no";
    $scope.user = {};
    $.get("http://ipinfo.io", function (response) {
    $scope.location = response.city + ", " + response.region;
    }, "jsonp");    
    $http.get('profile/show')
    .success(function(response){
        $scope.loading ="no";
        $scope.view ="yes";
        $scope.user.User              = response.User;
        $scope.user.Name              = response.Name;
        $scope.user.FirstName         = response.FirstName;        
        $scope.user.Email             = response.Email;
        $scope.user.Area              = response.Area;
        $scope.user.Roles             = response.Roles;
        $scope.user.Language          = response.Language;
        //esta datos actualizad no funciona nada 
        $scope.Name                   = response.Name;
        $scope.Area                   = response.Area;
        $scope.Photo                  = response.Photo;        
    });
    $scope.submit = function() {
         $scope.btnloading = true;      
         $http({
          method  : 'POST',
          url     : 'profile/update',
          data    : $scope.user,
          headers : { 'Content-Type': 'application/x-www-form-urlencoded' } 
         }).then(function successCallback(response) {                              
                $scope.btnloading = false;  
                sweetAlert('Correctamente', "", "success");
          }, function errorCallback(response) {
                $scope.btnloading = false;  
                sweetAlert("Oops...", "Something went wrong!", "error");
          });          
    };        
}; 













function MainCtrl() {
    this.userName = 'Example user';
    this.helloText = 'Control Tecnología de la información';
    this.descriptionText = 'Aqui van hacer una grafica ';
};
function NotificationCtrl($scope,$http,$interval) {
    $scope.dato =[];
    $scope.ncount= $scope.dato.length;
    //  $scope.callAtInterval = function() {
    //     var url = "notification";
    //      $http.get(url)
    //      .success(function(response){
    //       $scope.dato =response;
    //       $scope.ncount= $scope.dato.length;
    //       });
    // }
    //  $scope.callAtInterval = function() {
    //     var url = "messages/query";
    //      $http.get(url)
    //      .success(function(response){
    //         // Push.create('hay mensaje'+response.count)
    //         $scope.messagescount = response.count;
    //         $scope.messagesdetall = response.detall;
    //       });
    // }    
    // $interval( function(){ $scope.callAtInterval(); }, 5000);
};

function MainCtrl() {
    this.userName = 'Example user';
    this.helloText = 'Control Tecnología de la información';
    this.descriptionText = 'Aqui van hacer una grafica ';
};
function LoginCtrl($scope,$http,$location) {
    $scope.login = {};
    $scope.submit = function() {      
         $http({
          method  : 'POST',
          url     : 'signin',
          data    : $scope.login,
          dataObj : true,
          headers : { 'Content-Type': 'application/json'} 
         }).then(function successCallback(response) {
            if(response.data.success === true){
                $location.path( 'index/main' );
            }else{                
              sweetAlert(response.data.errors, "", "error");          
            }                
          }, function errorCallback(response) {
              $location.path( 'index/main' );
              sweetAlert("Oops...", "Something went wrong!", "error");
          });       
    };
};
function OptCtrl($scope) {
  $scope.options = {
    height: 150,
    focus: true,
	    toolbar: [
	    ['style', ['bold', 'italic', 'underline', 'clear']],
	    ['fontsize', ['fontsize']],
	    ['color', ['color']],
	    ['para', ['ul', 'ol', 'paragraph']],
	    ['height', ['height']],
	    ['picture', ['picture']],
	  ]
  };
};
function TicketCtrl($scope, $http) {
      $http({
        method : "GET",
        url : "support/Num_tickets/1"
      }).then(function mySucces(response) {
            $('#detalleticket').html(response.data);
          // $scope.detalleticket = response.data;
        }, function myError(response) {
          $scope.detalleticket = response.statusText;
      });
     $scope.submitticket = function() {
        mensaje  =  $scope.CommentTicket;
        var req = {
         method: 'POST',
         url: 'support/newticket',
         headers: {
           'Content-Type': undefined
         },
         data: { mensaje: mensaje }
        }
        $http(req);
    };
};



function PermissionCtrl($scope, $uibModal, $compile,$stateParams, DTOptionsBuilder, DTColumnBuilder){

    var vm = this;
    vm.delete = deleteRow;
    vm.dtInstance = {};
    vm.permission = {};
    vm.dtOptions = DTOptionsBuilder.fromSource('userpermission/'+$stateParams.id_user)
        .withPaginationType('full_numbers')
        .withOption('createdRow', createdRow)
        .withOption('processing', true);
    vm.dtColumns = [
        DTColumnBuilder.newColumn(null).notSortable()
            .renderWith(actionsHtml).withOption('className', 'text-center').withOption('width', '10px'),
        DTColumnBuilder.newColumn('Catalogs'),
        DTColumnBuilder.newColumn('View').renderWith(catalog)
        .withOption('className', 'text-center').withOption('width', '10px'),
        DTColumnBuilder.newColumn('Create').renderWith(catalog)
        .withOption('className', 'text-center').withOption('width', '10px'),  
        DTColumnBuilder.newColumn('Update').renderWith(catalog)
        .withOption('className', 'text-center').withOption('width', '10px'),
        DTColumnBuilder.newColumn('Delete').renderWith(catalog)
        .withOption('className', 'text-center').withOption('width', '10px'),   
        ];
    $scope.edit = function (id) {
        var modalInstance = $uibModal.open({
            templateUrl: 'modalcatalog',            
            controller: DataCatalogsCtrl,
            windowClass: "animated fadeIn",
            resolve: {
                 editId: function () {
                   return id;
                 },
                 table: function () {
                   return vm.dtInstance;
                 }
               }
        });
    };
    function deleteRow(id) {
        vm.dtInstance.reloadData();
    }
    function createdRow(row, data, dataIndex) {
        $compile(angular.element(row).contents())($scope);
    }
    function actionsHtml(data, type, full, meta) {
        vm.permission[data.Id] = data;
        return '<button type="button" class="btn btn-success" ng-click="edit('+data.Id+')">'+
               '<span class="fa fa-edit"></span>'+
               '</button>';
    }
    function catalog(data, type, full) {
            if(data){
                return "<small class='label label-success'><i class='fa fa-unlock'></i></small>"; 
            }else{
                return "<small class='label label-danger'><i class='fa fa-lock'></i></small>";
            }          
        }
};



function CatalogCtrl($scope, $uibModal, $compile, DTOptionsBuilder, DTColumnBuilder){

    var vm = this;
    vm.delete = deleteRow;
    vm.dtInstance = {};
    vm.catalog = {};
    vm.dtOptions = DTOptionsBuilder.fromSource('/catalog/show')
        .withPaginationType('full_numbers')
        .withOption('createdRow', createdRow)
        .withOption('responsive', true) 
        .withOption('processing', true);
    vm.dtColumns = [
        DTColumnBuilder.newColumn(null).notSortable()
            .renderWith(actionsHtml).withOption('className', 'text-center').withOption('width', '10px'),
        DTColumnBuilder.newColumn('Catalog'),
        DTColumnBuilder.newColumn('Description'),
        DTColumnBuilder.newColumn('View'),  
        DTColumnBuilder.newColumn('Icon')
        .renderWith(function(data, type, full) {
                return '<li class="fa '+data+'"></li>';          
        }).withOption('className', 'text-center').withOption('width', '10px'),
        DTColumnBuilder.newColumn('Status').withOption('className', 'text-center'),   
        ];
    $scope.edit = function (id) {
        var modalInstance = $uibModal.open({
            templateUrl: 'modalcatalogs',            
            controller: DataCatalogsCtrl,
            windowClass: "animated fadeIn",
            resolve: {
                 editId: function () {
                   return id;
                 },
                 table: function () {
                   return vm.dtInstance;
                 }
               }
        });
    };
    function deleteRow(id) {
        vm.dtInstance.reloadData();
    }
    function createdRow(row, data, dataIndex) {
        $compile(angular.element(row).contents())($scope);
    }
    function actionsHtml(data, type, full, meta) {
        vm.catalog[data.Id] = data;
        return '<button type="button" class="btn btn-success" ng-click="edit('+data.Id+')">'+
               '<span class="fa fa-edit"></span>'+
               '</button>';
    }
    function catalog(data, type, full) {
            if(data){
                return "<small class='label label-success'><i class='fa fa-unlock'></i></small>"; 
            }else{
                return "<small class='label label-danger'><i class='fa fa-lock'></i></small>";
            }          
        }
};
function hostingCtrl($scope, $compile, DTOptionsBuilder, DTColumnBuilder){

    var vm = this;
    vm.edit = edit;
    vm.delete = deleteRow;
    vm.dtInstance = {};
    vm.hosting = {};
    vm.dtOptions = DTOptionsBuilder.fromSource('hosting/show')
        .withPaginationType('full_numbers')
        .withOption('createdRow', createdRow);
    vm.dtColumns = [
        DTColumnBuilder.newColumn('Id'),
        DTColumnBuilder.newColumn('Name'),
        DTColumnBuilder.newColumn('Business'),
        DTColumnBuilder.newColumn(null).withTitle('Actions').notSortable()
            .renderWith(actionsHtml)
    ];

    function edit(person) {
        
    }
    function deleteRow(person) {
        vm.dtInstance.reloadData();
    }
    function createdRow(row, data, dataIndex) {
        $compile(angular.element(row).contents())($scope);
    }
    function actionsHtml(data, type, full, meta) {
        vm.hosting[data.Id] = data;
        return '<a ui-sref="index.hostingedit()">'+
               '<button type="button" class="btn btn-warning">'+
               '<span class="fa fa-edit"></span>'+
               '</button>'+
               '</a>';
    }
};
function emailCtrl($scope, $compile, DTOptionsBuilder, DTColumnBuilder){

    var vm = this;
    vm.edit = edit;
    vm.delete = deleteRow;
    vm.dtInstance = {};
    vm.email = {};
    vm.dtOptions = DTOptionsBuilder.fromSource('email/show')
        .withPaginationType('full_numbers')
        .withOption('createdRow', createdRow);
    vm.dtColumns = [
        DTColumnBuilder.newColumn('User'),
        DTColumnBuilder.newColumn('Email'),
        DTColumnBuilder.newColumn('Password'),
        DTColumnBuilder.newColumn(null).withTitle('Actions').notSortable()
            .renderWith(actionsHtml)
    ];

    function edit(id) {
        alert('holamundo');
    }
    function deleteRow(id) {
        vm.dtInstance.reloadData();
    }
    function createdRow(row, data, dataIndex) {
        $compile(angular.element(row).contents())($scope);
    }
    function actionsHtml(data, type, full, meta) {
        vm.email[data.Id] = data;
        return '<button type="button" class="btn btn-warning" ng-click="showCase.edit('+data.Id+')">'+
               '<span class="fa fa-edit"></span>'+
               '</button>';
    }
};
function AccessRemoteCtrl($scope, $uibModal, $compile, DTOptionsBuilder, DTColumnBuilder){

    var vm = this;
    vm.delete = deleteRow;
    vm.dtInstance = {};
    vm.accessremote = {};
    vm.dtOptions = DTOptionsBuilder.fromSource('hosting/showacessremote')
        .withPaginationType('full_numbers')
        .withOption('createdRow', createdRow);
    vm.dtColumns = [
        DTColumnBuilder.newColumn('Users'),
        DTColumnBuilder.newColumn('Password'),
        DTColumnBuilder.newColumn('Assigned'),
        DTColumnBuilder.newColumn('Permision'),
        DTColumnBuilder.newColumn('Area'),
        DTColumnBuilder.newColumn(null).notSortable()
            .renderWith(actionsHtml)
    ];

    $scope.edit = function (idaccessremote) {
        var modalInstance = $uibModal.open({
            templateUrl: 'hosting/modalacessremote',
            size: 'lg',            
            controller: ModalInstanceCtrl,
            windowClass: "animated fadeIn"
        });
    };
    function deleteRow(idaccessremote) {
        vm.dtInstance.reloadData();
    }
    function createdRow(row, data, dataIndex) {
        $compile(angular.element(row).contents())($scope);
    }
    function actionsHtml(data, type, full, meta) {
        vm.accessremote[data.Id] = data;
        return '<button type="button" class="btn btn-warning" ng-click="edit('+data.Id+')">'+
               '<span class="fa fa-edit"></span>'+
               '</button>';
    }
};
function ModalInstanceCtrl ($scope, $uibModalInstance,$http) {
    $scope.Customer = {};
    $scope.submit = function() {
        $http({
          method  : 'POST',
          url     : 'Customers/store',
          data    : $scope.Customer,
          headers : { 'Content-Type': 'application/x-www-form-urlencoded' } 
         }).then(function successCallback(response) {
                swal("Correctamente creado nuevos!", "", "success");
                $uibModalInstance.dismiss('cancel');
          }, function errorCallback(response) {
                swal("No pudo Crear algo esta mál", "", "error");
          });        
    };
    $scope.ok = function () {
        $uibModalInstance.close();
    };
    $scope.cancel = function () {
        $uibModalInstance.dismiss('cancel');
    };
};

function DataCatalogsCtrl($scope, editId, table, $http, $uibModalInstance) {
    $scope.catalog = {};
    $scope.load = 'yes';
    $http.get('catalog/edit/'+editId)
    .success(function(response){
        $scope.catalog.Id                = response.Id;
        $scope.catalog.Catalog           = response.Catalog;
        $scope.catalog.Description       = response.Description;
        $scope.catalog.View              = response.View;
        $scope.catalog.Icon              = response.Icon;
        $scope.catalog.Status            = response.Status;
        $scope.view = 'yes';
        $scope.load = 'no';
    });
    $scope.cancel = function () {
        $uibModalInstance.dismiss('cancel');
    };    
    $scope.submit = function() {
         $scope.btnload = true;      
         $http({
          method  : 'POST',
          url     : 'catalog/update/'+ $scope.catalog.Id,
          data    : $scope.catalog,
          headers : { 'Content-Type': 'application/x-www-form-urlencoded' } 
         }).then(function successCallback(response) {
                $scope.btnload = false;
                table.reloadData();
                sweetAlert('Correctamente', "", "success");
          }, function errorCallback(response) {
                $scope.btnload = false;
                sweetAlert("Oops...", "Something went wrong!", "error");
          });          
    };
};
function DomainCtrl($scope, $compile, DTOptionsBuilder, DTColumnBuilder){

    var vm = this;
    vm.edit = edit;
    vm.delete = deleteRow;
    vm.dtInstance = {};
    vm.hosting = {};
    vm.dtOptions = DTOptionsBuilder.fromSource('hosting/showacessremote')
        .withPaginationType('full_numbers')
        .withOption('createdRow', createdRow);
    vm.dtColumns = [
        DTColumnBuilder.newColumn('Id'),
        DTColumnBuilder.newColumn('Name'),
        DTColumnBuilder.newColumn('Business'),
        DTColumnBuilder.newColumn(null).withTitle('Actions').notSortable()
            .renderWith(actionsHtml)
    ];

    function edit(person) {
        alert('editar');
    }
    function deleteRow(person) {
        vm.dtInstance.reloadData();
    }
    function createdRow(row, data, dataIndex) {
        $compile(angular.element(row).contents())($scope);
    }
    function actionsHtml(data, type, full, meta) {
        vm.hosting[data.Id] = data;
        return '<a ui-sref="index.hostingedit()">'+
               '<button type="button" class="btn btn-warning">'+
               '<span class="fa fa-edit"></span>'+
               '</button>'+
               '</a>';
    }
};
function datatablesCtrl($scope,DTOptionsBuilder){
    $scope.dtOptions = DTOptionsBuilder.newOptions()
        .withDOM('<"html5buttons"B>lTfgitp')
        .withButtons([
            {extend: 'copy'},
            {extend: 'csv'},
            {extend: 'excel', title: 'ExampleFile'},
            {extend: 'pdf', title: 'ExampleFile'},

            {extend: 'print',
                customize: function (win){
                    $(win.document.body).addClass('white-bg');
                    $(win.document.body).css('font-size', '10px');

                    $(win.document.body).find('table')
                        .addClass('compact')
                        .css('font-size', 'inherit');
                }
            }
        ]);
};
function hostinguserCtrl($scope,DTOptionsBuilder){

    $scope.dtOptions = DTOptionsBuilder.newOptions()  
     $scope.funciones = function(){
      alert('hola');
    }   
};
/**
 * translateCtrl - Controller for translate
 */

function SettingsCtrl($scope,$http){
    $scope.settings = {};
    $scope.load= 'yes'; 
    $http.get('settings/show')
    .success(function(response){
        $scope.settings.ApplicationName =  response[0].ApplicationName;
        $scope.settings.ApplicationDesc =  response[1].ApplicationDesc;
        $scope.settings.CompanyName     =  response[2].CompanyName;
        $scope.settings.EmailSystem     =  response[3].EmailSystem;
        $scope.settings.MainLanguaje    =  response[4].MainLanguaje;
        $scope.settings.DateFormat      =  response[5].DateFormat;
        $scope.load= 'no';
        $scope.view = 'yes';      
    });
    $scope.submit = function() {
         $scope.btnloading= true;      
         $http({
          method  : 'POST',
          url     : 'settings/update',
          data    : $scope.settings,
          headers : { 'Content-Type': 'application/x-www-form-urlencoded' } 
         }).then(function successCallback(response) {
                $scope.btnloading= false;
                sweetAlert('Correctamente', "", "success");
          }, function errorCallback(response) {
                $scope.btnloading= false;
                sweetAlert("Oops...", "Something went wrong!", "error");
          });          
    };
    $scope.Cache = function(){
         $scope.btnloading = true;      
         $http({
          method  : 'GET',
          url     : 'settings/clearcache'
         }).then(function successCallback(response) {                              
                $scope.btnloading = false;  
                sweetAlert('Correctamente', "", "success");
          }, function errorCallback(response) {
                $scope.btnloading = false;  
                sweetAlert("Oops...", "Something went wrong!", "error");
          }); 
    }        
} 
function translateCtrl($translate, $scope) {
    $scope.changeLanguage = function (langKey) {
        $translate.use(langKey);
        $scope.language = langKey;
    };
}
function ServicehostingCtrl($scope, $uibModal, $compile, DTOptionsBuilder, DTColumnBuilder){

    var vm = this;
    vm.delete = deleteRow;
    vm.dtInstance = {};
    vm.catalog = {};
    vm.dtOptions = DTOptionsBuilder.fromSource('servicehosting/show')
        .withPaginationType('full_numbers')
        .withOption('createdRow', createdRow)
        .withOption('processing', true);
    vm.dtColumns = [
        DTColumnBuilder.newColumn(null).notSortable()
            .renderWith(actionsHtml),
        DTColumnBuilder.newColumn('Administrator'),
        DTColumnBuilder.newColumn('User'),
        DTColumnBuilder.newColumn('Password')
        ];
    $scope.edit = function (id) {
        var modalInstance = $uibModal.open({
            templateUrl: 'modalservicehosting',            
            controller: DataServicehostingCtrl,
            windowClass: "animated fadeIn",
            resolve: {
                 editId: function () {
                   return id;
                 },
                 table: function () {
                   return vm.dtInstance;
                 }
               }
        });
    };
    function deleteRow(id) {
        vm.dtInstance.reloadData();
    }
    function createdRow(row, data, dataIndex) {
        $compile(angular.element(row).contents())($scope);
    }
    function actionsHtml(data, type, full, meta) {
        vm.catalog[data.Id] = data;
        return '<button type="button" class="btn btn-success" ng-click="edit('+data.Id+')">'+
               '<span class="fa fa-edit"></span>'+
               '</button>';
    }
    function catalog(data, type, full) {
            if(data){
                return "<small class='label label-success'><i class='fa fa-unlock'></i></small>"; 
            }else{
                return "<small class='label label-danger'><i class='fa fa-lock'></i></small>";
            }          
        }
};
function DataServicehostingCtrl($scope, editId, table, $http, $uibModalInstance) {
    $scope.servicehosting = {};
    $http.get('servicehosting/edit/'+editId)
    .success(function(response){
        $scope.servicehosting.Id                = response.Id;
        $scope.servicehosting.Administrator     = response.Administrator;
        $scope.servicehosting.User              = response.User;
        $scope.servicehosting.Password          = response.Password;
        $scope.servicehosting.Note              = response.Note;
    });
    $scope.cancel = function () {
        $uibModalInstance.dismiss('cancel');
    };    
    $scope.submit = function() {      
         $http({
          method  : 'POST',
          url     : 'servicehosting/update/'+ $scope.servicehosting.Id,
          data    : $scope.servicehosting,
          headers : { 'Content-Type': 'application/x-www-form-urlencoded' } 
         }).then(function successCallback(response) {
                table.reloadData();
                alert('actualizado');
          }, function errorCallback(response) {
                alert('error');
          });          
    };
};
function CrudCtrl($scope,$http, $uibModal, $compile, DTOptionsBuilder, DTColumnBuilder,$location) { 
   $scope.generate = {'template':'bootstrap'};
   $scope.generate.items = [{'id':0,'type':'text','column':null,'title':null,'Opcion':'optional','table':null,'tcolumn':null}];
   $scope.colum =[];
  $scope.increment = function () {
        $scope.generate.items.push({'id':$scope.generate.items.length,'type':'text','column':null,'title':null,'Opcion':'optional','table':null,'tcolumn':null});
    };
  $scope.remove = function( row ) {
        $scope.generate.items.splice( $scope.generate.items.indexOf( row ), 1 );
    };
  $scope.submit = function() {
        $scope.btnload = true;
         $http({
          method  : 'POST',
          url     : 'enviar',
          data    : $scope.generate,
          headers : { 'Content-Type': 'application/x-www-form-urlencoded' } 
         }).then(function successCallback(response) {
                $scope.btnload = false;  
                // alert('actualizado');
          }, function errorCallback(response) {
                $scope.btnload = false;
                // alert('error');
          });          
        };
  $scope.sortableOptions = {
        cursor: "move",
        revert: 'invalid',
        handle: ".handle",
        forceHelperSize: true
    };

//////////////////////////////es para databases de datos

    var vm = this;
    vm.delete = deleteRow;
    vm.dtInstance = {};
    vm.datas = {};
    vm.dtOptions = DTOptionsBuilder.fromSource('crud/show')
        .withPaginationType('full_numbers')
        .withOption('createdRow', createdRow)
        .withOption('responsive', true)         
        .withOption('processing', true);
    vm.dtColumns = [
      DTColumnBuilder.newColumn(null).notSortable()
        .renderWith(actionsHtml).withOption('width','10px')
        .withOption('className', 'text-center').withTitle('ACTION'),
        DTColumnBuilder.newColumn('title').withTitle('title'),
        DTColumnBuilder.newColumn('tablename').withTitle('tablename'),
        DTColumnBuilder.newColumn('views').withTitle('views'),
        DTColumnBuilder.newColumn('modal').withTitle('modal'),       
    ];

    $scope.edit = function (datas) {
        var modalInstance = $uibModal.open({
            templateUrl: 'producto/modal',            
            controller: DataCrudCrud,
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
      $location.path( 'index/createcrud' );
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


function ModulsCtrl($scope,$http, $uibModal, $compile, DTOptionsBuilder, DTColumnBuilder,$location) 
{ 
    $scope.generate = {'template':'bootstrap'};
    $scope.generate.items = [{'id':0,'type':'text','column':null,'title':null,'Opcion':'optional','table':null,'tcolumn':null}];
    $scope.colum =[];
    $scope.increment = function () {
        $scope.generate.items.push({'id':$scope.generate.items.length,'type':'text','column':null,'title':null,'Opcion':'optional','table':null,'tcolumn':null});
    };
    $scope.remove = function( row ) {
        $scope.generate.items.splice( $scope.generate.items.indexOf( row ), 1 );
    };
    $scope.submit = function() {
        $scope.btnload = true;
         $http({
          method  : 'POST',
          url     : 'enviar',
          data    : $scope.generate,
          headers : { 'Content-Type': 'application/x-www-form-urlencoded' } 
         }).then(function successCallback(response) {
                $scope.btnload = false;  
                // alert('actualizado');
          }, function errorCallback(response) {
                $scope.btnload = false;
                // alert('error');
          });          
        };
    $scope.sortableOptions = {
        cursor: "move",
        revert: 'invalid',
        handle: ".handle",
        forceHelperSize: true
    };

//////////////////////////////es para databases de datos

    var vm = this;
    vm.delete = deleteRow;
    vm.dtInstance = {};
    vm.datas = {};
    vm.dtOptions = DTOptionsBuilder.fromSource('moduls/query')
        .withPaginationType('full_numbers')
        .withOption('createdRow', createdRow)
        .withOption('responsive', true)         
        .withOption('processing', true);
    vm.dtColumns = [
      DTColumnBuilder.newColumn(null).notSortable()
        .renderWith(actionsHtml).withOption('width','10px')
        .withOption('className', 'text-center').withTitle('ACTION'),
        DTColumnBuilder.newColumn('Name').withTitle('name'),
        DTColumnBuilder.newColumn('Isgroup').withTitle('Is group'),
        DTColumnBuilder.newColumn('Icongroup').withTitle('Icon group'),
        
      
    ];

    $scope.edit = function (datas) {
        var modalInstance = $uibModal.open({
            templateUrl: 'moduls/modal',            
            controller: EditGroupModulsCtrl,
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
            templateUrl: 'moduls/modal',            
            controller: NewGroupModulsCtrl,
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
        return '<button type="button" class="btn btn-success" ng-click="edit('+data.Id+')">'+
               '<span class="fa fa-edit"></span>'+
               '</button>';
    }
  
};
function EditGroupModulsCtrl($scope, editId, table, $http, $uibModalInstance) 
{
    $scope.moduls = {};
    $scope.delete = 'yes';
    $scope.load = 'yes';
    $scope.view='no';
    $http.get('moduls/'+editId+'/edit')
    .success(function(response){
        $scope.load = 'no';
        $scope.view='yes';
        $scope.moduls.Id          = response.Id;
        $scope.moduls.Name        = response.Name;
        $scope.moduls.Icon        = response.Icongroup;
        $scope.moduls.Group       = response.Isgroup;
    });
    $scope.cancel = function () {
        $uibModalInstance.dismiss('cancel');
    };
    $scope.btndelete = function (Id) {
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
          $http.get('moduls/'+Id+'/destroy')
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
          url     : 'moduls/'+$scope.moduls.Id+'/update',
          data    : $scope.moduls,
          headers : { 'Content-Type': 'application/x-www-form-urlencoded' } 
         }).then(function successCallback(response) {
                table.reloadData();
                $scope.btnload = false;
                sweetAlert('Correctamente', "", "success");
          }, function errorCallback(response) {
                $scope.btnload = false;
                sweetAlert("Oops...", "Something went wrong!", "error"); 
          });          
    };
};
function NewGroupModulsCtrl($scope, table, $http, $uibModalInstance)
{
    $scope.moduls = {};
    $scope.delete ='no';
    $scope.view ='yes';
    $scope.cancel = function () {
          $uibModalInstance.dismiss('cancel');
      };
    $scope.submit = function() {
         $scope.btnload = true;      
         $http({
          method  : 'POST',
          url     : 'moduls',
          data    : $scope.moduls,
          headers : { 'Content-Type': 'application/x-www-form-urlencoded' } 
         }).then(function successCallback(response) {
              $scope.btnload = false;
                table.reloadData();
              sweetAlert('Correctamente', "", "success");
              $uibModalInstance.dismiss('cancel');
          }, function errorCallback(response) {
              $scope.btnload = false;
              sweetAlert("Oops...", "Something went wrong!", "error");
          });          
    };
}
angular
    .module('inspinia')
    .controller('MainCtrl', MainCtrl)
    .controller('LoginCtrl', LoginCtrl)
    .controller('translateCtrl', translateCtrl)
    .controller('PerfilCtrl', PerfilCtrl)
    .controller('PermissionCtrl', PermissionCtrl)
    .controller('CatalogCtrl', CatalogCtrl)
    .controller('OptCtrl', OptCtrl)
    .controller('TicketCtrl', TicketCtrl)
    .controller('UsersCtrl',UsersCtrl)
    .controller('RolesCtrl', RolesCtrl)
    .controller('hostingCtrl', hostingCtrl)
    .controller('AccessRemoteCtrl', AccessRemoteCtrl)
    .controller('DomainCtrl', DomainCtrl)
    .controller('datatablesCtrl', datatablesCtrl)
    .controller('hostinguserCtrl', hostinguserCtrl)
    .controller('ServicehostingCtrl', ServicehostingCtrl)
    .controller('emailCtrl', emailCtrl)
    .controller('CrudCtrl', CrudCtrl)
    .controller('ModulsCtrl', ModulsCtrl)
    .controller('DashboardCtrl', DashboardCtrl)
    .controller('chartJsCtrl', chartJsCtrl)
    .controller('MessagesCtrl', MessagesCtrl)
    
    .controller('SettingsCtrl', SettingsCtrl)
    .controller('NotificationCtrl', NotificationCtrl)
    
    
    
