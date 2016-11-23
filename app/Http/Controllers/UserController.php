<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Catalogs;
use App\PermissionCatalogs;
use Hash;
use Auth;
class UserController extends Controller
{
	public function index(){
    	return view('catalogs.user');
    }
    public function show(){
    	$User = User::get();
		$data = [];
		foreach ($User as $Users) {
			$data[] = [
						"Id"=>$Users->id,
						"Name"=>$Users->name,
						"Email"=>$Users->email,
						"Area"=>$Users->area,
						"Photo"=>$Users->photo,
					  ];
		}
		return response()->json($data);
    }
    public function edit($id){
    	$User = User::where('id','=',$id)->first();
		$data = [
				"Id"=>$User->id,
				"Name"=>$User->name,
				"Email"=>$User->email,
				"Area"=>$User->area,
				"Photo"=>$User->photo,
                "Languaje"=>$User->language,
			  ];
		return response()->json($data);
    }
    public function update(Request $request, $id){
            $data = (object) $request->json()->all();   
            $User = User::find($id);
            $User->name         = $data->Name;
            $User->email    	= $data->Email;
            $User->area        	= $data->Area;
            if(@$data->Password){
               $User->password          = Hash::make($data->Password); 
            }
            $User->save();
        return "Actualizacion";    	
    }
    public function lenguaje(){
    	return 'es';
    }
    public function profile(){
    	return view('profile.profile');
    }
    public function profileshow(){
        $id = Auth::id();
        $User = User::where('id','=',$id)->first();
        $data = [
                "Id"=>$User->id,
                "Name"=>$User->name,
                "Email"=>$User->email,
                "Area"=>$User->area,
                "Photo"=>$User->photo,
                "Language"=>$User->language,
              ];
        return response()->json($data);
    }
    public function profileupdate(Request $request){
            $data = (object) $request->json()->all();
            $id = Auth::id();   
            $User = User::find($id);
            $User->name         = $data->Name;
            $User->email        = $data->Email;
            $User->area         = $data->Area;
            $User->language     = $data->Language;            
            if(@$data->Password){
               $User->password          = Hash::make($data->Password); 
            }
            $User->save();
        return "Actualizacion"; 
    }
    public function permission($id_users){
        function create($id_users, $id_catalogs){
            $contar = PermissionCatalogs::where("id_users","=",$id_users)->where("id","=",$id_catalogs)->where("create","=",1)->get();
            return $contar->Count();
        }
        function read($id_users, $id_catalogs){
            $contar = PermissionCatalogs::where("id_users","=",$id_users)->where("id","=",$id_catalogs)->where("read","=",1)->get();
            return $contar->Count();
        }
        function update($id_users, $id_catalogs){
            $contar = PermissionCatalogs::where("id_users","=",$id_users)->where("id","=",$id_catalogs)->where("update","=",1)->get();
            return $contar->Count();
        }
        function delete($id_users, $id_catalogs){
            $contar = PermissionCatalogs::where("id_users","=",$id_users)->where("id","=",$id_catalogs)->where("delete","=",1)->get();
            return $contar->Count();
        }
        $CreateStatus = array();
        $ReadStatus = array();
        $UpdateStatus = array();
        $DeleteStatus = array();
        $DescripcionPerm= array();
        $idMenus        = array();
        $CountPermiso   = 0;
        $MenuCargardo   = Catalogs::get();
        foreach($MenuCargardo as $Menu){
            $create = create($id_users,$Menu->id);
            $read   = read($id_users,$Menu->id);
            $update = update($id_users,$Menu->id);
            $delete = delete($id_users,$Menu->id);
            $CreateStatus[$CountPermiso]    = array();
            $ReadStatus[$CountPermiso]      = array();
            $DescripcionPerm[$CountPermiso] = array();
            $idMenus[$CountPermiso]         = array();
            $CreateStatus[$CountPermiso] = $create;
            $ReadStatus[$CountPermiso] = $read;
            $UpdateStatus[$CountPermiso] = $update;
            $DeleteStatus[$CountPermiso] = $delete;
            $DescripcionPerm[$CountPermiso]= $Menu->description;
            $idMenus[$CountPermiso]        = $Menu->id;
            $CountPermiso = $CountPermiso + 1;
        }
      $estatus_create       = $CreateStatus;
      $estatus_read         = $ReadStatus;
      $estatus_update       = $UpdateStatus;
      $estatus_delete       = $DeleteStatus;
      $descripcion_menu     = $DescripcionPerm;
      $id_menu              = $idMenus;

      for($i=0;$i<=count($estatus_create)-1;$i++){
        $booleano   = false;
        $CheckCreate  = 0;
        $CheckRead  = 0;
        $CheckUpdate  = 0;
        $CheckDelete  = 0;
        if($estatus_create[$i]=="1"){
            $booleano = true;
            $CheckCreate= 1;
        }
        if($estatus_read[$i]=="1"){
            $booleano = true;
            $CheckRead= 1;
        }
        if($estatus_update[$i]=="1"){
            $booleano = true;
            $CheckUpdate= 1;
        }
        if($estatus_delete[$i]=="1"){
            $booleano = true;
            $CheckDelete= 1;
        }
            $data[] = [
                        "Id"=>$id_menu[$i],
                        "Catalogs"=>$descripcion_menu[$i],
                        "View"=>$CheckCreate,
                        "Create"=>$CheckRead,
                        "Update"=>$CheckUpdate,
                        "Delete"=>$CheckDelete
                      ];
      }

      return response()->json($data);
    }
    public function addpermission(){

    }       
}
