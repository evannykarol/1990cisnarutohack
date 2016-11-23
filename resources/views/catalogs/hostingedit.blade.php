<div class="wrapper wrapper-content animated fadeInRight">

<div class="panel panel-default">
    <div class="panel-heading">
        <div class="panel-title">
            <h4>DETALLE HOSTING</h4>
        </div>
    </div>
    <div class="panel-body">

    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-content">
                    <form method="get" class="form-horizontal">
                        <div class="form-group">
                        	<label class="col-sm-1 control-label">{{ 'NAME' | translate }}</label>
                            <div class="col-sm-3"><input type="text" class="form-control"></div>
                            <label class="col-sm-2 control-label">Fecha Inicio</label>
                            <div class="col-sm-2"><input type="text" class="form-control"></div>
                            <label class="col-sm-2 control-label">Fecha Fin</label>
                            <div class="col-sm-2"><input type="text" class="form-control"></div>
                        </div>	
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="tabs-container">
                <uib-tabset>
                    <uib-tab>
                    	<uib-tab-heading>
                            <i class="fa fa-database"></i> CONTROL
                        </uib-tab-heading>
                        <div class="panel-body">
							<div class="wrapper wrapper-content animated fadeInRight" ng-controller="hostinguserCtrl">
							    <div class="row">
							        <div class="col-lg-12">
							            <div class="ibox float-e-margins">
											<div summernote class="summernote"  height="300">
						                    </div>
							            </div>
							        </div>
							    </div>
							</div>
                        </div>
                    </uib-tab>
                    <uib-tab>
                    	<uib-tab-heading>
                            <i class="fa fa-database"></i> {{ 'ACCESS_REMOTE' | translate }}
                        </uib-tab-heading>
                        <div class="panel-body">
							<div class="wrapper wrapper-content animated fadeInRight" ng-controller="AccessRemoteCtrl as showCase">
							    <div class="row">
							        <div class="col-lg-12">
							            <div class="ibox float-e-margins">
						                    <table datatable="" dt-options="showCase.dtOptions" dt-columns="showCase.dtColumns" dt-instance="showCase.dtInstance" class="table table-striped table-bordered table-hover dataTables-example" width="100%">    
						                        <thead>
							                        <tr>
							                            <th>{{ 'USER' | translate }}</th>                            
							                            <th>{{ 'PASSWORD' | translate }}</th>
							                            <th>{{ 'ASSIGNED' | translate }}</th>
							                            <th>{{ 'PERMISION' | translate }}</th>
							                            <th>{{ 'AREA' | translate }}</th>
							                            <th>{{ 'ACTIONS' | translate }}</th>
							                        </tr>
						                        </thead>
						                    </table>
							            </div>
							        </div>
							    </div>
							</div>
                        </div>
                    </uib-tab>
                    <uib-tab>
                    	<uib-tab-heading>
                            <i class="fa fa-database"></i> DOMINIOS Y SUBDOMINIOS
                        </uib-tab-heading>
                        <div class="panel-body">
							<div class="wrapper wrapper-content animated fadeInRight" ng-controller="hostinguserCtrl">
							    <div class="row">
							        <div class="col-lg-12">
							            <div class="ibox float-e-margins">

							                    <table datatable="" dt-options="dtOptions" class="table table-striped table-bordered table-hover dataTables-example">
							                        <thead>
							                        <tr>
							                            <th>{{ 'NAME' | translate }}</th>                            
							                            <th>BASES DE DATOS</th>
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
                    </uib-tab>
                    <uib-tab>
                    	<uib-tab-heading>
                            <i class="fa fa-database"></i> FTP
                        </uib-tab-heading>
                        <div class="panel-body">
							<div class="wrapper wrapper-content animated fadeInRight" ng-controller="hostinguserCtrl">
							    <div class="row">
							        <div class="col-lg-12">
							            <div class="ibox float-e-margins">
						                    <table datatable="" dt-options="dtOptions" class="table table-striped table-bordered table-hover dataTables-example">
						                        <thead>
						                        <tr>
						                            <th>NOMBRE FTP</th>                            
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
                    </uib-tab>
                    <uib-tab>
                    	<uib-tab-heading>
                            <i class="fa fa-database"></i> PUERTOS ABIERTOS
                        </uib-tab-heading>
                        <div class="panel-body">
							<div class="wrapper wrapper-content animated fadeInRight" ng-controller="hostinguserCtrl">
							    <div class="row">
							        <div class="col-lg-12">
							            <div class="ibox float-e-margins">
						                    <table datatable="" dt-options="dtOptions" class="table table-striped table-bordered table-hover dataTables-example">
						                        <thead>
						                        <tr>
						                            <th>APLICACIÓN</th>                            
						                            <th>PUERTO</th>
						                            <th>SOLICITÓ</th>
						                        </tr>
						                        </thead>
						                    </table>
							            </div>
							        </div>
							    </div>
							</div>
                        </div>
                    </uib-tab>
                </uib-tabset>
            </div>
        </div>
    </div>


    </div>
</div>
</div>
