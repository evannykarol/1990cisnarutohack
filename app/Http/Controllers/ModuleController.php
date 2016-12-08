<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Moduls;
class ModuleController extends Controller
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

    public function querymoduls($id)
    {
        $Modul = Moduls::where('id_moduls_group','=',$id)->get();
        $data = [];
        foreach ($Modul as $Moduls) {
            $data[] = [
                        "id"            => $Moduls->id,
                        "name"          => $Moduls->name,
                        "icon"          => '<i class="'.$Moduls->icon.'"></i>',
                        "is_active"     => $Moduls->is_active
                      ];
        }
        return response()->json($data);
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
    public function showedit()
    {
        return view('template.moduleedit');
    }
    public function edit($id)
    {

    function CF_encode_json($arr) {
      $str = json_encode( $arr );
      $enc = base64_encode($str );
      $enc = strtr( $enc, 'poligamI123456', '123456poligamI');
      return $enc;
    }
    
    function CF_decode_json($str) {
      $dec = strtr( $str , '123456poligamI', 'poligamI123456');
      $dec = base64_decode( $dec );
      $obj = json_decode( $dec ,true);
      return $obj;
    }   
       $cisco =  ['grid'=>
               [[
               'table'=>'holas',
               'field'=>'holas',
               'label'=>'holas',
               
               ],
               [
               'table'=>'holas',
               'field'=>'holas',
               'label'=>'holas',
               
               ]]
       ];
        $Moduls = Moduls::find($id);
        $data = [
                "Name"=>$Moduls->name,
                "Module"=>$Moduls->module,
                "Icon"=>$Moduls->icon,
                "Table_name"=>$Moduls->table_name,
                "Model"=>$Moduls->model,
                "Controller"=>$Moduls->controller,
                "Views"=>$Moduls->views,
                "is_softdelete"=>$Moduls->is_softdelete,
                "id_moduls_group"=>$Moduls->id_moduls_group,
                "Config"=>CF_decode_json($Moduls->config)
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
