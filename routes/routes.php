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