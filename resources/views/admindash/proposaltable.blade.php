@extends('layouts.admin')

@section('contents')
<aside class="right-side">
    <section class="content-header">
        <ol class="breadcrumb">
            <li class="active">
                <a href="/dashboard">
                    <i class="livicon" data-name="home" data-size="14" data-color="#333" data-hovercolor="#333"></i> Dashboard
                </a> >>
                <a href="">
                    <i class="livicon" data-name="random" data-size="14" data-color="#333" data-hovercolor="#333"></i> Undergraduate Thesis
                </a> >>
                <a href="/dashboard">
                    <i class="livicon" data-name="list" data-size="14" data-color="#333" data-hovercolor="#333"></i> Proposals
                </a>
            </li>
        </ol>
    </section>
    @if($flash = session('error'))
        <script>
            swal({
            title: "Oops! Something went wrong.",
            text: "",
            icon: "error",
            button: "OK",
            });
        </script>
    @elseif($flash = session('success'))
        <script>
            swal({
            title: "Updated Successfully",
            text: "",
            icon: "success",
            button: "OK",
            });
        </script>
    @endif
    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN SAMPLE TABLE PORTLET-->
            <div class="portlet box primary">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="livicon" data-name="responsive" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>Undergraduate Proposals
                    </div>
                </div>
                <div class="portlet-body flip-scroll">
                    <table class="table table-bordered table-striped table-condensed flip-content">
                        <thead class="flip-content">
                            <tr>
                                <th>Student ID</th>
                                <th>Name</th>
                                <th>Title</th>
                                <th>Date Uploaded</th>
                                <th>Date Approved</th>
                                <th>Checked By</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($proposals as $proposal)
                                <tr>
                                    @foreach($users as $user)
                                        @if($proposal->user_id == $user->id)
                                            <td class="text-center" style="vertical-align:middle;">
                                                {{$user->studentid}}
                                                <input type="text" name="resID" value="{{ $proposal->id }}" class="hidden">
                                            </td>
                                            <td style="vertical-align:middle;">
                                                {{isset($user->fname)? $user->fname.' '.$user->minitial.' '.$user->sname:'-'}}
                                            </td>
                                        @endif
                                    @endforeach
                                    <td style="vertical-align:middle;">
                                        <a target="_blank" href="/proposal/{{$proposal->title}}">
                                            {{$proposal->title}}
                                        </a>
                                    </td>
                                    <td class="text-center" style="vertical-align:middle;">
                                        {{date('F d, Y', strtotime($proposal->dateproposal))}}
                                    </td>
                                    <td class="text-center" style="vertical-align:middle;">
                                        {{($proposal->dateapproved != 0000-00-00)? date('F d, Y', strtotime($proposal->dateapproved)) : '-'}}
                                    </td>
                                    <td>
                                        @foreach($users as $user)
                                            @if($user->id == $proposal->checked_by)
                                                {{($proposal->checked_by ==  null)? '---': $user->fname.' '.$user->minitial.' '.$user->sname}}
                                            @endif
                                        @endforeach
                                    </td>
                                    <td class="text-center" style="vertical-align:middle;">
                                        @if($proposal->proposal_status == 'pending')
                                            <span class="btn btn-sm btn-info">Pending</span>
                                        @elseif($proposal->proposal_status == 'approved')
                                            <span class="btn btn-sm btn-success">Approved</span>
                                        @else
                                            <span class="btn btn-sm btn-warning">Needs Revision</span>
                                        @endif
                                    </td>
                                    <td class="text-center" style="vertical-align:middle;">
                                        @if($proposal->proposal_status != 'approved')
                                            {!! Form::open(['id'=>'email','action'=>['UploadController@sendMail', $proposal->user_id], 'method'=>'POST']) !!}
                                            {{ Form::token() }}
                                                <a class="btn btn-md btn-primary" onclick="document.getElementById('email').submit()"style="min-width:126px;">Approve</a>
                                                {{-- <a data-toggle="modal" data-target="#modalApprove{{$proposal->user_id}}" class="btn btn-md btn-primary" style="min-width:126px;">Approve</a>
                                                @include('admindash.proposalapprovemodal') --}}
                                            {!! Form::close() !!}
                                        
                                            {!! Form::open(['id'=>'comm','action'=>['UploadController@sendRevision', $proposal->user_id], 'method'=>'POST']) !!}
                                            {{ Form::token() }}
                                                <a class="btn btn-md btn-warning" onclick="document.getElementById('comm').submit()" style="min-width:120px;">Needs Revision</a>
                                                {{-- <a data-toggle="modal" data-target="#modalComment{{$proposal->user_id}}" class="btn btn-md btn-warning" style="min-width:120px;">Needs Revision</a>
                                                @include('admindash.proposalcommentsmodal') --}}
                                            {!! Form::close() !!}
                                        @else
                                            <span class="label label-info">No Action</span>
                                        @endif 
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</aside>
@endsection