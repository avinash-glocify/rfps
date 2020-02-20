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
                            
                            <a class="h5 text-white" href="{{ URL::to('admin/AllLeads') }}">
							<img src="{{ URL::asset('front/img/logo.png') }}" alt="NetPeo" title="netpeo" style="margin-top:6px;">
                               <!-- <span class="h4 font-w600 sidebar-mini-hide">{{getcong('site_name')}}</span>-->
                            </a>
                        </div>
                        <!-- END Side Header -->
                        <!-- Side Content -->
                        <div class="side-content">
                            <ul class="nav-main">
                                <!--<li class="hov-cl">
                                    <a class="{{classActivePath('dashboard')}}" href="{{ URL::to('admin/dashboard') }}">
                                        <span class="side-add"><i class="si si-speedometer"></i>
                                        </span>
                                        <span class="sidebar-mini-hide side-add2">Dashboard</span></a>
                                </li>  -->
								
								
								<li class="hov-cl">
                                     <a class="{{classActivePath('manage-company')}} nav-submenu" href="javascript:void(0);" data-toggle="nav-submenu" >
                                         <span class="side-add"><i class="fa fa-users"></i></span>
                                         <span class="sidebar-mini-hide side-add2">Manage Users</span>
                                     </a>
                                     <ul class="sub-menu-de">
										<li><a  href="{{ URL::to('admin/AllUsers') }}" ><i class="fa fa-users"></i>All  Users</a></li>
                                        <li><a class="{{classActivePath('adduser')}}" href="{{ URL::to('admin/AddUser') }}" ><i class="fa fa-users"></i>Add User</a></li>
                                         
                                         
                                     </ul>
                                 </li>
								 
								 <li class="hov-cl">
                                     <a class="{{classActivePath('manage-company')}} nav-submenu" href="javascript:void(0);" data-toggle="nav-submenu" >
                                         <span class="side-add"><i class="fa fa-users"></i></span>
                                         <span class="sidebar-mini-hide side-add2">Manage Prospects<?php if(admin_notify_total_leads() !=0) { ?>({{ admin_notify_total_leads()  }})<?php } ?></span>
                                     </a>
                                     <ul class="sub-menu-de">
										<li><a  href="{{ URL::to('admin/AllLeads') }}" ><i class="fa fa-users"></i>All  Prospects</a></li>
                                       <!-- <li><a class="{{classActivePath('adduser')}}" href="{{ URL::to('admin/AddLead') }}" ><i class="fa fa-users"></i>Add Prospect</a></li> -->
                                         
                                         
                                     </ul>
                                 </li>
								
								
								
                                 <li class="hov-cl">
                                     <a class="{{classActivePath('manage-company')}} nav-submenu" href="javascript:void(0);" data-toggle="nav-submenu" >
                                         <span class="side-add"><i class="fa fa-users"></i></span>
                                         <span class="sidebar-mini-hide side-add2">Manage Brokers 
										 <?php if(admin_notify_total_brokers() !=0) { ?>({{ admin_notify_total_brokers()  }})<?php } ?></span>
                                     </a>
                                     <ul class="sub-menu-de">
										<li><a  href="{{ URL::to('admin/AllBrokers') }}" ><i class="fa fa-users"></i>All  Brokers</a></li>
                                        <li><a class="{{classActivePath('adduser')}}" href="{{ URL::to('admin/AddBroker') }}" ><i class="fa fa-users"></i>Add Broker</a></li>
                                         
                                         
                                     </ul>
                                 </li>
								 
								  <li class="hov-cl" >
                                     <a class="{{classActivePath('manage-company')}} nav-submenu" href="javascript:void(0);" data-toggle="nav-submenu"  >
                                         <span class="side-add"><i class="fa fa-users"></i></span>
                                         <span class="sidebar-mini-hide side-add2" >Manage Providers  <?php if(admin_notify_total_providers() !=0) { ?>({{ admin_notify_total_providers()    }})<?php } ?></span>
                                     </a>
                                     <ul class="sub-menu-de">
										 <li id="company"><a  href="{{ URL::to('admin/AllCompanies') }}" ><i class="fa fa-users"></i>All  Providers</a></li>
										 
                                         <li><a class="{{classActivePath('adduser')}}" href="{{ URL::to('admin/AddCompany') }}" ><i class="fa fa-users"></i>Add Provider</a></li>
                                        
                                         
                                     </ul>
                                 </li>
                              
                             <li class="hov-cl">
                                     <a class="{{classActivePath('manual-rates')}} nav-submenu" href="javascript:void(0);" data-toggle="nav-submenu" >
                                         <span class="side-add"><i class="fa fa-money"></i></span>
                                         <span class="sidebar-mini-hide side-add2">Industry Codes</span>
                                     </a>
                                     <ul class="sub-menu-de">
										 <li><a  href="{{ URL::to('admin/all-rates') }}" ><i class="fa fa-money"></i>All  Industry Codes</a></li>
										 
                                         <li><a class="{{classActivePath('Rates')}}" href="{{ URL::to('admin/add-rate') }}" ><i class="fa fa-money"></i>Add Industry Code</a></li>
                                        
                                         
                                     </ul>
                                 </li>
                                   
                                    
                                 <!-- <li class="hov-cl">
                                     <a class="{{classActivePath('assign-leads')}}" href="{{ URL::to('#') }}">
                                         <span class="side-add">   <i class="fa fa-tasks"></i></span>
                                         <span class="sidebar-mini-hide side-add2">Assign Leads</span>
                                </a></li> -->
								
								
								
							
                                <!--
                                 <li class="hov-cl">
                                     <a class="{{classActivePath('settings')}}" href="{{ URL::to('#') }}">
                                         <span class="side-add">   <i class="fa fa-cog"></i></span>
                                         <span class="sidebar-mini-hide side-add2">Settings</span>
                                </a></li>  -->
								<li class="hov-cl">
                                     <a class="{{classActivePath('logout')}}" href="{{ URL::to('admin/logout') }}">
                                         <span class="side-add">   <i class="fa fa-sign-out "></i></span>
                                         <span class="sidebar-mini-hide side-add2">Logout</span>
                                </a></li> 
                            </ul>
                        </div>
                        <!-- END Side Content -->
                    </div>
                    <!-- Sidebar Content -->
                </div>
                <!-- END Sidebar Scroll Container -->
            </nav>
            <!-- END Sidebar -->