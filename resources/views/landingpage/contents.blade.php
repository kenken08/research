@section('contents')

<div class="container">
    <form id="search-result" action="{{URL::to('/search-result')}}" method="POST" role="search">
    {!! csrf_field() !!}
        <div class="row">
            <div class="input-group input-group-lg">
                <span class="input-group-addon" style="cursor:pointer;color:white;border-color:transparent;">
                    <select name="filter" id="filter" style="box-shadow:none;border-color:transparent;background:transparent;">
                        <option style="color:black" value="all">All</option>
                        <option style="color:black" value="title">Title</option>
                        <option style="color:black" value="program">Program</option>
                        <option style="color:black" value="college">College</option>
                    </select>
                </span>
                <input style="height:50px" id="search" name="search" type="text" class="form-control" placeholder="What're you looking for?" ondblclick="document.getElementById('search').click()" value="{{ old('search') }}" aria-describedby="sizing-addon1" >
                <a class="input-group-addon" onclick="document.getElementById('search-result').submit();" style="box-shadow:none;border-color:transparent;cursor:pointer; color:white">Search</a>
            </div>  
            <h3 class="text-center" style="margin-top:1%; margin-bottom:2%">Search Undergraduate Studies</h3>
        </div>
    </form>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <h2 class="warning text-left">Announcements</h2>
            <div class="panel">
                <div class="panel-body">
                    <div class="carousel slide multi-item-carousel" id="theCarousel">
                        <div class="carousel-inner">
                            @foreach(\App\announcements::orderBy('created_at','DESC')->get() as $k => $ann)
                                <div class="item {{($k == 0)? 'active':''}}">
                                    <div class="col-xs-12" style="margin-top:-50px">
                                        <div class="box">
                                            <div class="box-body">
                                                <img src="/storage/cover_photo/{{$ann->cover_photo}}" width="660px" style="max-height:200px;">
                                                <small class="btn btn-sm btn-primary"> {{date('F d, Y', strtotime($ann->created_at))}}</small>
                                                <h3 class="text-left">{{$ann->title}}</h3>
                                                <h4 class="text-left">{{$ann->description}}</h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            <a class="left carousel-control" href="#theCarousel" data-slide="prev"><i class="glyphicon glyphicon-chevron-left"></i></a>
                            <a class="right carousel-control" href="#theCarousel" data-slide="next"><i class="glyphicon glyphicon-chevron-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <h2 class="warning text-left">Latest Uploads</h2>
            <div class="panel">
                <div class="panel-body text-left">
                    @foreach(\App\research_papers::orderBy('updated_at','DESC')->where('manuscript','!=',null)->take(4)->get() as $manu)
                        <h4 class="primary">{{$manu->title}}</h4>
                        @foreach(\App\User::all() as $user)
                            @if($user->id == $manu->user_id)
                            <h5>Author: {{$user->fname.' '.$user->minitial.' '.$user->sname}}</h5>
                            @endif
                        @endforeach
                        <hr>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <div class="row" id="About">
        <h2 class="warning text-left">About Us</h2>
    </div>
    <div class="row">
        <div class="col-md-8">
            <blockquote>
                <p> &emsp;&emsp;The <strong>University Research Unit</strong> is one of the major pillars of CMU. Research is one of the four main functions of the university, 
                    together with instruction, extension, and production. As stated in Section 2 of Republic Act No. 4498 issued on 19 June 1965, 
                    CMU shall “provide programs of instruction at all levels in the arts, sciences, technical, professional, educational, 
                    and philosophical fields, and shall concern itself with pure and applied research in all branches of knowledge for 
                    the intellectual and professional growth of faculty members, for the advance instruction of students, particularly 
                    graduate students, and for increasing knowledge and understanding”.
                </p>
            </blockquote>
        </div>
        <div class="side hidden-xs col-sm-5 col-md-4">
            <div class="text-center" style="margin-top:-45px">
                <img src="/images/about.png" >
            </div>
        </div>
    </div>
    <div class="row" id="FAQ">
        <div class="col-md-2"></div>
        <div class="col-md-8 text-center">
            <h2 class="warning">Frequently Asked Questions</h2>
            <!-- Panel-group Start -->
            <div class="panel-group" id="accordion">
                <!-- Panel Panel-default Start -->
                <div class="panel panel-default">
                    <!-- Panel-heading Start -->
                    <div class="panel-heading text_bg">
                        <h4 class="panel-title text-left">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                            <span class=" glyphicon glyphicon-minus  success"></span>
                            <span class="success text-left">Advising on Research Statistics/Data Analysis</span></a>
                        </h4>
                    </div>
                    <!-- //Panel-heading End -->
                    <!-- Collapseone Start -->
                    <div id="collapseOne" class="panel-collapse collapse in">
                        <div class="panel-body text-left">
                            <h4>Schedule of Availability of service: <strong>MONDAY TO FRIDAY</strong> | 7:00 AM TO 5:00 PM 
                            </h4>
                            <ul>
                                <li>
                                    <h5><strong> Who may avail of the service:</strong></h5>
                                </li>
                            </ul>
                            <ul>
                                <li><h6><i class="livicon" data-name="check" data-size="12" data-loop="true" data-c="#555555" data-hc="#555555"></i> Graduate and Undergraduate Students</h6></li>
                                <li><h6><i class="livicon" data-name="check" data-size="12" data-loop="true" data-c="#555555" data-hc="#555555"></i> Faculty and Staff Researchers for CMU Funded Research</h6></li>
                                <li><h6><i class="livicon" data-name="check" data-size="12" data-loop="true" data-c="#555555" data-hc="#555555"></i> Outside CMU Researchers</h6></li>
                                <li><h6><i class="livicon" data-name="check" data-size="12" data-loop="true" data-c="#555555" data-hc="#555555"></i> Other Research Clientele</h6></li>
                            </ul>
                            <ul>
                                <li>
                                    <h5><strong>What are the requirements:</strong></h5>
                                </li>
                            </ul>
                            <ul>
                                <li><h6><i class="livicon" data-name="check" data-size="12" data-loop="true" data-c="#555555" data-hc="#555555"></i> Accomplished request form</h6></li>
                                <li><h6><i class="livicon" data-name="check" data-size="12" data-loop="true" data-c="#555555" data-hc="#555555"></i> Copy of the approved/signed proposal of the study</h6></li>
                                <li><h6><i class="livicon" data-name="check" data-size="12" data-loop="true" data-c="#555555" data-hc="#555555"></i> Raw data encoded in spreedsheet format (MS Excel, Open Office)</h6></li>
                            </ul>
                        </div>
                    </div>
                    <!-- Collapseone End -->
                </div>
                <!-- //Panel Panel-default End -->
                <div class="panel panel-default">
                    <div class="panel-heading text_bg">
                        <h4 class="panel-title text-left">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                            <span class=" glyphicon glyphicon-plus success"></span>
                            <span class="success text-left">Undergraduate Electronic Document Management System</span>
                        </a>
                    </h4>
                    </div>
                    <div id="collapseTwo" class="panel-collapse collapse">
                            <div class="panel-body text-left">
                                <h4>What's the purpose of this application?
                                </h4>
                                <ul>
                                    <li><h6><i class="livicon" data-name="check" data-size="12" data-loop="true" data-c="#555555" data-hc="#555555"></i>Easy access to researcher materials kept by the Research Office</h6></li>
                                    <li><h6><i class="livicon" data-name="check" data-size="12" data-loop="true" data-c="#555555" data-hc="#555555"></i>Uploading of Undergraduate Proposals/Manuscripts</h6></li>
                                </ul>
                            </div>
                        </div>
                </div>
                
                <div class="panel panel-default">
                    <div class="panel-heading text_bg">
                        <h4 class="panel-title  text-left">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
                            <span class=" glyphicon glyphicon-plus success"></span>
                            <span class="success">How to Register?</span></a>
                        </h4>
                    </div>
                    <div id="collapseThree" class="panel-collapse collapse">
                        <div class="panel-body">
                            <h4><strong style="color:red">MUST BE AN UNDERGRADUATE OF CENTRAL MINDANAO UNIVERSITY</strong></h4>
                            <h5>Click <strong>REGISTER</strong> in the upper right of this application then fill-in the required fields</h5>
                            <img style="width:90%" src="/images/register.jpg" >
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-2"></div>
    </div> 
</div> 
<div class="container">
    <div class="row" id="Contact">
            <h2 class="warning text-center">CONTACT US</h2>
            @if($flash = session('error'))
            <script>
                swal({
                title: "Opps! There was an error",
                text: "",
                icon: "error",
                button: "OK",
                });
            </script>
        @elseif($flash = session('success'))
            <script>
                swal({
                title: "Sent Successfully",
                text: "",
                icon: "success",
                button: "OK",
                });
            </script>
        @endif
        <div class="col-md-6">
            <form class="contact" action="{{route('sendMessage')}}" method="POST" style="magin-top:40px"> @csrf
                <div class="form-group">
                    <input type="text" name="sender_name" value="{{(Auth::check())? auth()->user()->fname.' '.auth()->user()->minitial.' '.auth()->user()->sname:''}}" class="form-control input-lg" placeholder="Your name">
                </div>
                <div class="form-group">
                    <input type="email" name="sender_email" value="{{(Auth::check())? auth()->user()->email:''}}" class="form-control input-lg" placeholder="Your email address">
                </div>
                <div class="form-group">
                    <textarea name="sender_message" class="form-control input-lg no-resize" rows="6" placeholder="Your message"></textarea>
                </div>
                <div class="input-group">
                    <button class="btn btn-primary">submit</button>
                    <button class="btn btn-danger">cancel</button>
                </div>
            </form>
        </div>
        <div class="col-md-6 col-sm-6">
            <div class="media media-right">
                <div class="media-left media-top">
                        <div class="box-icon">
                            <i class="livicon" style="padding-right:12px" data-name="home" data-size="22" data-loop="true" data-c="#fff" data-hc="#fff"></i>
                        </div>
                </div>
                <div class="media-body text-left">
                    <h4 class="media-heading">Address:</h4>
                    <address>
                        P-12, College Park,Musan Maramag Bukidnon,Philippines,Region X
                    </address>
                </div>
            </div>
            <div class="media padleft10">
                <div class="media-left media-top">
                    <a href="#">
                        <div class="box-icon">
                            <i class="livicon" style="padding-right:12px" data-name="mail" data-size="22" data-loop="true" data-c="#fff" data-hc="#fff"></i>
                        </div>
                    </a>
                </div>
                <div class="media-body text-left">
                    <h4 class="media-heading">Email:</h4> 
                    <strong>University Webmail:</strong> researchoffice@cmu.edu.ph
                    <br> <strong>Director's Email Address:</strong> agtbruno@cmu.edu.ph
                </div>
            </div>
            <div class="media padleft10" style="padding-top:15px">
                <div class="media-left media-top">
                    <a href="#">
                        <div class="box-icon">
                            <i class="livicon" style="padding-right:12px" data-name="phone" data-size="22" data-loop="true" data-c="#fff" data-hc="#fff"></i>
                        </div>
                    </a>
                </div>
                <div class="media-body text-left">
                    <h4 class="media-heading">Landline:</h4> 
                    888-828-896
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


