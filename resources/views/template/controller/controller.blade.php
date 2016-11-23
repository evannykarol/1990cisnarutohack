namespace <%config('crud.config.controllerNameSpace')%>;

use Illuminate\Support\Facades\App;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use <%config('crud.config.modelNameSpace')%>\<%$names->tableName()%>;
use URL;
/**
 * Class <%$names->tableName()%>Controller.
 *
 * @author Evanny Karol Hernandez Garcia created at <%date("Y-m-d h:i:sa")%>
 * 
 */
class <%$names->tableName()%>Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function index()
    {
        return view('<%$names->TableNameSingle()%>.index');
    }
    public function query()
    {
        $<%$names->tableNameSingle()%>  = <%$names->tableName()%>::get();
        $data = [];
        foreach ($<%$names->tableNameSingle()%> as $<%$names->tableNameSingle()%>s) {
            $data[] = [
                        "id"=>$<%$names->tableNameSingle()%>s->id,
                        @foreach($dataSystem->dataData('v')[0] as $attr)
                        "<%$attr['column']%>" => $<%$names->tableNameSingle()%>s-><%$attr['column']%>,
                        @endforeach
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
        $<%$names->tableNameSingle()%> = new <%$names->tableName()%>();

        @foreach($dataSystem->dataData('v')[0] as $attr)
        $<%$names->tableNameSingle()%>-><%$attr['column']%> = $data-><%$attr['column']%>;
        @endforeach
        $<%$names->tableNameSingle()%>->save();
        return "insertado"; 
    }
    public function modal()
    {
        return view('<%$names->TableNameSingle()%>.modal');
    } 
    public function edit($id)
    {
        $<%$names->tableName()%> = <%$names->tableName()%>::where('id','=',$id)->first();
        $data = [
                "id"=>$<%$names->tableName()%>->id,
                @foreach($dataSystem->dataData('v')[0] as $attr)
                 "<%$attr['column']%>" => $<%$names->tableName()%>-><%$attr['column']%>,
                @endforeach
              ];
        return response()->json($data);
    }        
    public function update($id,Request $request)
    {
    $data = (object) $request->json()->all();   
            $<%$names->tableNameSingle()%> = <%$names->tableName()%>::find($id);
            @foreach($dataSystem->dataData('v')[0] as $attr)
            $<%$names->tableNameSingle()%>-><%$attr['column']%> = $data-><%$attr['column']%>;
            @endforeach
            $<%$names->tableNameSingle()%>->save();
        return "Actualizacion"; 
    }
    public function destroy($id)
    {
        $<%$names->tableNameSingle()%> = <%$names->tableName()%>::findOrfail($id);
        $<%$names->tableNameSingle()%>->delete();
        return "Eliminar";
    }


}


