<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
    <link href="/css/app.css" rel="stylesheet">
    <link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>
    <link href="wizar/demo/bootstrap/bootstrap.min.css" rel="stylesheet" />
    <link href="wizar/src/bootstrap-wizard.css" rel="stylesheet" />
    <link href="wizar/demo/chosen/chosen.css" rel="stylesheet" />
    <style type="text/css">

    </style>
</head>
<body>

<div class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Hospital</a>
        </div>

        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li><a href="/">Home</a></li>
            </ul>

            <ul class="nav navbar-nav navbar-right">
                @if (Auth::guest())
                    <li><a href="/auth/login">Login</a></li>
                    <li><a href="/auth/register">Register</a></li>
                @else
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ Auth::user()->name }} <span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="/auth/logout">Logout</a></li>
                        </ul>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</div>

<div class="row-offcanvas row-offcanvas-left">
    @yield('sidebar')
    <div id="main">
        <div class="page-content">
            <div class="col-xs-12 viewHolder">
                <div class="page-header">
                    @yield('buttons')
                </div>
            </div>
            @yield('content')
        </div>
    </div>
</div>
<!-- Scripts -->
<script src="wizar/demo/js/jquery-2.0.3.min.js" type="text/javascript"></script>
<script src="wizar/demo/chosen/chosen.jquery.js"></script>
<script src="wizar/demo/js/bootstrap.min.js" type="text/javascript"></script>
<script src="wizar/demo/js/prettify.js" type="text/javascript"></script>
<script src="wizar/src/bootstrap-wizard.js" type="text/javascript"></script>
<script src="helps.js"></script>
</body>
</html>
