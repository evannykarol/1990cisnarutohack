<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>CREAR CRUD</h2>
        <ol class="breadcrumb">
            <li>
                <a ui-sref="index.main">{{ 'HOME ' | translate }}</a>
            </li>
            <li>
                <a ui-sref="index.module_generator">{{ 'Module_Generator ' | translate }}</a>
            </li>
            <li>
                <a ui-sref="index.Edit_module_generator({ qId: 1})">{{ 'CRUD ' | translate }}</a>
            </li>
            <li class="active">
                <strong>{{ 'CREATE_NEW_CRUD' | translate }}</strong>
            </li>
        </ol>
    </div>
    <div class="col-lg-2">

    </div>
</div>
<div class="wrapper wrapper-content animated fadeInRight" ng-controller='CrudCtrl'>
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <div class="row">
                        <div class="col-sm-6"><h2><b>{{ 'CREATE_NEW_CRUD' | translate }}</b></h2></div>                        
                    </div>    
                </div>
                <div class="ibox-content">
                    <form method="post" class="form-horizontal" ng-submit="submit()">
                        <% csrf_field() %>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">{{ 'NAMEOFTABLE' | translate }}</label>
                            <div class="col-sm-5"><input type="text" class="form-control" ng-model="generate.TableName" required="true"></div>
                            <div class="col-sm-5">
                                <select class="form-control m-b" name="view" required="true">
                                    <option value="normal">Normal</option>
                                    <option value="modal">Modal</option>
                                </select>
                            </div>
                            <input type="hidden" class="form-control" ng-model="generate.template" value="boostrap">
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">{{ 'CONFIGURATION' | translate }}<br/></label>
                            <div class="col-sm-6">
                                <div><label> <input icheck type="checkbox" ng-model="generate.timestamps['on']">
                                    TIMESTAMPS </label></div>
                                <div><label> <input icheck type="checkbox" ng-model="generate.softdeletes['on']">
                                    SOFT DELETES </label></div>
                            </div>
                            <div class="col-sm-4 text-right"><button type="button" class="btn btn-primary" ng-click="increment()">{{ 'ADD_ONE_MORE_FIELD' | translate }}</button></div>
                        </div>

                        <div class="hr-line-dashed"></div>
                        <div ui-sortable="sortableOptions"  ng-model="generate.items">                            
                        <div ng-repeat="item in generate.items" >
                            <div class="form-group animated fadeInRight" ng-model="item.id">
                             <div class="row">   
                                <div class="col-sm-3">
                                    <div class="row">
                                        <div class="col-sm-2"><div class="rem btn btn-info handle"><span class="fa fa-arrows"></span></div></div>
                                        <div class="col-sm-10">                                    
                                        <select class="form-control m-b" ng-model="item.type" required>
                                            <option value="text">{{ 'TEXT_FIELD' | translate }}</option>
                                            <option value="email">{{ 'EMAIL_FIELD' | translate }}</option>
                                            <option value="textarea">{{ 'LONG_TEXT_FIELD' | translate }}</option>
                                            <option value="radio">{{ 'RADIO' | translate }}</option>
                                            <option value="checkbox">{{ 'CHECKBOX' | translate }}</option>
                                            <option value="date">{{ 'DATE' | translate }}</option>
                                            <option value="datetime">{{ 'DATETIME' | translate }}</option>
                                            <option value="file">{{ 'FILE_FIELD' | translate }}</option>
                                            <option value="relationship">{{ 'RELATIONSHIP' | translate }}</option>                                            
                                        </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control" ng-model="item.column" placeholder="{{ 'FIELDDBNAME' | translate }}" required="true">
                                </div>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control" ng-model="item.title" placeholder="{{ 'FIELDVISUALTITLE' | translate }}" required="true">
                                </div> 
                                <div class="col-sm-3">
                                    <div class="row">
                                        <div class="col-sm-10">
                                        <select class="form-control m-b" ng-model="item.Opcion" required>
                                            <option value="optional">{{ 'OPTIONAL' | translate }}</option>
                                            <option value="required">{{ 'REQUIRED' | translate }}</option>
                                            <option value="required|unique">{{ 'REQUIREDUNIQUE' | translate }}</option>
                                        </select>
                                        </div>
                                        <div class="col-sm-2">
                                            <button type="button" ng-click="remove(item.id)" class="rem btn btn-danger"><span class="fa fa-times"></span></button>
                                        </div>
                                    </div>
                                </div>
                             </div>                               
                            </div>
                            <div class="row" ng-if="item.type == 'relationship'">
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">{{ 'TABLES' | translate }}</label>
                                    <div class="col-sm-3">
                                        <select class="form-control m-b"  ng-model="item.table" required>
                                            <option value="">{{ 'CHOOSE_YOUR_TABLE' | translate }}</option> 
                                            @foreach($tables as $table)
                                            <option value="<% $table %>"><%$table %></option>                                    
                                            @endforeach
                                        </select>
                                    </div>
                                    <label class="col-sm-2 control-label" ng-if="item.table">{{ 'NAME_COLUM' | translate }}</label>
                                    <div class="col-sm-3">
                                        <?php $i= 0;?>
                                        @foreach($tables as $key => $table)
                                            <select class="form-control m-b" ng-if="'<%$table%>'==item.table" ng-model="item.tcolumn" required>
                                                    <option value="">{{ 'CHOOSE_YOUR_OPTION' | translate }}</option>     
                                                @foreach($colums[$i][$table] as $colum)                                  
                                                    <option value="<%$colum%>"><%$colum%></option>                             
                                                @endforeach
                                            </select>
                                            <?php $i++; ?>
                                        @endforeach
                                    </div>
                                </div>                            
                            </div>
                        </div>
                        <!-- <pre ng-bind="generate.items|json"></pre> -->
                        </div>
                        <div class="hr-line-dashed"></div>
                        <button type="submit" class="ladda-button btn btn-primary" ladda="btnload" data-style="expand-right"><span><i class="fa fa-save"></i> {{ 'SAVE' | translate }}</span></button>
                     </form>
                </div>
                
                    
            </div>
        </div>  
    </div>
</div>




<!-- 
<div class='container-fluid'>
  <div class='row'>
    <div class='col-xs-6'>
      <div id='sortables'>
        <div class='sortable-container'>
          <ul class='sortable'>
            <li>sortable 1</li>
            <li>sortable 2</li>
            <li>sortable 3</li>
            <li>sortable 4</li>
            <li>sortable 5</li>
            <li>sortable 6</li>
          </ul>
        </div>
        <div class='sortable-container'>
          <ul class='sortable'>
            <li>sortable 1</li>
            <li>sortable 2</li>
            <li>sortable 3</li>
            <li>sortable 4</li>
            <li>sortable 5</li>
            <li>sortable 6</li>
          </ul>
        </div>
        <div class='sortable-container'>
          <ul class='sortable'>
            <li>sortable 1</li>
            <li>sortable 2</li>
            <li>sortable 3</li>
            <li>sortable 4</li>
            <li>sortable 5</li>
            <li>sortable 6</li>
          </ul>
        </div>
      </div>
    </div>

    <div class='col-xs-6'>
      <ul id='draggables'>
        <li class='draggable'>draggable 1</li>
        <li class='draggable'>draggable 2</li>
        <li class='draggable'>draggable 3</li>
      </ul>
    </div>
  </div>
</div> -->



  <script>
        // $(function () {
        //     $('.sortable').sortable({
        //       connectWith: '.sortable',
        //       revert: 0,
        //       forcePlaceholderSize: true,
        //       placeholder: 'ui-sortable-placeholder',
        //       tolerance: 'pointer'
        //     }).disableSelection();

        //     $('.draggable').draggable({
        //       connectToSortable: '.sortable',
        //       helper: 'clone',
        //       revert: false
        //     }).disableSelection();
        //     $(".sgrid").sortable({
        //         cursor: "move",
        //         revert: 'invalid',
        //         handle: ".handle",
        //         forceHelperSize: true
        //     });
        // });

  </script>