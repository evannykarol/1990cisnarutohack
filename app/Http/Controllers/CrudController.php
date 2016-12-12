<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Crud\Database\Attribute;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Artisan;
use App;
use App\Crud;
use App\Crudtables;
use App\Models\Moduls;
class CrudController extends Controller
{
    public function index()
    {
        return view('template.index');
    }
    public function show()
    {
        $Crud = Crud::get();
        $data = [];
        foreach ($Crud as $Cruds) {
            $data[] = [
                        "title"  => $Cruds->title,
                        "tablename" => $Cruds->tablename,
                        "migration" => $Cruds->migration,
                        "model" => $Cruds->model,
                        "controller" => $Cruds->controller,
                        "views" => $Cruds->views,
                        "modal" => $Cruds->modal,
                      ];
        }
        return response()->json($data);
    } 
    public function create()
    {
        $tables = App\Crud\Database\DatabaseManager::tableNames();
        foreach ($tables as $table) 
        {
            $datatables = Schema::getColumnListing($table);
            unset($datatables[0]);
            $colums[]= [$table=>$datatables];
        }
        return view('template.generatecrud',compact('tables','colums'));
    }
    public function edit()
    {
        $tables = App\Crud\Database\DatabaseManager::tableNames();
        foreach ($tables as $table) 
        {
            $datatables = Schema::getColumnListing($table);
            unset($datatables[0]);
            $colums[]= [$table=>$datatables];
        }
        return view('template.crudedit',compact('tables','colums'));
    }    
    public function store(Request $request, $spec='v')
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




        app()->make('Respuesta')->setRequest($request->json()->all());
        $names = app()->make('NamesGenerate');
        $AppFunction = app()->make('AppFunction');
        // $AppFunction->migration()->model()->controller()->route()->views();
        // $AppFunction->migration();
        // $AppFunction->model();
        // $AppFunction->route();
        // $AppFunction->controller();
        // $AppFunction->views();
        // $paths = app()->make('Path');
        
        
        
        // $Crud = new Crud();
        // $Crud->migration = $paths->migrationPath;
        // $Crud->model = $paths->modelPath();
        // $Crud->controller = $paths->controllerPath();
        // $Crud->views = $paths->dirPath();
        // $Crud->tablename = $names->tableNames();
        // $Crud->title= $names->tableName();
        // $Crud->package = config('crud.config.package');
        // $Crud->save();


        // $data = [
        //         'package'   =>config('crud.config.package'),
        //         'title'     =>$names->tableNameSingle(),
        //         'tablename' =>$names->tableNames(),
        //         'migration' =>null,
        //         'model'     =>null,
        //         'controller'=>null,
        //         'views'     =>null,
        //         'modal'     =>null
        //         ];
        // $id_crud = Crud::insertGetId($data);

        // $collection = $request->json()->all();
        // $collection = collect($collection);
        // $collection = $collection->get('items');
        // $i = 1;
        // foreach ($collection as $datos){
        //     $insertcrud[] = [
        //             'order'=>$i,
        //             'name'=>$datos['column'],
        //             'title'=>$datos['title'], 
        //             'required'=>$datos['Opcion'],
        //             'type'=>$datos['type'],
        //             'id_crud'=>$id_crud
        //             ]; 
        //     $i++;
        // }
        // Crudtables::insert($insertcrud);
        // // return $insertcrud;
        // Artisan::call('migrate');
        // return $request->json()->all();



        $Config = [
                'tableDB'=>$names->tableNames(),
                'Formcolumn'=>1
                ];
        $Formlayout = [
                'column'=>1,
                'title'=>'Grid',
                'format'=>'Grid'
                ];        

        $collection = $request->json()->all();
        $Grid = collect($collection);
        $Grid = $Grid->get('items');
        $i = 1;
        foreach ($Grid as $datos){
            $GridD[] = [
                    'field'=> $datos['column'],
                    'label'=> $datos['column'],
                    'show'=>true,
                    'sortable'=>true,
                    'download'=>true,
                    'sortlist'=>$i
                ]; 
            $i++;
        };
        $Forms = collect($collection);
        $Forms = $Forms->get('items');
        $i = 1;
        foreach ($Forms as $datos){
            $FormsD[] = [
                    'field'=> $datos['column'],
                    'label'=> $datos['column'],
                    'formGroup'=> 1,
                    'required'=> $datos['Opcion'],
                    'type'=> $datos['type'],
                    'sortlist'=>$i
                ]; 
            $i++;
        };


       $datosredes = ['Config'=>$Config, 'Formlayout'=>$Formlayout, 'Grid'=>$GridD, 'Forms'=>$FormsD];
       // return CF_encode_json($datosredes);
       

        $Moduls = new Moduls();
        $Moduls->table_name = $names->tableNames();
        $Moduls->name       = $names->tableName();
        $Moduls->config     = CF_encode_json($datosredes);
        $Moduls->save();
        return response()->json($datosredes);


    }	
	public function getResult($table)
    {
        $attributes = new Attribute($table);
        return $attributes->getAttributes();
    }
}
