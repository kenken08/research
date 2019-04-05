<div class="wrapper row-offcanvas row-offcanvas-left">
        <!-- Left side column. contains the logo and sidebar -->
        <aside class="left-side sidebar-offcanvas">
            <section class="sidebar ">
                <div class="page-sidebar  sidebar-nav">
                    <div class="panel bg-custom">
                        <div class="panel-body">
                            <div class="image text-center">
                                <img class="img img-circle" src="/storage/profilepic/{{auth()->user()->profilepic}}" alt="" style="width:150px;height:150px;">
                            </div>
                            <br>
                            {{-- <div class="text-center">
                                <h4 class="text-white">{{auth()->user()->fname.' '.auth()->user()->minitial.' '.auth()->user()->sname}}</h4>
                            </div> --}}
                        </div>
                    </div>
                    {{-- <div class="clearfix"></div> --}}
                    <!-- BEGIN SIDEBAR MENU -->
                    <ul id="menu" class="page-sidebar-menu">
                        <li class="{{(Route::current()->getName() == 'dashboard') ? 'active' : null }}">
                            <a href="/dashboard">
                                <i class="livicon" data-name="home" data-size="20" data-c="#418BCA" data-hc="#418BCA" data-loop="true"></i>
                                <span class="title">Dashboard</span>
                            </a>
                            {{-- {{route('proposals')}} --}}
                        </li>
                        <li class="{{(Route::current()->getName() == 'proposals') ? 'active' : null }}" >
                            <a href="#">
                                <i class="livicon" data-name="doc-portrait" data-size="20" data-c="#5bc0de" data-hc="#5bc0de" data-loop="true"></i>
                                <span class="title">Undergraduate Thesis</span>
                                <span class="fa arrow"></span>
                            </a>
                                <ul class="sub-menu">
                                    <li>
                                        <a href="/upload-proposal/proposal">
                                            <i class="fa fa-angle-double-right"></i> Proposals
                                        </a>
                                    </li>
                                    <li>
                                        <a href="/upload-proposal/manuscript">
                                            <i class="fa fa-angle-double-right"></i> Manuscripts
                                        </a>
                                    </li>
                                </ul>
                            
                        </li>
                        <li class="{{(Route::current()->getName() == 'proposals') ? 'active' : null }}" >
                            <a href="#">
                                <i class="livicon" data-name="notebook" data-size="20" data-c="#5bc0de" data-hc="#5bc0de" data-loop="true"></i>
                                <span class="title">Archive</span>
                                <span class="fa arrow"></span>
                            </a>
                                <ul class="sub-menu">
                                    <li>
                                        <a href="/show-archive">
                                            <i class="fa fa-angle-double-right"></i> Manuscripts
                                        </a>
                                    </li>
                                    <li>
                                        <a href="/upload-archive">
                                            <i class="fa fa-angle-double-right"></i> Add Manuscript
                                        </a>
                                    </li>
                                </ul>
                            
                        </li>
                        {{-- <li>
                            <a href="/upload-proposal/show">
                                <i class="livicon" data-name="notebook" data-size="20" data-c="#5bc0de" data-hc="#5bc0de" data-loop="true"></i>
                                <span class="title">Manuscript</span>
                            </a>
                        </li> --}}
                        <li>
                            <a href="#">
                                <i class="livicon" data-name="users" data-size="20" data-c="#5bc0de" data-hc="#5bc0de" data-loop="true"></i>
                                <span class="title">Users</span>
                                <span class="fa arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                <li>
                                    <a href="/users">
                                        <i class="fa fa-angle-double-right"></i> Users List
                                    </a>
                                </li>
                               @if(Auth::user()->role == 0)
                                    <li>
                                        <a href="/users/create">
                                            <i class="fa fa-angle-double-right"></i> Add New User
                                        </a>
                                    </li>
                               @endif
                                <li>
                                    <a href="/account">
                                        <i class="fa fa-angle-double-right"></i> Account
                                    </a>
                                </li>
                                {{-- <li>
                                    <a href="/deleted-users">
                                        <i class="fa fa-angle-double-right"></i> Deleted Users
                                    </a>
                                </li> --}}
                            </ul>
                        </li>
                        <li>
                            <a href="/messages">
                                <i class="livicon" data-name="comments" data-size="20" data-c="#5bc0de" data-hc="#5bc0de" data-loop="true"></i>
                                <span class="title">Messages <span class="label label-success">{{count(\App\messagesdetails::where('status','unread')->get())}}</span></span>
                            </a>
                        </li>
                        <li>
                            <a href="/dashboard/announcements">
                                <i class="livicon" data-name="calendar" data-size="20" data-c="#5bc0de" data-hc="#5bc0de" data-loop="true"></i>
                                <span class="title">Announcements</span>
                            </a>
                        </li>
                        <li>
                            <a href="/dashboard/banners">
                                <i class="livicon" data-name="film" data-size="20" data-c="#5bc0de" data-hc="#5bc0de" data-loop="true"></i>
                                <span class="title">Banners</span>
                            </a>
                        </li>
                    </ul>
                        
                </div>
            </section>

            <!-- /.sidebar -->
        </aside>