<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Majestic Admin</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="{{ asset('/vendors/mdi/css/materialdesignicons.min.css') }}">
  <link rel="stylesheet" href="{{ asset('/vendors/base/vendor.bundle.base.css') }}">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="{{ asset('/css/style.css') }}">
  <!-- endinject -->
  <link rel="shortcut icon" href="{{ asset('/images/favicon.png') }}" />
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
              <div class="brand-logo">
                <div class="text-center">
                  <img src="{{ asset('/images/logo.svg') }}" alt="logo">
                </div>
              </div>
              <!-- <h6 class="font-weight-light">Sign in to continue.</h6> -->
              <form class="pt-3" id="formLogin">
                <div class="form-group">
                  <div class="alert alert-danger" id="loginAlert"></div>
                </div>
                <div class="form-group">
                  <input type="text" class="form-control form-control-lg" id="username" placeholder="Username">
                </div>
                <div class="form-group">
                  <input type="password" class="form-control form-control-lg" id="password" placeholder="Password">
                </div>
                <div class="mt-3">
                  <a type="button" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn text-white" id="btnLogin">SIGN IN</a>
                  <div id="notifications"></div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="{{ asset('/vendors/base/vendor.bundle.base.js') }}"></script>
  <!-- endinject -->
  <!-- inject:js -->
  <script src="{{ asset('/js/off-canvas.js') }}"></script>
  <script src="{{ asset('/js/hoverable-collapse.js') }}"></script>
  <script src="{{ asset('/js/template.js') }}"></script>
  <script src="{{ asset('/js/axios.min.js') }}"></script>
  <script type="text/javascript">
    const BASE_URL = '{{ env("APP_URL") }}';

    localStorage.clear();
    $('#loginAlert').hide();
    $('#btnLogin').on('click', function () {
      const BASIC_AUTH_HEADERS = {
        'Authorization': 'Basic ' + btoa('{{ env("AUTH_USERNAME") }}:{{ env("AUTH_PASSWORD") }}')
      };

      let username = $('#username').val();
      let password = $('#password').val();
      
      let formData = new FormData();
      formData.append('username', username);
      formData.append('password', password);

      const login = axios.post(BASE_URL + '/oauth/token', formData, { headers: BASIC_AUTH_HEADERS })
        .then((response) => {
          localStorage.setItem('token', response.data.access_token);
          axios.get(BASE_URL + '/user/me', { headers: {'Authorization': 'Bearer ' + localStorage.getItem('token')} })
            .then((response) => {
              localStorage.setItem('fullName', response.data.fullName);
              window.location.href = "/dashboard";
            });
        }).catch((error) => {
          $('#loginAlert').show();
          $('#loginAlert').html(error.response.data.message);
        });
    });
  </script>
  <!-- endinject -->
</body>

</html>
