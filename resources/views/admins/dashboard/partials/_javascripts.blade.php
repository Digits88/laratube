<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="{{asset('js/jquery.min.js')}}"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="{{asset('js/app.js')}}"></script>
<script src="{{asset('js/waves.js')}}"></script>
<script src="{{asset('js/wow.min.js')}}"></script>
<script src="{{asset('js/jquery.nicescroll.js')}}" type="text/javascript"></script>
<script src="{{asset('js/jquery.scrollTo.min.js')}}"></script>
<script src="{{asset('assets/chat/moment-2.2.1.js')}}"></script>
<script src="{{asset('assets/jquery-sparkline/jquery.sparkline.min.js')}}"></script>
<script src="{{asset('assets/jquery-detectmobile/detect.js')}}"></script>
<script src="{{asset('assets/fastclick/fastclick.js')}}"></script>
<script src="{{asset('assets/jquery-slimscroll/jquery.slimscroll.js')}}"></script>
<script src="{{asset('assets/jquery-blockui/jquery.blockUI.js')}}"></script>

<!-- sweet alerts -->
<script src="{{asset('assets/sweet-alert/sweet-alert.min.js')}}"></script>
<script src="{{asset('assets/sweet-alert/sweet-alert.init.js')}}"></script>

<!-- flot Chart -->
<script src="{{asset('assets/flot-chart/jquery.flot.js')}}"></script>
<script src="{{asset('assets/flot-chart/jquery.flot.time.js')}}"></script>
<script src="{{asset('assets/flot-chart/jquery.flot.tooltip.min.js')}}"></script>
<script src="{{asset('assets/flot-chart/jquery.flot.resize.js')}}"></script>
<script src="assets/flot-chart/jquery.flot.pie.js"></script>
<script src="assets/flot-chart/jquery.flot.selection.js"></script>
<script src="assets/flot-chart/jquery.flot.stack.js"></script>
<script src="{{asset('assets/flot-chart/jquery.flot.crosshair.js')}}"></script>

<!-- Counter-up -->
<script src="assets/counterup/waypoints.min.js" type="text/javascript"></script>
<script src="assets/counterup/jquery.counterup.min.js" type="text/javascript"></script>

<!-- CUSTOM JS -->
<script src="{{asset('js/jquery.app.js')}}"></script>

<!-- Dashboard -->
<script src="{{asset('js/jquery.dashboard.js')}}"></script>

<!-- Chat -->
<script src="{{asset('js/jquery.chat.js')}}"></script>

<!-- Todo -->
<script src="{{asset('js/jquery.todo.js')}}"></script>

<script type="text/javascript">
    /* ==============================================
     Counter Up
     =============================================== */
    jQuery(document).ready(function($) {
        $('.counter').counterUp({
            delay: 100,
            time: 1200
        });
    });
</script>