			<!-- Topbar Start -->
			<div class="navbar-custom">
			    <div class="container-fluid">
			        <ul class="list-unstyled topnav-menu float-right mb-0">

			            <li class="d-none d-lg-block">
			                <form class="app-search" method="get" action="hotspot-users.php">
			                    <div class="app-search-box dropdown">
			                        <div class="input-group">
			                            <input type="search" name="search" class="form-control" placeholder="Search..." id="top-search">
			                            <div class="input-group-append">
			                                <button class="btn" type="submit">
			                                    <i class="fe-search"></i>
			                                </button>
			                            </div>
			                        </div>

			                    </div>
			                </form>
			            </li>

			            <li class="dropdown d-inline-block d-lg-none">
			                <a class="nav-link dropdown-toggle arrow-none waves-effect waves-light" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
			                    <i class="fe-search noti-icon"></i>
			                </a>
			                <div class="dropdown-menu dropdown-lg dropdown-menu-right p-0">
			                    <form class="p-3">
			                        <input type="text" class="form-control" placeholder="Search ..." aria-label="Recipient's username">
			                    </form>
			                </div>
			            </li>

			            <li class="dropdown d-none d-lg-inline-block">
			                <a class="nav-link dropdown-toggle arrow-none waves-effect waves-light" data-toggle="fullscreen" href="#">
			                    <i class="fe-maximize noti-icon"></i>
			                </a>
			            </li>



			            <li class="dropdown notification-list topbar-dropdown">
			                <a class="nav-link dropdown-toggle waves-effect waves-light" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
			                    <i class="fe-bell noti-icon"></i>
			                    <span class="badge badge-danger rounded-circle noti-icon-badge">9</span>
			                </a>
			                <div class="dropdown-menu dropdown-menu-right dropdown-lg">

			                    <!-- item-->
			                    <div class="dropdown-item noti-title">
			                        <h5 class="m-0">
			                            <span class="float-right">
			                                <a href="" class="text-dark">
			                                    <small>Clear All</small>
			                                </a>
			                            </span>Notification
			                        </h5>
			                    </div>

			                    <div class="noti-scroll" data-simplebar="init">
			                        <div class="simplebar-wrapper" style="margin: 0px;">
			                            <div class="simplebar-height-auto-observer-wrapper">
			                                <div class="simplebar-height-auto-observer"></div>
			                            </div>
			                            <div class="simplebar-mask">
			                                <div class="simplebar-offset" style="right: 0px; bottom: 0px;">
			                                    <div class="simplebar-content-wrapper" style="height: auto; overflow: hidden;">
			                                        <div class="simplebar-content" style="padding: 0px;">



			                                            <!-- item-->
			                                            <a href="javascript:void(0);" class="dropdown-item notify-item">
			                                                <div class="notify-icon">
			                                                    <img src="assets/images/users/user-4.jpg" class="img-fluid rounded-circle" alt="">
			                                                </div>
			                                                <p class="notify-details">Karen Robinson</p>
			                                                <p class="text-muted mb-0 user-msg">
			                                                    <small>Wow ! this admin looks good and awesome design</small>
			                                                </p>
			                                            </a>

			                                            <!-- item-->
			                                            <a href="javascript:void(0);" class="dropdown-item notify-item">
			                                                <div class="notify-icon bg-warning">
			                                                    <i class="mdi mdi-account-plus"></i>
			                                                </div>
			                                                <p class="notify-details">New user registered.
			                                                    <small class="text-muted">5 hours ago</small>
			                                                </p>
			                                            </a>



			                                            <!-- item-->
			                                            <a href="javascript:void(0);" class="dropdown-item notify-item">
			                                                <div class="notify-icon bg-secondary">
			                                                    <i class="mdi mdi-heart"></i>
			                                                </div>
			                                                <p class="notify-details">Carlos Crouch liked
			                                                    <b>Admin</b>
			                                                    <small class="text-muted">13 days ago</small>
			                                                </p>
			                                            </a>
			                                        </div>
			                                    </div>
			                                </div>
			                            </div>
			                            <div class="simplebar-placeholder" style="width: 0px; height: 0px;"></div>
			                        </div>
			                        <div class="simplebar-track simplebar-horizontal" style="visibility: hidden;">
			                            <div class="simplebar-scrollbar" style="width: 0px; display: none;"></div>
			                        </div>
			                        <div class="simplebar-track simplebar-vertical" style="visibility: hidden;">
			                            <div class="simplebar-scrollbar" style="height: 0px; display: none;"></div>
			                        </div>
			                    </div>

			                    <!-- All-->
			                    <a href="javascript:void(0);" class="dropdown-item text-center text-primary notify-item notify-all">
			                        View all
			                        <i class="fe-arrow-right"></i>
			                    </a>

			                </div>
			            </li>

			            <li class="dropdown notification-list topbar-dropdown">
			                <a class="nav-link dropdown-toggle nav-user mr-0 waves-effect waves-light" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
			                    <img src="{{asset('assets/images/users/user-5.jpg')}}" alt="user-image" class="rounded-circle">
			                    <span class="pro-user-name ml-1">
                                @isset(Auth::user()->name){{Auth::user()->name}}@endisset  
                                <i class="mdi mdi-chevron-down"></i>
			                    </span>
			                </a>
			                <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
			                    <!-- item-->
			                    <div class="dropdown-header noti-title">
			                        <h6 class="text-overflow m-0">Welcome !</h6>
			                    </div>

			                    <!-- item-->
			                    <a href="javascript:void(0);" class="dropdown-item notify-item">
			                        <i class="fe-user"></i>
			                        <span>My Account</span>
			                    </a>

			                    <!-- item-->
			                    <a href="javascript:void(0);" class="dropdown-item notify-item">
			                        <i class="fe-settings"></i>
			                        <span>Settings</span>
			                    </a>

			                    <!-- item-->
			                    <a href="password-change.php" class="dropdown-item notify-item">
			                        <i class="fe-lock"></i>
			                        <span>Password Change</span>
			                    </a>

			                    <div class="dropdown-divider"></div>

			                    <!-- item-->
			                    <a href="{{ route('logout') }}" class="dropdown-item notify-item">
			                        <i class="fe-log-out"></i>
			                        <span>Logout</span>
			                    </a>

			                </div>
			            </li>

			            <li class="dropdown notification-list">
			                <a href="javascript:void(0);" class="nav-link right-bar-toggle waves-effect waves-light">
			                    <i class="fe-settings noti-icon"></i>
			                </a>
			            </li>

			        </ul>

			        <!-- LOGO -->
			        <div class="logo-box">
			            <a href="index.php" class="logo logo-dark text-center">
			                <span class="logo-sm">
			                    <img src="{{asset('assets/images/logo-sm.png')}}" alt="" height="22">
			                    <!-- <span class="logo-lg-text-light">UBold</span> -->
			                </span>
			                <span class="logo-lg">
			                    <img src="{{asset('assets/images/logo-dark.png')}}" alt="" height="20">
			                    <!-- <span class="logo-lg-text-light">U</span> -->
			                </span>
			            </a>

			            <a href="index.php" class="logo logo-light text-center">
			                <span class="logo-sm">
			                    <img src="{{asset('assets/images/logo-sm.png')}}" alt="" height="22">
			                </span>
			                <span class="logo-lg">
			                    <img src="{{asset('assets/images/logo-light.png')}}" alt="" height="28">
			                </span>
			            </a>
			        </div>

			        <ul class="list-unstyled topnav-menu topnav-menu-left m-0">
			            <li>
			                <button class="button-menu-mobile waves-effect waves-light">
			                    <i class="fe-menu"></i>
			                </button>
			            </li>

			            <li>
			                <!-- Mobile menu toggle (Horizontal Layout)-->
			                <a class="navbar-toggle nav-link" data-toggle="collapse" data-target="#topnav-menu-content">
			                    <div class="lines">
			                        <span></span>
			                        <span></span>
			                        <span></span>
			                    </div>
			                </a>
			                <!-- End mobile menu toggle-->
			            </li>

			            <li class="dropdown d-none d-xl-block">
			                <a class="nav-link dropdown-toggle waves-effect waves-light" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
			                    Create New
			                    <i class="mdi mdi-chevron-down"></i>
			                </a>
			                <div class="dropdown-menu">
			                    <!-- item-->
			                    <a href="javascript:void(0);" class="dropdown-item">
			                        <i class="fe-briefcase mr-1"></i>
			                        <span>New Projects</span>
			                    </a>

			                    <!-- item-->
			                    <a href="javascript:void(0);" class="dropdown-item">
			                        <i class="fe-user mr-1"></i>
			                        <span>Create Users</span>
			                    </a>

			                    <!-- item-->
			                    <a href="javascript:void(0);" class="dropdown-item">
			                        <i class="fe-bar-chart-line- mr-1"></i>
			                        <span>Revenue Report</span>
			                    </a>

			                    <!-- item-->
			                    <a href="javascript:void(0);" class="dropdown-item">
			                        <i class="fe-settings mr-1"></i>
			                        <span>Settings</span>
			                    </a>

			                    <div class="dropdown-divider"></div>

			                    <!-- item-->
			                    <a href="javascript:void(0);" class="dropdown-item">
			                        <i class="fe-headphones mr-1"></i>
			                        <span>Help &amp; Support</span>
			                    </a>

			                </div>
			            </li>

			            <li class="dropdown dropdown-mega d-none d-xl-block">
			                <a class="nav-link dropdown-toggle waves-effect waves-light" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
			                    Mega Menu
			                    <i class="mdi mdi-chevron-down"></i>
			                </a>
			                <div class="dropdown-menu dropdown-megamenu">
			                    <div class="row">
			                        <div class="col-sm-8">

			                            <div class="row">
			                                <div class="col-md-4">
			                                    <h5 class="text-dark mt-0">UI Components</h5>
			                                    <ul class="list-unstyled megamenu-list">
			                                        <li>
			                                            <a href="javascript:void(0);">Widgets</a>
			                                        </li>
			                                        <li>
			                                            <a href="javascript:void(0);">Nestable List</a>
			                                        </li>
			                                        <li>
			                                            <a href="javascript:void(0);">Range Sliders</a>
			                                        </li>
			                                        <li>
			                                            <a href="javascript:void(0);">Masonry Items</a>
			                                        </li>
			                                        <li>
			                                            <a href="javascript:void(0);">Sweet Alerts</a>
			                                        </li>
			                                        <li>
			                                            <a href="javascript:void(0);">Treeview Page</a>
			                                        </li>
			                                        <li>
			                                            <a href="javascript:void(0);">Tour Page</a>
			                                        </li>
			                                    </ul>
			                                </div>

			                                <div class="col-md-4">
			                                    <h5 class="text-dark mt-0">Applications</h5>
			                                    <ul class="list-unstyled megamenu-list">
			                                        <li>
			                                            <a href="javascript:void(0);">eCommerce Pages</a>
			                                        </li>
			                                        <li>
			                                            <a href="javascript:void(0);">CRM Pages</a>
			                                        </li>
			                                        <li>
			                                            <a href="javascript:void(0);">Email</a>
			                                        </li>
			                                        <li>
			                                            <a href="javascript:void(0);">Calendar</a>
			                                        </li>
			                                        <li>
			                                            <a href="javascript:void(0);">Team Contacts</a>
			                                        </li>
			                                        <li>
			                                            <a href="javascript:void(0);">Task Board</a>
			                                        </li>
			                                        <li>
			                                            <a href="javascript:void(0);">Email Templates</a>
			                                        </li>
			                                    </ul>
			                                </div>

			                                <div class="col-md-4">
			                                    <h5 class="text-dark mt-0">Extra Pages</h5>
			                                    <ul class="list-unstyled megamenu-list">
			                                        <li>
			                                            <a href="javascript:void(0);">Left Sidebar with User</a>
			                                        </li>
			                                        <li>
			                                            <a href="javascript:void(0);">Menu Collapsed</a>
			                                        </li>
			                                        <li>
			                                            <a href="javascript:void(0);">Small Left Sidebar</a>
			                                        </li>
			                                        <li>
			                                            <a href="javascript:void(0);">New Header Style</a>
			                                        </li>
			                                        <li>
			                                            <a href="javascript:void(0);">Search Result</a>
			                                        </li>
			                                        <li>
			                                            <a href="javascript:void(0);">Gallery Pages</a>
			                                        </li>
			                                        <li>
			                                            <a href="javascript:void(0);">Maintenance &amp; Coming Soon</a>
			                                        </li>
			                                    </ul>
			                                </div>
			                            </div>
			                        </div>
			                        <div class="col-sm-4">
			                            <div class="text-center mt-3">
			                                <h3 class="text-dark">Special Discount Sale!</h3>
			                                <h4>Save up to 70% off.</h4>
			                                <button class="btn btn-primary btn-rounded mt-3">Download Now</button>
			                            </div>
			                        </div>
			                    </div>

			                </div>
			            </li>
			        </ul>
			        <div class="clearfix"></div>
			    </div>
			</div>
			<!-- end Topbar -->