<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Maverick Base Laravel</title>

    <!-- Bootstrap -->
    <link href="{{ asset('/vendors/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{ asset('/vendors/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <!-- NProgress -->
    <link href="{{ asset('/vendors/nprogress/nprogress.css') }}" rel="stylesheet">
    <!-- Animate.css -->
    <link href="{{ asset('/vendors/animate.css/animate.min.css') }}" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="{{ asset('/css/custom.min.css') }}" rel="stylesheet">

    <link rel="shortcut icon" href="{{ asset('/images/favicon.ico') }}" />
  
</head>
<body class="login">
  <div>
    <a class="hiddenanchor" id="signup"></a>
    <a class="hiddenanchor" id="signin"></a>

    <div class="login_wrapper">
      <div class="animate form login_form">
        <section class="login_content">
          <form id="formLogin">
            <h1>Login Form</h1>
            <div class="alert alert-danger alert-dismissible" id="loginAlert" role="alert"></div>
            <div>
              <input type="text" class="form-control" placeholder="Username" required="" id="username" />
            </div>
            <div>
              <input type="password" class="form-control" placeholder="Password" required="" id="password" />
            </div>
            <div>
              <a class="btn btn-default submit" id="btnLogin">Log in</a>
              <a class="reset_pass" href="#">Lost your password?</a>
            </div>

            <div class="clearfix"></div>

            <div class="separator">
              <div class="clearfix"></div>
              <br />
              <div>
                <h1><i class="fa fa-paw"></i> Maverick</h1>
                <p>©2016 All Rights Reserved. Gentelella Alela! is a Bootstrap 3 template. Privacy and Terms</p>
              </div>
            </div>
          </form>
        </section>
      </div>
    </div>
  </div>
  <script type="text/javascript" src="{{ asset('/vendors/jquery/dist/jquery.min.js') }}"></script>
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
              localStorage.setItem('menu', JSON.stringify(response.data.menu));
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
