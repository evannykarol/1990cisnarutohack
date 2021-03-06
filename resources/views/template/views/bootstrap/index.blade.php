<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2><%strtoupper($names->tableName())%></h2>
        <ol class="breadcrumb">
            <li>
                <a ui-sref="index.main">{{ 'HOME ' | translate }}</a>
            </li>
            <li class="active">
                <strong><%strtoupper($names->tableName())%></strong>
            </li>
        </ol>
    </div>
    <div class="col-lg-2">

    </div>
</div>
<div class="wrapper wrapper-content animated fadeInRight" ng-controller="<%$names->tableName()%>ControllerCrud as showCase">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">

                    <div class="row">
                        <div class="col-sm-6"><h2><b><%$names->tableName()%></b></h2></div>
                        <div class="col-sm-6 text-right"><button class="btn btn-primary" ng-click="add()">{{ 'Create_new' | translate }}</button></div>
                    </div>
                </div>
                <div class="ibox-content">
                 <div class="table-responsive">
                    <table datatable="" dt-options="showCase.dtOptions" dt-columns="showCase.dtColumns" dt-instance="showCase.dtInstance" class="table table-striped table-bordered table-hover dataTables-example" width="100%">
                    </table>
                 </div>
                </div>    
            </div>
        </div>
    </div>
</div>