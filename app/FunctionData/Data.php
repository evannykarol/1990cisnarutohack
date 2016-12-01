<?php

namespace App\FunctionData;
use App\models\Language;
use App\models\Roles;
use App\models\Department;
use App\models\TicketType;
use App\models\TicketPriority;
use App\models\TicketStatus;
class Data 
{
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
        $TicketType = TicketType::find($id);
        return $TicketType->name; 
    }
    public function  TPriority($id){
        $TicketPriority = TicketPriority::find($id);
        return $TicketPriority->name;
    }
    public function  TStatus($id){
        $TicketStatus = TicketStatus::find($id);
        return $TicketStatus->name;
    }  
}
