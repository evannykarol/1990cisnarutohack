<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Modulo</h2>
        <ol class="breadcrumb">
            <li>
                <a ui-sref="index.main">{{ 'HOME ' | translate }}</a>
            </li>
            <li ui-sref="index.crud">
                <a ui-sref="index.module_generator">{{ 'MODULE' | translate }}</a>                
            </li>
            <li class="active">
                <strong>{{ 'EDIT_MODULE' | translate }}</strong>
            </li>
        </ol>
    </div>
    <div class="col-lg-2">

    </div>
</div>
<div class="wrapper wrapper-content" ng-controller="EditModulsCtrl">
    <div class="row">
        <div class="col-lg-12">
            <div class="tabs-container">

                <uib-tabset>
                    <uib-tab>
                        <uib-tab-heading>
                            <i class="fa fa-info"></i> {{'Info' | translate}} 
                        </uib-tab-heading>
                        <div class="panel-body" ng-if="'yes' == 'yes'">

                        <form  class="form-horizontal" ng-submit="submit()">
                            <div class="row">                            
                             <% csrf_field() %>
                             <div class="col-lg-8">            
                                <div class="form-group">
                                    <label class="col-sm-5 control-label">{{'NAME' | translate}}:</label>
                                    <div class="col-sm-7"><input type="text" class="form-control" ng-model='Info.Name' required></div>
                                </div> 
                                <div class="form-group">
                                    <label class="col-sm-5 control-label">{{'MODULE' | translate}}:</label>
                                    <div class="col-sm-7"><input type="text" class="form-control" ng-model='Info.Module' required></div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-5 control-label">{{'CLASS_CONTROLLER' | translate}}:</label>
                                    <div class="col-sm-7"><input type="text" class="form-control" ng-model='Info.Controller' required></div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-5 control-label">{{'TABLE_MASTER' | translate}}:</label>
                                    <div class="col-sm-7"><input type="text" class="form-control" ng-model='Info.Tabla' required></div>
                                </div>
                             </div>
                            </div>

                            <div class="row">
                             <div class="col-lg-8">
                                <button type="submit" class="btn btn-primary">{{ 'SAVE' | translate }}</button>
                             </div> 
                            </div>
                        </form>


                        </div>
                    </uib-tab>
                    <uib-tab>
                        <uib-tab-heading>
                            <i class="fa fa-table"></i> {{'TABLE' | translate}} 
                        </uib-tab-heading>
                        <div class="panel-body">
                            Aqui muestra la tablas               
                        </div>
                    </uib-tab>
                    <uib-tab>
                        <uib-tab-heading>
                            <i class="fa fa-indent-increase"></i>Formularios
                        </uib-tab-heading>
                        <div class="panel-body">
                            Aqui editar formularios usar 4 columnas              
                        </div>
                    </uib-tab>
                    <uib-tab>
                        <uib-tab-heading>
                            <i class="fa fa-code"></i>CODE
                        </uib-tab-heading>
                        <div class="panel-body">
                            aqui permiso la lista crudpermission tablas             
                        </div>
                    </uib-tab>                   
                </uib-tabset>

            </div>
        </div>
    </div>
</div>


