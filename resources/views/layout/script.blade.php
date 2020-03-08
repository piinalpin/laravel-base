<script src="{{ asset('/vendors/base/vendor.bundle.base.js') }}"></script>
<!-- endinject -->
<!-- Plugin js for this page-->
<script src="{{ asset('/vendors/chart.js/Chart.min.js') }}"></script>
<script src="{{ asset('/vendors/datatables.net/jquery.dataTables.js') }}"></script>
<script src="{{ asset('/vendors/datatables.net-bs4/dataTables.bootstrap4.js') }}"></script>
<!-- End plugin js for this page-->
<!-- inject:js -->
<script src="{{ asset('/js/off-canvas.js') }}"></script>
<script src="{{ asset('/js/hoverable-collapse.js') }}"></script>
<script src="{{ asset('/js/template.js') }}"></script>
<!-- endinject -->
<!-- Custom js for this page-->
<!-- <script src="{{ asset('/js/dashboard.js') }}"></script> -->
<script src="{{ asset('/js/data-table.js') }}"></script>
<script src="{{ asset('/js/jquery.dataTables.js') }}"></script>
<script src="{{ asset('/js/dataTables.bootstrap4.js') }}"></script>
<script src="{{ asset('/js/axios.min.js') }}"></script>
<script src="{{ asset('/jsmodule/constant.js') }}"></script>
<script src="{{ asset('/jsmodule/function.js') }}"></script>
<script src="{{ asset('/jsmodule/request.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.all.min.js"></script>
<script type="text/javascript">
	$('#userLoggedIn').html(localStorage.getItem('fullName'));
	$('#logout').on('click', function() {
		localStorage.clear();
		window.location.href = "/"
	});
</script>