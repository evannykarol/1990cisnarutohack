<!-- Wrapper-->
<div id="wrapper" class="top-navigation">

    <!-- Navigation -->
    <div ng-include="'/common/top_navigation'"></div>

    <!-- Page wraper -->
    <!-- ng-class with current state name give you the ability to extended customization your view -->
    <div id="page-wrapper" class="gray-bg {{$state.current.name}}">

        <!-- Main view  -->
        <div ui-view></div>

        <!-- Footer -->
        <!-- <div ng-include="'/common/footer'"></div> -->

    </div>
    <!-- End page wrapper-->

</div>
<!-- End wrapper-->