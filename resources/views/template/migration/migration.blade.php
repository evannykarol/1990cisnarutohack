use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class <%ucfirst($names->tableNames())%>.
 *
 * @author Evanny k. Hernandez Garcia created at <%date("Y-m-d h:i:sa")%>
 * @link https://github.com/amranidev/scaffold-interface
 */
class <%studly_case(ucfirst($names->tableNames()))%> extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('<%$names->tableNames()%>',function (Blueprint $table){

            $table->increments('id');

    @foreach($dataSystem->dataData('v')[0] as $attr)

        @if($dataSystem->Migrate($attr['type'])=='relationship')
    $table->integer('<%lcfirst(str_singular($attr['column']))%>_id');
            $table->foreign('<%lcfirst(str_singular($attr['column']))%>_id')
            ->references('id')->on('<%$attr['table']%>'){!!$dataSystem->isNullable($attr['Opcion'])!!};
        @else
    $table-><%$dataSystem->Migrate($attr['type'])%>('<%$attr['column']%>'){!!$dataSystem->isNullable($attr['Opcion'])!!};
        @endif
           
    @endforeach


        @if($dataSystem->isTimestamps())

        $table->timestamps();
        @endif

        @if($dataSystem->isSoftdeletes())

        $table->softDeletes();
        @endif

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('<%$names->tableNames()%>');
    }
}
