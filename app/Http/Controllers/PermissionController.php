<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PerssionCatalogs;
use App\Catalogs;
class PermissionController extends Controller
{
    public function index(){
    	$catalog = Catalogs::get();
    	return view('catalogs.permission',['catalog' => $catalog]);
    }
}
