@extends('layouts.dashuser')

@section('contents')
<aside class="right-side">
    <section class="content-header">
        <ol class="breadcrumb">
            <li class="active">
                <a href="/dashboard">
                    <i class="livicon" data-name="home" data-size="14" data-color="#333" data-hovercolor="#333"></i> Dashboard
                </a> >>
                <a href="">
                    <i class="livicon" data-name="comments" data-size="14" data-color="#333" data-hovercolor="#333"></i> Messages
                </a>
            </li>
        </ol>
    </section>
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-primary table-edit">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        <span>
                            <i class="livicon" data-name="comments" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>Messages
                        </span>
                    </h3>
                </div>
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
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="panel  panel-danger">
                                <div class="panel-heading">
                                    <h3 class="panel-title">
                                        <i class="fa fa-comments">Messages</i>
                                    </h3>
                                </div>
                                <div class="panel-body" style="overflow:auto;max-height:400px;">
                                    @foreach($messages as $m)
                                        <div class="box">
                                            <div class="box-header">
                                                <h5 class="box-title">
                                                    @foreach(\App\User::where('id',$m->sender_id)->get() as $user)
                                                        <span><img src="/storage/profilepic/{{$user->profilepic}}" width="40px" height="40px" alt=""> {{($user->id == Auth::user()->id)? 'You' :$user->fname.' '.$user->minitial.' '.$user->sname}}</span>
                                                        <span class="pull-right">{{date('F d, Y h:m A', strtotime($m->created_at))}}</span>
                                                    @endforeach
                                                </h5>
                                            </div>
                                            <div class="panel-body">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <h4>{{$m->message}}</h4>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                <div class="panel-footer">
                                    <form id="replyTo" action="{{route('sendMessage')}}" method="POST"> 
                                        @csrf
                                        <div class="row">
                                            <div class="col-xs-10">
                                                <textarea required name="sender_message" id="sender_message" cols="75" placeholder="Enter you Message here" rows="4"></textarea>
                                            </div>
                                            <div class="col-xs-1">
                                                <button type="submit" onclick="document.getElementById('replyTo').submit()" class="btn btn-md btn-primary">Send</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</aside>
@endsection