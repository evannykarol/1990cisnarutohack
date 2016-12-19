<div class="wrapper wrapper-content animated fadeInRight" ng-controller="wizardCtrl as vm">

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="f1" style="text-align: center;">
                <div class="f1-steps ">
                    <div class="f1-progress">
                        <div class="f1-progress-line" data-now-value="16.66" data-number-of-steps="5" style="width: 40%;"></div>
                    </div>
                    <div class="f1-step active">
                        <div class="f1-step-icon"><i class="fa fa-home"></i></div>
                        <p>Home</p>
                    </div>
                    <div class="f1-step active">
                        <div class="f1-step-icon"><i class="fa fa-wrench"></i></div>
                        <p>Verficiar Sistema</p>
                    </div>
                    <div class="f1-step">
                        <div class="f1-step-icon"><i class="fa fa-database"></i></div>
                        <p>Configuración del sistema</p>
                    </div>
                    <div class="f1-step">
                        <div class="f1-step-icon"><i class="fa fa-user"></i></div>
                        <p>account</p>
                    </div>
                    <div class="f1-step">
                        <div class="f1-step-icon"><i class="fa fa-cog"></i></div>
                        <p>Instalacion</p>
                    </div>
                </div>
            </div>  
        </div>
    </div>

<!--     <div class="row">
        <div class="col-lg-12">
            <div class="ibox">
                <div class="ibox-title">
                    <h5>Angular wizard</h5>

                    <div ibox-tools></div>
                </div>
                <div class="ibox-content wizard form-box">
  
                    <div class="steps clearfix">
                        <ul>
                         <li ng-repeat="step in vm.steps" ng-class="{'active':step.step == vm.currentStep}">
                            <a ng-click="vm.gotoStep(step.step)" href="" class="btn-default">{{step.step}}. {{step.name}}</a>
                         </li>
                        </ul>
                    </div>
                    <div class="wizard">
                        <div class="content">
                            <ng-include src="vm.getStepTemplate()"></ng-include>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
</div>
