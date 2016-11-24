<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;
use App\Client;
class ClientController extends Controller
{
    public function index()
    {
        return view('catalogs.client');
    }
    public function show()
    {
        $Client = Client::get();
        $data = [];
        foreach ($Client as $Clients) {
            $data[] = [
                        "id"  => $Clients->id,
                        "name" => $Clients->name,
                        "address" => $Clients->address,
                        "phone" => $Clients->phone,
                        "id_user" => $Clients->id_user,                  
                      ];
        }
        return response()->json($data);
    }   
}
