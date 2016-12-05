<?php

namespace App\Http\Controllers;

use Validator;
use Illuminate\Http\Request;
use App\User;
use App\Catalogs;
use App\PermissionCatalogs;
use App\Models\Roles;
use App\Models\Moduls;
use App\Models\RolesPrivileges;
use App\Models\Language;
use App\FunctionData\Data;
use Hash;
use Auth;
class UsersController extends Controller
{
	public function index()
    {
    	return view('desarrolladorez.user_roles');
    }
    public function usermodal()
    {
        return view('desarrolladorez.user_modal');
    }
    public function queryuser()
    {
        $App = app()->make('Data');
    	$User = User::get();
		$data = [];
		foreach ($User as $Users) {
			$data[] = [
						"Id"=>$Users->id,
						"User"=>$Users->user,
                        "Name"=>$Users->name,
                        "FirstName"=>$Users->first_name,
						"Email"=>$Users->email,
						"Area"=>$Users->area,
						"Roles"=>$App->Roles($Users->id_roles),
                        "Status"=>$App->StatusN($Users->status),
                        "Photo"=>$Users->photo                       
					  ];
		}
		return response()->json($data);
    }
    public function userstore(Request $request)
    {
        $validator = Validator::make($request->json()->all(), [
            'User' => 'required',
        ])->validate();

        return $validator;


        // $User = $request->json()->all();
        // User::insert([
        //     // "user"          =>$User['User'],
        //     "name"          =>$User['Name'],
        //     "first_name"    =>$User['FirstName'],
        //     "email"         =>$User['Email'],
        //     "area"          =>$User['Area'],
        //     "id_roles"      =>$User['Roles'],
        //     "language"      =>$User['Languaje'],
        //     "status"        =>$User['Status'],
        //     "password"      =>$User['New_Password'],
        //     ]);     
        return "insertados";
    } 
    public function useredit($id)
    {
    	$User = User::where('id','=',$id)->first();
		$data = [
				"Id"            =>$User->id,
                "User"          =>$User->user,
                "Name"          =>$User->name,
                "FirstName"     =>$User->first_name,
                "Email"         =>$User->email,
                "Area"          =>$User->area,
                "Roles"         =>$User->id_roles,
                "Languaje"      =>$User->language,
                "Status"        =>$User->status,
                "Photo"         =>$User->photo 
			  ];
		return response()->json($data);
    }
    public function userupdate(Request $request, $id)
    {
            $data = (object) $request->json()->all();   
            $User = User::find($id);
            $User->user               = $data->User;
            $User->name               = $data->Name;
            $User->first_name         = $data->FirstName;
            $User->email    	      = $data->Email;
            $User->area               = $data->Area;
            $User->id_roles           = $data->Roles; 
            $User->language           = $data->Languaje;          
            $User->status             = $data->Status; 
            if(@$data->New_Password){
               $User->password          = Hash::make($data->New_Password); 
            }
            $User->save();
            return "Actualizacion";    	
    }
    public function userdestroy($id)
    {
        User::destroy($id);
        return "Eliminado Correctamente";
    }
    public function list_roles()
    {
        $roles = Roles::get();
        foreach ($roles as $role) {
            $dataroles[] = ['id'=>$role->id , "name"=>$role->name];
        }
        $language = Language::get();
        foreach ($language as $languages) {
            $datalanguage[] = ['id'=>$languages->id , "name"=>$languages->name, "code"=>$languages->code];
        }
        $data = ["roles"=>$dataroles,"languages"=>$datalanguage];
        return response()->json($data);
    }
    public function profileindex()
    {
    	return view('desarrolladorez.profile');
    }
    public function profileshow()
    {
        $id = Auth::id();
        $User = User::where('id','=',$id)->first();
        $data = [
                "Id"            =>  $User->id,
                "User"          =>  $User->user,
                "Name"          =>  $User->name,
                "FirstName"     =>  $User->first_name,
                "Email"         =>  $User->email,
                "Area"          =>  $User->area,                
                "Roles"         =>  $User->id_roles,
                "Language"      =>  $User->language,
                "Photo"         =>  $User->photo                
              ];
        return response()->json($data);
    }
    public function profileupdate(Request $request)
    {
            $data = (object) $request->json()->all();
            $id = Auth::id();   
            $User = User::find($id);
            $User->name         = $data->Name;
            $User->email        = $data->Email;
            $User->area         = $data->Area;
            $User->language     = $data->Language;
            $User->id_roles     = $data->Roles;            
            if(@$data->Password){
               $User->password          = Hash::make($data->Password); 
            }
            $User->save();
        return "Actualizacion"; 
    }
    public function permission($id_users)
    {
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
    public function queryroles()
    {
        $Roles = Roles::get();
        $data = [];
        foreach ($Roles as $Role) {
            $data[] = [
                        "Id"            =>  $Role->id,
                        "Name"          =>  $Role->name,
                        "Description"   =>  $Role->description
                      ];
        }
        return response()->json($data);
    } 
    public function rolesmodal()
    {
        return view('desarrolladorez.roles_modal');
    }
    public function rolesstore(Request $request)
    {
        $collection = $request->json()->all();     
        $id_roles =  Roles::insertGetId(["name"=> $collection['Name']]);;
        $collection = collect($collection);
        $collection = $collection->get('Permission');
        foreach ($collection as $datos){
                    $id_roles   =   $id_roles;                    
                    $id_modulos =   $datos['Id'];
                    $name       =   $datos['Name'];
                    $Create     =   $datos['Create'];
                    $Read       =   $datos['Read'];
                    $Update     =   $datos['Update'];
                    $Delete     =   $datos['Delete'];
                        RolesPrivileges::insert([
                            "id_roles"      => $id_roles, 
                            "id_moduls"     => $id_modulos, 
                            "is_create"     => $Create, 
                            "is_read"       => $Read,
                            "is_update"     => $Update,
                            "is_delete"     => $Delete,
                            ]);

        }
        return "insertados";
    }      
    public function rolesedit($id)
    {
        function create($id_roles, $id_moduls){
            $contar = RolesPrivileges::where("id_roles","=",$id_roles)->where("id_moduls","=",$id_moduls)->where("is_create","=",1)->get();
            return $contar->Count();
        }
        function read($id_roles, $id_moduls){
            $contar = RolesPrivileges::where("id_roles","=",$id_roles)->where("id_moduls","=",$id_moduls)->where("is_read","=",1)->get();
            return $contar->Count();
        }
        function update($id_roles, $id_moduls){
            $contar = RolesPrivileges::where("id_roles","=",$id_roles)->where("id_moduls","=",$id_moduls)->where("is_update","=",1)->get();
            return $contar->Count();
        }
        function delete($id_roles, $id_moduls){
            $contar = RolesPrivileges::where("id_roles","=",$id_roles)->where("id_moduls","=",$id_moduls)->where("is_delete","=",1)->get();
            return $contar->Count();
        }
        $dato = array();
        $CreateStatus = array();
        $ReadStatus = array();
        $UpdateStatus = array();
        $DeleteStatus = array();
        $Name= array();
        $idMenus        = array();
        $CountPermiso   = 0;
        $MenuCargardo   = Moduls::get();
        foreach($MenuCargardo as $Menu)
        {
            $is_create = create($id,$Menu->id);
            $is_read   = read($id,$Menu->id);
            $is_update = update($id,$Menu->id);
            $is_delete = delete($id,$Menu->id);
            $CreateStatus[$CountPermiso]    = array();
            $ReadStatus[$CountPermiso]      = array();
            $UpdateStatus[$CountPermiso]      = array();
            $DeleteStatus[$CountPermiso]      = array();
            $Name[$CountPermiso] = array();
            $idMenus[$CountPermiso]         = array();
            $CreateStatus[$CountPermiso]    = $is_create;
            $ReadStatus[$CountPermiso]      = $is_read;
            $UpdateStatus[$CountPermiso]    = $is_update;
            $DeleteStatus[$CountPermiso]    = $is_delete;
            $Name[$CountPermiso]            = $Menu->name;
            $idMenus[$CountPermiso]         = $Menu->id;
            $CountPermiso = $CountPermiso + 1;
        }
      $estatus_create       = $CreateStatus;
      $estatus_read         = $ReadStatus;
      $estatus_update       = $UpdateStatus;
      $estatus_delete       = $DeleteStatus;
      $Name                 = $Name;
      $id_menu              = $idMenus;
      for($i=0;$i<=count($estatus_create)-1;$i++)
      {
        $booleano   = false;
        $CheckCreate  = false;
        $CheckRead  = false;
        $CheckUpdate  = false;
        $CheckDelete  = false;
        if($estatus_create[$i]=="1"){
            $booleano = true;
            $CheckCreate= true;
        }
        if($estatus_read[$i]=="1"){
            $booleano = true;
            $CheckRead= true;
        }
        if($estatus_update[$i]=="1"){
            $booleano = true;
            $CheckUpdate= true;
        }
        if($estatus_delete[$i]=="1"){
            $booleano = true;
            $CheckDelete= true;
        }
            $dato[]=[
                    "Id"        =>  $id_menu[$i],
                    "Name"      =>  $Name[$i],
                    "Create"    =>  $CheckCreate,
                    "Read"      =>  $CheckRead,
                    "Update"    =>  $CheckUpdate,
                    "Delete"    =>  $CheckDelete
                    ];
      }
        $Roles  = Roles::where('id','=',$id)->first();  
            $data = [
                    "Id"            =>  $Roles->id,
                    "Name"          =>  $Roles->name,
                    "Description"   =>  $Roles->description,
                    "Isticket"      =>  $Roles->is_ticket ? true : false  ,
                    "Permission"    =>  $dato
                    ];
        return response()->json($data);
    }
    public function rolesupdate(Request $request, $id)
    {
        $collection = $request->json()->all();
        $id_roles = $collection['Id'];
        $collection = collect($collection);
        $collection = $collection->get('Permission');
        foreach ($collection as $datos){
                    $id_roles   =   $id_roles;                    
                    $id_modulos =   $datos['Id'];
                    $name       =   $datos['Name'];
                    $Create     =   $datos['Create'];
                    $Read       =   $datos['Read'];
                    $Update     =   $datos['Update'];
                    $Delete     =   $datos['Delete'];
                    $verficar = RolesPrivileges::where("id_roles",'=',$id_roles)->where("id_moduls",'=',$id_modulos);     
                    if($verficar->count()!=0){
                        RolesPrivileges::where("id_roles",'=',$id_roles)->where("id_moduls",'=',$id_modulos)
                        ->update([
                            'is_create'     => $Create, 
                            'is_read'       => $Read,
                            'is_update'     => $Update,
                            'is_delete'     => $Delete,
                            ]);
                    }else{
                        RolesPrivileges::insert([
                            "id_roles"      => $id_roles, 
                            "id_moduls"     => $id_modulos, 
                            "is_create"     => $Create, 
                            "is_read"       => $Read,
                            "is_update"     => $Update,
                            "is_delete"     => $Delete,
                            ]);
                    } 
        }
        return "actualizado";
    }
    public function listmoduls()
    {
        $Moduls = Moduls::get();
            $data=[];
        foreach ($Moduls as $Modul) {
            $data[] = [
                        "Id"=>$Modul->id,
                        "Name"=>$Modul->name,
                        "Create"=>false,
                        "Read"=>false,
                        "Update"=>false,
                        "Delete"=>false
                      ];
        }
            $datas = ["Permission"=>$data];        
        return response()->json($datas); 
    }
    public function rolesdestroy($id)
    {
        return "espera relaciones roles ";
    }
    public function getTranslate($lang)
    {
        $id = Auth::id();
        $User = User::find($id);
        $User->language = $lang;
        $User->save();
    }                       
}
