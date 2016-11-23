<form  class="form-horizontal" ng-submit="submit()">
<div class="inmodal">
    <div class="modal-header">
        <h4 class="modal-title"><%strtoupper($names->tableName())%></h4>
    </div>
    <div class="modal-body">
        <div class="row" ng-if="'yes'==loading">
            <div class="spiner-example">
                <div class="sk-spinner sk-spinner-chasing-dots">
                    <div class="sk-dot1"></div>
                    <div class="sk-dot2"></div>
                </div>
            </div>
        </div> 
        <div class="row" ng-if="'yes'==view">
        <input type="hidden" ng-model='datas.id'>
    @foreach($dataSystem->dataData('v')[0] as $attr)

         <div class="col-lg-12">            
            <div class="form-group">                
                <label class="col-sm-3 control-label"><%$attr['title']%>:</label>
                <div class="col-sm-7"><input type="<%$attr['type']%>" class="form-control" ng-model='datas.<%$attr['column']%>' required></div>
            </div>  
         </div>
           
    @endforeach
        
        </div>  
    </div>
    <div class="modal-footer">        
        <button type="submit" class="ladda-button btn btn-primary" ladda="btnload" data-style="expand-right">{{ 'SAVE' | translate }}</button>
        <button type="button" class="btn btn-danger" ng-if="'yes' == datas.delete" ng-click="this.delete(datas.id)">{{ 'DELETE' | translate }}</button>        
        <button type="button" class="btn btn-white" ng-click="this.cancel()">{{ 'CLOSE' | translate }}</button>
    </div>
</div>
</form> 
