<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Settings;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Cache;
use App\Models\Department;
use File;
class SettingsController extends Controller
{
    public function index()
    {
    	return view('desarrolladorez.settings');
    }   
    public function show()
    {
    	$Settings = Settings::get();
		$data = [];
		foreach ($Settings as $Setting) {
			$data[] = [
						$Setting->name => $Setting->value
					  ];
		};
        $Departments = Department::get();
        $DepartmentD = [];
        foreach ($Departments as $Department) {
            $DepartmentD[] = [
                        "Id"=>$Department->id,"Name"=>$Department->name
                      ];
        }
        $query = ["Config"=>$data, "Department"=>$DepartmentD];
		return response()->json($query);
    } 
    public function update(Request $request)
    {        
        $data = (object) $request->json()->all();
        foreach ($data as $datas => $key) {
             Settings::where('name','=',$datas)->update(['value'=>$key]);
         } 
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
    public function storeDespartment(Request $request)
    {
        $data = (object) $request->json()->all();
        Department::insert(['name'=>$data->Department]);
        return response()->json(array(
            'status'    =>'success'
        ));
    }
    public function EditDespartment($id)
    {
        $Department =Department::find($id);
        return response()->json($Department);
    }
    public function UpdateDespartment($id,Request $request)
    {
        $data = (object) $request->json()->all();
        $Department =Department::where('id','=',$id)->update(['name'=>$data->Department]);
        return response()->json(array(
            'status'    =>'success'
        ));
    }
    public function DestroyDespartment($id)
    {
        Department::destroy($id);
        return response()->json(array(
            'status'    =>'success'
        ));
    }
    public function translate()
    {
        $data_lang = file_get_contents(base_path()."/public/js/languages/es.json");
        $json_lang = json_decode($data_lang, true);
        foreach ($json_lang as $key => $var) {
            $data[] = [$key=>$var];
        }
        return response()->json($data);
    }
    public function storetranslate(Request $request)
    {
        $collection = collect($request->json()->all());
        $form = $collection->map(function ($item, $key) {
                return $item;
        });
        $filename = base_path()."/public/js/languages/es.json";
        $fp=fopen($filename,"w+"); 
        fwrite($fp,json_encode($form->collapse()->all())); 
        fclose($fp);
    }
    public static function langOption()
    {
        $path = base_path().'/public/js/languages/';
        $lang = scandir($path);

        $t = array();
        foreach($lang as $value) {
            if($value === '.' || $value === '..') {continue;} 
                if(is_dir($path . $value))
                {
                    $fp = file_get_contents($path . $value.'/info.json');
                    $fp = json_decode($fp,true);
                    $t[] =  $fp ;
                }            
        }   
        return $t;

    }           
}
