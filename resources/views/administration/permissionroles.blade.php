<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>{{ 'ROLES ' | translate }}</h2>
        <ol class="breadcrumb">
            <li>
                <a href="index.html">{{ 'HOME ' | translate }}</a>
            </li>
            <li>
                <a href="index.roles">{{ 'ROLES ' | translate }}</a>
            </li>
            <li class="active">
                <strong>{{ 'PERMISION_ROLES' | translate }}</strong>
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
	                            <i class="fa fa-laptop"></i> {{'Permision_Catalogs' | translate}} 
	                        </uib-tab-heading>
	                        <div class="panel-body">
	                        	lista permiso para esta relaccionado   catalogos
	                        </div>
	                    </uib-tab>
	                    <uib-tab>
	                        <uib-tab-heading>
	                            <i class="fa fa-laptop"></i> {{'Permision_CRUD' | translate}} 
	                        </uib-tab-heading>
	                        <div class="panel-body">
	                            lista permiso para esta relaccionado  CRUD             
	                        </div>
	                    </uib-tab>
	                </uib-tabset>
	            </div>
	        </div>
    	</div>
</div>

