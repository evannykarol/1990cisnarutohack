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

    public function update(Request $request)
    {
        
        $data = (object) $request->json()->all();
        foreach ($data as $datas => $key) {
             Settings::where('name','=',$datas)->update(['value'=>$key]);
         } 
         // return $datas;
        return response()->json($data);
    }

    public function clearcache()
    {
        $dir = base_path()."/storage/logs"; 
        foreach(glob($dir . '/*') as $file) {
            if(is_dir($file))
            {

            } else {
                unlink($file);
            }
        }

        $dir = base_path()."/storage/framework/views";  
        foreach(glob($dir . '/*') as $file) {
            if(is_dir($file))
            {

            } else {               
                unlink($file);
            }
        }       
        Cache::flush();

        return response()->json(array(
            'status'    =>'success',
            'message'   => 'Cache has been cleared !'
        ));



        
    }         
}
