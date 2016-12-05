<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>{{ 'PROFILE ' | translate }}</h2>
        <ol class="breadcrumb">
            <li>
                <a ui-sref="index.main">{{ 'HOME ' | translate }}</a>
            </li>
            <li class="active">
                <strong>{{ 'PROFILE ' | translate }}</strong>
            </li>
        </ol>
    </div>
    <div class="col-lg-2">

    </div>
</div>
<div class="wrapper wrapper-content" ng-controller="PerfilCtrl">
    <div class="row" ng-if="'yes'==loading">
        <div class="spiner-example">
            <div class="sk-spinner sk-spinner-chasing-dots">
                <div class="sk-dot1"></div>
                <div class="sk-dot2"></div>
            </div>
        </div>
    </div>
    <div class="row animated fadeInRight"  ng-if="'yes'==view">
        <div class="col-md-4">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Detalle Perfil</h5>
                </div>
                <div>
                    <div class="ibox-content no-padding border-left-right">
                        <img alt="image" class="img-responsive" ng-url="<% URL::asset('img/perfil/{{Photo}}') %>">
                    </div>
                    <div class="ibox-content profile-content">
                        <h4><strong>{{Name}}</strong></h4>

                        <p><i class="fa fa-map-marker"></i> Ubicacion en {{location}}</p>
                        <h5>
                            About me
                        </h5>

                        <p>
                            Soy guapo ser dearrolllo web
                        </p>

                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="ibox float-e-margins">
                <div class="ibox-content">
                    <div class="tabs-container">
                        <uib-tabset>
                            <uib-tab>
                                <uib-tab-heading>
                                    <i class="fa fa-user"></i> {{'INFORMATION' | translate}} 
                                </uib-tab-heading>
                                <form  class="form-horizontal" ng-submit="submit()">
                                 <br>                             
                                 <div class="row">
                                    <div class="col-lg-12">
                                        <input type="hidden" ng-model='user.Id'>            
                                     <div class="form-group">                                    
                                        <label class="col-sm-3 control-label">{{ 'USER' | translate }}:</label>
                                        <div class="col-sm-7"><input type="text" class="form-control" ng-model='user.User' required></div>
                                     </div>  
                                     <div class="form-group">                                    
                                        <label class="col-sm-3 control-label">{{ 'NAME' | translate }}:</label>
                                        <div class="col-sm-7"><input type="text" class="form-control" ng-model='user.Name' required></div>
                                     </div>
                                     <div class="form-group">                                    
                                        <label class="col-sm-3 control-label">{{ 'FIRST_NAME' | translate }}:</label>
                                        <div class="col-sm-7"><input type="text" class="form-control" ng-model='user.FirstName' required></div>
                                     </div>         
                                     <div class="form-group">
                                        <label class="col-sm-3 control-label">{{ 'EMAIL' | translate }}:</label>
                                        <div class="col-sm-7"><input type="text" class="form-control" ng-model='user.Email' required></div>
                                     </div>            
                                     <div class="form-group">
                                        <label class="col-sm-3 control-label">{{ 'AREA' | translate }}:</label>
                                        <div class="col-sm-7"><input type="text" class="form-control" ng-model='user.Area' required></div>
                                     </div>
                                     <div class="form-group">
                                        <label class="col-sm-3 control-label">{{ 'ROLES' | translate }}:</label>
                                        <div class="col-sm-7">
                                            <select class="form-control" ng-model='user.Roles' convert-to-number required>
                                                <option value="1">Administrador</option>
                                                <option value="2">ingles</option>
                                            </select>
                                        </div>
                                     </div>
                                     <div class="form-group">
                                        <label class="col-sm-3 control-label">{{'LANGUAJE' | translate}}:</label>
                                        <div class="col-sm-7">
                                            <select class="form-control" ng-model='user.Language' required>
                                                <option value="es">español</option>
                                                <option value="en">ingles</option>
                                            </select>
                                        </div>
                                     </div>  
                                    </div>
                                    <div class="col-lg-9 col-lg-offset-3">
                                        <button type="submit" class="ladda-button btn btn-primary" ladda="btnloading" data-style="expand-right"><span><i class="fa fa-save"></i> {{ 'SAVE' | translate }}</span></button>
                                    </div>
                                 </div> 
                                </form>
                            </uib-tab>
                            <uib-tab>
                                <uib-tab-heading>
                                    <i class="fa fa-lock"></i> Cambio de Contraseña
                                </uib-tab-heading>
                                <form  class="form-horizontal" ng-submit="submit()">
                                 <br>                             
                                 <div class="row">
                                    <div class="col-lg-12">
                                     <input type="hidden" ng-model='user.Id'>          
                                     <div class="form-group">
                                        <label class="col-sm-3 control-label">{{ 'PASSWORD' | translate }}:</label>
                                        <div class="col-sm-7"><input type="text" class="form-control" ng-model='user.Password'></div>
                                     </div>
                                     <div class="form-group">
                                        <label class="col-sm-3 control-label">{{ 'PASSWORD' | translate }}:</label>
                                        <div class="col-sm-7"><input type="text" class="form-control" ng-model='user.Password'></div>
                                     </div>
                                     <div class="form-group">
                                        <label class="col-sm-3 control-label">{{ 'PASSWORD' | translate }}:</label>
                                        <div class="col-sm-7"><input type="text" class="form-control" ng-model='user.Password'></div>
                                     </div>  
                                     </div>
                                     <div class="col-lg-9 col-lg-offset-3">
                                        <button type="submit" class="ladda-button btn btn-primary" ladda="btnloading" data-style="expand-right"><span><i class="fa fa-save"></i> {{ 'SAVE' | translate }}</span></button>
                                     </div>
                                 </div> 
                                </form>
                            </uib-tab>
                        </uib-tabset>
                    </div>
                </div>                  
            </div>
        </div>
    </div>
</div>