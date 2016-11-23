<nav class="navbar-default navbar-static-side" role="navigation" ng-controller="PerfilCtrl">
    <div class="sidebar-collapse">
        <ul side-navigation class="nav metismenu" id="side-menu">
            <li class="nav-header">
             <center>
                <div class="profile-element" uib-dropdown>
                    <img alt="image" class="img-circle" src="<% URL::asset('img/perfil/{{Photo}}') %>" width="70px" />
                    <a uib-dropdown-toggle href>
                            <span class="clear">
                                <span class="block m-t-xs">
                                    <strong class="font-bold">{{Name}}</strong>
                             </span>
                                <span class="text-muted text-xs block">{{Area}}<b class="caret"></b></span>
                            </span>
                    </a>
                    <ul uib-dropdown-menu="" class="animated fadeInRight m-t-xs">
                        <li><a href="" ui-sref="index.profile">Perfil</a></li>
                        <li><a href="">{{ 'Logout' | translate }}</a></li>                        
                    </ul>
                </div>
                <div class="logo-element">
                    <img class="img-circle" src="<% URL::asset('img/perfil/'.Auth::user()->photo) %>" width="40px">
                </div>
             </center>
            </li>
            <li ui-sref-active="active">
                <a ui-sref="index.main"><i class="fa fa-laptop"></i> <span class="nav-label">{{ 'Panel_Control' | translate }}</span> </a>
            </li>
            @foreach($catalog as $catalogsss)
            <li ui-sref-active="active">
                <a ui-sref="<% $catalogsss->viewcatalog %>"><i class="fa <% $catalogsss->icon %>" title="<% $catalogsss->catalogs %>"></i> <span class="nav-label"><% $catalogsss->description %></span> </a>
            </li>
            @endforeach
            <li ng-class="{active: $state.includes('index')}">
                <a href=""><i class="fa fa-gear"></i> <span class="nav-label">Configuración</span></a>
                <ul class="nav nav-second-level collapse" ng-class="{in: $state.includes('index')}">
                    <li ui-sref-active="active"><a ui-sref="index.profile"><i class="fa fa-user"></i> <span class="nav-label">Perfile</span> </a></li> 
                    <li ui-sref-active="active"><a ui-sref="index.settings"><i class="fa fa-user"></i> <span class="nav-label">Settings</span> </a></li> 
                </ul>
            </li>  
                     
        </ul>
    </div>
</nav>