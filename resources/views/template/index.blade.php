<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>{{ 'CRUD ' | translate }}</h2>
        <ol class="breadcrumb">
            <li>
                <a ui-sref="index.main">{{ 'HOME ' | translate }}</a>
            </li>
            <li>
                <a ui-sref="index.module_generator">{{ 'Module_Generator ' | translate }}</a>
            </li>
            <li class="active">
                <strong>{{ 'MODULE ' | translate }}</strong>
            </li>
        </ol>
    </div>
    <div class="col-lg-2">
    </div>
</div>
<div class="wrapper wrapper-content animated fadeInRight" ng-controller="ListModulsCtrl as showCase">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <div class="row">
                        <div class="col-sm-12"><h2><b>{{ 'MODULE ' | translate }}
                        <button class="btn btn-primary pull-right" ng-click="add(Paramsid)"><i class="fa fa-plus"></i> {{ 'CREATE ' | translate }}</button></b></h2>
                        </div>
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