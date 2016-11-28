<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>{{ 'PERMISIONUSER ' | translate }}</h2>
        <ol class="breadcrumb">
            <li>
                <a ui-sref="index.main">{{ 'HOME ' | translate }}</a>
            </li>
            <li>
                <a ui-sref="index.user">{{ 'USER ' | translate }}</a>
            </li>
            <li class="active">
                <strong>{{ 'PERMISIONUSER ' | translate }}</strong>
            </li>
        </ol>
    </div>
    <div class="col-lg-2">
    </div>
</div>
<div class="wrapper wrapper-content animated fadeInRight" ng-controller="PermissionCtrl as showCase">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>{{ 'PERMISIONUSER' | translate }}
                    </h5>
                </div>
                <div class="ibox-content">

                    <table datatable="" dt-options="showCase.dtOptions" dt-columns="showCase.dtColumns" dt-instance="showCase.dtInstance" class="table table-striped table-bordered table-hover dataTables-example" width="100%">
                        <thead>
                        <tr>
                            <th>{{ 'ACTION' | translate }}</th> 
                            <th>{{ 'CATALOG' | translate }}</th>                            
                            <th>{{ 'VIEW' | translate }}</th>
                            <th>{{ 'CREATE' | translate }}</th>
                            <th>{{ 'MODIFY' | translate }}</th>
                            <th>{{ 'REMOVE' | translate }}</th>
                        </tr>
                        </thead>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>