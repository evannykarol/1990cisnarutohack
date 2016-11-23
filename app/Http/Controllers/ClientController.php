<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;
use Client;
class ClientController extends Controller
{
    public function index()
    {
        return view('catalogs.client');
    }
}
