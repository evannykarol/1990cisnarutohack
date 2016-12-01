<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\models\Messages;
use App\models\Moduls;
use App\models\Ticket;

class DashboardController extends Controller
{
    public function index()
    {
    	return view('desarrolladorez.dashboard');
    }
    public function dashboard()
    {
        function dataTicket($moth){
            $years = date('Y');
            $yearsFi = $years + 1;
            // $moth  = 11;
            if($moth==11){
                $yearsf = $years;
                $mothf = 12;
            } else if($moth==12){
                $yearsf = $years + 1;
                $mothf = 01;
            }
            else{
                $yearsf = $years;
                $mothf =$moth + 01;
            } 
            $Ticket = Ticket::where('created_at', '>=',  $years.'-'.$moth.'-01')->where('created_at', '<=', $yearsf.'-'.$mothf.'-01')->get()->count();
            return $Ticket;
        };
        $years = date('Y');
        $yearsFi = $years + 1;
    	$user 		= User::get()->Count();
    	$moduls	    = Moduls::get()->Count();
        $messages   = Messages::get()->Count();
        $tickets    = Ticket::where('created_at', '>=',  $years.'-01-01')->where('created_at', '<=', $yearsFi.'-01-01')->get()->Count();
        $ticket = [
                    dataTicket(1), 
                    dataTicket(2), 
                    dataTicket(3), 
                    dataTicket(4), 
                    dataTicket(5), 
                    dataTicket(6), 
                    dataTicket(7), 
                    dataTicket(8), 
                    dataTicket(9), 
                    dataTicket(10),
                    dataTicket(11),
                    dataTicket(12)
                ];
    	$dashboard = [
    					"user"          =>$user,
                        "moduls"        =>$moduls,
    					"messages"      =>$messages,
                        "ticket"        =>$ticket,
                        "totalTicket"   =>number_format($tickets)
    					];               
    	return response()->json($dashboard);
    }
}
