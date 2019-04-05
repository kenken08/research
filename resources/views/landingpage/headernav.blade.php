<!-- Nav bar Start -->
<nav class="shadow navbar navbar-default fullwidth">
<div class="container">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#collapse">
            <span><a href="#"> <i class="livicon" data-name="responsive-menu" data-size="25" data-loop="true" data-c="#757b87" data-hc="#ccc"></i>
            </a></span>
        </button>
    </div>
    <div class="collapse navbar-collapse" id="collapse">
        <ul class="nav navbar-nav navbar-left">
            <li class="{{(Route::current()->getName() == 'home') ? null : null }}">
                <a style="padding-top:0px;padding-bottom:0px" href="/"><img src="/images/cmulogo.png" alt="Logo"></a>
            </li>
            
        </ul>
        <ul class="nav navbar-nav navbar-right">
            <li class="{{(Route::current()->getName() == 'about') ? 'active' : null }}">
                <a href="#About">About</a>
            </li>
            <li class="{{(Route::current()->getName() == 'faq') ? 'active' : null }}">
                <a href="#FAQ">FAQs</a>
            </li>
            <li class="{{(Route::current()->getName() == 'contact') ? 'active' : null }}">
                <a href="#Contact">Contact Us</a>
            </li>
                @if(!\Auth::check())   
                    <li style="background-color:#01bc8c">
                        <a style="color:white" href="/login">LOGIN</a>
                    </li>
                    <li style="background-color:#01bc8c">
                        <a style="color:white" href="/sign-up">REGISTER</a>
                    </li>
                @else
                <li style="background-color:#01bc8c">
                    @if(auth()->user()->role == 0)
                        {{-- Admin Dashboard --}}
                        <a style="color:white" href="/dashboard">DASHBOARD</a>
                    @else
                        {{-- User Dashboard --}}
                        <a style="color:white" href="/user-dashboard">DASHBOARD</a>
                    @endif
                </li>
                    <li style="background-color:#01bc8c">
                        <a style="color:white" href="" onclick="event.preventDefault(); document.getElementById('logout').submit();">LOGOUT</a>
                        <form id="logout" action="{{ route('logout') }}" method="POST" style="display:none;">@csrf</form>
                    </li>
                @endif
        </ul>
    </div>
</div>
</nav>
<!-- Nav bar End -->