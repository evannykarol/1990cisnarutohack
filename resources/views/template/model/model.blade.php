namespace <%config('crud.config.modelNameSpace')%>;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class <%$names->tableName()%>.
 *
 * @author Evanny karol Hernandez Garcia created at <%date("Y-m-d h:i:sa")%>
 * 
 */
class <%$names->tableName()%> extends Model
{
	@if($dataSystem->isSoftdeletes())

	use SoftDeletes;

	protected $dates = ['deleted_at'];
    @endif

	@if(!$dataSystem->isTimestamps())

    public $timestamps = false;
    @endif

    protected $table = '<%$names->tableNames()%>';

	@foreach($dataSystem->getForeignKeys() as $key)

	public function <%lcfirst(str_singular($key))%>()
	{
		return $this->belongsTo('<%config('crud.config.modelNameSpace')%>\<%ucfirst(str_singular($key))%>','<%lcfirst(str_singular($key))%>_id');
	}

	@endforeach

}
