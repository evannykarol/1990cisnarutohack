<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>{{ 'TICKET_SYSTEM ' | translate }}</h2>
        <ol class="breadcrumb">
            <li>
                <a ui-sref="index.main">{{ 'HOME ' | translate }}</a>
            </li>
            <li class="active">
                <strong>{{ 'TICKET_SYSTEM ' | translate }}</strong>
            </li>
        </ol>
    </div>
    <div class="col-lg-2">
    </div>
</div>
<div class="wrapper wrapper-content animated fadeInRight" ng-controller="TicketCtrl as showCase">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <div class="row">
                        <div class="col-sm-12"><h><b>{{ 'TICKET_SYSTEM ' | translate }}
                        <button class="btn btn-primary pull-right" ng-click="add()"><i class="fa fa-plus"></i> {{ 'CREATE ' | translate }}</button></b></h2>
                        </div>
                    </div>
                </div>
                <div class="ibox-content">
                 <div class="table-responsive">
                    <table datatable="" dt-options="showCase.dtOptions" dt-columns="showCase.dtColumns" dt-instance="showCase.dtInstance" class="table table-striped table-bordered table-hover dataTables-example" width="100%">
                     <thead>
                        <tr>
                            <td>{{ 'ACTION' | translate }}</td>
                            <td class="text-center">{{ 'TITLE' | translate }}</td>
                            <td class="text-center">{{ 'DEPARTMENT' | translate }}</td>
                            <td class="text-center">{{ 'USER' | translate }}</td>
                            <td class="text-center">{{ 'ASSIGNED' | translate }}</td>
                            <td class="text-center">{{ 'TYPE' | translate }}</td>
                            <td class="text-center">{{ 'PRIORITY' | translate }}</td>
                            <td class="text-center">{{ 'STATUS' | translate }}</td>
                            <td class="text-center">{{ 'LAST_MODIFICATION' | translate }}</td>
                        </tr>
                     </thead>                        
                    </table>
                 </div>
                </div>    
            </div>
        </div>
    </div>
</div>