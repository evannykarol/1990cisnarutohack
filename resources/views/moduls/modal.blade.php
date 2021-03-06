<form  class="form-horizontal" ng-submit="submit()">
<div class="inmodal">
    <div class="modal-header">
        <h4 class="modal-title">{{ 'Module_Generator ' | translate }}</h4>
    </div>
    <div class="modal-body">
         <div class="row" ng-if="'yes'==load">
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
                <input type="hidden" ng-model='moduls.Id'>
                <label class="col-sm-3 control-label">{{ 'NAME' | translate }}:</label>
                <div class="col-sm-7"><input type="text" class="form-control" ng-model='moduls.Name' required></div>
            </div>  
         </div>
         <div class="col-lg-12">            
            <div class="form-group">
                <label class="col-sm-3 control-label">{{ 'ICON' | translate }}:</label>
                <div class="col-sm-7"><input type="text" class="form-control" ng-model='moduls.Icon' required></div>
            </div>  
         </div> 
         <div class="col-lg-12">            
            <div class="form-group">
                <label class="col-sm-3 control-label">{{ 'IS_GROUP' | translate }}:</label>
                <div class="col-sm-7">
                    <label class="checkbox-inline"> <input icheck type="radio" ng-model="moduls.Group" value="1" convert-to-number> {{ 'ACTIVE' | translate }}</label>
                    <label class="checkbox-inline"> <input icheck type="radio" ng-model="moduls.Group" value="0" convert-to-number> {{ 'INACTIVE' | translate }}</label> 
                </div>
            </div>  
         </div>                  
        </div>  
    </div>
    <div class="modal-footer">
        <button type="submit" class="ladda-button btn btn-primary" ladda="btnload" data-style="expand-right">{{ 'SAVE' | translate }}</button>
        <button type="button" class="btn btn-danger" ng-if="'yes' == delete" ng-click="this.btndelete(moduls.Id)">{{ 'DELETE' | translate }}</button>      
        <button type="button" class="btn btn-white" ng-click="this.cancel()">{{ 'CLOSE' | translate }}</button>        
    </div>
</div>
</form> 