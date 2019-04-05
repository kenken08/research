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
                        <div class="col-md-4">
                            <div class="panel panel-info">
                                <div class="panel-heading">
                                    <h3 class="panel-title">
                                        <span>
                                            <i class="fa fa-mobile"></i> Contact(s)
                                        </span>
                                    </h3>
                                </div>
                                <div class="panel-body">
                                    <div class="row">
                                        <table class="table table-bordered table-striped table-condensed flip-content">
                                            <tbody>
                                                @foreach($messages as $message)
                                                    <tr>
                                                        @foreach(\App\User::where('id',$message->sender_id)->get() as $user)
                                                            <td>
                                                                <img src="/storage/profilepic/{{$user->profilepic}}" alt="" style="width:30px;height:30px;">
                                                            </td>
                                                            <td>{{$user->fname.' '.$user->minitial.' '.$user->sname}} @if(count(\App\messagesdetails::where('status','unread')->where('message_id',$message->id)->where('sender_id',$user->id)->get()) > 0 )<span class="label label-success">{{count(\App\messagesdetails::where('status','unread')->where('message_id',$message->id)->where('sender_id',$user->id)->get())}}</span>@endif</td>
                                                        @endforeach
                                                        <td>
                                                            <form action="{{route('showMessages',$message->id)}}" method="POST"> @csrf
                                                                <button type="submit" class="btn btn-xs btn-primary pull-right">View</button>
                                                            </form>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="panel  panel-danger">
                                <div class="panel-heading">
                                    <h3 class="panel-title">
                                        <i class="fa fa-comments">Messages {{(isset($fname))? 'of '.$fname:''}}</i>
                                    </h3>
                                </div>
                                <div class="panel-body" style="overflow:auto;max-height:400px;">
                                    <div class="row">
                                        @if(isset($fname))
                                            @foreach($mes as $m)
                                                <div class="box">
                                                    <div class="box-header">
                                                        <h5 class="box-title">
                                                            @foreach(\App\User::where('id',$m->sender_id)->get() as $user)
                                                                <span><img src="/storage/profilepic/{{$user->profilepic}}" width="40px" height="40px" alt=""> {{$user->fname.' '.$user->minitial.' '.$user->sname}}</span>
                                                                <span class="pull-right">{{date('F d, Y h:m A', strtotime($m->created_at))}}</span>
                                                            @endforeach
                                                        </h5>
                                                    </div>
                                                    <div class="panel-body">
                                                        <div class="row">
                                                            <h4>{{$m->message}}</h4>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @endif
                                    </div>
                                </div>
                                @if(isset($fname))
                                    <div class="panel-footer">
                                        <form id="replyTo" action="{{ route('replyTo', $mid) }}" method="POST"> 
                                            @csrf
                                            <div class="row">
                                                <input type="text" name="mid" id="mid" value="{{$mid}}" class="hidden">
                                                <div class="col-xs-10">
                                                    <textarea required name="reply_message" id="reply_message" cols="65" placeholder="Enter you Message here" rows="4"></textarea>
                                                </div>
                                                <div class="col-xs-2">
                                                    <button type="submit" onclick="document.getElementById('replyTo').submit()" class="btn btn-xs btn-primary">Send</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</aside>
@endsection