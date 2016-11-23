<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Profile</h2>
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
    <div class="row animated fadeInRight">
        <div class="col-lg-4">
            <div class="widget-head-color-box navy-bg p-lg text-center">
                <div class="m-b-md">
                    <h2 class="font-bold no-margins">
                        <% Auth::user()->name %>
                    </h2>
                    <small><% Auth::user()->area %></small>
                </div>
                <img src="<% URL::asset('img/perfil/'.Auth::user()->photo) %>" class="img-circle circle-border m-b-md" alt="profile" width="60%">
            </div>
        </div>
        <div class="col-md-8">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>{{ 'INFORMATION ' | translate }}</h5>
                </div>
                <div class="ibox-content">

                    <div>
                        <form  class="form-horizontal" ng-submit="submit()">
                            <div class="row" ng-if="'yes'==loading">
                                <div class="spiner-example">
                                    <div class="sk-spinner sk-spinner-chasing-dots">
                                        <div class="sk-dot1"></div>
                                        <div class="sk-dot2"></div>
                                    </div>
                                </div>
                            </div> 
                            <div class="row" ng-if="'yes'==view">
                             <div class="col-lg-12">            
                                <div class="form-group">
                                    <input type="hidden" ng-model='user.Id'>
                                    <label class="col-sm-3 control-label">{{ 'NAME' | translate }}:</label>
                                    <div class="col-sm-7"><input type="text" class="form-control" ng-model='user.Name' required></div>
                                </div>  
                             </div>
                             <div class="col-lg-12">            
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">{{ 'EMAIL' | translate }}:</label>
                                    <div class="col-sm-7"><input type="text" class="form-control" ng-model='user.Email' required></div>
                                </div>  
                             </div>
                             <div class="col-lg-12">            
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">{{ 'AREA' | translate }}:</label>
                                    <div class="col-sm-7"><input type="text" class="form-control" ng-model='user.Area' required></div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">{{ 'ROLES' | translate }}:</label>
                                    <div class="col-sm-7">
                                        <select class="form-control" ng-model='user.Roles' required>
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
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">{{ 'PASSWORD' | translate }}:</label>
                                    <div class="col-sm-7"><input type="text" class="form-control" ng-model='user.Password'></div>
                                </div>  
                             </div>
                             <div class="col-lg-12 text-right">
                                <button type="submit" class="ladda-button btn btn-primary" ladda="btnloading" data-style="expand-right"><span><i class="fa fa-save"></i> {{ 'SAVE' | translate }}</span></button>
                             </div>
                            </div> 
                        </form>

                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

