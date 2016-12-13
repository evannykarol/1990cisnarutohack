<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Roles;
use App\Models\Moduls;
use App\Models\RolesPrivileges;
use App\Models\Menus;
use App\Models\MenusPrivileges;
use Hash;
use Auth;
class MenuController extends Controller
{
    public function menu(){
    	$id = Auth::user()->id_roles;
    	$men = [];
    	$menus = Menus::get();
    	foreach ($menus as $menu) {
    		$idroles =  MenusPrivileges::where('id_roles','=',$id)->where("id_menus","=",$menu->id)->first();
    		$men[] = [$menu->key_name =>$idroles->is_view ? true : false];
    	};
    	$data = [
    			'photo' => Auth::user()->photo,
    			'name' => Auth::user()->name,
    			'area' => Auth::user()->area,
    			'menus' => $men
    	];				
    	return response()->json($data);
    }
}
