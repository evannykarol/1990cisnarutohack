<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ticket;
use App\Models\TicketComment;
use App\Models\Department;
use App\Models\TicketType;
use App\User;
use Auth;
use Carbon\Carbon;
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
                        "Users"         =>$App->UserName($Tickets->id_users),
                        "UsersAssign"   =>$App->UserName($Tickets->id_users_assign),
                        "Type"          =>$Tickets->type,
                        "Priority"      =>$Tickets->priority,
                        "Status"        =>$Tickets->status,
                        "LastUpdate"    =>Carbon::parse($Tickets->updated_at)->toDateTimeString(),
                                            
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
        $Department     =  Department::get();
        foreach ($Department as $Departments) {
            $DDepartment[] =  ['id'=>$Departments->id, 'name'=>$Departments->name];
        }
        $data =[
                'Department'        =>$DDepartment
                ];
        return response()->json($data);
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
        $date = Carbon::now();
        $data = (object) $request->json()->all();
        $id = Auth::id();
        Ticket::insert(
            [
            'title'                 => $data->Title, 
            'description'           => $data->Description,
            'id_department'         => $data->Department,
            'Type'                  => $data->Type,
            'priority'              => $data->Priority,
            'status'                => 1,
            'id_users'              => $id,
            'created_at'            =>$date->toDateTimeString()
            ]
        );
        return $date->toDateTimeString();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $App = app()->make('Data');
        $Ticket = Ticket::find($id);
        $TicketComment = TicketComment::where('id_ticket','=',$Ticket->id)->get();
        $Message = [];
        foreach ($TicketComment as $TicketComments) {
            $Message[] = [
                        'photo'  =>$App->Photo($TicketComments->id_users),
                        'users'  =>$App->UserName($TicketComments->id_users),
                        'comment'=>$TicketComments->comment,
                        'created'=>Carbon::parse($TicketComments->created_at)->toDateTimeString()
                        ]; 
        };
        $id = Auth::id();
        $User = User::find($id);        
        $data = [
                "Id"            =>$Ticket->id,
                "Client"        =>$Ticket->id_users,
                "Photo"         =>$App->Photo($Ticket->id_users),
                "Description"   =>$Ticket->description,
                "Title"         =>$Ticket->title,
                "Departament"   =>$Ticket->id_department,
                "Type"          =>$Ticket->type,
                "Priority"      =>$Ticket->priority,
                "Status"        =>$Ticket->status,
                "Technician"    =>$Ticket->id_users_assign,
                "Created"       =>Carbon::parse($Ticket->created_at)->toDateTimeString(),
                "LastUpdate"    =>Carbon::parse($Ticket->updated_at)->toDateTimeString(),
                "Message"       =>$Message,
                "User"          =>["Id"=>$User->id,"User"=>$User->name,"photo"=>$User->photo]
              ];
        return response()->json($data);
    }
    public function shorecomment(Request $request)
    {
            $data = (object) $request->json()->all();
            $id = Auth::id();
            TicketComment::insert(['id_ticket'=>$data->IdTicket,'id_users'=>$id,'comment'=>$data->Description,'created_at'=>Carbon::now()]);
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
        $data = (object) $request->json()->all();
        $update = [
                'title'             =>$data->Title,
                'id_department'     =>$data->Departament,
                'type'              =>$data->Type,
                'priority'          =>$data->Priority,
                'status'            =>$data->Status,
                'id_users'          =>$data->Client,
                'id_users_assign'   =>$data->Technician
                ];
            Ticket::where('id','=',$data->IdTicket)->update($update);
        return response()->json($data);
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
