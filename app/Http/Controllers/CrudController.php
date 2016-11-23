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
        app()->make('Respuesta')->setRequest($request->json()->all());
        $names = app()->make('NamesGenerate');
        $AppFunction = app()->make('AppFunction');
        // $AppFunction->migration()->model()->controller()->route()->views();
        $AppFunction->migration();
        $AppFunction->model();
        // $AppFunction->route();
        $AppFunction->controller();
        $AppFunction->views();
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


        $data = [
                'package'   =>config('crud.config.package'),
                'title'     =>$names->tableNameSingle(),
                'tablename' =>$names->tableNames(),
                'migration' =>null,
                'model'     =>null,
                'controller'=>null,
                'views'     =>null,
                'modal'     =>null
                ];
        $id_crud = Crud::insertGetId($data);

        $collection = $request->json()->all();
        $collection = collect($collection);
        $collection = $collection->get('items');
        $i = 1;
        foreach ($collection as $datos){
            $insertcrud[] = [
                    'order'=>$i,
                    'name'=>$datos['column'],
                    'title'=>$datos['title'], 
                    'required'=>$datos['Opcion'],
                    'type'=>$datos['type'],
                    'id_crud'=>$id_crud
                    ]; 
            $i++;
        }
        Crudtables::insert($insertcrud);
        // return $insertcrud;
        Artisan::call('migrate');
        return $request->json()->all();
    }	
	public function getResult($table)
    {
        $attributes = new Attribute($table);
        return $attributes->getAttributes();
    }
}
