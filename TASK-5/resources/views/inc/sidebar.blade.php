<div class="left-side-menu">

    <div class="h-100 menuitem-active" data-simplebar="init">
        <div class="simplebar-wrapper" style="margin: 0px;">
            <div class="simplebar-height-auto-observer-wrapper">
                <div class="simplebar-height-auto-observer"></div>
            </div>
            <div class="simplebar-mask">
                <div class="simplebar-offset" style="right: 0px; bottom: 0px;">
                    <div class="simplebar-content-wrapper" style="height: 100%; overflow: hidden scroll;">
                        <div class="simplebar-content" style="padding: 0px;">

                            <!-- User box -->
                            <div class="user-box text-center">
                                <img src="assets/images/users/user-1.jpg" alt="user-img" title="Mat Helme"
                                    class="rounded-circle avatar-md">
                                <div class="dropdown">
                                    <a href="javascript: void(0);"
                                        class="text-dark dropdown-toggle h5 mt-2 mb-1 d-block"
                                        data-toggle="dropdown">Geneva Kennedy</a>
                                    <div class="dropdown-menu user-pro-dropdown">

                                        <!-- item-->
                                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                                            <i class="fe-user mr-1"></i>
                                            <span>My Account</span>
                                        </a>

                                        <!-- item-->
                                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                                            <i class="fe-settings mr-1"></i>
                                            <span>Settings</span>
                                        </a>

                                        <!-- item-->
                                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                                            <i class="fe-lock mr-1"></i>
                                            <span>Lock Screen</span>
                                        </a>

                                        <!-- item-->
                                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                                            <i class="fe-log-out mr-1"></i>
                                            <span>Logout</span>
                                        </a>

                                    </div>
                                </div>
                                <p class="text-muted">Admin Head</p>
                            </div>

                            <!--- Sidemenu -->
                            <div id="sidebar-menu" class="show">

                                <ul id="side-menu">

                                    <li class="menu-title">Navigation</li>

                                    <li class="menuitem-active">
                                        <a href="index.php" class="active">
                                            <i class="mdi mdi-view-dashboard-outline"></i>
                                            <span> Dashboard </span>
                                        </a>
                                    </li>

                                    <li>
                                        <a href="#client-billing" data-toggle="collapse">
                                            <i class="mdi mdi-account-cash"></i>
                                            <span> Billing </span>
                                            <span class="menu-arrow"></span>
                                        </a>
                                        <div class="collapse" id="client-billing">
                                            <ul class="nav-second-level">
                                                <li><a href="client-accounts.php">All Accounts</a></li>
                                            </ul>

                                            <ul class="nav-second-level">
                                                <li><a href="client-invoices.php">Invoices</a></li>
                                            </ul>
                                        </div>
                                    </li>


                                    <li class="menu-title mt-2">PPPoE</li>

                                    <li>
                                        <a href="#pppoe1" data-toggle="collapse">
                                            <i class="mdi mdi-account-multiple-outline"></i>
                                            <span> Client </span>
                                            <span class="menu-arrow"></span>
                                        </a>
                                        <div class="collapse" id="pppoe1">
                                            <ul class="nav-second-level">
                                                <li><a href="pppoe-client-add.php">Add New</a></li>
                                                <li> <a href="pppoe-client-renew.php">Renew</a></li>
                                            </ul>
                                        </div>
                                    </li>


                                    <li>
                                        <a href="#pppoeSection" data-toggle="collapse">
                                            <i class="mdi mdi-bullseye"></i>
                                            <span> PPPoE </span>
                                            <span class="menu-arrow"></span>
                                        </a>
                                        <div class="collapse" id="pppoeSection">
                                            <ul class="nav-second-level">
                                                <li><a href="{{route('pppoe.users')}}">All Users</a></li>
                                                <li><a href="{{route('pppoe.active')}}">Active Users</a></li>
                                                <li><a href="{{route('pppoe.online')}}">Online Users</a></li>
                                                <li><a href="{{route('pppoe.profiles')}}">Profiles</a></li>
                                                <li><a href="{{route('pppoe.log')}}">Log</a></li>
                                                <li><a href="{{route('pppoe.traffic-monitor')}}">User Traffic</a></li>
                                            </ul>
                                        </div>
                                    </li>




                                    <li class="menu-title mt-2">Hotspot</li>

                                    <li>
                                        <a href="#hotspot" data-toggle="collapse">
                                            <i class="mdi mdi-account-multiple-outline"></i>
                                            <span> Client </span>
                                            <span class="menu-arrow"></span>
                                        </a>
                                        <div class="collapse" id="hotspot">
                                            <ul class="nav-second-level">
                                                <li><a href="client-add-retail.php">Add New</a></li>
                                                <li> <a href="client-renew.php">Renew</a></li>
                                            </ul>
                                        </div>
                                    </li>








                                    <li>
                                        <a href="#sidebarIcons" data-toggle="collapse">
                                            <i class="mdi mdi-wifi"></i>
                                            <span> Hotspot </span>
                                            <span class="menu-arrow"></span>
                                        </a>
                                        <div class="collapse" id="sidebarIcons">
                                            <ul class="nav-second-level">


                                                <li><a href="{{route('hotspot.users')}}">All Users</a></li>
                                                <li><a href="{{route('hotspot.active')}}">Active Users</a></li>
                                                <li><a href="{{route('hotspot.online')}}">Online Users</a></li>
                                                <li><a href="{{route('hotspot.profiles')}}">Profiles</a></li>
                                                <li><a href="{{route('hotspot.log')}}">Log</a></li>
                                                <li><a href="{{route('hotspot.mac-log')}}">Mac Log</a></li>
                                                <li><a href="{{route('hotspot.change-log')}}">Change Log</a></li>
                                            </ul>
                                        </div>
                                    </li>



                                    <li><a href="{{route('hotspot.dhcp-leases')}}">
                                            <i class="mdi mdi-ballot-recount"></i>
                                            <span> DHCP Leases </span>
                                        </a>
                                    </li>

                                    <li><a href="traffic-monitor.php">
                                            <i class="mdi mdi-chart-areaspline"></i>
                                            <span> Traffic Monitor </span>
                                        </a></li>
                                    <li class="menu-title mt-2">Configuration</li>

                                    <li><a href="retailer-add.php">
                                            <i class="mdi mdi-account-convert"></i>
                                            <span> Retailer </span>
                                        </a></li>
                                    <li><a href="merchant_payments.php">
                                            <i class="mdi mdi-credit-card-clock"></i>
                                            <span> All Payments </span>
                                        </a></li>

                                    <li>
                                        <a href="#h_server" data-toggle="collapse">
                                            <i class="fa fa-server"></i>
                                            <span> Server </span>
                                            <span class="menu-arrow"></span>
                                        </a>
                                        <div class="collapse" id="h_server">
                                            <ul class="nav-second-level">
                                                <li><a href="{{route('watchdog.index')}}">Watch Dog</a></li>
                                                <li><a href="{{route('server.index')}}">Mikrotik</a></li>
                                            </ul>
                                        </div>
                                    </li>

                                    <li>
                                        <a href="#h_Configuration" data-toggle="collapse">
                                            <i class="fa fa-server"></i>
                                            <span> Configuration </span>
                                            <span class="menu-arrow"></span>
                                        </a>
                                        <div class="collapse" id="h_Configuration">
                                            <ul class="nav-second-level">
                                                <li><a href="{{route('zone.index')}}">Zone</a></li>
                                                <li><a href="{{route('sub-zone.index')}}">Sub Zone</a></li>
                                            </ul>
                                        </div>
                                    </li>

                                    <li>
                                        <a href="scc-renew.php">
                                            <i class="mdi mdi mdi-autorenew"></i>
                                            <span> Online Renew </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="client-renew2.php">
                                            <i class="mdi mdi-view-dashboard-outline"></i>
                                            <span> Special Renew </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="icc-renew.php">
                                            <i class="mdi mdi-view-dashboard-outline"></i>
                                            <span> ICC Hotspot </span>
                                        </a>
                                    </li>

                                    @if(auth()->user()->userType == 1)


                                    <li><a href="{{route('company.index')}}">
                                            <i class="mdi mdi-ballot-recount"></i>
                                            <span> Company </span>
                                        </a>
                                    </li>


                                    <li><a href="{{route('admin.user.index')}}">
                                            <i class="mdi mdi-ballot-recount"></i>
                                            <span> All Users </span>
                                        </a>
                                    </li>



                                    @endif









                                </ul>

                            </div>
                            <!-- End Sidebar -->

                            <div class="clearfix"></div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="simplebar-placeholder" style="width: auto; height: 872px;"></div>
        </div>
        <div class="simplebar-track simplebar-horizontal" style="visibility: hidden;">
            <div class="simplebar-scrollbar" style="width: 0px; display: none;"></div>
        </div>
        <div class="simplebar-track simplebar-vertical" style="visibility: visible;">
            <div class="simplebar-scrollbar"
                style="height: 51px; transform: translate3d(0px, 0px, 0px); display: block;"></div>
        </div>
    </div>
    <!-- Sidebar -left -->

</div>