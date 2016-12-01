<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ticket;
use Auth;
class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('desarrolladorez.ticket.index');
    }
    public function getIndex()
    {
        $Ticket = Ticket::get();
        $App = app()->make('Data');
        $data = [];
        foreach ($Ticket as $Tickets) {
            $data[] = [
                        "Id"            =>$Tickets->id,
                        "Title"         =>$Tickets->title,
                        "Department"    =>$App->TDepartment($Tickets->id_department),
                        "Type"          =>$App->TType($Tickets->id_ticket_type),
                        "Priority"      =>$App->TPriority($Tickets->id_ticket_priority),
                        "Status"        =>$App->TStatus($Tickets->id_ticket_status),
                        "Status"        =>$App->TStatus($Tickets->id_ticket_status),
                        "CreationDate"  =>$Tickets->created_at,
                        "LastUpdate"    =>$Tickets->updated_at,
                                            
                      ];
        }
        return response()->json($data);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function form()
    {
        return view('desarrolladorez.ticket.form');
    }
    public function getData()
    {
        return view('desarrolladorez.ticket.form');
    }
        public function getDetall()
    {
        return view('desarrolladorez.ticket.detall');
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('desarrolladorez.ticket.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = (object) $request->json()->all();
        $id = Auth::id();
        Ticket::insert(
            [
            'title'                 => $data->Title, 
            'description'           => $data->Description,
            'id_department'         => $data->Department,
            'id_ticket_type'        => $data->Type,
            'id_ticket_priority'    => $data->Priority,
            'id_ticket_status'      => 1,
            'id_users'              => $id,
            ]
        );
        return $request->json()->all();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
