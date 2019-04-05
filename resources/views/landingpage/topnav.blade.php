  <!-- Icon Section Start -->

<div class="icon-section">
    <div class="container">
        <ul class="list-inline1">
            <li class="pull-right">
                @if(Auth::check())
                    <h4><a class="text-white">Welcome, {{auth()->user()->fname.' '.auth()->user()->minitial.' '.auth()->user()->sname}}</a></h4>
                @endif
            </li>
            {{-- <li class="pull-right" style="padding-right:50px; padding-top:10px" >
                <ul class="list-inline icon-position">
                        @if(!\Auth::check())   
                        <li>
                            <label><a href="/login" class="text-white">Login</a></label>
                        </li>
                        <li>
                            <label><a href="/sign-up" class="text-white">Register</a></label>
                        </li>
                    @else
                        @if(auth()->user()->role == 0)
                            <label><a class="text-white" href="/dashboard">Dashboard</a></label> 
                        @else
                        <li>
                            <label><a class="text-white" href="/user-dashboard">Dashboard</a></label>
                            </li>
                        @endif
                        <li>
                            <label><a class="text-white" href="" onclick="event.preventDefault(); document.getElementById('logout').submit();">Logout</a></label>
                            <form id="logout" action="{{ route('logout') }}" method="POST" style="display:none;">@csrf</form>
                        </li>
                    @endif
                </ul>
            </li> --}}
        </ul>
    </div>
 </div>

 <!-- //Icon Section End -->
