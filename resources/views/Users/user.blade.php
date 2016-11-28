<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>{{ 'USER ' | translate }}</h2>
        <ol class="breadcrumb">
            <li>
                <a ui-sref="index.main">{{ 'HOME ' | translate }}</a>
            </li>
            <li class="active">
                <strong>{{ 'USER ' | translate }}</strong>
            </li>
        </ol>
    </div>
    <div class="col-lg-2">

    </div>
</div>
<div class="wrapper wrapper-content">
        <div class="row" ng-if="'yes'==load">
            <div class="spiner-example">
                <div class="sk-spinner sk-spinner-chasing-dots">
                    <div class="sk-dot1"></div>
                    <div class="sk-dot2"></div>
                </div>
            </div>
        </div> 
    <div class="row" ng-if="'yes' == 'yes'">
        <div class="col-lg-12">
            <div class="tabs-container">
                <uib-tabset>
                    <uib-tab>
                        <uib-tab-heading>
                            <i class="fa fa-laptop"></i> {{'USER' | translate}} 
                        </uib-tab-heading>
                        <div class="panel-body" ng-controller="UsersCtrl as showCase">
                            <div class="row">    
                                <button class="btn btn-primary pull-right" ng-click="add()"><i class="fa fa-plus"></i> {{ 'CREATE ' | translate }}</button>
                            </div>
                            <div class="row">
                             <div class="table-responsive">
                                <table datatable="" dt-options="showCase.dtOptions" dt-columns="showCase.dtColumns" dt-instance="showCase.dtInstance" class="table table-striped table-bordered table-hover dataTables-example" width="100%">
                                    <thead>
                                        <tr>
                                            <th>{{ 'ACTIONS' | translate }}</th>
                                            <th>{{ 'PHOTO' | translate }}</th>
                                            <th>{{ 'NAME' | translate }}</th>                            
                                            <th>{{ 'EMAIL' | translate }}</th>  
                                            <th>{{ 'AREA' | translate }}</th>
                                            <th>{{ 'LANGUAJE' | translate }}</th>
                                            <th>{{ 'ROLES' | translate }}</th>                      
                                        </tr>
                                    </thead>
                                </table>
                             </div>
                            </div>    
                        </div>
                    </uib-tab>
                    <uib-tab>
                        <uib-tab-heading>
                            <i class="fa fa-laptop"></i> {{'Roles' | translate}} 
                        </uib-tab-heading>
                        <div class="panel-body" ng-controller="RolesCtrl as showCase">
                            <div class="row">    
                                <button class="btn btn-primary pull-right" ng-click="add()"><i class="fa fa-plus"></i> {{ 'CREATE ' | translate }}</button>
                            </div>
                            <div class="row">
                             <div class="table-responsive">
                                <table datatable="" dt-options="showCase.dtOptions" dt-columns="showCase.dtColumns" dt-instance="showCase.dtInstance" class="table table-striped table-bordered table-hover dataTables-example" width="100%">
                                </table>
                             </div>
                            </div>    
                        </div>
                    </uib-tab>

                </uib-tabset>
            </div>
        </div>
    </div>

</div>




<div id="blueimp-gallery" class="blueimp-gallery">
    <div class="slides"></div>
    <h3 class="title"></h3>
    <a class="prev">‹</a>
    <a class="next">›</a>
    <a class="close">×</a>
    <a class="play-pause"></a>
    <ol class="indicator"></ol>
</div>