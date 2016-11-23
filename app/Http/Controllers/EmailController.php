<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\email;
class EmailController extends Controller
{
    public function index()
    {
        return view('catalogs.email');
    }
	public function show(){
		$email = email::get();
		$data = [];
		foreach ($email as $emails) {
			$data[] = [
						"Id"=>$emails->id,
						"User"=>$emails->user,
						"Email"=>$emails->email,
						"Password"=>$emails->password
					  ];
		}
		return response()->json($data);
	}    
}
