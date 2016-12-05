<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Messages;
use App\User;
use Hash;
use Auth;
class MessagesController extends Controller
{
    public function index()
    {
    	return view('desarrolladorez.messages');
    }
    public function query()
    {
        $id = Auth::id();
    	$Messages = Messages::where('is_read',"=",0)->where("for_users","=",$id)->get();       
        $data = [];
        foreach ($Messages as $Message) {
            $User=User::find($Message->id_user);
            $data[] = [
                        "photo"=>$User->photo,
                        "name"=>$User->name,
                        "subject"=>$Message->subject,
                        "created"=>$Message->created_at
                        ];
        }
        $datas = [
                    "count"=>$Messages->Count(),
                    "detall"=>$data,
                    ];
    	return response()->json($datas);
    }
    public function inbox()
    {
        $id = Auth::id();
        $App = app()->make('Data');
        $Messages = Messages::where('for_users','=',$id)->get();       
        $data = [];
        foreach ($Messages as $Message) {
            $data[] = [
                        'id'        =>$Message->id,            
                        'subject'=>$Message->subject,
                        'users'=>$App->UserName($Message->for_users),
                        'read'=>$Message->is_read,
                        'date'=>$Message->created_at,
                        ]; 
        }
        $datas = [
                    "inbox"=>$Messages->where('is_read','=','0')->Count(),
                    "listmessage"=>$data,
                    ];
        return response()->json($datas); 
    }
    public function View($id)
    {
        $App = app()->make('Data');
        Messages::where('id','=' ,$id)->update(['is_read' => 1]);
        $Message = Messages::find($id);      
        $data = [
                'id'        =>$Message->id,
                'subject'   =>$Message->subject,
                'messages'  =>$Message->messages,
                'users'     =>$App->UserName($Message->for_users),
                'date'      =>$Message->created_at,
                ];
        return response()->json($data); 
    }         
}
