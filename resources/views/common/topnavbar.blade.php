<div class="row border-bottom" ng-controller="NotificationCtrl">
    <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <span minimaliza-sidebar></span>
            <form role="search" class="navbar-form-custom" method="post" action="views/search_results.html">
                <div class="form-group">
                    <!-- <input type="text" placeholder="{{ 'SEARCH' | translate }}" class="form-control" name="top-search" id="top-search"> -->
                </div>
            </form>
        </div>
        <ul class="nav navbar-top-links navbar-right">
            <!--<li>-->
                <!--<span class="m-r-sm text-muted welcome-message">Welcome to INSPINIA+ Admin Theme.</span>-->
            <!--</li>-->
            <li uib-dropdown>
                <a class="count-info" href uib-dropdown-toggle>
                    {{ 'Language' | translate }}
                </a>
                <ul uib-dropdown-menu class="animated fadeInRight m-t-xs" ng-controller="translateCtrl">
                    <li><a ng-click="changeLanguage('en')"><img src="img/idiomas/United-States.png"> English</a></li>
                    <li><a ng-click="changeLanguage('es')"><img src="img/idiomas/Spain.png"> Spanish</a></li>
                </ul>
            </li>
            <li uib-dropdown>
                <a class="count-info" href uib-dropdown-toggle>
                    <i class="fa fa-envelope"></i> <span class="label label-warning">{{ messagescount }}</span>
                </a>
                <ul class="dropdown-messages" uib-dropdown-menu>
                    <li ng-repeat="datos in messagesdetall">
                        <div class="dropdown-messages-box">
                            <a ui-sref="profile" class="pull-left">
                                <img alt="image" class="img-circle"  ng-src="img/perfil/{{datos.photo}}" >
                            </a>

                            <div>
                                <small class="pull-right"> 46 horas</small>
                                <strong></strong> {{datos.subject}} <strong>{{datos.name}}</strong>. <br>
                                <small class="text-muted">{{datos.created}}</small>
                            </div>
                        </div>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <div class="text-center link-block">
                            <a ui-sref="index.messages">
                                <i class="fa fa-envelope"></i> <strong> {{ 'Read_All_Messages' | translate }} </strong>
                            </a>
                        </div>
                    </li>
                </ul>
            </li>
            <li uib-dropdown>
                <a class="count-info" href uib-dropdown-toggle>
                    <i class="fa fa-bell"></i> <span class="label label-primary"></span>
                </a>
                <ul class="dropdown-alerts" uib-dropdown-menu>
                    <li>
                        <a ui-sref="inbox">
                            <div>
                                <i class="fa fa-envelope fa-fw"></i> Disco duro ya vencio la fecha
                                <span class="pull-right text-muted small">hace 5 minutos</span>
                            </div>
                        </a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <div class="text-center link-block">
                            <a ui-sref="miscellaneous.notify">
                                <strong>Ver Todo Alerta</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </div>
                    </li>
                </ul>
            </li>           
            <li ng-controller="LogoutCtrl">
                <a ng-click="Logout()">
                    <i class="fa fa-sign-out"></i> {{ 'Logout' | translate }}
                </a>
            </li>
        </ul>

    </nav>
</div>