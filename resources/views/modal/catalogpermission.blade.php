<form  class="form-horizontal" ng-submit="submit()">
<div class="inmodal">
    <div class="modal-header">
        <h4 class="modal-title">{{ 'CATALOG' | translate }}</h4>
    </div>
    <div class="modal-body"> 
        <div class="row">
         <div class="col-lg-12">            
            <div class="form-group">
                <input type="hidden" ng-model='user.Id'>
                <label class="col-sm-3 control-label">{{ 'NAME' | translate }}:</label>
                <div class="col-sm-7"><input type="text" class="form-control" ng-model='user.Name'></div>
            </div>  
         </div>
         <div class="col-lg-12">            
            <div class="form-group">
            <label class="col-sm-4 control-label">Permiso
            </label>

                <div class="col-sm-8">
                    <div><label> <input icheck type="checkbox" ng-model="permision.view">
                        VISTA </label></div>
                    <div><label> <input icheck type="checkbox" ng-model="permision.create">
                        CREAR </label></div>
                    <div><label> <input icheck type="checkbox" ng-model="permision.update">
                        UPDATE </label></div>        
                    <div><label> <input icheck type="checkbox" ng-model="permision.delete">
                        DELETE </label></div>
                </div>
            </div>
         </div>
        </div>  
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-white" ng-click="this.cancel()">{{ 'CLOSE' | translate }}</button>
        <button type="submit" class="btn btn-primary">{{ 'SAVE' | translate }}</button>
    </div>
</div>
</form> 
