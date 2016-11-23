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
                    <li><a ng-click="changeLanguage('en')">English</a></li>
                    <li><a ng-click="changeLanguage('es')">Spanish</a></li>
                </ul>
            </li>
            <li uib-dropdown>
                <a class="count-info" href uib-dropdown-toggle>
                    <i class="fa fa-envelope"></i> <span class="label label-warning">{{ ncount }}</span>
                </a>
                <ul class="dropdown-messages" uib-dropdown-menu>
                    <li ng-repeat="datos in dato">
                        <div class="dropdown-messages-box">
                            <a ui-sref="profile" class="pull-left">
                                <img alt="image" class="img-circle" src="img/a7.jpg">
                            </a>

                            <div>
                                <small class="pull-right">hace 46 horas</small>
                                <strong>{{datos.names}}</strong> checa  <strong>Ricardo orellana</strong>. <br>
                                <small class="text-muted">3 days ago at 7:58 pm - 10.06.2014</small>
                            </div>
                        </div>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <div class="text-center link-block">
                            <a ui-sref="mailbox.inbox">
                                <i class="fa fa-envelope"></i> <strong>leer todos mensaje</strong>
                            </a>
                        </div>
                    </li>
                </ul>
            </li>
            <li uib-dropdown>
                <a class="count-info" href uib-dropdown-toggle>
                    <i class="fa fa-bell"></i> <span class="label label-primary">1</span>
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
            <li>
                <a ui-sref="login">
                    <i class="fa fa-sign-out"></i> {{ 'Logout' | translate }}
                </a>
            </li>
        </ul>

    </nav>
</div>