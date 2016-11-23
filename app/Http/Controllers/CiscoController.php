<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\App;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Cisco;
use URL;
/**
 * Class CiscoController.
 *
 * @author  Evanny Karol Hernandez Garcia created at 2016-11-22 01:27:17pm
 * 
 */
class CiscoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return    \Illuminate\Http\Response
     */
    public function index()
    {
        return view('cisco.index');
    }
    public function query()
    {
        $cisco  = Cisco::get();
        $data = [];
        foreach ($cisco as $ciscos) {
            $data[] = [
                        "id"=>$ciscos->id,
                                                "nombre" => $ciscos->nombre,
                                                "correo" => $ciscos->correo,
                                                "telefono" => $ciscos->telefono,
                                              ];
        }
        return response()->json($data);
    }
     /**
     * Store a newly created resource in storage.
     *
     * @param    \Illuminate\Http\Request  $request
     * @return  \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = (object) $request->json()->all();
        $cisco = new Cisco();

                $cisco->nombre = $data->nombre;
                $cisco->correo = $data->correo;
                $cisco->telefono = $data->telefono;
                $cisco->save();
        return "insertado"; 
    }
    public function modal()
    {
        return view('cisco.modal');
    } 
    public function edit($id)
    {
        $Cisco = Cisco::where('id','=',$id)->first();
        $data = [
                "id"=>$Cisco->id,
                                 "nombre" => $Cisco->nombre,
                                 "correo" => $Cisco->correo,
                                 "telefono" => $Cisco->telefono,
                              ];
        return response()->json($data);
    }        
    public function update($id,Request $request)
    {
    $data = (object) $request->json()->all();   
            $cisco = Cisco::find($id);
                        $cisco->nombre = $data->nombre;
                        $cisco->correo = $data->correo;
                        $cisco->telefono = $data->telefono;
                        $cisco->save();
        return "Actualizacion"; 
    }
    public function destroy($id)
    {
        $cisco = Cisco::findOrfail($id);
        $cisco->delete();
        return "Eliminar";
    }


}


