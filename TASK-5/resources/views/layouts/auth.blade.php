<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Smart ISP - @yield('title')</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<!-- CSRF Token -->
		<meta name="csrf-token" content="{{ csrf_token() }}">
        <!-- App favicon -->
        <link rel="shortcut icon" href="../assets/images/favicon.ico">

		<!-- Styles -->
		@include('inc.styles')
		
		@yield('plugin-css')

    </head>

    <body class="loading auth-fluid-pages pb-0">

        @yield('content')
        <!-- end auth-fluid-->

        
		@include('inc.scripts')
        
    </body>
</html>