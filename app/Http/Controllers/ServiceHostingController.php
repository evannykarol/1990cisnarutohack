<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ServiceHosting;
class ServiceHostingController extends Controller
{
    public function index(){
    	return view('catalogs.servicehosting');
	}
	public function show(){
		$ServiceHosting = ServiceHosting::get();
		$data = [];
		foreach ($ServiceHosting as $ServiceHostings) {
			$data[] = [
						"Id"=>$ServiceHostings->id,
						"Administrator"=>$ServiceHostings->administrator,
						"User"=>$ServiceHostings->user,
						"Password"=>$ServiceHostings->password,
					  ];
		}
		return response()->json($data);
	}
    public function edit($id){
    	$ServiceHosting = ServiceHosting::where('id_service_hosting','=',$id)->first();
		$data = [
				"Id"=>$ServiceHosting->id,
				"Administrator"=>$ServiceHosting->administrator,
				"User"=>$ServiceHosting->user,
				"Password"=>$ServiceHosting->password,
				"Note"=>$ServiceHosting->note
			  ];
		return response()->json($data);
    }	
}
