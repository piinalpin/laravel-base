<!-- Bootstrap -->
<script src="{{ asset('/vendors/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
<!-- FastClick -->
<script src="{{ asset('/vendors/fastclick/lib/fastclick.js') }}"></script>
<!-- NProgress -->
<script src="{{ asset('/vendors/nprogress/nprogress.js') }}"></script>
<!-- Chart.js -->
<script src="{{ asset('/vendors/Chart.js/dist/Chart.min.js') }}"></script>
<!-- gauge.js -->
<script src="{{ asset('/vendors/gauge.js/dist/gauge.min.js') }}"></script>
<!-- bootstrap-progressbar -->
<script src="{{ asset('/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js') }}"></script>
<!-- iCheck -->
<script src="{{ asset('/vendors/iCheck/icheck.min.js') }}"></script>

<!-- Switchery -->
<script src="{{ asset('/vendors/switchery/dist/switchery.min.js') }}"></script>

<!-- Skycons -->
<script src="{{ asset('/vendors/skycons/skycons.js') }}"></script>

<!-- Flot -->
<script src="{{ asset('/vendors/Flot/jquery.flot.js') }}"></script>
<script src="{{ asset('/vendors/Flot/jquery.flot.pie.js') }}"></script>
<script src="{{ asset('/vendors/Flot/jquery.flot.time.js') }}"></script>
<script src="{{ asset('/vendors/Flot/jquery.flot.stack.js') }}"></script>
<script src="{{ asset('/vendors/Flot/jquery.flot.resize.js') }}"></script>

<!-- Flot plugins -->
<script src="{{ asset('/vendors/flot.orderbars/js/jquery.flot.orderBars.js') }}"></script>
<script src="{{ asset('/vendors/flot-spline/js/jquery.flot.spline.min.js') }}"></script>
<script src="{{ asset('/vendors/flot.curvedlines/curvedLines.js') }}"></script>
<!-- DateJS -->
<script src="{{ asset('/vendors/DateJS/build/date.js') }}"></script>

<!-- JQVMap -->
<script src="{{ asset('/vendors/jqvmap/dist/jquery.vmap.js') }}"></script>
<script src="{{ asset('/vendors/jqvmap/dist/maps/jquery.vmap.world.js') }}"></script>
<script src="{{ asset('/vendors/jqvmap/examples/js/jquery.vmap.sampledata.js') }}"></script>

<!-- bootstrap-daterangepicker -->
<script src="{{ asset('/vendors/moment/min/moment.min.js') }}"></script>
<script src="{{ asset('/vendors/bootstrap-daterangepicker/daterangepicker.js') }}"></script>

<!-- Datatables -->
<script src="{{ asset('/vendors/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
<script src="{{ asset('/vendors/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js') }}"></script>
<script src="{{ asset('/vendors/datatables.net-buttons/js/buttons.flash.min.js') }}"></script>
<script src="{{ asset('/vendors/datatables.net-buttons/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('/vendors/datatables.net-buttons/js/buttons.print.min.js') }}"></script>
<script src="{{ asset('/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js') }}"></script>
<script src="{{ asset('/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js') }}"></script>
<script src="{{ asset('/vendors/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js') }}"></script>
<script src="{{ asset('/vendors/datatables.net-scroller/js/dataTables.scroller.min.js') }}"></script>
<script src="{{ asset('/vendors/jszip/dist/jszip.min.js') }}"></script>
<script src="{{ asset('/vendors/pdfmake/build/pdfmake.min.js') }}"></script>
<script src="{{ asset('/vendors/pdfmake/build/vfs_fonts.js') }}"></script>

<!-- Mask Money -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-maskmoney/3.0.2/jquery.maskMoney.min.js"></script>

<!-- Custom Theme Scripts -->
<script src="{{ asset('/js/custom.js') }}"></script>

<script src="{{ asset('/js/axios.min.js') }}"></script>
<script src="{{ asset('/jsmodule/utils/constant.js') }}"></script>
<script src="{{ asset('/jsmodule/utils/function.js') }}"></script>
<script src="{{ asset('/jsmodule/utils/request.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.all.min.js"></script>

<!-- Scandit -->
<script src="https://cdn.jsdelivr.net/npm/scandit-sdk@5.x"></script>

<script type="text/javascript">
const BASE_URL = '{{ env("APP_URL") }}'
$('#userLoggedIn').html(localStorage.getItem('fullName'));
$('#logout').on('click', function() {
	localStorage.clear();
	window.location.href = "/"
});
</script>
