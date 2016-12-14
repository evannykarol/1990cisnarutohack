<?php
Blade::setContentTags('<%', '%>');
Blade::setEscapedContentTags('<%%', '%%>');
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', 'HomeController@index');
Route::get('/session', 'HomeController@session');
Route::post('/signin', 'Auth\LoginController@postSignin');
Route::get('/recuperar', 'Auth\LoginController@reset');
Route::get('/notification', 'HomeController@notification');

Auth::routes();
Route::get('logout', function(){
    Auth::logout();
});

// Route::get('/home', 'HomeController@index');

/// 
Route::get('/common/content', function () {
    return view('common.content');
});
Route::get('crud', 'CrudController@index');
Route::get('crud/show','CrudController@show');
Route::get('crud/create','CrudController@create');
Route::get('crud/edit','CrudController@edit');

// Route::get('/common/navigation', function () {

//     $catalog = App\Catalogs::where('status','=','s')->get();
//     $Moduls = App\Models\Moduls::get();
//     return view('common.navigation', ['catalog' => $catalog,'Moduls'=>$Moduls]);
// });

Route::get('common/navigation', 'ModuleGroupController@index');
Route::get('moduls', 'ModuleGroupController@moduls');
Route::post('moduls', 'ModuleGroupController@store');
Route::get('moduls/query', 'ModuleGroupController@query');
Route::get('moduls/modal', 'ModuleGroupController@modal');
Route::get('moduls/{id}/edit', 'ModuleGroupController@edit');
Route::post('moduls/{id}/update','ModuleGroupController@update');
Route::get('moduls/{id}/destroy', 'ModuleGroupController@destroy');
Route::get('moduls/create', 'ModuleGroupController@create');


Route::get('modul/{id}/query', 'ModuleController@querymoduls');
Route::get('modul/edit', 'ModuleController@showedit');
Route::get('modul/{id}/edit', 'ModuleController@edit');






Route::get('/common/topnavbar', function () {
    return view('common.topnavbar');
});
Route::get('/common/footer', function () {
    return view('common.footer');
});

/// catalogs
Route::get('/catalog', 'CatalogsController@index');
Route::get('/catalog/show', 'CatalogsController@show');
Route::get('/catalog/edit/{id}', 'CatalogsController@edit');
Route::post('/catalog/update/{id}', 'CatalogsController@update');

//clientes

Route::get('client', 'ClientController@index');
Route::get('client/show', 'ClientController@show');

//clientes

Route::get('/dashboard', function(){
	return view('desarroladorez.dashboard');
});





Route::get('privileges', 'PrivilegesController@index');
Route::post('privileges', 'PrivilegesController@store');
Route::get('privileges/create', 'PrivilegesController@create');

Route::get('privileges/query', 'PrivilegesController@query');
Route::get('privileges/modal', 'AdministrationController@modalroles');
Route::get('privileges/edit/{id}', 'AdministrationController@editroles');
Route::post('privileges/update/{id}', 'AdministrationController@updateroles');
Route::get('permisionroles', 'AdministrationController@permissionroles');







Route::get('ticket', 'TicketController@index');
Route::post('ticket', 'TicketController@store');
Route::post('ticket/{id}/update', 'TicketController@update');
Route::get('ticket/data', 'TicketController@getData');
Route::get('ticket/query/{id}', 'TicketController@getIndex');
Route::get('ticket/form', 'TicketController@form');
Route::get('ticket/detall', 'TicketController@getDetall');
Route::get('ticket/{id}/show', 'TicketController@show');
Route::post('ticket/comment', 'TicketController@shorecomment');













///Soporte Ticket Clientes
Route::get('/common/top_navigation', function () {
    return view('common.top_navigation');
});
Route::get('/common/content_top_navigation', function () {
    return view('common.content_top_navigation');
});
Route::get('support/home','SupportController@home');
Route::get('support/tickets/new','SupportController@index');
Route::get('support/detalletickets','SupportController@tickets');
Route::get('support/Num_tickets/{id}','SupportController@Num_tickets');
Route::post('support/newticket','SupportController@ticket_comment');
//////////persmiso 
Route::get('permission','PermissionController@index');
Route::get('/crear', function () {
    	$Catalogs = new App\Catalogs;
        $Catalogs->catalogs = 'Ticket';
        $Catalogs->description = 'Ticket';
        $Catalogs->viewcatalog = 'index.ticket';
        $Catalogs->status = 's';
        $Catalogs->save();
});
////
Route::get('hosting','HostingController@index');
Route::get('hosting/show','HostingController@show');
Route::get('hosting/edit/{id}','HostingController@edit');
Route::get('hosting/showacessremote','HostingController@showAccessRemote');
////modal hosting
Route::get('hosting/modalacessremote', function(){
    return view('catalogs.modalhosting.accessremote');
});
//modal

Route::get('modalcatalog', function(){
    return view('modal.catalogpermission');
});
Route::get('modalcatalogs', function(){
    return view('modal.catalog');
});

//////////////




Route::get('dashboard', 'DashboardController@index');
Route::get('dashboard/query/{year}', 'DashboardController@dashboard');


////////////////languaje .--- Usuarios
Route::get('user','UsersController@index');
Route::get('roles/list/moduls', 'UsersController@listmoduls');
//funciones controlleres user para usuarios
Route::get('user/query','UsersController@queryuser');
Route::post('user','UsersController@userstore');
Route::get('user/{id}/edit','UsersController@useredit');
Route::post('user/{id}/update','UsersController@userupdate');
Route::get('user/{id}/destroy','UsersController@userdestroy');
Route::get('user/modal', 'UsersController@usermodal');
Route::get('user/list', 'UsersController@listUser');
//funciones controlleres user para roles
Route::get('roles/query', 'UsersController@queryroles');
Route::post('roles', 'UsersController@rolesstore');
Route::get('roles/{id}/edit', 'UsersController@rolesedit');
Route::post('roles/{id}/update', 'UsersController@rolesupdate');
Route::get('roles/{id}/destroy', 'UsersController@rolesdestroy');
Route::get('roles/modal', 'UsersController@rolesmodal');



Route::get('roles/list', 'UsersController@list_roles');






Route::get('languaje','UsersController@lenguaje');
//////////////////perfiles
Route::get('profile','UsersController@profileindex');
Route::get('profile/show','UsersController@profileshow');
Route::post('profile/update','UsersController@profileupdate');


///////////////////messenger
Route::get('messages','MessagesController@index');
Route::get('messages/query','MessagesController@query');
Route::get('messages/inbox','MessagesController@inbox');
Route::get('messages/{id}/viewmessage','MessagesController@View');













Route::get('userpermission/{id_user}','UsersController@permission');






Route::get('settings','SettingsController@index');
Route::get('settings/show','SettingsController@show');
Route::post('settings/update','SettingsController@update');
Route::get('settings/clearcache','SettingsController@clearcache');




//////////////////
Route::get('servicehosting','ServiceHostingController@index');
Route::get('servicehosting/show','ServiceHostingController@show');
Route::get('modalservicehosting', function(){
    return view('modal.servicehosting');
});
Route::get('servicehosting/edit/{id}','ServiceHostingController@edit');

Route::get('email','EmailController@index');
Route::get('email/show','EmailController@show');

Route::get('checartablas/{tables}','CrudController@getResult');
Route::post('enviar','CrudController@store');


Route::get('App', function(){
    $Crud = App\Crud::get();
    $Crudtables = App\Crudtables::get();
    return view('js.app',compact('Crud','Crudtables'));
});
Route::get('Config', function(){
    $Crud = App\Crud::get();
    $Crudtables = App\Crudtables::get();
    return view('js.config',compact('Crud','Crudtables'));
});


Route::get('user/translate/{lang}','UsersController@getTranslate');

Route::get('datosj','DashboardController@getfile');

Route::get('menus','MenuController@menu');
Route::get('menusval/{menus}','MenuController@menusval');
// require('routes.php');
