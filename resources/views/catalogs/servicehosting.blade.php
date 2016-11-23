<div class="wrapper wrapper-content animated fadeInRight" ng-controller="ServicehostingCtrl as showCase">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>{{ 'SERVICEHOSTING' | translate }}
                    </h5>
                </div>
                <div class="ibox-content">

                    <table datatable="" dt-options="showCase.dtOptions" dt-columns="showCase.dtColumns" dt-instance="showCase.dtInstance" class="table table-striped table-bordered table-hover dataTables-example">
                        <thead>
                        <tr>
                            <th>{{ 'ACTION' | translate }}</th> 
                            <th>{{ 'ADMINISTRATOR' | translate }}</th>                            
                            <th>{{ 'USER' | translate }}</th>
                            <th>{{ 'PASSWORD' | translate }}</th>
                        </tr>
                        </thead>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>