function translateCtrl($translate,$translatePartialLoader, $scope,$http, $controller,$rootScope) 
{
    $scope.changeLanguage = function (langKey) {
        $translate.use(langKey);
        $translate.refresh();
        $scope.language = langKey;
        $http.get('user/translate/'+langKey)
    };
}
function DashboardCtrl($scope, $http, $location,$state)
{
  var years = new Date().getFullYear();
  DataDashboard(years);
  $scope.dashboard = {};
  $scope.Years =years;
  $scope.loading                      = 'yes';
function DataDashboard(years){
  $http.get('dashboard/query/'+years)
    .success(function(response){
    $scope.dashboard.user               = response.user;
    $scope.dashboard.moduls             = response.moduls;    
    $scope.dashboard.messages           = response.messages;
    $scope.data                         = [response.ticket];
    $scope.dashboard.totalTicket        = response.totalTicket;
    $scope.ticketNew                    = response.ticketNew;
    $scope.ticketWait                   = response.ticketWait;
    $scope.ticketResolved               = response.ticketResolved;
    $scope.ticketCloses                 = response.ticketCloses;
    $scope.loading                      = 'no';
    $scope.viewdashboard                = 'yes';
  });
}
$scope.changeYears =  function(years){
      DataDashboard(years);
};

  $scope.labels = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October","November","December"];
  $scope.series = ['Ticket'];
  $scope.onClickd = function () {
     $scope.labels = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October","November","December"];
  };
  $scope.datasetOverride = [{ yAxisID: 'y-axis-1' }];
  $scope.options = {
    responsive: true,
    scales: {
      yAxes: [
        {
          id: 'y-axis-1',
          type: 'linear',
          display: true,
          position: 'left'
        }
      ]
    }
  };
  $scope.clickstatus =  function(status){
    $state.go('index.ticket', {'status': status});
  }
    $scope.getNumber = function(num) {
        return new Array(num);   
    }
    // var start = 2015;
    // var d = new Date();
    // var n = d.getFullYear();
    // num = n-start ;
    // da = new Array(num);
    // for (var i = da.length ; i >= 0; i--) {
    //    // data.Array = [start++];
    //    alert(data.push(start++));
    // };
    // $scope.year = data;

    function generate_year_range(start, end){
        var years = [];
        for(var year = start; year <= end; year++){
            years.push(year)
        }
        return years;
    }
    var d = new Date();
    var n = d.getFullYear();
    var my_years = generate_year_range(2016,n);
    $scope.year = my_years;



};
///////////////////////
function MessagesCtrl($scope, $http, $location)
{
  $scope.listmessages = 'yes';
  $scope.messages = {};
 function messages()
 {
    $http.get('messages/inbox')
      .success(function(response){
      $scope.messages.inbox = response.inbox;
      $scope.messages.messages = response.listmessage;

    });
  };
  messages();


  $scope.ComposeMessage = function(){
    $scope.listmessages = 'no';
    $scope.newmessages = 'yes';
    $scope.viewmessages = 'no';
  };
  $scope.inbox = function(){
    messages();
    $scope.listmessages = 'yes';
    $scope.viewmessages = 'no';
    $scope.newmessages = 'no';
  };
  $scope.Refresh = function(){
    messages();
  };
  $scope.Search = function(){
    alert('holas');
  };

  $scope.select = function(id){
    $http.get('messages/'+id+'/viewmessage')
      .then(function(response) {
        $scope.body         = response.data.messages;
        $scope.subject      = response.data.subject;
        $scope.date         = response.data.date;
        $scope.from         = response.data.users;
        $scope.listmessages = 'no';
        $scope.viewmessages = 'yes';
    });
  };
}

///Usuarios y roles

function UsersCtrl($scope, $uibModal, $compile, DTOptionsBuilder, DTColumnBuilder,$location,$window)
{
    var translate  = ($window.navigator.UserLanguage || $window.navigator.language).indexOf("en") == 0 ? "en" : "es";
    var vm = this;
    vm.delete = deleteRow;
    vm.dtInstance = {};
    vm.user = {};
    vm.dtOptions = DTOptionsBuilder.fromSource('user/query')
        .withPaginationType('full_numbers')
        .withOption('createdRow', createdRow)        
        .withOption('processing', true);
    vm.dtOptions.withLanguageSource('http://cdn.datatables.net/plug-ins/1.10.11/i18n/'+(translate == 'en' ? 'English' : 'Spanish')+'.json');
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
        DTColumnBuilder.newColumn('FirstName'),
        DTColumnBuilder.newColumn('Email'),  
        DTColumnBuilder.newColumn('Area'),         
        DTColumnBuilder.newColumn('Roles'), 
        DTColumnBuilder.newColumn('Status').withOption('className', 'text-center')   
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
function EditUserCtrl($scope, editId, table, $http, $uibModalInstance,$rootScope,$controller,$translate,transformRequestAsFormPost) 
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
        $scope.user.PhotoV            = response.Photo;
        
    });
    $scope.cancel = function () {
        $uibModalInstance.dismiss('cancel');
    };
    $scope.btndelete = function (Id) {
        swal({
        title: $translate.instant('CONFIRM_DELETE'),
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: $translate.instant('YES'),
        cancelButtonText: $translate.instant('NO'),
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
          data    : $scope.user ,
          headers : { 'Content-Type': 'application/json' } ,
          // transformRequest: transformRequestAsFormPost
         }).then(function successCallback(response) {
              var root = $rootScope.$new();
              var funciones=  $controller('MainCtrl',{$scope: root});
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
function RolesCtrl($scope, $uibModal, $compile, DTOptionsBuilder, DTColumnBuilder,$location,$controller,$rootScope,$window)
{


   // var root = $rootScope.$new();
   // var funciones=  $controller('MainCtrl',{$scope: root});
   // funciones.menus(); //And call the method on the newScope.



    var translate  = ($window.navigator.UserLanguage || $window.navigator.language).indexOf("en") == 0 ? "en" : "es";
    var vm = this;
    vm.delete = deleteRow;
    vm.dtInstance = {};
    vm.roles = {};
    vm.dtOptions = DTOptionsBuilder.fromSource('roles/query')
        .withPaginationType('full_numbers')
        .withOption('createdRow', createdRow)      
        .withOption('processing', true);
    vm.dtOptions.withLanguageSource('http://cdn.datatables.net/plug-ins/1.10.11/i18n/'+(translate == 'en' ? 'English' : 'Spanish')+'.json');
    vm.dtColumns = [
        DTColumnBuilder.newColumn(null).notSortable()
        .renderWith(actionsHtml).withOption('className', 'text-center').withOption('width', '10px'),
        DTColumnBuilder.newColumn('Name'),
        DTColumnBuilder.newColumn('Description')
    ];
   
    $scope.edit = function (id) {
        var modalInstance = $uibModal.open({
            templateUrl: 'roles/modal',            
            controller: EditRolesCtrl,
            size:'md',
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
            size:'md',
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
function EditRolesCtrl($scope, editId, table, $http, $uibModalInstance,$translate,$rootScope,$controller) 
{
    $scope.roles = {}; 
    $scope.roles.Permission = {};
    $scope.roles.PermissionMenus = {};
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
        $scope.roles.IsAdmin                = response.IsAdmin; 
        $scope.roles.IsTicket               = response.Isticket;                
        $scope.roles.Permission             = response.Permission;
        $scope.roles.PermissionMenus        = response.PermissionMenus;
    });
    $scope.cancel = function () {
        $uibModalInstance.dismiss('cancel');
    };
    $scope.btndelete = function (Id) {
        swal({
        title: $translate.instant('CONFIRM_DELETE'),
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: $translate.instant('YES'),
        cancelButtonText: $translate.instant('NO'),
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
                    sweetAlert("Oops...", $translate.instant('Something_went_wrong'), "error"); 
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
              var root = $rootScope.$new();
              var funciones=  $controller('MainCtrl',{$scope: root});
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
  $scope.load = 'yes';
  $http.get('roles/list/moduls')
    .success(function(response){
        $scope.roles.Permission             = response.Permission;
        $scope.roles.PermissionMenus        = response.PermissionMenus;
        $scope.load = 'no';
        $scope.view='yes';
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
function MenuCtrl($scope,$http)
{
  function getValue(key, array) {
         for (var el in array) {
             if (array[el].hasOwnProperty(key)) {   
                 return array[el][key];
             }
         }
    }
  $scope.menus = {};
  $http.get('menus')
    .success(function(response){
      $scope.menus.Messages=getValue("Messages", response);
      $scope.menus.Ticket=getValue("Ticket", response);
    });
  
}
          
function PerfilCtrl($scope,$http,$rootScope,$controller)
{
    $scope.loading ="yes"
    $scope.view ="no";
    $scope.user = {};
    $.get("http://ipinfo.io", function (response) {
    $scope.location = response.city + ", " + response.region;
    }, "jsonp");
    $scope.navperfilload = true; 
    function perfil(){   
      $http.get('profile/show')
      .success(function(response){
          $scope.loading ="no";
          $scope.view ="yes";
          $scope.navperfil = "yes";
          $scope.navperfilload = false;
          $scope.user.User              = response.User;
          $scope.user.Name              = response.Name;
          $scope.user.FirstName         = response.FirstName;        
          $scope.user.Email             = response.Email;
          $scope.user.Area              = response.Area;
          $scope.user.Roles             = response.Roles;
          $scope.user.Language          = response.Language;
          $scope.user.textaboutme       = response.Aboutme;
          //esta datos actualizad no funciona nada 
          $scope.Name                   = response.Name;
          $scope.Area                   = response.Area;
          $scope.Photo                  = response.Photo;
          $scope.aboutme                = response.Aboutme;
     
      });
    };
    perfil();
    $scope.submit = function() {
         $scope.btnloading = true;      
         $http({
          method  : 'POST',
          url     : 'profile/update',
          data    : $scope.user,
          headers : { 'Content-Type': 'application/x-www-form-urlencoded' } 
         }).then(function successCallback(response) { 
                var root = $rootScope.$new();
                var funciones=  $controller('MainCtrl',{$scope: root});
                perfil();                             
                $scope.btnloading = false;  
                sweetAlert('Correctamente', "", "success");
          }, function errorCallback(response) {
                $scope.btnloading = false;  
                sweetAlert("Oops...", "Something went wrong!", "error");
          });          
    };
    $scope.aboutme = function()
    {
      alert($scope.user.textaboutme);
    };
    $scope.password =function()
    {
      Current   = $scope.Current;
      New       = $scope.New; 
      RepeatNew = $scope.RepeatNew;
    };        
}; 



function NotificationCtrl($scope,$http,$interval) 
{
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

    //  $scope.messagescount = 0;
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

function MainCtrl($scope,$http,$rootScope) {
        this.validar = true;
        $http.get('menus')
        .success(function(response){
          $rootScope.MainPhoto = response.photo;
          $rootScope.MainName =response.name;
          $rootScope.MainArea =response.area;
          $rootScope.MainMessages=getValue("Messages", response.menus);
          $rootScope.MainTicket=getValue("Ticket", response.menus);
          $rootScope.MainUser=getValue("User", response.menus);
          $rootScope.MainModule=getValue("Module", response.menus);
          $rootScope.MainConfiguracion=getValue("Configuracion", response.menus);
          

        });
  function getValue(key, array) {
         for (var el in array) {
             if (array[el].hasOwnProperty(key)) {   
                 return array[el][key];
             }
         }
    }

};
function LoginCtrl($scope,$http,$location) 
{
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
function OptCtrl($scope) 
{
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
// function TicketCtrl($scope, $http) {
//       $http({
//         method : "GET",
//         url : "support/Num_tickets/1"
//       }).then(function mySucces(response) {
//             $('#detalleticket').html(response.data);
//           // $scope.detalleticket = response.data;
//         }, function myError(response) {
//           $scope.detalleticket = response.statusText;
//       });
//      $scope.submitticket = function() {
//         mensaje  =  $scope.CommentTicket;
//         var req = {
//          method: 'POST',
//          url: 'support/newticket',
//          headers: {
//            'Content-Type': undefined
//          },
//          data: { mensaje: mensaje }
//         }
//         $http(req);
//     };
// };

function PermissionCtrl($scope, $uibModal, $compile,$stateParams, DTOptionsBuilder, DTColumnBuilder, $window)
{
    var translate  = ($window.navigator.UserLanguage || $window.navigator.language).indexOf("en") == 0 ? "en" : "es";
    var vm = this;
    vm.delete = deleteRow;
    vm.dtInstance = {};
    vm.permission = {};
    vm.dtOptions = DTOptionsBuilder.fromSource('userpermission/'+$stateParams.id_user)
        .withPaginationType('full_numbers')
        .withOption('createdRow', createdRow)
        .withOption('processing', true);
    vm.dtOptions.withLanguageSource('http://cdn.datatables.net/plug-ins/1.10.11/i18n/'+(translate == 'en' ? 'English' : 'Spanish')+'.json');    
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


function CatalogCtrl($scope, $uibModal, $compile, DTOptionsBuilder, DTColumnBuilder,$window)
{
    var translate  = ($window.navigator.UserLanguage || $window.navigator.language).indexOf("en") == 0 ? "en" : "es";
    var vm = this;
    vm.delete = deleteRow;
    vm.dtInstance = {};
    vm.catalog = {};
    vm.dtOptions = DTOptionsBuilder.fromSource('/catalog/show')
        .withPaginationType('full_numbers')
        .withOption('createdRow', createdRow)
        .withOption('responsive', true) 
        .withOption('processing', true);
    vm.dtOptions.withLanguageSource('http://cdn.datatables.net/plug-ins/1.10.11/i18n/'+(translate == 'en' ? 'English' : 'Spanish')+'.json');    
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
function hostingCtrl($scope, $compile, DTOptionsBuilder, DTColumnBuilder)
{

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

function AccessRemoteCtrl($scope, $uibModal, $compile, DTOptionsBuilder, DTColumnBuilder,$window)
{
    var translate  = ($window.navigator.UserLanguage || $window.navigator.language).indexOf("en") == 0 ? "en" : "es";
    var vm = this;
    vm.delete = deleteRow;
    vm.dtInstance = {};
    vm.accessremote = {};
    vm.dtOptions = DTOptionsBuilder.fromSource('hosting/showacessremote')
        .withPaginationType('full_numbers')
        .withOption('createdRow', createdRow);
    vm.dtOptions.withLanguageSource('http://cdn.datatables.net/plug-ins/1.10.11/i18n/'+(translate == 'en' ? 'English' : 'Spanish')+'.json');        
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
function ModalInstanceCtrl ($scope, $uibModalInstance,$http) 
{
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

function DataCatalogsCtrl($scope, editId, table, $http, $uibModalInstance) 
{
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
function DomainCtrl($scope, $compile, DTOptionsBuilder, DTColumnBuilder,$window)
{
    var translate  = ($window.navigator.UserLanguage || $window.navigator.language).indexOf("en") == 0 ? "en" : "es";
    var vm = this;
    vm.edit = edit;
    vm.delete = deleteRow;
    vm.dtInstance = {};
    vm.hosting = {};
    vm.dtOptions = DTOptionsBuilder.fromSource('hosting/showacessremote')
        .withPaginationType('full_numbers')
        .withOption('createdRow', createdRow);
    vm.dtOptions.withLanguageSource('http://cdn.datatables.net/plug-ins/1.10.11/i18n/'+(translate == 'en' ? 'English' : 'Spanish')+'.json');        
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
function datatablesCtrl($scope,DTOptionsBuilder)
{
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
function hostinguserCtrl($scope,DTOptionsBuilder)
{

    $scope.dtOptions = DTOptionsBuilder.newOptions()  
     $scope.funciones = function(){
      alert('hola');
    }   
};
/**
 * translateCtrl - Controller for translate
 */

function SettingsCtrl($scope,$http,$translate)
{
    function getValue(key, array) {
         for (var el in array) {
             if (array[el].hasOwnProperty(key)) {   
                 return array[el][key];
             }
         }
    }
    $scope.settings   = {};
    $scope.Department = {};
    $scope.Translate  = {};
    $scope.load= 'yes'; 
    $http.get('settings/show')
    .success(function(response){
        $scope.settings.ApplicationName =  getValue('ApplicationName',response.Config);
        $scope.settings.ApplicationDesc =  getValue('ApplicationDesc',response.Config);
        $scope.settings.CompanyName     =  getValue('CompanyName',response.Config);
        $scope.settings.EmailSystem     =  getValue('EmailSystem',response.Config);
        $scope.settings.MainLanguaje    =  getValue('MainLanguaje',response.Config);
        $scope.settings.DateFormat      =  getValue('DateFormat',response.Config);
        $scope.Department               =  response.Department;
        $scope.Translate                =  response.Translate;
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
    };
    $scope.AddDepartment = function(data){ 
         $scope.btnloadingDepart = true;
         $http({
          method  : 'POST',
          url     : 'settings/storedepartment',
          data    :  {'Department':data},
          headers : { 'Content-Type': 'application/x-www-form-urlencoded' } 
         }).then(function successCallback(response) {
              $http.get('settings/show')
              .success(function(response){
                $scope.Department               =  response.Department; 
                $scope.btnloadingDepart = false;   
                sweetAlert('Correctamente', "", "success");
              });              
          }, function errorCallback(response) {
                $scope.btnloadingDepart = false;
                sweetAlert("Oops...", "Something went wrong!", "error");
          }); 
    }
      $scope.editingData = {};
      for (var i = 0, length = $scope.Department.length; i < length; i++) {
      $scope.editingData[$scope.Department[i].Id] = false;
    }
    $scope.EditDepartment = function(tableData)
    { 
        $scope.editingData[tableData.Id] = true;
    }
    $scope.SaveDepartment = function(tableData)
    {
          var Id = tableData.Id;
          var Name = tableData.Name;
          $scope.SaveTranslation = true;
         $http({
          method  : 'POST',
          url     : 'settings/update/'+Id+'/department',
          data    :  {'Department':Name},
          headers : { 'Content-Type': 'application/x-www-form-urlencoded' } 
         }).then(function successCallback(response) {
            $scope.SaveTranslation = false;
            $scope.editingData[tableData.Id] = false;
          }, function errorCallback(response) {
              $scope.SaveTranslation = false;
              sweetAlert("Oops...", "Something went wrong!", "error");
          }); 
    }
    $scope.DeleteDepartment =  function(tableData)
    {
        var Id = tableData.Id;
        swal({
        title: $translate.instant('CONFIRM_DELETE'),
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: $translate.instant('YES'),
        cancelButtonText: $translate.instant('NO'),
        closeOnConfirm: false,
        closeOnCancel: true
        },
        function(isConfirm){
          if(isConfirm){
          $http.get('settings/destroy/'+Id+'/department')
            .then(function successCallback(response) {
                    sweetAlert('Correctamente', "", "success");
                    $http.get('settings/show')
                      .success(function(response){
                        $scope.Department  =  response.Department; 
                      });  
              }, function errorCallback(response) {
                    sweetAlert("Oops...", "", "error");
              });
            }
        });
    }
    $scope.translatePost = function(trans)
    {
      $http({
          method  : 'POST',
          url     : 'settings/'+trans+'/store/translate',
          data    :  $scope.languages,
          headers : { 'Content-Type': 'application/x-www-form-urlencoded' } 
         }).then(function successCallback(response) {
            $translate.refresh();
          }, function errorCallback(response) {
                sweetAlert("Oops...", "Something went wrong!", "error");
          }); 
    }
    $scope.translateEdit = function(loading,trans)
    {
      var trans = trans.folder;
      $scope.Translate[loading].loading = true;
      $scope.modeltranslate = trans;
      $http.get('settings/'+trans+'/translate')
      .success(function(response){
        $scope.Translate[loading].loading= false;
        $scope.languages = response;
        $scope.Translation =true;
      });
    }
    $scope.translateCancel = function(){
      $scope.languages = {};
      $scope.modeltranslate = null;
      $scope.Translation =false;
    }
    $scope.translateDelete = function(){
      alert("eliminar");
    }           
} 
function ServicehostingCtrl($scope, $uibModal, $compile, DTOptionsBuilder, DTColumnBuilder,$window)
{
    var translate  = ($window.navigator.UserLanguage || $window.navigator.language).indexOf("en") == 0 ? "en" : "es";
    var vm = this;
    vm.delete = deleteRow;
    vm.dtInstance = {};
    vm.catalog = {};
    vm.dtOptions = DTOptionsBuilder.fromSource('servicehosting/show')
        .withPaginationType('full_numbers')
        .withOption('createdRow', createdRow)
        .withOption('processing', true);
    vm.dtOptions.withLanguageSource('http://cdn.datatables.net/plug-ins/1.10.11/i18n/'+(translate == 'en' ? 'English' : 'Spanish')+'.json');        
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
function DataServicehostingCtrl($scope, editId, table, $http, $uibModalInstance) 
{
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
function CrudCtrl($scope,$http, $uibModal, $compile, DTOptionsBuilder, DTColumnBuilder,$location,$window) 
{ 
  $scope.generate = {'template':'bootstrap'};
  $scope.generate.items = [{'id':0,'type':'text','column':null, 'Opcion':'optional','table':null,'tcolumn':null}];
  $scope.colum =[];
  $scope.increment = function () {
        $scope.generate.items.push({'id':$scope.generate.items.length,'type':'text','column':null,'Opcion':'optional','table':null,'tcolumn':null});
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

      ////////////////////////////es para databases de datos
    var translate  = ($window.navigator.UserLanguage || $window.navigator.language).indexOf("en") == 0 ? "en" : "es";
    var vm = this;
    vm.delete = deleteRow;
    vm.dtInstance = {};
    vm.datas = {};
    vm.dtOptions = DTOptionsBuilder.fromSource('crud/show')
        .withPaginationType('full_numbers')
        .withOption('createdRow', createdRow)
        .withOption('responsive', true)         
        .withOption('processing', true);
    vm.dtOptions.withLanguageSource('http://cdn.datatables.net/plug-ins/1.10.11/i18n/'+(translate == 'en' ? 'English' : 'Spanish')+'.json');        
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


////////////////////////////modulos
function ModulsCtrl($scope,$http, $uibModal, $compile, DTOptionsBuilder, DTColumnBuilder,$location,$window) 
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
    var translate  = ($window.navigator.UserLanguage || $window.navigator.language).indexOf("en") == 0 ? "en" : "es";
    var vm = this;
    vm.delete = deleteRow;
    vm.dtInstance = {};
    vm.datas = {};
    vm.dtOptions = DTOptionsBuilder.fromSource('moduls/query')
        .withPaginationType('full_numbers')
        .withOption('createdRow', createdRow)
        .withOption('responsive', true)         
        .withOption('processing', true);
    vm.dtOptions.withLanguageSource('http://cdn.datatables.net/plug-ins/1.10.11/i18n/'+(translate == 'en' ? 'English' : 'Spanish')+'.json');        
    vm.dtColumns = [
      DTColumnBuilder.newColumn(null).notSortable()
        .renderWith(actionsHtml).withOption('width','100px')
        .withOption('className', 'text-center'),
        DTColumnBuilder.newColumn('Name'),
        DTColumnBuilder.newColumn('Icongroup'),
        DTColumnBuilder.newColumn('Isgroup')          
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
    $scope.addmodule = function(id){
      $location.path( 'index/moduls/'+id );
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
        return '<button type="button" class="btn btn-success" ng-click="edit('+data.Id+')" title="Edit">'+
               '<span class="fa fa-edit"></span>'+
               '</button>  '+
               '<button type="button" class="btn btn-success" ng-click="addmodule('+data.Id+')" title="Edit">'+
               '<span class="fa fa-plus"></span>'+
               '</button>';
    } 
};
function TicketCtrl($scope,$http, $uibModal, $compile, DTOptionsBuilder, DTColumnBuilder,$location,$stateParams,$state,$translate,$window) {
      if($stateParams.status=='New')
      {
        status=1;
        $scope.OptionStatus = 1;
      }
      else if($stateParams.status=='Wait')
      {
        status=2;
        $scope.OptionStatus = 2;
      }
      else if($stateParams.status=='Resolved')
      {
        status=3;
        $scope.OptionStatus = 3;
      }
      else if($stateParams.status=='Close')
      {
        status=4;
        $scope.OptionStatus = 4;
      }else{
        status=1;
        $scope.OptionStatus = 1;
      }
      $scope.loading="yes";
      $http.get('menusval/Ticket')
      .success(function(response){
        $scope.privilegios = response;
        $scope.loading="no";
        $scope.view="yes";
      });
      
      $scope.load = 'yes';
      var translate  = ($window.navigator.UserLanguage || $window.navigator.language).indexOf("en") == 0 ? "en" : "es";      
      var vm = this;
      vm.delete = deleteRow;
      vm.dtInstance = {};
      vm.datas = {};
      $scope.Ticket={'Type':1,'Priority':1};
      vm.dtOptions = DTOptionsBuilder.fromSource('ticket/query/'+status)
          .withPaginationType('full_numbers')
          .withOption('createdRow', createdRow)        
          .withOption('processing', true);
      vm.dtOptions.withLanguageSource('http://cdn.datatables.net/plug-ins/1.10.11/i18n/'+(translate == 'en' ? 'English' : 'Spanish')+'.json');          
      vm.dtColumns = [
        DTColumnBuilder.newColumn(null).notSortable()
          .renderWith(actionsHtml).withOption('width','10px')
          .withOption('className', 'text-center').withTitle($translate.instant('ACTION')),
          DTColumnBuilder.newColumn('Id').withTitle('ID'),
          DTColumnBuilder.newColumn('Title').withTitle($translate.instant('TITLE')),
          DTColumnBuilder.newColumn('Department').withTitle($translate.instant('DEPARTMENT')),
          DTColumnBuilder.newColumn('Users').withTitle($translate.instant('USER')),
          DTColumnBuilder.newColumn('UsersAssign').withTitle($translate.instant('ASSIGNED')),
          DTColumnBuilder.newColumn('Type').renderWith(Type).withOption('className', 'text-center').withTitle($translate.instant('TYPE')),
          DTColumnBuilder.newColumn('Priority').renderWith(Priority).withOption('className', 'text-center').withTitle($translate.instant('PRIORITY')),
          DTColumnBuilder.newColumn('Status').renderWith(Status).withOption('className', 'text-center').withTitle($translate.instant('STATUS')),  
          DTColumnBuilder.newColumn('LastUpdate').withTitle($translate.instant('LAST_MODIFICATION'))
      ];
      function deleteRow(id) {
          vm.dtInstance.reloadData();
      }
      function createdRow(row, data, dataIndex) {
          $compile(angular.element(row).contents())($scope);
      }
      function Type(data, type, full, meta) 
      {
        if(data == 1)
        {
          return $translate.instant('Incident');
        }else
        {
          return $translate.instant('Request');
        }
      };
      function Priority(data, type, full, meta) 
      {
        if(data==1)
        {
          return '<span class="label label-info">'+$translate.instant('Low')+'</span>';
        } else if(data==2)
        {
          return '<span class="label label-primary">'+$translate.instant('Medium')+'</span>';
        } else if(data==3)
        {
          return '<span class="label label-warning">'+$translate.instant('High')+'</span>';
        } else
        {
          return '<span class="label label-danger">'+$translate.instant('Urgent')+'</span>';
        }  
      };    
      function Status(data, type, full, meta) 
      {
        if(data==1)
        {
          return '<span class="label label-primary">'+$translate.instant('New')+'</span>';
        } else if(data==2)
        {
          return '<span class="label label-warning">'+$translate.instant('Wait')+'</span>';
        } else if(data==3)
        {
          return '<span class="label label-success">'+$translate.instant('Resolved')+'</span>';
        } else
        {
          return '<span class="label label-danger">'+$translate.instant('Close')+'</span>';
        }  
      }; 
      function actionsHtml(data, type, full, meta) 
      {
          vm.datas[data.Id] = data;
          return '<button type="button" class="btn btn-success" ng-click="edit('+data.Id+')">'+
                 '<span class="fa fa-edit"></span>'+
                 '</button>';
      };

    $http.get('ticket/data')
    .success(function(response){
      $scope.load = 'no';
      $scope.viewticket = 'yes';
      $scope.DepartmentList     = response.Department;
      $scope.Ticket={Department:$scope.DepartmentList[0].id,'Type':1,'Priority':1};
    });    
    $scope.submit = function() {
      $scope.btnload = true;
         $http({
          method  : 'POST',
          url     : 'ticket',
          data    : $scope.Ticket,
          headers : { 'Content-Type': 'application/x-www-form-urlencoded' } 
         }).then(function successCallback(response) {
                $scope.btnload = false;  
                sweetAlert('Correctamente', "", "success");
                $state.go('index.ticket')
          }, function errorCallback(response) {
                $scope.btnload = false;
                sweetAlert("Oops...", "Something went wrong!", "error");
          }); 
    };
    $scope.textoptions = {
        height: 240,
    };
    $scope.statusoption = function(id){
      vm.dtInstance.changeData('ticket/query/'+id);
      vm.dtInstance.reloadData();
      vm.dtColumns = [
        DTColumnBuilder.newColumn(null).notSortable()
          .renderWith(actionsHtml).withOption('width','10px')
          .withOption('className', 'text-center').withTitle($translate.instant('ACTION')),
          DTColumnBuilder.newColumn('Id').withTitle('ID'),
          DTColumnBuilder.newColumn('Title').withTitle($translate.instant('TITLE')),
          DTColumnBuilder.newColumn('Department').withTitle($translate.instant('DEPARTMENT')),
          DTColumnBuilder.newColumn('Users').withTitle($translate.instant('USER')),
          DTColumnBuilder.newColumn('UsersAssign').withTitle($translate.instant('ASSIGNED')),
          DTColumnBuilder.newColumn('Type').renderWith(Type).withOption('className', 'text-center').withTitle($translate.instant('TYPE')),
          DTColumnBuilder.newColumn('Priority').renderWith(Priority).withOption('className', 'text-center').withTitle($translate.instant('PRIORITY')),
          DTColumnBuilder.newColumn('Status').renderWith(Status).withOption('className', 'text-center').withTitle($translate.instant('STATUS')),  
          DTColumnBuilder.newColumn('LastUpdate').withTitle($translate.instant('LAST_MODIFICATION'))
      ];
    }

      $scope.edit = function (id) {
        $state.go('index.ticketdetall', {'qId': id});
      };
      $scope.add = function () {
         $state.go('index.ticketcreate');
      };


};
function TicketEditCtrl($scope,$http, $uibModal, $compile, DTOptionsBuilder, DTColumnBuilder,$location,$stateParams,$state,$translate,toaster,$window) {

    $scope.person       = {};
    $scope.departament  = {};
    $http.get('ticket/data').success(function(response){
        $scope.departament=response.Department;
    });
    $http.get('user/list').success(function(response){
        $scope.person=response;
    });
    $scope.time = new Date();
    $scope.message = {};
    $scope.Ticket  = {};
    $scope.ticket  = {};
    $scope.loading = 'yes';
    $scope.disable = false; 
    function ticket()
    {
      var id =  $stateParams.qId;
      $http.get('ticket/'+id+'/show')
      .success(function(response){
      $scope.Id                 = response.Id;
      $scope.ticket             = response;
      $scope.ticket.Name        = response.Name;
      $scope.ticket.Client      = response.Client;
      $scope.ticket.Title       = response.Title;
      $scope.Photo              = response.Photo;
      $scope.ticket.Description = response.Description;
      $scope.ticket.Departament = response.Departament;
      $scope.ticket.Type        = response.Type;
      $scope.ticket.Priority    = response.Priority;
      $scope.ticket.Status      = response.Status;
      $scope.ticket.Technician  = response.Technician;
      $scope.Created            = response.Created;
      $scope.LastUpdate         = response.LastUpdate;
      $scope.message            = response.Message;
      $scope.User               = response.User;
      $scope.Ticket             = {IdTicket:response.Id};
      $scope.ticket.IdTicket    = response.Id;
      $scope.loading = 'no';
      $scope.viewticket = 'yes';
      
      });
      $http.get('menusval/Ticket')
      .success(function(response){
        $scope.privilegios = response;
      });
    }
    ticket();
    $scope.open = 'yes';
    $scope.Open = function(){
      $scope.open = 'no';
      $scope.openresponde = 'yes';
    }
    $scope.Close = function(){
      $scope.open = 'yes';
      $scope.openresponde = 'no';
    }
    $scope.submit = function()
    {
      if($scope.Ticket.Description){
        $scope.btnloadingreplay = true;  
         $http({
          method  : 'POST',
          url     : 'ticket/comment',
          data    : $scope.Ticket,
          headers : { 'Content-Type': 'application/x-www-form-urlencoded' } 
         }).then(function successCallback(response) {
                $scope.btnloadingreplay = false;  
                ticket();
                $scope.open = 'yes';
                $scope.openresponde = 'no';
                sweetAlert('Correctamente', "", "success");
          }, function errorCallback(response) {
                $scope.btnloadingreplay = false;  
                sweetAlert("Oops...", "Something went wrong!", "error");
          }); 
      }
      else{
        toaster.pop({
            type: 'error',
            title: 'Title example',
            body: 'This is example of Toastr notification box.',
            showCloseButton: true,
        });
      }
   };
    $scope.update = function()
    {
          id = $scope.ticket.IdTicket;
          $scope.btnload = true;
         $http({
          method  : 'POST',
          url     : 'ticket/'+id+'/update',
          data    : $scope.ticket,
          headers : { 'Content-Type': 'application/x-www-form-urlencoded' } 
         }).then(function successCallback(response) {
                $scope.btnload = false;
                sweetAlert('Correctamente', "", "success");
          }, function errorCallback(response) {
                $scope.btnload = false;
                sweetAlert("Oops...", "Something went wrong!", "error");
          }); 

   };   
};


function ListModulsCtrl($scope,$http, $uibModal, $compile, DTOptionsBuilder, DTColumnBuilder,$location,$translate,$stateParams,$state,$window) 
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
    var id =  $stateParams.qId;
    $scope.Paramsid = id;
    var translate  = ($window.navigator.UserLanguage || $window.navigator.language).indexOf("en") == 0 ? "en" : "es";    
    var vm = this;
    vm.delete = deleteRow;
    vm.dtInstance = {};
    vm.datas = {};
    vm.dtOptions = DTOptionsBuilder.fromSource('modul/'+id+'/query')
        .withPaginationType('full_numbers')
        .withOption('createdRow', createdRow)
        .withOption('responsive', true)         
        .withOption('processing', true);
    vm.dtOptions.withLanguageSource('http://cdn.datatables.net/plug-ins/1.10.11/i18n/'+(translate == 'en' ? 'English' : 'Spanish')+'.json');    
    vm.dtColumns = [
      DTColumnBuilder.newColumn(null).notSortable()
        .renderWith(actionsHtml).withOption('width','10px')
        .withOption('className', 'text-center').withTitle('ACTION'),
        DTColumnBuilder.newColumn('name').withTitle($translate.instant('NAME')),
        DTColumnBuilder.newColumn('controller').withTitle($translate.instant('CONTROLLER')),
        DTColumnBuilder.newColumn('tablename').withTitle($translate.instant('TABLE_NAME')),
        DTColumnBuilder.newColumn('icon').withTitle($translate.instant('ICON')).withOption('className', 'text-center'),
        DTColumnBuilder.newColumn('is_active').withTitle($translate.instant('STATUS')).withOption('className', 'text-center'),
     
    ];

    $scope.edit = function (id) {
      $state.go('index.edit_module', {'IdModule': id})
    };
    $scope.add = function (id) {
      $state.go('index.Create_module_generator', {'qId': id})
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
function EditModulsCtrl($scope,$http, $uibModal, $compile, DTOptionsBuilder, DTColumnBuilder,$location,$stateParams,$state) 
{
  $scope.module ={};
  var id =  $stateParams.IdModule;
  $http.get('modul/'+id+'/edit')
      .success(function(response){
        $scope.module = response;
  });
  $scope.sortableOptions = {
        cursor: "move",
        revert: 'invalid',
        handle: ".handle",
        forceHelperSize: true,
        connectWith: ".apps-container"
  };
  $scope.list2a = [{'id':1,'name':'version 1','isgrup':1},
                  {'id':2,'name':'version 2','isgrup':2},
                  {'id':3,'name':'version 3','isgrup':2}

                  ];
$scope.lista = {};
// $scope.lista.group1= [{'id':1,'name':'version 1','isgrup':1},{'id':2,'name':'version 2','isgrup':1}];
// $scope.lista.group2=[{'id':2,'name':'version 2','isgrup':2}];
// $scope.lista.group3= {};
// $scope.lista.group4= {};

$scope.lista.group= [
[{'id':1,'name':'version 1','isgrup':1},{'id':2,'name':'version 2','isgrup':1}],
[{'id':1,'name':'version 1','isgrup':1},{'id':2,'name':'version 2','isgrup':1}],
[],
[]
];
  $scope.getNumber = function(num) {
        return new Array(num);   
    }
};
function EditGroupModulsCtrl($scope, editId, table, $http, $uibModalInstance,$translate) 
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
    $scope.moduls = {'Group':0};
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
function LogoutCtrl($scope, $http,$location){
  $scope.Logout = function(){
      $http.get('logout')
    .then(function successCallback(response) {
            $location.path( 'login' );
      }, function errorCallback(response) {
            sweetAlert("Oops...", "", "error");
      });
  }
}
////////////////////
function ResetCtrl($scope,$http,$translate)
{
  $scope.reset =  function()
  {
    var email = $scope.email;
       $http({
        method  : 'POST',
        url     : 'password/email',
        data    : {email:email},
        headers : { 'Content-Type': 'application/x-www-form-urlencoded' } 
       }).then(function successCallback(response) {
          if(response.data.status == true){
            $scope.email= null;
            sweetAlert('Enviado', response.data.message, "success");
          }else{
            sweetAlert('Error', response.data.message, "error");
          }   
        }, function errorCallback(response) {
            sweetAlert("Oops...", "Something went wrong!", "error");
        });  
  }
}
function wizardCtrl($scope)
{
    var vm = this;
        
        //Model
        vm.currentStep = 1;
        vm.steps = [
          {
            step: 1,
            name: "First step",
            template: "views/wizard/step_one.html"
          },
          {
            step: 2,
            name: "Second step",
            template: "views/wizard/step_two.html"
          },   
          {
            step: 3,
            name: "Third step",
            template: "views/wizard/step_three.html"
          },             
        ];
        vm.user = {};
        
        //Functions
        vm.gotoStep = function(newStep) {
          vm.currentStep = newStep;
        }
        
        vm.getStepTemplate = function(){
          for (var i = 0; i < vm.steps.length; i++) {
                if (vm.currentStep == vm.steps[i].step) {
                    return vm.steps[i].template;
                }
            }
        }
        
        vm.save = function() {
          alert(
            "Saving form... \n\n" + 
            "Name: " + vm.user.name + "\n" + 
            "Email: " + vm.user.email + "\n" + 
            "Age: " + vm.user.age);
        }
        $scope.formData = {};       
}

angular
    .module('inspinia')
    .controller('MainCtrl', MainCtrl)
    // .controller('MenuCtrl', MenuCtrl)    
    .controller('LoginCtrl', LoginCtrl)
    .controller('translateCtrl', translateCtrl)
    .controller('PerfilCtrl', PerfilCtrl)
    .controller('PermissionCtrl', PermissionCtrl)
    .controller('CatalogCtrl', CatalogCtrl)
    .controller('OptCtrl', OptCtrl)
    .controller('TicketCtrl', TicketCtrl)
    .controller('TicketEditCtrl', TicketEditCtrl)
    .controller('UsersCtrl',UsersCtrl)
    .controller('RolesCtrl', RolesCtrl)
    .controller('hostingCtrl', hostingCtrl)
    .controller('AccessRemoteCtrl', AccessRemoteCtrl)
    .controller('DomainCtrl', DomainCtrl)
    .controller('datatablesCtrl', datatablesCtrl)
    .controller('hostinguserCtrl', hostinguserCtrl)
    .controller('ServicehostingCtrl', ServicehostingCtrl)
    .controller('CrudCtrl', CrudCtrl)
    .controller('ModulsCtrl', ModulsCtrl)
    .controller('EditModulsCtrl', EditModulsCtrl)    
    .controller('DashboardCtrl', DashboardCtrl)
    .controller('MessagesCtrl', MessagesCtrl)
    .controller('ListModulsCtrl', ListModulsCtrl)
    .controller('SettingsCtrl', SettingsCtrl)
    .controller('NotificationCtrl', NotificationCtrl)
    .controller('LogoutCtrl', LogoutCtrl)
    .controller('ResetCtrl', ResetCtrl)
    .controller('wizardCtrl', wizardCtrl)
    
    
    
