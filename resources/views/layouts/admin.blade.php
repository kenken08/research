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
        <!-- global css -->
        <link href="/admin/css/app.css" rel="stylesheet" type="text/css" />
        <link rel="shortcut icon" href="/admin/img/cmufav.png" type="image/x-icon">
        <link rel="icon" href="/admin/img/cmufav.png" type="image/x-icon">
        <!-- end of global css -->

        <link rel="stylesheet" href="/admin/vendors/sweetalert/css/sweetalert.css"/>
        <script src="/js/sweetalert.min.js"></script>

        <!--page level css -->
        <link rel="stylesheet" type="text/css" href="/admin/vendors/select2/css/select2.min.css" />
        <link rel="stylesheet" type="text/css" href="/admin/vendors/select2/css/select2-bootstrap.css" />
    
        <link href="/admin/vendors/fullcalendar/css/fullcalendar.css" rel="stylesheet" type="text/css" />
        <link href="/admin/css/pages/calendar_custom.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" media="all" href="/admin/vendors/bower-jvectormap/css/jquery-jvectormap-1.2.2.css" />
        <link rel="stylesheet" href="/admin/vendors/animate/animate.min.css">
        <link rel="stylesheet" type="text/css" href="/admin/vendors/datetimepicker/css/bootstrap-datetimepicker.min.css">
        <link rel="stylesheet" href="/admin/css/pages/only_dashboard.css" />
        <link rel="stylesheet" type="text/css" href="/admin/vendors/datatables/css/dataTables.bootstrap.css" />
        <link rel="stylesheet" href="/admin/css/bootstrap-tagsinput.css">
        <link href="/admin/css/pages/tables.css" rel="stylesheet" type="text/css" />
        
        <!--page level css -->
        <link href="/admin/vendors/jasny-bootstrap/css/jasny-bootstrap.css" type="text/css" rel="stylesheet">
        <link href="/admin/vendors/bootstrapvalidator/css/bootstrapValidator.min.css" type="text/css" rel="stylesheet">
        <link href="/admin/vendors/iCheck/css/all.css" rel="stylesheet" type="text/css" />
        <link href="/admin/css/pages/wizard.css" type="text/css" rel="stylesheet">

        <link href="/admin/vendors/x-editable/css/bootstrap-editable.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="/admin/css/pages/jquery.fs.boxer.min.css" />
        <link href="/admin/css/pages/user_profile.css" rel="stylesheet" type="text/css" />

        <script src="/admin/vendors/ckeditor/js/ckeditor.js" type="text/javascript"></script>

        {{-- <link rel="stylesheet" href="/admin/css/pages/jscharts.css" /> --}}
            
        @yield('css')
        <!--end of page level css-->
    </head>

    <body class="skin-josh">
       
        @include('admindash.header')
        @include('admindash.sidebarmenu')

        @yield('contents')

        <a id="back-to-top" href="#" class="btn btn-primary btn-lg back-to-top" role="button" title="Return to top" data-toggle="tooltip" data-placement="left">
            <i class="livicon" data-name="plane-up" data-size="18" data-loop="true" data-c="#fff" data-hc="white"></i>
        </a>
        @include('admindash.scripts')
    </body>
</html>
