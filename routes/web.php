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
    return "hola";
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

Route::get('/common/navigation', function () {
	// $catalog = App\PermissionCatalogs::join('catalogs', 'catalogs.id_catalogs', '=', 'permission_catalogs.id_catalogs')->where('permission_catalogs.id_users','=','1')->get();
    $catalog = App\Catalogs::where('status','=','s')->get();
    return view('common.navigation', ['catalog' => $catalog]);
});
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
Route::get('/catalog/client', 'ClientController@index');
Route::get('/panelcontrol', function(){
	return view('view.ControlPanel');
});



Route::get('roles', 'AdministrationController@roles');
Route::post('roles', 'AdministrationController@storeroles');
Route::get('roles/show', 'AdministrationController@showroles');
Route::get('roles/modal', 'AdministrationController@modalroles');
Route::get('roles/edit/{id}', 'AdministrationController@editroles');
Route::post('roles/update/{id}', 'AdministrationController@updateroles');




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
Route::get('modalusers', function(){
    return view('modal.users');
});
Route::get('modalcatalog', function(){
    return view('modal.catalogpermission');
});
Route::get('modalcatalogs', function(){
    return view('modal.catalog');
});

//////////////

////////////////languaje .--- Usuarios
Route::get('user','UserController@index');
Route::get('user/show','UserController@show');
Route::get('user/edit/{id}','UserController@edit');
Route::post('/user/update/{id}','UserController@update');
Route::get('languaje','UserController@lenguaje');
Route::get('profile','UserController@profile');
Route::get('profileshow','UserController@profileshow');
Route::post('profileupdate','UserController@profileupdate');

Route::get('settings','SettingsController@index');
Route::get('settings/show','SettingsController@show');
Route::post('settings/update','SettingsController@update');
Route::get('settings/clearcache','SettingsController@clearcache');



Route::get('userpermission/{id_user}','UserController@permission');
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



require('routes.php');
