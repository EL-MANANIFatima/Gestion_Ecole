<!DOCTYPE html>
<html lang="en" dir="rtl">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="HTML5 Template" />
    <meta name="description" content="Webmin - Bootstrap 4 & Angular 5 Admin Dashboard Template" />
    <meta name="author" content="potenzaglobalsolutions.com" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <title>Lachimolala</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="images/favicon.ico" />

    <!-- Font -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Poppins:200,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900">

    <!-- css -->
    <link href="{{ URL::asset('assets/css/rtl.css') }}" rel="stylesheet">
    <style>
  body {
    display: flex;
    align-items: center;
    justify-content: center;
    min-height: 100vh;
  }
  .form-inline .btn {
    padding: 0;
  }

  .form-inline .btn img {
    margin: 0 10px; /* Adjust the value as needed */
  }
</style>



</head>

<body>

    <div class="wrapper">

  

<section class="page-section-ptb login" >
  <div class="container">
    <div class="row justify-content-center no-gutters vertical-align">
      <div style="border-radius: 15px;" class="col-lg-8 col-md-8 bg-white">
        <div class="login-fancy pb-40 clearfix">
          <div class="form-inline justify-content-center">
            <a class="btn btn-default col-lg-3"  href="{{route('Login','eleve')}}">
              <img alt="user-img" width="100px;"title="eleve" src="{{ asset('black') }}/img/eleve.png">
            </a>
            <a class="btn btn-default col-lg-3" href="{{route('Login','respo')}}">
              <img alt="user-img" width="100px;"title="respo" src="{{ asset('black') }}/img/parent.png">
            </a>
            <a class="btn btn-default col-lg-3"  href="{{route('Login','prof')}}">
              <img alt="user-img" width="100px;" title="prof" src="{{ asset('black') }}/img/prof.png">
            </a>
            <a class="btn btn-default col-lg-3" href="{{route('Login','web')}}">
              <img alt="user-img" width="100px;" title="admin" src="{{ asset('black') }}/img/admin.png">
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>


        <!--=================================
 login-->

    </div>
    <!-- jquery -->
    <script src="{{ asset('black') }}/js/query-3.3.1.min.js"></script>
    <!-- plugins-jquery -->
    <script src="{{ asset('black') }}/js/plugins-jquery.js"></script>

    <!-- plugin_path -->
    <script>
        var plugin_path = 'js/';

    </script>


    <!-- toastr -->
    @yield('js')
    <!-- custom -->
    <script src="{{ asset('black') }}/js/custom.js"></script>

</body>

</html>