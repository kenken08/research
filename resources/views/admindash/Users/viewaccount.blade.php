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
                    <i class="livicon" data-name="users" data-size="14" data-color="#333" data-hovercolor="#333"></i> Users
                </a> >>
                <a href="/dashboard">
                    <i class="livicon" data-name="user" data-size="14" data-color="#333" data-hovercolor="#333"></i> Account
                </a>
            </li>
        </ol>
    </section>
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-4">
                    <div class="panel" style="background:#485460">
                        <div class="form-group">
                            <div class="text-center">
                                <div class="fileinput fileinput-new" data-provides="fileinput">
                                    <div class="fileinput-new thumbnail">
                                        <img src="/storage/profilepic/{{isset(auth()->user()->profilepic)? auth()->user()->profilepic: 'noimage.png'}}" class="img-responsive user_image" alt="image" />
                                    </div>
                                    <div class="fileinput-preview fileinput-exists thumbnail"></div>
                                    {!! Form::open(['action'=>'UserController@uploadProfilepic','method'=>'POST','enctype'=>'multipart/form-data']) !!}
                                    {!! csrf_field() !!}
                                        <div>
                                            <span class="btn btn-default btn-file">
                                                <span class="fileinput-new">Upload Image</span>
                                                <span class="fileinput-exists">Change</span>
                                                <input type="file" name="profilepic">
                                            </span>
                                            <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
                                            <button type="submit" class="btn btn-success fileinput-exists"><i class="livicon" data-name="save" data-loop="true" data-size="15" data-c="#fff"></i> Save</button>
                                        </div>
                                    {!! Form::close() !!}
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table  table-striped" id="users">
                                <tr>
                                    <td>Name</td>
                                    <td><p>{{$fullname}}</p></td>
                                </tr>
                                <tr>
                                    <td class="text-white">Email</td>
                                    <td class="text-white"><p>{{auth()->user()->email}}</p></td>
                                </tr>
                                <tr>
                                    <td>Status</td>
                                    <td><p>{{auth()->user()->status}}</p></td>
                                </tr>
                                <tr>
                                    <td class="text-white">Created At</td>
                                    <td class="text-white">{{auth()->user()->created_at->diffForHumans()}}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <ul class="nav nav-tabs ul-edit responsive">
                        <li class="active">
                            <a href="#tab-profile" data-toggle="tab">
                                <i class="livicon" data-name="user" data-size="16" data-c="#01BC8C" data-hc="#01BC8C" data-loop="true"></i> Account Profile
                            </a>
                        </li>
                        <li>
                            <a href="#tab-change-pwd" data-toggle="tab">
                                <i class="livicon" data-name="key" data-size="16" data-c="#01BC8C" data-hc="#01BC8C" data-loop="true"></i> Change Password
                            </a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div id="tab-profile" class="tab-pane fade in active">
                            <br><br><br>
                            <div class="activity">
                                <div class="imgs-profile">
                                    {!! Form::open(['action'=>'UserController@updateAccount','method'=>'POST','id'=>'commentForm']) !!}
                                    {!! csrf_field()!!}
                                        <div class="panel-body">
                                            <div class="form-group col-md-12">
                                                <div class="col-md-6">
                                                    <label class="pull-left">Firstname:</label>
                                                    <input type="text" id="fname" class="form-control{{ $errors->has('fname') ? ' is-invalid' : '' }}" name="fname" value="{{ auth()->user()->fname }}" required autofocus>
                                                        @if ($errors->has('fname'))
                                                            <span class="invalid-feedback">
                                                                <strong>{{ $errors->first('fname') }}</strong>
                                                            </span>
                                                        @endif
                                                </div>
                                                <div class="col-md-2">
                                                <label class="pull-left">Initial:</label>
                                                <input maxlength="2" type="text" id="minitial" class="form-control{{ $errors->has('minitial') ? ' is-invalid' : '' }}" name="minitial" value="{{ auth()->user()->minitial }}" required autofocus>
                                                    @if ($errors->has('minitial'))
                                                        <span class="invalid-feedback">
                                                            <strong>{{ $errors->first('minitial') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                                <div class="col-md-4">
                                                <label class="pull-left">Lastname:</label>
                                                <input type="text" id="sname" class="form-control{{ $errors->has('sname') ? ' is-invalid' : '' }}" name="sname" value="{{ auth()->user()->sname }}" required autofocus>
                                                    @if ($errors->has('sname'))
                                                        <span class="invalid-feedback">
                                                            <strong>{{ $errors->first('sname') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label class="pull-left"><i class="livicon" data-name="mail" data-loop="true" data-size="20"></i>Email:</label>
                                                    <input type="email" id="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ auth()->user()->email }}">
                                                        @if ($errors->has('email'))
                                                            <span class="invalid-feedback">
                                                                <strong class="text-red">{{ $errors->first('email') }}</strong>
                                                            </span>
                                                        @endif
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="pull-left"><i class="livicon" data-name="sitemap" data-loop="true" data-size="20"></i>Position:</label>
                                                    <input type="text" id="position" class="form-control{{ $errors->has('position') ? ' is-invalid' : '' }}" name="position" value="{{ auth()->user()->position }}">
                                                        @if ($errors->has('position'))
                                                            <span class="invalid-feedback">
                                                                <strong class="text-red">{{ $errors->first('position') }}</strong>
                                                            </span>
                                                        @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="panel-footer text-right">
                                            <button type="submit" class="btn btn-success"><i class="livicon" data-name="save" data-loop="true" data-size="15" data-c="#fff"></i> Save Changes</button>
                                        </div>
                                    {!! Form::close() !!}
                                </div>
                            </div>
                        </div>
                        <div id="tab-change-pwd" class="tab-pane fade">
                            <br><br><br>
                            <div class="activity">
                                <div class="imgs-profile">
                                    {!! Form::open(['action'=>'UserController@changepwd','method'=>'POST','id'=>'commentForm']) !!}
                                    {!! csrf_field()!!}
                                        <div class="panel-body form-horizontal">
                                            <div class="col-md-12">
                                                <label class="pull-left"><i class="livicon" data-name="lock" data-loop="true" data-size="20"></i>Current Password:</label>
                                                <input type="password" id="oldpassword" class="form-control{{ $errors->has('oldpassword') ? ' is-invalid' : '' }}" name="oldpassword">
                                                @if(isset($error)){{$error}}@endif
                                                @if ($errors->has('oldpassword'))
                                                    <span class="invalid-feedback">
                                                        <strong class="text-red">{{ $errors->first('oldpassword') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                            <div class="col-md-12">
                                                <label class="pull-left"><i class="livicon" data-name="lock" data-loop="true" data-size="20"></i>New Password:</label>
                                                <input type="password" id="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password">
                                                @if ($errors->has('password'))
                                                    <span class="invalid-feedback">
                                                        <strong class="text-red">{{ $errors->first('password') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                            <div class="col-md-12">
                                                <label class="pull-left"><i class="livicon" data-name="key" data-loop="true" data-size="20"></i> Confirm Password:</label>
                                                <input type="password" id="password_confirmation" class="form-control" name="password_confirmation">
                                            </div>
                                        </div>
                                        <br>
                                        <div class="panel-footer text-right">
                                            <button type="submit" class="btn btn-success"><i class="livicon" data-name="save" data-loop="true" data-size="15" data-c="#fff"></i> Save Changes</button>
                                        </div>
                                    {!! Form::close() !!}
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
<script>
    $(".boxer").boxer();
</script>    