<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>{{ 'SETTINGS ' | translate }}</h2>
        <ol class="breadcrumb">
            <li>
                <a href="index.html">{{ 'HOME ' | translate }}</a>
            </li>
            <li class="active">
                <strong>{{ 'SETTINGS' | translate }}</strong>
            </li>
        </ol>
    </div>
    <div class="col-lg-2">

    </div>
</div>
<div class="wrapper wrapper-content" ng-controller="SettingsCtrl">
        <div class="row" ng-if="'yes'==load">
            <div class="spiner-example">
                <div class="sk-spinner sk-spinner-chasing-dots">
                    <div class="sk-dot1"></div>
                    <div class="sk-dot2"></div>
                </div>
            </div>
        </div> 
        <div class="row" ng-if="'yes' == view">
        <div class="col-lg-12">
            <div class="tabs-container" >

                <uib-tabset>
                    <uib-tab>
                        <uib-tab-heading>
                            <i class="fa fa-info-circle"></i> {{'General_Settings' | translate}} 
                        </uib-tab-heading>
                        <div class="panel-body">

                        <form  class="form-horizontal" ng-submit="submit()">
                            <div class="row">                            
                             <% csrf_field() %>
                             <div class="col-sm-6">            
                                <div class="form-group">
                                    <label class="col-sm-5 control-label">{{'Application_Name' | translate}}:</label>
                                    <div class="col-sm-7"><input type="text" class="form-control" ng-model='settings.ApplicationName' required></div>
                                </div> 
                                <div class="form-group">
                                    <label class="col-sm-5 control-label">{{'Application_Desc' | translate}}:</label>
                                    <div class="col-sm-7"><input type="text" class="form-control" ng-model='settings.ApplicationDesc' required></div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-5 control-label">{{'Company_Name' | translate}}:</label>
                                    <div class="col-sm-7"><input type="text" class="form-control" ng-model='settings.CompanyName' required></div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-5 control-label">{{'Email_System' | translate}}:</label>
                                    <div class="col-sm-7"><input type="text" class="form-control" ng-model='settings.EmailSystem' required></div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-5 control-label">{{'Main_Language' | translate}}:</label>
                                    <div class="col-sm-7">
                                        <select class="form-control" ng-model='settings.MainLanguaje' required>
                                            <option value="es">español</option>
                                            <option value="en">ingles</option>
                                        </select>
                                    </div>
                                </div>  
                             </div>
                             <div class="col-sm-6">            
                                <div class="form-group">
                                    <label class="col-sm-5 control-label">{{'Date_Format' | translate}}:</label>
                                    <div class="col-sm-7">
                                        <select class="form-control" ng-model='settings.DateFormat' required>
                                        <option value="Y-m-d"> ( Y-m-d ) . {{'Example' | translate}} : 2016-11-23</option>
                                        <option value="Y/m/d"> ( Y/m/d ) . {{'Example' | translate}} : 2016/11/23</option>
                                        <option value="d-m-y"> ( D-M-Y ) . {{'Example' | translate}} : 23-11-16</option>
                                        <option value="d/m/y"> ( D/M/Y ) . {{'Example' | translate}} : 23/11/16</option>
                                        <option value="m-d-y"> ( m-d-Y ) . {{'Example' | translate}} : 11-23-2016</option>
                                        <option value="m/d/y"> ( m/d/Y ) . {{'Example' | translate}} : 11/23/2016</option>
                                        </select>
                                    </div>
                                </div> 
                                <div class="form-group">
                                    <label class="col-sm-5 control-label">{{'Backend_Logo' | translate}}:</label>
                                    <div class="col-sm-7"><input type="file" ng-model='settings.Logotipo'></div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-5 control-label"></label>
                                    <div class="col-sm-7"><img src="img/logos.png"></div>
                                </div>  
                             </div>
                            </div>
                            <div class="row">
                             <div class="col-sm-9 col-sm-offset-3">
                                <button type="submit" class="ladda-button btn btn-success" ladda="btnloading"><i class="fa fa-save"></i> {{ 'SAVE' | translate }}</button>
                             </div> 
                            </div>
                        </form>


                        </div>
                    </uib-tab>
                    <uib-tab>
                        <uib-tab-heading>
                            <i class="fa fa-flag"></i> {{'Translation' | translate}} 
                        </uib-tab-heading>
                        <div class="panel-body">
                            <strong><button type="button" class="btn btn-success"> add</button></strong>                
                        </div>
                    </uib-tab>
                    <uib-tab>
                        <uib-tab-heading>
                            <i class="fa fa-trash"></i>Clear Cache & logs
                        </uib-tab-heading>
                        <div class="panel-body">
                            <strong><button type="button" class="ladda-button btn btn-success" ladda="btnloading" ng-click="Cache()"><i class="fa fa-trash"></i> Clear cache and logs</button></strong>               
                        </div>
                    </uib-tab>
                </uib-tabset>

            </div>
        </div>

    </div>

</div>
