<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\models\Messages;
class DashboardController extends Controller
{
    public function index()
    {
    	return view('desarrolladorez.dashboard');
    }
    public function dashboard()
    {
    	$user 		= User::get()->Count();
    	$messages	= Messages::get()->Count();
    	$dashboard = [
    					"user"=>$user,
    					"messages"=>$messages
    					];
    	return response()->json($dashboard);
    }
}
