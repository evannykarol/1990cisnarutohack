<!DOCTYPE html>
<html ng-app="inspinia">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="shortcut icon" type="image/png" href="<% URL::asset('img/favicon.png') %>"/>
    <link rel="shortcut icon" type="image/png" href="<% URL::asset('img/favicon.png') %>"/>
    <!-- Page title set in pageTitle directive -->
    <title page-title></title>
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Font awesome -->
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">
    <!-- Main Inspinia CSS files -->
    <link href="css/animate.css" rel="stylesheet">
    <link id="loadBefore" href="css/style.css" rel="stylesheet">
    <link href="css/mfb.css" rel="stylesheet"/>
    <link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
</head>

<!-- ControllerAs syntax -->
<!-- Main controller with serveral data used in Inspinia theme on diferent view -->
<body ng-controller="MainCtrl as main" class="{{$state.current.data.specialClass}}" landing-scrollspy id="page-top" ngsf-fullscreen>

<!-- Main view  -->
<div ui-view></div>
<!-- jQuery and Bootstrap -->
<script src="js/jquery/jquery-2.1.1.min.js"></script>
<script src="js/plugins/jquery-ui/jquery-ui.js"></script>
<script src="js/bootstrap/bootstrap.min.js"></script>
<!-- MetsiMenu -->
<script src="js/plugins/metisMenu/jquery.metisMenu.js"></script>
<!-- SlimScroll -->
<script src="js/plugins/slimscroll/jquery.slimscroll.min.js"></script>
<!-- Peace JS -->
<script src="js/plugins/pace/pace.min.js"></script>
<script src="js/plugins/push/push.min.js"></script>
<!-- Custom and plugin javascript -->
<script src="js/inspinia.js"></script>
<!-- Main Angular scripts-->
<script src="js/angular/angular.min.js"></script>

<script src="js/angular/angular-sanitize.js"></script>
<script src="js/plugins/oclazyload/dist/ocLazyLoad.min.js"></script>
<script src="js/angular-translate/angular-translate.min.js"></script>
<script src="js/ui-router/angular-ui-router.min.js"></script>
<script src="js/bootstrap/ui-bootstrap-tpls-1.1.2.min.js"></script>
<script src="js/plugins/angular-idle/angular-idle.js"></script>

<script src="js/angular-translate/angular-translate-loader-static-files.min.js"></script>
<script src="js/angular-translate/angular-translate-storage-cookie.min.js"></script>
<script src="js/angular-translate/angular-translate-storage-local.min.js"></script>
<script src="js/angular-translate/angular-translate-loader-partial.js"></script>
<!-- <script src='https://rawgit.com/ghostbar/angular-file-model/master/angular-file-model.js'></script> -->
<script src="js/plugins/moment/moment.min.js"></script>
<!-- load angular-moment -->
<script src="js/plugins/moment/angular-moment.min.js"></script>
<script src="js/plugins/moment/min/locales.js"></script>

<!--
 You need to include this script on any page that has a Google Map.
 When using Google Maps on your own site you MUST signup for your own API key at:
 https://developers.google.com/maps/documentation/javascript/tutorial#api_key
 After your sign up replace the key in the URL below..
-->
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDQTpXj82d8UpCi97wzo_nKXL7nYrd4G70"></script>

<!-- Anglar App Script -->
<script src="js/app.js"></script>
<script src="Config"></script>
<!-- <script src="js/config.js"></script> -->
<script src="js/directives.js"></script>
<script src="js/translations.js"></script>
<script src="js/controllers.js"></script>
<script src="App"></script>

<script src="js/mfb.js"></script>
<script src="js/mfb-directive.js"></script>

<script src="js/plugins/screenfull/angular-screenfull.js"></script>
<script src="js/plugins/screenfull/screenfull.js"></script>
<script src="js/plugins/chartJs/Chart.js"></script>
<script src="js/plugins/chartJs/angular-chart.min.js"></script>

</body>
</html>
