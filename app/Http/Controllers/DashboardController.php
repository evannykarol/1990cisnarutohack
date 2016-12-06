<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\models\Messages;
use App\models\Moduls;
use App\models\Ticket;
use App\models\Roles;
use Auth;
class DashboardController extends Controller
{
    public function index()
    {
    	return view('desarrolladorez.dashboard');
    }
    public function dashboard($years)
    {
        function dataTicket($moth, $years)
        {
            $yearsFi = $years + 1;
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
            $id_roles = Auth::user()->id_roles;
            $roles = Roles::find($id_roles);
            if($roles->is_ticket == 1)
            {
                $id = Auth::id();
                $Ticket = Ticket::where('id_users','=',$id)->where('created_at', '>=',  $years.'-'.$moth.'-01')->where('created_at', '<=', $yearsf.'-'.$mothf.'-01')->get()->count();
            }else
            {
                $Ticket = Ticket::where('created_at', '>=',  $years.'-'.$moth.'-01')->where('created_at', '<=', $yearsf.'-'.$mothf.'-01')->get()->count();
            }
            

            return $Ticket;
        };
        function ticketCount($status,$years,$yearsFi)
        {
            $id_roles = Auth::user()->id_roles;
            $roles = Roles::find($id_roles);
            if($roles->is_ticket == 1)
            {
                $id = Auth::id();
                $tickets    = Ticket::where('id_users','=',$id)->where('created_at', '>=',  $years.'-01-01')->where('created_at', '<=', $yearsFi.'-01-01'); 
            }else
            {
                $tickets    = Ticket::where('created_at', '>=',  $years.'-01-01')->where('created_at', '<=', $yearsFi.'-01-01'); 
            }            
            if($status)
            {
                return number_format($tickets->where('status','=',$status)->get()->Count());
            }
                return number_format($tickets->get()->Count());             
        }
        $yearsFi    = $years + 1;
        $user       = User::get()->Count();
        $moduls     = Moduls::get()->Count();
        $id = Auth::id();
        $messages   = Messages::where('for_users','=',$id)->where('is_read','=',0)->get()->Count();
        $ticket = [
                    dataTicket(1, $years), 
                    dataTicket(2, $years), 
                    dataTicket(3, $years), 
                    dataTicket(4, $years), 
                    dataTicket(5, $years), 
                    dataTicket(6, $years), 
                    dataTicket(7, $years), 
                    dataTicket(8, $years), 
                    dataTicket(9, $years), 
                    dataTicket(10, $years),
                    dataTicket(11, $years),
                    dataTicket(12, $years)
                ];
        $dashboard = [
                        "user"            =>$user,
                        "moduls"          =>$moduls,
                        "messages"        =>$messages,
                        "ticket"          =>$ticket,
                        "totalTicket"     =>ticketCount(null,$years,$yearsFi),
                        "ticketNew"       =>ticketCount(1,$years,$yearsFi), 
                        "ticketWait"      =>ticketCount(2,$years,$yearsFi),
                        "ticketResolved"  =>ticketCount(3,$years,$yearsFi),
                        "ticketCloses"    =>ticketCount(4,$years,$yearsFi),
                        ];               
        return response()->json($dashboard);
    }
}
