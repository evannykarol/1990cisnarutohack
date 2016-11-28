<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ModulsGroup;
use App\Models\Moduls;
use App\Catalogs;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Artisan;
use App;
use App\Crud;
use App\Crudtables;
class ModuleGroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $groups = ModulsGroup::get();
        $Moduls = Moduls::get();
        $catalog = Catalogs::where('status','=','s')->get();      
        return view('common.navigation', ['catalog' => $catalog,'groups'=>$groups]);
    }
    public function moduls()
    {       
        return view('moduls.index');
    }
    public function query()
    {
        $App = app()->make('Data');
        $groups = ModulsGroup::get();
        $data = [];
        foreach ($groups as $group) {
            $data[] = [
                        "Id"           =>$group->id,
                        "Name"         =>$group->name_group,
                        "Isgroup"      =>$App->Status($group->is_group),
                        "Icongroup"    =>$App->Icon($group->icon_group),                        
                      ];
        }
        return response()->json($data);
    }
    public function modal()
    {
        return view('moduls.modal');
    }         

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tables = App\Crud\Database\DatabaseManager::tableNames();
        foreach ($tables as $table) 
        {
            $datatables = Schema::getColumnListing($table);
            unset($datatables[0]);
            $colums[]= [$table=>$datatables];
        }
        return view('moduls.create',compact('tables','colums'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $User = $request->json()->all();
        ModulsGroup::insert([
            "name_group"         =>$User['Name'],
            "is_group"           =>$User['Group'],
            "icon_group"         =>$User['Icon']
            ]);
        return "Insertado";      
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $group = ModulsGroup::where('id','=',$id)->first();
            $data = [
                        "Id"            =>$group->id,
                        "Name"          =>$group->name_group,
                        "Isgroup"       =>$group->is_group,
                        "Icongroup"     =>$group->icon_group,                        
                      ];
        return response()->json($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
            $data = (object) $request->json()->all();   
            $ModulsGroup = ModulsGroup::find($id);
            $ModulsGroup->name_group    = $data->Name;
            $ModulsGroup->is_group      = $data->Group;
            $ModulsGroup->icon_group    = $data->Icon;
            $ModulsGroup->save();
            return "Actualizado";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        ModulsGroup::destroy($id);
        return "Eliminado";
    }
}
