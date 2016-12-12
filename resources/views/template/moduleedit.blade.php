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
                                    <div class="col-sm-7"><input type="text" class="form-control" ng-model='module.Name' required></div>
                                </div> 
                                <div class="form-group">
                                    <label class="col-sm-5 control-label">{{'MODULE' | translate}}:</label>
                                    <div class="col-sm-7"><input type="text" class="form-control" ng-model='module.Module' required></div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-5 control-label">{{'CONTROLLER' | translate}}:</label>
                                    <div class="col-sm-7"><input type="text" class="form-control" ng-model='module.Controller' required></div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-5 control-label">{{'TABLE_MASTER' | translate}}:</label>
                                    <div class="col-sm-7"><input type="text" class="form-control" ng-model='module.Table_name' required ng-disabled="true"></div>
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
                            <table class="table table-hover">
                                <thead>
                                    <th>{{'SORT' | translate}}</th>
                                    <th>NO</th>
                                    <th>{{'FIELD' | translate}}</th>
                                    <th style="width:25%">{{'TITLE/CAPTION' | translate}}</th>
                                    <th>{{'SHOW' | translate}}</th>
                                    <th>{{'SORTABLE' | translate}}</th>
                                    <th>{{'DOWNLOAD' | translate}}</th>
                                </thead>
                                <tbody ui-sortable="sortableOptions" ng-model="module.Config.Grid">
                                <tr ng-repeat="data in module.Config.Grid" >
                                    <th><div class="rem btn btn-info handle"><span class="fa fa-sort"></span></div></th>
                                    <td>{{data.sortlist = $index + 1}}</td> 
                                    <td>{{data.field}}</td>
                                    <td><input type="text" ng-model="data.label" class="form-control input-sm"></td>
                                    <td><input icheck type="checkbox" ng-model="data.show"></td>
                                    <td><input icheck type="checkbox" ng-model="data.sortable"></td>
                                    <td><input icheck type="checkbox" ng-model="data.download"></td>
                                </tr>
                                </tbody>
                            </table>
                            <button type="submit" class="btn btn-primary">{{ 'SAVE' | translate }}</button>         
                        </div>
                    </uib-tab>
                    <uib-tab>
                        <uib-tab-heading>
                            <i class="fa fa-indent-increase"></i>{{ 'FORMULARIOS' | translate }}
                        </uib-tab-heading>
                        <div class="panel-body">


                            <uib-tabset>
                             <uib-tab>
                                <uib-tab-heading>
                                    <i class="fa fa-info"></i> {{'Titulos_Formularios' | translate}} 
                                </uib-tab-heading>
                                <table class="table table-hover">
                                    <thead>
                                        <th>NO</th>
                                        <th>{{'FIELD' | translate}}</th>
                                        <th style="width:25%">{{'TITLE/CAPTION' | translate}}</th>
                                        <th>{{'TYPE' | translate}}</th>
                                        <th>{{'REQUIRED' | translate}}</th>
                                    </thead>
                                    <tbody ng-model="module.Config.Forms">
                                    <tr ng-repeat="data in module.Config.Forms">
                                        <td>{{data.sortlist = $index + 1}}</td> 
                                        <td>{{data.field}}</td>
                                        <td><input type="text" ng-model="data.label" class="form-control input-sm"></td>
                                        <td>{{data.type}}</td>
                                        <td><input icheck type="checkbox" ng-model="data.required"></td>
                                    </tr>
                                    </tbody>
                                </table>
                             </uib-tab>
                             <uib-tab>
                                <uib-tab-heading>
                                    <i class="fa fa-info"></i> {{'Formularios_layout' | translate}} 
                                </uib-tab-heading>
                                <select ng-model="module.Config.Formlayout.column" convert-to-number class="form-control">
                                    <option value="1">block 1</option>
                                    <option value="2">block 2</option>
                                    <option value="3">block 3</option>
                                    <option value="4">block 4</option>
                                </select>
                                ########################################################
<!--                                    <div ng-repeat="i in getNumber(module.Config.Formlayout.column) track by $index">
                                    <div ng-if="$index==$index">
                                        Layout {{va = $index + 1}} :
                                         <div ui-sortable="sortableOptions" class="apps-container sortable-list" ng-model="module.Config.Forms">
                                           <div ng-repeat="Form in module.Config.Forms" ng-if="Form.formGroup==va">

                                                <div class="rem btn btn-info handle">
                                                    <span class="fa fa-sort"></span>
                                                </div>
                                                <span>{{Form.label}} ese grupo: {{Form.formGroup}}</span>
  
                                           </div>
                                         </div>
                                    </div>        
                                </div> -->




  <div class="floatleft">
<!--     <div ui-sortable="sortableOptions" class="apps-container screen floatleft sortable-list" ng-model="lista.group1">
      <div class="app" ng-repeat="app in lista.group1">
        <div class="rem btn btn-info handle">
           <span class="fa fa-sort"></span>
        </div>
        {{$index}} {{app.name}}</div>
    </div>
    ···········································
    <div ui-sortable="sortableOptions" class="apps-container screen floatleft sortable-list" ng-model="lista.group2">
      <div class="app" ng-repeat="app in lista.group2">
        <div class="rem btn btn-info handle">
           <span class="fa fa-sort"></span>
        </div>
        {{$index}} {{app.name}} dasd</div>
    </div> -->

                                   <div ng-repeat="i in getNumber(module.Config.Formlayout.column) track by $index">
                                        Layout {{va = $index + 1}} :
                                         <div ui-sortable="sortableOptions" class="apps-container sortable-list" ng-model="lista.group[$index]">
                                           <div ng-repeat="Form in lista.group[$index]">

                                                <div class="rem btn btn-info handle">
                                                    <span class="fa fa-sort"></span>
                                                </div>
                                                <span>{{Form.name}} ese grupo:</span>
  
                                           </div>
                                         </div>       
                                </div>




<!--     <div ui-sortable="sortableOptions" class="apps-container sortable-list" ng-model="lista.group[0]">
      <div class="app" ng-repeat="app in lista.group[0]">
        <div class="rem btn btn-info handle">
           <span class="fa fa-sort"></span>
        </div>
        {{$index}} {{app.name}} dasd</div>
    </div> -->

</div>



                             </uib-tab>                             
                            </uib-tabset>        
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
            <pre ng-bind="lista|json"></pre>
            <!-- <pre ng-bind="module|json"></pre> -->
        </div>
    </div>
</div>


