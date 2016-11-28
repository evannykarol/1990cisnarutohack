<?php
$Crud = App\Crud::get();
foreach ($Crud as $Cruds){
Route::get($Cruds->title,ucfirst($Cruds->title).'Controller@index');
Route::post($Cruds->title,ucfirst($Cruds->title).'Controller@store');
Route::get($Cruds->title.'/query',ucfirst($Cruds->title).'Controller@query');
Route::get($Cruds->title.'/modal',ucfirst($Cruds->title).'Controller@modal');
Route::get($Cruds->title.'/{id}/edit',ucfirst($Cruds->title).'Controller@edit');
Route::post($Cruds->title.'/{id}/update',ucfirst($Cruds->title).'Controller@update');
Route::get($Cruds->title.'/{id}/delete',ucfirst($Cruds->title).'Controller@destroy');
Route::get($Cruds->title.'/{id}/deleteMsg',ucfirst($Cruds->title).'Controller@DeleteMsg');
}



$Modul = App\models\Moduls::get()->where('block','=',1);
foreach ($Modul as $Moduls){
Route::get($Moduls->title,$Moduls->controller.'@index');
Route::post($Moduls->title,$Moduls->controller.'@store');
Route::get($Moduls->title.'/query',$Moduls->controller.'@query');
Route::get($Moduls->title.'/modal',$Moduls->controller.'@modal');
Route::get($Moduls->title.'/{id}/edit',$Moduls->controller.'@edit');
Route::post($Moduls->title.'/{id}/update',$Moduls->controller.'@update');
Route::get($Moduls->title.'/{id}/delete',$Moduls->controller.'@destroy');
Route::get($Moduls->title.'/{id}/deleteMsg',$Moduls->controller.'@DeleteMsg');
}