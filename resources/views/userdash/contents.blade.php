@extends('layouts.dashuser')

@section('contents')
<aside class="right-side">
    
    <!-- Main content -->
    <section class="content-header">
        <h1>Welcome to Dashboard</h1>
        <ol class="breadcrumb">
            <li class="active">
                <a href="/dashboard">
                    <i class="livicon" data-name="home" data-size="14" data-color="#333" data-hovercolor="#333"></i> Dashboard
                </a>
            </li>
        </ol>
    </section>
    <section class="content">
        <div class="col-md-12">
            <div class="row ">
                <div class="col-md-7">
                    <div class="panel panel-danger">
                        <div class="panel-heading border-light">
                            <h4 class="panel-title">
                                <i class="livicon" data-name="check-circle" data-size="18" data-color="white" data-hc="white" data-l="true"></i> Status
                            </h4>
                        </div>
                        <div class="panel-body">
                            <br>
                            <table class="table table-hover dataTable no-footer" id="sample_editable_1" role="grid">
                                <div class="container">
                                    <h5>Your Research Number: <strong>{{($rs==null || $status=='pending' || $status == 'needs revision')? 'No Research Number/Pending Proposal': $rs}}</strong></h5>
                                    <tbody>
                                        <tr class="text-uppercase">
                                            <td style="vertical-align:middle; min-width:120px; max-width:120px;" class="text-right">Proposal :</td>
                                            <td style="vertical-align:middle;"><span class="btn btn-sm btn-{{($status=='approved')? 'success':'warning'}}">{{isset($status)? $status:'No Proposal Submitted'}}</span></td>
                                            @if($status == 'approved')
                                                <td class="text-center" style="vertical-align:middle;"><h6><a href="" onclick="event.preventDefault()" data-toggle="modal" data-target="#myModalApp">View Comment</a></h6></td>
                                            @else
                                                <td class="text-center" style="vertical-align:middle;">{!! ($status == 'needs revision')? '<h6><a href="" onclick="event.preventDefault()" data-toggle="modal" data-target="#myModalCom">View Comment</a></h6>' :'' !!}</td>
                                            @endif
                                            <td style="vertical-align:middle;" class="text-center"><a target="{{($status=='approved')?'_blank':''}}" href="{{($status=='approved')? '/proposal/'.$proposal:'/upload-proposal'}}" class="btn btn-sm btn-{{($status=='approved')? 'primary':'info'}}">{{($status=='approved')? 'View Proposal':'Upload'}}</a></td>
                                        </tr>
                                        <tr class="text-uppercase">
                                            <td style="vertical-align:middle;" class="text-right">Manuscript :</td>
                                            <td style="vertical-align:middle;"><span class="btn btn-sm btn-{{($manu==null)? 'warning':'success'}}">{{($manu==null)? 'No Submitted Manuscript':'Complete'}}</span></td>
                                            <td></td>
                                            @if($status=='pending' || $proposal==null || $status == 'needs revision')
                                                <td style="vertical-align:middle;" class="text-center"><a class="btn btn-danger btn-sm">No Action</a></td>
                                            @else
                                                <td style="vertical-align:middle;" class="text-center"><a target="{{($status=='approved' AND $manuscript!=null)? '_blank':''}}" href="{{($status=='approved' AND $manuscript!=null)? '/manuscript/'.$manuscript:''}}" data-toggle="modal" data-target="{{($status=='approved' AND $manuscript!=null)? '':'#modal'}}" class="btn btn-sm btn-{{($status=='approved')? 'primary':'info'}}">{{(($status=='approved' AND $manuscript!=null))? 'View Manuscript':'Upload'}}</a></td>
                                            @endif
                                        </tr><td></td><td></td><td></td><td></td></tr>
                                    </tbody>
                                </div>
                            </table>
                            <div class="modal fade" id="myModalCom" role="dialog">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header bg-primary text-left">
                                            <h4 class="modal-title" id="modalLabeldanger"><i class="fa fa-comment"></i> Feedback</h4>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label for="">From: 
                                                        @if($revisioncom !==null)
                                                            @foreach($users as $user)
                                                                @if($user->id == $revisioncom->user_id)
                                                                    {{$user->fname.' '.$user->minitial.' '.$user->sname}}
                                                                @endif
                                                            @endforeach
                                                        @endif
                                                    </label>
                                                </div>
                                                <div class="col-md-6 pull-right">
                                                    Date: {!! ($revisioncom == null)? '--' :date('F d, Y', strtotime($revisioncom->created_at)) !!}
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12 text-left">
                                                    <label for="">Comment:</label>
                                                </div>
                                                <div class="col-md-12">
                                                    {!! ($revisioncom == null)? '--' : $revisioncom->description !!}
                                                </div>
                                            </div><hr>
                                            <div class="row">
                                                <div class="panel">
                                                    <div class="panel-header">
                                                        <h4 class="panel-title text-black">Previous Comments</h4>
                                                    </div>
                                                    <div class="panel-body">
                                                        <table>
                                                            <thead>
                                                                <tr>
                                                                    <th class="text-center" style="width:200px">Evaluator</th>
                                                                    <th class="text-center" style="width:100px">Date</th>
                                                                    <th class="text-center" style="width:400px">Comment</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @foreach($prevcom as $pc)
                                                                    <tr>
                                                                        <td>
                                                                            @foreach($users as $user)
                                                                                @if($user->id == $pc->user_id)
                                                                                    {{$user->fname.' '.$user->minitial.' '.$user->sname}}
                                                                                @endif
                                                                            @endforeach
                                                                        </td>
                                                                        <td class="text-center">{{date('F d, Y',strtotime($pc->created_at))}}</td>
                                                                        <td class="text-center">
                                                                            <div id="accordion-demo" class="panel-group">
                                                                                <div class="panel">
                                                                                    {{-- <div class="panel-heading"> --}}
                                                                                        <h5>
                                                                                            <a href="#id{{$pc->id}}" data-parent="#accordion-demo" data-toggle="collapse">Preview</a>
                                                                                        </h5>
                                                                                    {{-- </div> --}}
                                                                                    <div id="id{{$pc->id}}" class="panel-collapse collapse">
                                                                                        <div class="panel-body text-left">
                                                                                            <form id="id{{$pc->id}}">
                                                                                                <div class="row">
                                                                                                    <div class="col-md-12">
                                                                                                        {!! $pc->description !!}
                                                                                                    </div>
                                                                                                </div>
                                                                                            </form>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button class="btn btn-md btn-danger" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal fade" id="myModalApp" role="dialog">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header bg-primary text-left">
                                            <h4 class="modal-title" id="modalLabeldanger"><i class="fa fa-comment"></i> Feedback</h4>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label for="">From: 
                                                        @if($approvecom !== null)
                                                            @foreach($users as $user)
                                                                @if($user->id == $approvecom->user_id)
                                                                    {{$user->fname.' '.$user->minitial.' '.$user->sname}}
                                                                @endif
                                                            @endforeach
                                                        @endif
                                                    </label>
                                                </div>
                                                <div class="col-md-6 text-right">
                                                    Date: {!! ($approvecom == null)? '-' : date('F d, Y', strtotime($approvecom->created_at)) !!}
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12 text-left">
                                                    <label for="">Comment:</label>
                                                </div>
                                                <div class="col-md-12">
                                                    {!! ($approvecom == null)? '-' : $approvecom->description !!}
                                                </div>
                                            </div>
                                            <div class="row"><hr>
                                                <div class="panel">
                                                    <div class="panel-heading">
                                                        <h4 class="panel-title">Previous Comments</h4>
                                                    </div>
                                                    <div class="panel-body">
                                                        <table>
                                                            <thead>
                                                                <tr>
                                                                    <th class="text-center" style="width:200px">Sender</th>
                                                                    <th class="text-center" style="width:100px">Date</th>
                                                                    <th class="text-center" style="width:400px">Comment</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @foreach($prevcom as $pc)
                                                                    <tr>
                                                                        <td>
                                                                            @foreach($users as $user)
                                                                                @if($user->id == $pc->user_id)
                                                                                    {{$user->fname.' '.$user->minitial.' '.$user->sname}}
                                                                                @endif
                                                                            @endforeach
                                                                        </td>
                                                                        <td class="text-center">{{date('F d, Y',strtotime($pc->created_at))}}</td>
                                                                        <td class="text-center">
                                                                            <div id="accordion-demo" class="panel-group">
                                                                                <div class="panel">
                                                                                    {{-- <div class="panel-heading"> --}}
                                                                                        <h5>
                                                                                            <a href="#appid{{$pc->id}}" data-parent="#accordion-demo" data-toggle="collapse">Preview</a>
                                                                                        </h5>
                                                                                    {{-- </div> --}}
                                                                                    <div id="appid{{$pc->id}}" class="panel-collapse collapse">
                                                                                        <div class="panel-body text-left">
                                                                                            <form id="appid{{$pc->id}}">
                                                                                                <div class="row">
                                                                                                    <div class="col-md-12">
                                                                                                        {!! $pc->description !!}
                                                                                                    </div>
                                                                                                </div>
                                                                                            </form>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <div class="row">
                                                <div class="col-md-6 pull-left">
                                                    <h6>
                                                        @foreach(\App\research_papers::where('user_id',Auth::user()->id)->get() as $pc)
                                                            @if($pc->dateapproved !== null)
                                                                @foreach($users as $user)
                                                                    @if($user->id == $pc->checked_by)
                                                                    Approved By: {{$user->fname.' '.$user->minitial.' '.$user->sname}}
                                                                    @endif
                                                                @endforeach
                                                            @endif
                                                        @endforeach
                                                    </h6>
                                                </div>
                                                <div class="col-md-6">
                                                    <button class="btn btn-md btn-danger pull-right" data-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="panel panel-primary">
                        <div class="panel-heading border-light">
                            <h4 class="panel-title">
                                <i class="livicon" data-name="user" data-size="18" data-color="white" data-hc="white" data-l="true"></i> Profile
                                <a href="/userdash-profile" class=" pull-right btn btn-xs btn-success">Edit Profile</a>
                            </h4>
                        </div>
                        <div class="panel-body"><br>
                            <div class="row">
                                <div class="row">
                                    <div class="col-md-4">
                                        <img class="img img-circle" src="/storage/profilepic/{{Auth::user()->profilepic}}" style="width:150px;height:150px">
                                    </div>
                                    <div class="col-md-8">
                                        <h5>
                                            <p><hr></p>
                                            <strong>Name&emsp;&emsp;:</strong> {{Auth::user()->fname.' '.Auth::user()->minitial.' '.Auth::user()->sname}} <hr>
                                            <strong>Email &emsp;&emsp;:</strong> {{Auth::user()->email}} <hr>
                                        </h5>
                                    </div>
                                </div><hr>
                                <div class="row">
                                    <div class="col-md-12">
                                        @foreach($colleges as $col)
                                            @if($col->id == Auth::user()->collegeid)
                                                <h5>
                                                    <strong>College&emsp;&emsp;:</strong> {{$col->cname}}<hr>
                                                    @foreach($programs as $p)
                                                        @if($p->collegeid = $col->id)
                                                            @if($p->id == Auth::user()->programid)
                                                                <strong>Program &emsp;&nbsp;&nbsp;:</strong> {{$p->pname}}
                                                            @endif
                                                        @endif
                                                    @endforeach
                                                </h5>
                                            @elseif(Auth::user()->collegeid == null)
                                                <h5>
                                                    <strong>College&emsp;&emsp;:</strong> N/A<hr>
                                                    <strong>Program &emsp;&nbsp;&nbsp;:</strong> N/A
                                                </h5>@break
                                            @endif
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div><br>
                    </div>
                </div>
            </div>
        </div>
    </section>
</aside>
@endsection