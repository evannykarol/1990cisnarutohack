<div class="wrapper wrapper-content animated fadeInRight" >
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Correo Electrónico
                    </h5>
                </div>
                <div class="ibox-content" ng-controller="emailCtrl as showCase">
                 <div class="table-responsive">
                    <table datatable="" dt-options="showCase.dtOptions" dt-columns="showCase.dtColumns" dt-instance="showCase.dtInstance" class="table table-striped table-bordered table-hover dataTables-example" width="100%">
                        <thead>
                            <tr>
                                <td>{{ 'USER' | translate }}</td>
                                <td>{{ 'EMAIL' | translate }}</td>
                                <td>{{ 'PASSWORD' | translate }}</td>
                                <td>{{ 'ACTIONS' | translate }}</td>
                            </tr>
                        </thead>
                    </table>
                 </div>
                </div>
            </div>
        </div>
    </div>
</div>