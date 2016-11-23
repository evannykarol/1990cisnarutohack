<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Roles;
class AdministrationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function roles()
    {
        return view('administration.roles');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function showroles()
    {
        $Roles = Roles::get();
        $data = [];
        foreach ($Roles as $Role) {
            $data[] = [
                        "Id"=>$Role->id,
                        "Name"=>$Role->name,
                        "Create"=>$Role->created_at,
                        "Update"=>$Role->updated_at,
                      ];
        }
        return response()->json($data);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function modalroles()
    {
        return view('administration.modalroles');
    }             
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editroles($id)
    {
        $Roles = Roles::where('id','=',$id)->first();
        $data = [
                "Id"=>$Roles->id,
                "Name"=>$Roles->name,
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
    public function updateroles(Request $request, $id)
    {
            $data = (object) $request->json()->all();   
            $Roles = Roles::find($id);
            $Roles->name = $data->Name;
            $Roles->save();
        return "Actualizacion"; 
    }    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
