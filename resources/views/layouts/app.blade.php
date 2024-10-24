<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>@yield('title')</title>
    <meta content="" name="description">
    <meta content="" name="keywords">


        <link href="{{ asset('/assets') }}/img/favicon.png" rel="icon">
        <link href="{{ asset('/assets') }}/img/apple-touch-icon.png" rel="apple-touch-icon">


    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('/assets') }}/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('/assets') }}/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="{{ asset('/assets') }}/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="{{ asset('/assets') }}/vendor/quill/quill.snow.css" rel="stylesheet">
    <link href="{{ asset('/assets') }}/vendor/quill/quill.bubble.css" rel="stylesheet">
    <link href="{{ asset('/assets') }}/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="{{ asset('/assets') }}/vendor/simple-datatables/style.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{ asset('/assets') }}/css/style.css" rel="stylesheet">

    <div>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0- 
    alpha/css/bootstrap.css"
            rel="stylesheet">

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

        <link rel="stylesheet" type="text/css"
            href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    </div>

    @yield('css')
    <!-- =======================================================
  * Dev Name: Bokhtiar Toshar
  * Gmail: bokhtiartoshar1@gmail.com
  ======================================================== -->
</head>

<body>

    <!-- ======= Header ======= -->
    @include('layouts.partial.header')
    <!-- End Header -->

    <!-- ======= Sidebar ======= -->
    @include('layouts.partial.sidebar')
    <!-- End Sidebar-->

    <main id="main" class="main">
        @yield('content')
    </main>

    <!-- End #main -->

    <!-- ======= Footer ======= -->
    @include('layouts.partial.footer')
    <!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="{{ asset('/assets') }}/vendor/apexcharts/apexcharts.min.js"></script>
    <script src="{{ asset('/assets') }}/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('/assets') }}/vendor/chart.js/chart.min.js"></script>
    <script src="{{ asset('/assets') }}/vendor/echarts/echarts.min.js"></script>
    <script src="{{ asset('/assets') }}/vendor/quill/quill.min.js"></script>
    <script src="{{ asset('/assets') }}/vendor/simple-datatables/simple-datatables.js"></script>
    <script src="{{ asset('/assets') }}/vendor/tinymce/tinymce.min.js"></script>
    <script src="{{ asset('/assets') }}/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="{{ asset('/assets') }}/js/main.js"></script>

    <script>
    @if(Session::has('message'))
    toastr.options =
    {
        "closeButton" : true,
        "progressBar" : true
    }
            toastr.success("{{ session('message') }}");
    @endif
  
    @if(Session::has('error'))
    toastr.options =
    {
        "closeButton" : true,
        "progressBar" : true
    }
            toastr.error("{{ session('error') }}");
    @endif
  
    @if(Session::has('info'))
    toastr.options =
    {
        "closeButton" : true,
        "progressBar" : true
    }
            toastr.info("{{ session('info') }}");
    @endif
  
    @if(Session::has('warning'))
    toastr.options =
    {
        "closeButton" : true,
        "progressBar" : true
    }
            toastr.warning("{{ session('warning') }}");
    @endif
  </script>
    @yield('js')
</body>

</html>
