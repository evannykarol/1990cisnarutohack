<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Catalogs;
class CatalogsController extends Controller
{
    public function index(){
    	return view('view.catalogs');
    }
	public function show(){
		$Catalogs = Catalogs::get();
		$data = [];
		foreach ($Catalogs as $Catalog) {
			$data[] = [
						"Id"=>$Catalog->id,
						"Catalog"=>$Catalog->catalogs,
						"Description"=>$Catalog->description,
						"View"=>$Catalog->viewcatalog,
						"Icon"=>$Catalog->icon,
						"Status"=>$Catalog->status
					  ];
		}
		return response()->json($data);
	}
    public function edit($id){
    	$Catalogs = Catalogs::where('id','=',$id)->first();
		$data = [
				"Id"=>$Catalogs->id,
				"Catalog"=>$Catalogs->catalogs,
				"Description"=>$Catalogs->description,
				"View"=>$Catalogs->viewcatalog,
				"Icon"=>$Catalogs->icon,
				"Status"=>$Catalogs->status,
			  ];
		return response()->json($data);
    }
    public function update(Request $request, $id){
            $data = (object) $request->json()->all();   
            $Catalogs = Catalogs::find($id);
            $Catalogs->catalogs         = $data->Catalog;
            $Catalogs->description    	= $data->Description;
            $Catalogs->viewcatalog      = $data->View;
            $Catalogs->icon        		= $data->Icon;
            $Catalogs->status        	= $data->Status;
            $Catalogs->save();
        return "Actualizacion";    	
    }    	
}
