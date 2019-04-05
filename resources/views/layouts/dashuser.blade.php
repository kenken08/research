<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>{{isset($title)?$title .' | '. config('app.name'): config('app.name')}}</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
    <link href="/admin/css/app.css" rel="stylesheet" type="text/css" />
    <link rel="shortcut icon" href="/admin/img/cmufav.png" type="image/x-icon">
    <link rel="icon" href="/admin/img/cmufav.png" type="image/x-icon">
    <!-- end of global css -->
    <!-- end of global css -->
    <!--page level css -->
    <link href="/admin/vendors/fullcalendar/css/fullcalendar.css" rel="stylesheet" type="text/css" />
    <link href="/admin/css/pages/calendar_custom.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" media="all" href="/admin/vendors/bower-jvectormap/css/jquery-jvectormap-1.2.2.css" />
    <link rel="stylesheet" href="/admin/vendors/animate/animate.min.css"/>
    <link rel="stylesheet" type="text/css" href="/admin/vendors/datetimepicker/css/bootstrap-datetimepicker.min.css"/>
    <link rel="stylesheet" href="/admin/css/pages/only_dashboard.css" />
    <link rel="stylesheet" href="/admin/css/bootstrap-tagsinput.css"/>
    <link rel="stylesheet" href="/admin/vendors/sweetalert/css/sweetalert.css"/>

    <link href="/admin/css/pages/user_profile.css" rel="stylesheet" type="text/css" />
    <link href="/admin/vendors/x-editable/css/bootstrap-editable.css" rel="stylesheet" type="text/css" />
    <link href="/admin/vendors/jasny-bootstrap/css/jasny-bootstrap.css" rel="stylesheet" type="text/css" />


    {{-- <script src="/admin/vendors/sweetalert/js/sweetalert.min.js"></script> --}}
    <script src="/js/sweetalert.min.js"></script>
    <script type="text/javascript" src="/admin/vendors/datatables/js/jquery.dataTables.js"></script>
    <script type="text/javascript" src="/admin/vendors/datatables/js/dataTables.bootstrap.js"></script>
    <script type="text/javascript" src="/admin/vendors/datatables/js/dataTables.responsive.js"></script>
    <script type="text/javascript" src="/admin/vendors/select2/js/select2.js"></script>
    <script type="text/javascript" src="/admin/js/pages/table-advanced2.js"></script>

    <script src="/admin/vendors/jquery-mockjax/js/jquery.mockjax.js" type="text/javascript"></script>
    <script src="/admin/js/pages/user_profile.js" type="text/javascript"></script>
    <script src="/admin/vendors/x-editable/js/bootstrap-editable.js" type="text/javascript"></script>
    <script src="/admin/vendors/jasny-bootstrap/js/jasny-bootstrap.js" type="text/javascript"></script>

    <!--end of page level css-->
</head>

<body class="skin-josh">
   
    @include('userdash.header')
    @include('userdash.sidebarmenu')
    <section style="background:url('../images/login.jpg') no-repeat center center fixed;">@yield('contents')</section>
    @include('userdash.scripts')
</body> 

</html>
