<html style="max-height:650px">

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
    </head>
    <iframe src="{{URL::to('/')}}/{{$filePath}}" frameborder="0" style="width:100%;height:100%;"></iframe>
</html>
