<!-- Wrapper-->
<div id="wrapper">

    <!-- Navigation -->
    <div ng-include="'/common/navigation'"></div>

    <!-- Page wraper -->
    <!-- ng-class with current state name give you the ability to extended customization your view -->
    <div id="page-wrapper" class="gray-bg {{$state.current.name}}">

        <!-- Page wrapper -->
        <div ng-include="'/common/topnavbar'"></div>

        <!-- Main view  -->
        <div ui-view></div>

        <!-- Footer -->
        <!-- <div ng-include="'/common/footer'"></div> -->

    </div>
    <!-- End page wrapper-->

</div>
<!-- End wrapper-->