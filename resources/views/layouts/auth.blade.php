<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Connexion</title>

    <!-- Bootstrap -->
    <link href="{{ URL::asset('assets/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css"/>
    <!-- Bootstrap rtl -->
    <!--<link href="assets/bootstrap-rtl/bootstrap-rtl.min.css" rel="stylesheet" type="text/css"/>-->
    <!-- Pe-icon-7-stroke -->
    <link href="{{ URL::asset('assets/pe-icon-7-stroke/css/pe-icon-7-stroke.css') }}" rel="stylesheet" type="text/css"/>
    <!-- style css -->
    <link href="{{ URL::asset('assets/dist/css/styleBD.css') }}" rel="stylesheet" type="text/css"/>
    <!-- Theme style rtl -->
    <!--<link href="assets/dist/css/styleBD-rtl.css" rel="stylesheet" type="text/css"/>-->
</head>

<style>
    .oblig{
        color: red!important;
    }
</style>

@yield('content')

<!-- /.content-wrapper -->
<!-- jQuery -->
<script src="{{ URL::asset('assets/plugins/jQuery/jquery-1.12.4.min.js') }}" type="text/javascript"></script>
<!-- bootstrap js -->
<script src="{{ URL::asset('assets/bootstrap/js/bootstrap.min.js') }}" type="text/javascript"></script>
</body>
</html>