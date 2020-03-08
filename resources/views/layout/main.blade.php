<!DOCTYPE html>
<html>
<head>
	@include('layout.head')
</head>
<body>
	<div class="container-scroller">
		@include('layout.navbar')
		<div class="container-fluid page-body-wrapper">
			@include('layout.sidebar')
			<div class="main-panel">
				<div class="content-wrapper">
					@yield('content')
				</div>
				@include('layout.footer')
			</div>
		</div>
	</div>
	@include('layout.script')
	<script type="text/javascript">
		let delay = ( function() {
		    let timer = 0;
		    return function(callback, ms) {
		        clearTimeout (timer);
		        timer = setTimeout(callback, ms);
		    };
		})();

		$(document).ready(function() {
			toastr.options = {
				'closeButton': true,
				'debug': false,
				'newestOnTop': false,
				'progressBar': false,
				'positionClass': 'toast-top-right',
				'preventDuplicates': false,
				'showDuration': '1000',
				'hideDuration': '1000',
				'timeOut': '5000',
				'extendedTimeOut': '1000',
				'showEasing': 'swing',
				'hideEasing': 'linear',
				'showMethod': 'fadeIn',
				'hideMethod': 'fadeOut',
			}
		});
		if (localStorage.getItem('token') === null) window.location.href = "/";

		let b64DecodeUnicode = str =>
			decodeURIComponent(
				Array.prototype.map.call(atob(str), c =>
					'%' + ('00' + c.charCodeAt(0).toString(16)).slice(-2))
				.join(''));

		let parseJwt = token =>
			JSON.parse(
				b64DecodeUnicode(token.split('.')[1].replace('-', '+').replace('_', '/')));

		// if (parseJwt(localStorage.getItem('token')).exp < new Date().getTime()/1000) {
		// 	toastr.error('Token has expired');
		// 	delay(function() {
		// 		window.location.href = "/";
		// 	}, 1000);
		// }

		// Refresh token every 1 hour
		setInterval(function() {
			const headers = {
			  'Content-Type': 'application/json',
			  'Authorization': 'Bearer ' + localStorage.getItem('token')
			};
			axios.post(BASE_URL + '/oauth/token/refresh', null, {
			    headers: headers
			  })
			  .then((response) => {
			    localStorage.setItem('token', response.data.access_token);
			  });
		}, 3550000);

	</script>
	@yield('javascript')
</body>
</html>