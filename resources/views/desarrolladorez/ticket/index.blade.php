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
                        <div class="col-sm-1">
                            <h><b>{{ 'STATUS ' | translate }}:</b></h2>           
                        </div>
                        <div class="col-sm-2">
                            <select ng-model="OptionStatus" ng-change="statusoption(OptionStatus)" convert-to-number class="form-control input-sm">
                                <option value="1">{{ 'New' | translate }}</option>
                                <option value="2">{{ 'Wait' | translate }}</option>
                                <option value="3">{{ 'Resolved' | translate }}</option>
                                <option value="4">{{ 'Close' | translate }}</option>
                            </select>
                        </div>
                        <div class="col-sm-9">
                            <button class="btn btn-primary pull-right" ng-click="add()"><i class="fa fa-plus"></i> {{ 'CREATE ' | translate }}</button>
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