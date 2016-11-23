<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Ticket</h2>
        <ol class="breadcrumb">
            <li>
                <a href="index.html">Soporte</a>
            </li>
            <li class="active">
                <strong>Ticket de Soporte</strong>
            </li>
        </ol>
    </div>
    <div class="col-lg-2">
    </div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Enviar un ticket
                    </h5>
                </div>
                <div class="ibox-content">
                    <form method="post" class="form-horizontal">
                        <div class="form-group"><label class="col-sm-2 control-label">Nombre</label>

                            <div class="col-sm-10"><input type="text" class="form-control"></div>
                        </div>
                        <div class="form-group"><label class="col-sm-2 control-label">Asunto</label>
                            <div class="col-sm-10"><input type="text" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                        	<label class="col-sm-2 control-label">Departamento</label>
                            <div class="col-sm-4">
                            	<select class="form-control m-b" name="account">
	                                @foreach($Department as $Departments)
	                                	<option value="<% $Departments->id_department %>"><% $Departments->Department %></option>
	                                @endforeach
                            	</select>
                            </div>
                            <label class="col-sm-2 control-label">Prioridad</label>
                            <div class="col-sm-4">
                            	<select class="form-control m-b" name="account">
	                                <option>Baja</option>
	                                <option>Normal</option>
	                                <option>Alta</option>
	                                <option>Urgente</option>
                            	</select>
                            </div>

                        </div>
                        <div class="form-group"><label class="col-sm-2 control-label">Mensaje</label>
                            <div class="col-sm-10" ng-controller="OptCtrl">
                            	<summernote config="options"></summernote>
                            </div>
                        </div>                        
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <div class="col-sm-4 col-sm-offset-2">
                            	<button class="btn btn-primary" type="submit">Enviar</button>
                                <button class="btn btn-white" type="submit">Cancelar</button>                                
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
