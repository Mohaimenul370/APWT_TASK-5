@section('siteName', 'Smart ISP')
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8"/>
        <title> @yield('siteName') - @yield('title')</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

		<!-- CSRF Token -->
		<meta name="csrf-token" content="{{ csrf_token() }}">

        <!-- App favicon -->
        <link rel="shortcut icon" href="{{asset('assets/images/favicon.ico')}}" />

		<!-- Styles -->
		@include('inc.styles')

		@yield('plugin-css')

    </head>

    <!-- body start -->
    <body class="loading" data-layout='{"mode": "light", "width": "fluid", "menuPosition": "fixed", "sidebar": { "color": "light", "size": "default", "showuser": false}, "topbar": {"color": "dark"}, "showRightSidebarOnPageLoad": false}'>

        <!-- Begin page -->
        <div id="wrapper">

            <!-- Topbar Start -->
			@include('inc.navbar')
			<!-- end Topbar -->

            <!-- ========== Left Sidebar Start ========== -->
			@include('inc.sidebar')
            <!-- Left Sidebar End -->

            <!-- ============================================================== -->
            <!-- Start Page Content here -->
            <!-- ============================================================== -->

            <div class="content-page">
                <div class="content">

                    @yield('content')

                </div> <!-- content -->

                <!-- Footer Start -->
				@include('inc.footer')
                <!-- end Footer -->

            </div>

            <!-- ============================================================== -->
            <!-- End Page content -->
            <!-- ============================================================== -->


        </div>
        <!-- END wrapper -->



        <!-- Right Sidebar -->
		@include('inc.right-bar')
        <!-- /Right-bar -->

        <!-- Right bar overlay-->
        <div class="rightbar-overlay"></div>





        @include('inc.scripts')

    </body>
</html>
