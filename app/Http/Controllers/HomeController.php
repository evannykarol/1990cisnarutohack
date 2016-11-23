<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notifications;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }
    public function session()
    {
        return view('auth.Vlogin');
    }
    public function notification()
    {
        $notification = Notifications::get();
        $data = [];
        foreach ($notification as $notifications) {
            $data[] = [
                        "id"=>$notifications->id,
                        "names"=>$notifications->name,
                        "s"=>$notifications->s                        
                      ];
        }
        return response()->json($data);
    }
}
