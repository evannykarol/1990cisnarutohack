<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Department;
use App\TicketComment;
class SupportController extends Controller
{
	public function home()
    {
        return view('Support.HomeTickets');
    }	
    public function index()
    {
    	$Department = Department::get();
        return view('Support.tickets', ['Department' => $Department]);
    }	
    public function tickets()
    {
        return view('Support.detalletickets');
    }
    public function Num_tickets($id)
    {
        $TicketComment = TicketComment::where('id_ticket','=','1')->get();
        return view('Support.Num_tickets', ['TicketComment' => $TicketComment]);
    }
    public function ticket_comment(Request $request)
    {
        $TicketComment = new TicketComment;
        $TicketComment->id_ticket = 1;
        $TicketComment->comment = $request->mensaje;
        $TicketComment->id_users = 1;
        $TicketComment->save();
    }	
    
}
