<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Hosting;
use App\AccessRemote;
class HostingController extends Controller
{
	public function index(){
    	return view('catalogs.hosting');
	}
	public function show(){
		$Hosting = Hosting::get();
		$data = [];
		foreach ($Hosting as $Hostings) {
			$data[] = [
						"Id"=>$Hostings->id,
						"Name"=>$Hostings->name,
						"Business"=>$Hostings->business,
						"Date_create"=>$Hostings->date_create,
						"Date_vence"=>$Hostings->date_vence
					  ];
		}
		return response()->json($data);
	}
	public function showAccessRemote(){
		$AccessRemote = AccessRemote::get();
		$data = [];
		foreach ($AccessRemote as $AccessRemotes) {
			$data[] = [
						"Id"=>$AccessRemotes->id,
						"Users"=>$AccessRemotes->users,
						"Password"=>$AccessRemotes->password,
						"Assigned"=>$AccessRemotes->assigned,
						"Permision"=>$AccessRemotes->permision,
						"Area"=>$AccessRemotes->area,
					  ];
		}
		return response()->json($data);
	}
	public function showDomain(){
		$AccessRemote = AccessRemote::get();
		$data = [];
		foreach ($AccessRemote as $AccessRemotes) {
			$data[] = [
						"users"=>$AccessRemotes->users,
						"password"=>$AccessRemotes->password,
						"assigned"=>$AccessRemotes->assigned,
						"permision"=>$AccessRemotes->permision,
						"area"=>$AccessRemotes->area,
					  ];
		}
		return response()->json($data);
	}
	public function edit($id){
		return view('catalogs.hostingedit');
	}
}
