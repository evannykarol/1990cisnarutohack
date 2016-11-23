<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\App;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Producto;
use URL;

/**
 * Class ProductoController.
 *
 * @author  Evanny Karol Hernandez Garcia created at 2016-11-15 06:19:06pm
 * 
 */
class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function index()
    {
        $producto = ['NOMBRE', 'APELLIDO', 'PRUEDAS', 'PRUEDAS'];
        return view('producto.index', compact('producto'));
    }
    public function query()
    {
        $Producto = Producto::get();
        $data = [];
        foreach ($Producto as $Productos) {
            $data[] = [
                        "id"=>$Productos->id,
                        "nombre"=>$Productos->nombre,
                        "precio"=>$Productos->precio,
                        "checar"=>$Productos->checar,
                        "revisar"=>$Productos->revisar
                      ];
        }
        return response()->json($data);
    }
     /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    $data = (object) $request->json()->all();   
            $producto = new producto;
            $producto->nombre = $data->nombre;
            $producto->precio = $data->precio;
            $producto->checar = $data->checar;
            $producto->revisar = $data->revisar;
            $producto->save();
        return "insertado"; 
    }
    public function modal()
    {
        return view('producto.modal');
    } 
    public function edit($id)
    {
        $Producto = Producto::where('id','=',$id)->first();
        $data = [
                "id"=>$Producto->id,
                "nombre"=>$Producto->nombre,
                "precio"=>$Producto->precio,
                "checar"=>$Producto->checar,
                "revisar"=>$Producto->revisar
              ];
        return response()->json($data);
    }        
    public function update($id,Request $request)
    {
    $data = (object) $request->json()->all();   
            $producto = producto::find($id);
            $producto->nombre = $data->nombre;
            $producto->precio = $data->precio;
            $producto->checar = $data->checar;
            $producto->revisar = $data->revisar;
            $producto->save();
        return "Actualizacion"; 
    }
    public function destroy($id)
    {
        $Producto = Producto::findOrfail($id);
        $Producto->delete();
        return "Eliminar";
    }

}
