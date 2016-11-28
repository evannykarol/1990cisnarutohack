<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Messages;
class MessagesController extends Controller
{
    public function index()
    {
    	return view('desarrolladorez.messages');
    }
    public function query()
    {
    	$Messages = Messages::get();
        $data = [];
        foreach ($Messages as $Message) {
            $data[] = ["messages"=>$Message->messages];
        }
        $datas = [
                    "count"=>$Messages->Count(),
                    "detall"=>$data,
                    ];
    	return response()->json($datas);
    }    
}
