<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Settings;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Cache;
class SettingsController extends Controller
{
    public function index()
    {
    	return view('Settings.settings');
    }
    public function show()
    {
    	$Settings = Settings::get();
		$data = [];
		foreach ($Settings as $Setting) {
			$data[] = [
						$Setting->name => $Setting->value
					  ];
		}
		return response()->json($data);
    } 
    public function update()
    {

    }
    public function clearcache()
    {
        Cache::flush();
    }         
}
