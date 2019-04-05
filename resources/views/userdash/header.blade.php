<header class="header">
        <a href="/" class="logo">
            <img src="/admin/img/cmulogo.png" alt="Logo">
        </a>
        <nav class="navbar navbar-static-top" role="navigation">
            <!-- Sidebar toggle button-->
            <div>
                <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
                    <div class="responsive_nav"></div>
                </a>
            </div>
            <div class="navbar-left" style="margin-left:10px; margin-top:5px">
                <ul class="list-inline icon-position">
                    <li>
                        <h5 style="color:white">{{(Auth::user()->position == null)? 'Welcome,':Auth::user()->position.':'}} {{Auth::user()->fname.' '.Auth::user()->sname}}</h5>
                    </li>
                </ul>
            </div>
            <div class="navbar-right" style="margin-right:30px; margin-top:5px">
                <ul class="list-inline icon-position">
                    <li>
                        <h5>
                        <i class="livicon" data-name="sign-out" data-size="15" data-c="#ffffff" data-hc="#ffffff" data-loop="true"></i>
                        <a style="color:white" href="" onclick="event.preventDefault(); document.getElementById('logout').submit();">Logout</a>
                        <form id="logout" action="{{ route('logout') }}" method="POST" style="display:none;">@csrf</form>
                        </h5>
                    </li>
                </ul>
            </div>
        </nav>
    </header>