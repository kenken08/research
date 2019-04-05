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
                        </div>
                    </div>
        
            <!-- BEGIN SIDEBAR MENU -->
            <ul id="menu" class="page-sidebar-menu">
                <li >
                    <a href="/user-dashboard">
                        <i class="livicon" data-name="home" data-size="20" data-c="#418BCA" data-hc="#418BCA" data-loop="true"></i>
                        <span class="title">Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="/upload-proposal">
                        <i class="livicon" data-name="brush" data-size="20" data-c="#418BCA" data-hc="#418BCA"  data-loop="true"></i>
                        <span class="title">Upload Proposal</span>
                    </a>
                </li>
                <li>
                    @if($pstat !== null)
                        @if(\App\research_papers::where('user_id',Auth::user()->id)->value('manuscript')!=null)
                            <a href="#" onclick="viewModall()">
                                <i class="livicon" data-name="notebook" data-size="20" data-c="#418BCA" data-hc="#418BCA"  data-loop="true"></i>
                                <span class="title" data-toggle="modal" data-target="">Upload Manuscript</span>
                                <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header" style="background:teal;">
                                                <h5 class="modal-title" style="color:white;" id="exampleModalLabel">Upload Manuscript</h5>
                                            </div>
                                            @if($flash = session('wrong'))
                                                <script>
                                                    swal({
                                                    title: "Wrong Research Number!",
                                                    text: "Please Check your email if a Research Number has been provided",
                                                    icon: "error",
                                                    button: "OK",
                                                    });
                                                </script>
                                            @endif
                                            {!!Form::open(['action'=>'UploadController@manuscript', 'method'=>'POST'])!!}
                                            {{ csrf_field() }}
                                                <div class="modal-body text-center">
                                                    <label style="color:black">Enter Research Number:
                                                    <input name="rnumber" type="number" min="0" value=""></label>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-primary">Submit</button>
                                                </div>
                                            {!! form::close() !!}
                                        </div>
                                    </div>
                                </div>
                            </a>
                        @else
                            <a href="#" onclick="{{(\App\research_papers::where('user_id',Auth::user()->id)->value('proposal_status')=='pending' || \App\research_papers::where('user_id',Auth::user()->id)->value('proposal_status')=='needs revision')? 'viewModal()':''}}">
                                <i class="livicon" data-name="notebook" data-size="20" data-c="#418BCA" data-hc="#418BCA"  data-loop="true"></i>
                                <span class="title" data-toggle="modal" data-target="{{(\App\research_papers::where('user_id',Auth::user()->id)->value('proposal_status')=='pending' || \App\research_papers::where('user_id',Auth::user()->id)->value('proposal_status')=='needs revision')? '':'#modal'}}">Upload Manuscript</span>
                                <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header" style="background:teal;">
                                                <h5 class="modal-title" style="color:white;" id="exampleModalLabel">Upload Manuscript</h5>
                                            </div>
                                            @if($flash = session('wrong'))
                                                <script>
                                                    swal({
                                                    title: "Wrong Research Number!",
                                                    text: "Please Check your email if a Research Number has been provided",
                                                    icon: "error",
                                                    button: "OK",
                                                    });
                                                </script>
                                            @endif
                                            {!!Form::open(['action'=>'UploadController@manuscript', 'method'=>'POST'])!!}
                                            {{ csrf_field() }}
                                                <div class="modal-body text-center">
                                                    <label style="color:black">Enter Research Number:
                                                    <input name="rnumber" type="number" min="0" value=""></label>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-primary">Submit</button>
                                                </div>
                                            {!! form::close() !!}
                                        </div>
                                    </div>
                                </div>
                            </a>
                        @endif
                    @else
                        <a href="#" onclick="viewModal()">
                            <i class="livicon" data-name="notebook" data-size="20" data-c="#418BCA" data-hc="#418BCA"  data-loop="true"></i>
                            <span class="title" data-toggle="modal" data-target="{{(\App\research_papers::where('user_id',Auth::user()->id)->value('proposal_status')=='pending' || \App\research_papers::where('user_id',Auth::user()->id)->value('proposal_status')=='needs revision')? '':'#modal'}}">Upload Manuscript</span>
                        </a>
                    @endif
                </li>
                <li>
                    <a href="/user-messages">
                        <i class="livicon" data-name="comments" data-size="20" data-c="#418BCA" data-hc="#418BCA" data-loop="true"></i>
                        <span class="title">Messages</span> <span class="label label-success">{{\App\messagesdetails::where('sender_id',Auth::user()->id)->where('sender_status',0)->count()}}</span>
                    </a>
                </li>
                <li>
                    <a href="/userdash-profile">
                        <i class="livicon" data-name="home" data-size="20" data-c="#418BCA" data-hc="#418BCA" data-loop="true"></i>
                        <span class="title">Account</span>
                    </a>
                </li>
            </ul>
            <!-- END SIDEBAR MENU -->
        </div>
    </section>

    <!-- /.sidebar -->
       
</aside>
<script>
    function viewModal(){
        swal({
        title:"No Research Number / Pending Proposal!",
        text: "",
        icon: "error",
        button: "OK",
        });
    }
    function viewModall(){
        swal({
        title:"You can only upload once!",
        text: "",
        icon: "error",
        button: "OK",
        });
    }
</script>


