 <!-- Sidebar -->
            <nav id="sidebar">
                <!-- Sidebar Scroll Container -->
                <div id="sidebar-scroll">
                    <!-- Sidebar Content -->
                    <!-- Adding .sidebar-mini-hide to an element will hide it when the sidebar is in mini mode -->
                    <div class="sidingbbr sidebar-content">
                        <!-- Side Header -->
                        <div class="side-header side-content bg-white-op">
                            <!-- Layout API, functionality initialized in App() -> uiLayoutApi() -->
                            <button class="btn btn-link text-gray pull-right hidden-md hidden-lg" type="button" data-toggle="layout" data-action="sidebar_close">
                                <i class="fa fa-times"></i>
                            </button>
                            
                            <a class="h5 text-white" href="{{ URL::to('company/comapnyleads') }}">
							    <img src="{{ URL::asset('front/img/logo.png') }}" alt="NetPeo" title="netpeo" style="margin-top:6px;">
                                <!--<span class="h4 font-w600 sidebar-mini-hide">{{getcong('site_name')}}</span>-->
                            </a>
                        </div>
                        <!-- END Side Header -->
                        <!-- Side Content -->
                        <div class="side-content">
                            <ul class="nav-main">
                                <!--<li class="hov-cl">
                                    <a class="{{classActivePath('dashboard')}}" href="{{ URL::to('company/dashboard') }}">
                                        <span class="side-add"><i class="si si-speedometer"></i>
                                        </span>
                                        <span class="sidebar-mini-hide side-add2">Dashboard</span></a>
                                </li> -->
								<li class="hov-cl">
                                    <a class="{{classActivePath('profile')}}" href="{{ URL::to('company/editCompany',[Auth::user('id')]) }}">
                                        <span class="side-add"><i class="si si-user"></i>
                                        </span>
                                        <span class="sidebar-mini-hide side-add2">Profile</span></a>
                                </li>
								<li class="hov-cl">
                                    <a class="{{classActivePath('Leads')}}" href="{{ URL::to('company/comapnyleads') }}">
                                        <span class="side-add"><i class="fa fa-tasks"></i>
                                        </span>
                                        <span class="sidebar-mini-hide side-add2">Prospects  <?php if($getNotificationL!=0) { ?>({{$getNotificationL}}) <?php } ?></span></a>
                                </li>
								<li class="hov-cl">
                                    <a class="{{classActivePath('logout')}}" href="{{ URL::to('logout') }}">
                                        <span class="side-add"><i class="si si-logout"></i>
                                        </span>
                                        <span class="sidebar-mini-hide side-add2">Logout</span></a>
                                </li>
                             
                            </ul>
                        </div>
                        <!-- END Side Content -->
                    </div>
                    <!-- Sidebar Content -->
                </div>
                <!-- END Sidebar Scroll Container -->
            </nav>
            <!-- END Sidebar -->