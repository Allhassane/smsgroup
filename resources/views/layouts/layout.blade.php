<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>SMS GROUP</title>

    <!-- Start Global Mandatory Style
    =====================================================================-->
    <!-- jquery-ui css -->
    <link href="{{ URL::asset('assets/plugins/jquery-ui-1.12.1/jquery-ui.min.css') }}" rel="stylesheet" type="text/css"/>
    <!-- Bootstrap -->
    <link href="{{ URL::asset('assets/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css"/>
    <!-- Bootstrap rtl -->
    <!--<link href="assets/bootstrap-rtl/bootstrap-rtl.min.css" rel="stylesheet" type="text/css"/>-->
    <!-- Lobipanel css -->
    <link href="{{ URL::asset('assets/plugins/lobipanel/lobipanel.min.css') }}" rel="stylesheet" type="text/css"/>
    <!-- Pace css -->
    <link href="{{ URL::asset('assets/plugins/pace/flash.css') }}" rel="stylesheet" type="text/css"/>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <!-- Pe-icon -->
    <link href="{{ URL::asset('assets/pe-icon-7-stroke/css/pe-icon-7-stroke.css') }}" rel="stylesheet" type="text/css"/>
    <!-- Themify icons -->
    <link href="{{ URL::asset('assets/themify-icons/themify-icons.css') }}" rel="stylesheet" type="text/css"/>
    <!-- End Global Mandatory Style
    =====================================================================-->
    <!-- Start page Label Plugins
    =====================================================================-->
    <!-- Toastr css -->
    <link href="{{ URL::asset('assets/plugins/toastr/toastr.css') }}" rel="stylesheet" type="text/css"/>
    <!-- Emojionearea -->
    <link href="{{ URL::asset('assets/plugins/emojionearea/emojionearea.min.css') }}" rel="stylesheet" type="text/css"/>
    <!-- Monthly css -->
    <link href="{{ URL::asset('assets/plugins/monthly/monthly.css') }}" rel="stylesheet" type="text/css"/>
    <!-- End page Label Plugins
    =====================================================================-->
    <!-- Start Theme Layout Style
    =====================================================================-->
    <!-- Theme style -->
    <link href="{{ URL::asset('assets/dist/css/styleBD.css') }}" rel="stylesheet" type="text/css"/>
    <!-- Theme style rtl -->
    <!--<link href="assets/dist/css/styleBD-rtl.css" rel="stylesheet" type="text/css"/>-->
    <!-- End Theme Layout Style
    =====================================================================-->
</head>
<body class="hold-transition sidebar-mini">


<style>
    .oblig{
        color: red!important;
    }
    .actions .btn-xs{
        visibility: hidden;
    }
    .actions:hover .btn-xs{
        visibility: visible;
    }
</style>


<!-- Site wrapper -->
<div class="wrapper">
    <header class="main-header">
        <a href="index.html" class="logo"> <!-- Logo -->
            <span class="logo-mini">
                        <!--<b>A</b>BD-->
                        <img src="{{ asset('assets/dist/img/mini-logo.png') }}" alt="">
                    </span>
            <span class="logo-lg">
                        <!--<b>Admin</b>BD-->
                        <img src="{{ asset('assets/dist/img/logo.png') }}" alt="">
                    </span>
        </a>
        <!-- Header Navbar -->
        <nav class="navbar navbar-static-top">
            <a href="index.html#" class="sidebar-toggle" data-toggle="offcanvas" role="button"> <!-- Sidebar toggle button-->
                <span class="sr-only">Toggle navigation</span>
                <i class="fa fa-bars" aria-hidden="true"></i>
            </a>
            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    {{--
                    <!-- Notifications -->
                    <li class="dropdown notifications-menu">
                        <a href="index.html#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="pe-7s-speaker"></i>
                            <span class="label label-warning">8</span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="header">You have 10 notifications</li>
                            <li>
                                <ul class="menu">
                                    <li><a href="index.html#"><i class="ti-user color-gray"></i> 5 new members joined today </a></li>
                                    <li><a href="index.html#"><i class="ti-announcement color-green"></i> Very long description here that may not fit into the page and may cause design problems</a></li>
                                    <li><a href="index.html#"><i class="fa fa-users"></i> 5 new members joined</a></li>
                                    <li><a href="index.html#"><i class="ti-shopping-cart color-violet"></i> 25 sales made</a></li>
                                    <li><a href="index.html#"><i class="ti-twitter color-info"></i>  3 New Followers</a></li>
                                </ul>
                            </li>
                            <li class="footer"><a href="index.html#">View all</a></li>
                        </ul>
                    </li>
                    --}}
                    <!-- settings -->
                    <li class="dropdown dropdown-user">
                        <a href="index.html#" class="dropdown-toggle" data-toggle="dropdown"> <i class="fa fa-user"></i></a>
                        <ul class="dropdown-menu">
                            <li><a href="profile.html"><i class="fa fa-user"></i> Mon Profil</a></li>
                            <li><a href="{{ route('logout') }}"><i class="fa fa-sign-out"></i> Logout</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <!-- =============================================== -->
    <!-- Left side column. contains the sidebar -->
    <aside class="main-sidebar">
        <!-- sidebar -->
        <div class="sidebar">
            <!-- Sidebar user panel -->
            <div class="user-panel text-center">
                <div class="image">
                    <img src="{{ asset('assets/dist/img/sms1.png') }}" class="img-circle" alt="User Image">
                </div>
                <div class="info">
                    <p>group sms</p>
                    <a href="index.html#"><i class="fa fa-circle text-success"></i> En ligne</a>
                </div>
            </div>
            <!-- sidebar menu -->
            <ul class="sidebar-menu">
                <li class="header text-center">MENU PRINCIPAL</li>
                <li class="active">
                    <a href=""><i class="fa fa-home"></i> <span>Accueil</span></a>
                </li>
                @if(\Illuminate\Support\Facades\Auth::user()->categorie_id == 1)
                <li class="treeview">
                    <a href="index.html#">
                        <i class="fa fa-user"></i><span>Utilisateur</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{ route('register') }}">Créer</a></li>
                        <li><a href="{{ route('list.user') }}">Lister</a></li>
                        <!--<li><a href="notification.html">Notification</a></li>-->
                    </ul>
                </li>
                @endif
                <li class="treeview">
                    <a href="">
                        <i class="fa fa-users"></i><span>Groupe</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{ route('add.group') }}">Créer</a></li>
                        <li><a href="{{ route('list.group') }}">Lister</a></li>
                        <!--<li><a href="notification.html">Notification</a></li>-->
                    </ul>
                </li>
                <li class="treeview">
                    <a href="index.html#">
                        <i class="fa fa-address-card" aria-hidden="true"></i>
                        <span>Contacts</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{ route('add.contact') }}">Créer</a></li>
                        <li><a href="{{ route('list.contact') }}">Lister</a></li>
                    </ul>
                </li>
                <li class="treeview">
                    <a href="index.html#">
                        <i class="fa fa-envelope"></i> <span>Sms</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="forms_basic.html">Ecrire</a></li>
                        <li><a href="forms_cropper.html">Prédéfini</a></li>
                        <li><a href="form_file_upload.html">Programmer</a></li>
                        <li><a href="forms_validation.html">Statistique</a></li>
                    </ul>
                </li>
            </ul>
        </div> <!-- /.sidebar -->
    </aside>

    @yield('content')

    <footer class="main-footer">
        <div class="pull-right hidden-xs"> <b>Version</b> 1.0</div>
        <strong>Copyright &copy; 2016-2017 <a href="index.html#">bdtask</a>.</strong> All rights reserved. <i class="fa fa-heart color-green"></i>
    </footer>
</div>
<!-- ./wrapper -->
<!-- Start Core Plugins
=====================================================================-->
<!-- jQuery -->
<script src="{{ URL::asset('assets/plugins/jQuery/jquery-1.12.4.min.js') }}" type="text/javascript"></script>
<!-- jquery-ui -->
<script src="{{ URL::asset('assets/plugins/jquery-ui-1.12.1/jquery-ui.min.js') }}" type="text/javascript"></script>
<!-- Bootstrap -->
<script src="{{ URL::asset('assets/bootstrap/js/bootstrap.min.js') }}" type="text/javascript"></script>
<!-- lobipanel -->
<script src="{{ URL::asset('assets/plugins/lobipanel/lobipanel.min.js') }}" type="text/javascript"></script>
<!-- Pace js -->
<script src="{{ URL::asset('assets/plugins/pace/pace.min.js') }}" type="text/javascript"></script>
<!-- SlimScroll -->
<script src="{{ URL::asset('assets/plugins/slimScroll/jquery.slimscroll.min.js') }}" type="text/javascript"></script>
<!-- FastClick -->
<script src="{{ URL::asset('assets/plugins/fastclick/fastclick.min.js') }}" type="text/javascript"></script>
<!-- AdminBD frame -->
<script src="{{ URL::asset('assets/dist/js/frame.js') }}" type="text/javascript"></script>
<!-- End Core Plugins
=====================================================================-->
<!-- Start Page Lavel Plugins
=====================================================================-->
<!-- Toastr js -->
<script src="{{ URL::asset('assets/plugins/toastr/toastr.min.js') }}" type="text/javascript"></script>
<!-- Sparkline js -->
<script src="{{ URL::asset('assets/plugins/sparkline/sparkline.min.js') }}" type="text/javascript"></script>
<!-- Data maps js -->
<script src="{{ URL::asset('assets/plugins/datamaps/d3.min.js') }}" type="text/javascript"></script>
<script src="{{ URL::asset('assets/plugins/datamaps/topojson.min.js') }}" type="text/javascript"></script>
<script src="{{ URL::asset('assets/plugins/datamaps/datamaps.all.min.js') }}" type="text/javascript"></script>
<!-- Counter js -->
<script src="{{ URL::asset('assets/plugins/counterup/waypoints.js') }}" type="text/javascript"></script>
<script src="{{ URL::asset('assets/plugins/counterup/jquery.counterup.min.js') }}" type="text/javascript"></script>
<!-- Emojionearea -->
<script src="{{ URL::asset('assets/plugins/emojionearea/emojionearea.min.js') }}" type="text/javascript"></script>
<!-- Monthly js -->
<script src="{{ URL::asset('assets/plugins/monthly/monthly.js') }}" type="text/javascript"></script>
<!-- End Page Lavel Plugins
=====================================================================-->
<!-- Start Theme label Script
=====================================================================-->
<!-- Dashboard js -->
<script src="{{ URL::asset('assets/dist/js/dashboard.js') }}" type="text/javascript"></script>
<!-- End Theme label Script
=====================================================================-->
<script>
    $(document).ready(function () {

        "use strict"; // Start of use strict

        // notification
       /* setTimeout(function () {
            toastr.options = {
                closeButton: true,
                progressBar: true,
                showMethod: 'slideDown',
                timeOut: 4000
//                        positionClass: "toast-top-left"
            };
            toastr.success('Responsive Admin Theme', 'Welcome to AdminBD');

        }, 1300);*/

        //counter
        $('.count-number').counterUp({
            delay: 10,
            time: 5000
        });

        //data maps
        var basic_choropleth = new Datamap({
            element: document.getElementById("map1"),
            projection: 'mercator',
            fills: {
                defaultFill: "#37a000",
                authorHasTraveledTo: "#fa0fa0"
            },
            data: {
                USA: {fillKey: "authorHasTraveledTo"},
                JPN: {fillKey: "authorHasTraveledTo"},
                ITA: {fillKey: "authorHasTraveledTo"},
                CRI: {fillKey: "authorHasTraveledTo"},
                KOR: {fillKey: "authorHasTraveledTo"},
                DEU: {fillKey: "authorHasTraveledTo"}
            }
        });

        var colors = d3.scale.category10();

        window.setInterval(function () {
            basic_choropleth.updateChoropleth({
                USA: colors(Math.random() * 10),
                RUS: colors(Math.random() * 100),
                AUS: {fillKey: 'authorHasTraveledTo'},
                BRA: colors(Math.random() * 50),
                CAN: colors(Math.random() * 50),
                ZAF: colors(Math.random() * 50),
                IND: colors(Math.random() * 50)
            });
        }, 2000);

        //Chat list
        $('.chat_list').slimScroll({
            size: '3px',
            height: '305px',
            allowPageScroll: true,
            railVisible: true
        });

        // Message
        $('.message_inner').slimScroll({
            size: '3px',
            height: '320px',
            allowPageScroll: true,
            railVisible: true
            // position: 'left'
        });

        //emojionearea
        $(".emojionearea").emojioneArea({
            pickerPosition: "top",
            tonesStyle: "radio"
        });

        //monthly calender
        $('#m_calendar').monthly({
            mode: 'event',
            //jsonUrl: 'events.json',
            //dataType: 'json'
            xmlUrl: 'events.xml'
        });

        //Sparklines Charts
        $('.sparkline1').sparkline([4, 6, 7, 7, 4, 3, 2, 4, 6, 7, 4, 6, 7, 7, 4, 3, 2, 4, 6, 7, 7, 4, 3, 1, 5, 7, 6, 6, 5, 5, 4, 4, 3, 3, 4, 4, 5], {
            type: 'bar',
            barColor: '#37a000',
            height: '35',
            barWidth: '3',
            barSpacing: 2
        });

        $(".sparkline2").sparkline([-8, 2, 4, 3, 5, 4, 3, 5, 5, 6, 3, 9, 7, 3, 5, 6, 9, 5, 6, 7, 2, 3, 9, 6, 6, 7, 8, 10, 15, 16, 17, 15], {
            type: 'line',
            height: '35',
            width: '100%',
            lineColor: '#37a000',
            fillColor: '#fff'
        });

        $(".sparkline3").sparkline([2, 5, 3, 7, 5, 10, 3, 6, 5, 7], {
            type: 'line',
            height: '35',
            width: '100%',
            lineColor: '#37a000',
            fillColor: '#fff'
        });

        $(".sparkline4").sparkline([10, 34, 13, 33, 35, 24, 32, 24, 52, 35], {
            type: 'line',
            height: '35',
            width: '100%',
            lineColor: '#37a000',
            fillColor: 'rgba(55, 160, 0, 0.7)'
        });

        $(".sparkline5").sparkline([32, 15, 22, 46, 33, 86, 54, 73, 53, 12, 53, 23, 65, 23, 63, 53, 42, 34, 56, 76, 15], {
            type: 'line',
            lineColor: '#37a000',
            fillColor: '#37a000',
            width: '100',
            height: '20'
        });

        $(".sparkline6").sparkline([4, 6, 7, 7, 4, 3, 2, 1, 4, 4, 5, 6, 3, 4, 5, 8, 7, 6, 9, 3, 2, 4, 1, 5, 6, 4, 3, 7], {
            type: 'discrete',
            lineColor: '#37a000',
            width: '100',
            height: '20'
        });

        $(".sparkline7").sparkline([5, 6, 7, 2, 0, -4, -2, 4, 5, 6, 3, 2, 4, -6, -5, -4, 6, 5, 4, 3], {
            type: 'bar',
            barColor: '#37a000',
            negBarColor: '#c6c6c6',
            width: '100',
            height: '20'
        });

    });
</script>
</body>
</html>
