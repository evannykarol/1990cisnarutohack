<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Ticket</h2>
        <ol class="breadcrumb">
            <li>
                <a href="index.html">Inicio</a>
            </li>
            <li class="active">
                <strong>Ticket</strong>
            </li>
        </ol>
    </div>
    <div class="col-lg-2">

    </div>
</div>

<link rel="stylesheet" type="text/css" href="<% URL::asset('css/lobipanel.css') %>">
<div class="panel panel-default">
    <div class="panel-heading">
        <div class="panel-title">
            <h4>Lista Ticket</h4>
        </div>
    </div>
    <div class="panel-body">
        <div class="wrapper wrapper-content animated fadeInRight" ng-controller="datatablesCtrl">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
<!--                         <div class="ibox-title">
                            <h5>Lista Ticket
                            </h5>
                        </div> -->
                        <div class="ibox-content">

                            <table datatable="" dt-options="dtOptions" class="table table-striped table-bordered table-hover dataTables-example">
                                <thead>
                                <tr>
                                    <th>Num Ticket</th>
                                    <th>Asunto</th>
                                    <th>Departamento</th>
                                    <th>Privilegio</th>
                                    <th>Prioridad</th>
                                    <th>Status</th>
                                </tr>
                                </thead>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="<% URL::asset('js/plugins/lobi-plugins/lobipanel.min.js') %>"></script>
<script type="text/javascript">
$( document ).ready(function() {
        $('.panel').lobiPanel({
            close: true,
            editTitle: false
        });
    });
</script>