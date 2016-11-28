<?php

namespace App\FunctionData;
use App\models\Language;
use App\models\Roles;
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
}
