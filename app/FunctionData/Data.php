<?php

namespace App\FunctionData;
use App\models\Language;
use App\models\Roles;
use App\models\Department;
use App\models\TicketStatus;
use App\User;
class Data 
{
    public function UserName($id){
        $User = User::find($id);
        if(@$User->name){
            return $User->name." ".$User->first_name;
        }else{
            return null;    
        }
        
    }
    public function Photo($id){
        $User = User::find($id);
        return $User->photo;
    }    
    public function Lang($code)
    {
        $Language = Language::where('code','=',$code)->First();
        return $Language->name;
    }
    public function Roles($id)
    {
        $Roles = Roles::where('id','=',$id)->First();
        return $Roles->name;
    }
    public function Icon($id)
    {
        return '<i class="'.$id.'"></i>'; 
    }
    public function Status($id)
    {
        if($id==1){
            return '<span class="label label-primary">Active</span>';
        }else{
            return '<span class="label label-danger">Inactive</span>';
        }
    }
    public function StatusN($id)
    {
        if($id=="active"){
            return '<span class="label label-primary">Active</span>';
        }else{
            return '<span class="label label-danger">Inactive</span>';
        }
    }
    //////data Ticket 
    public function  TDepartment($id){
        $Department = Department::find($id);
        return $Department->name;
    }
    public function  TType($id){
        return $id;
    }
    public function  TPriority($id){
        return $id;
    }
    public function  TStatus($id){
        $TicketStatus = TicketStatus::find($id);
        return $TicketStatus->name;
    }  
}
