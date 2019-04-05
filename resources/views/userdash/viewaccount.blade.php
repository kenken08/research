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
                                <i class="livicon" data-name="user" data-size="16" data-c="#01BC8C" data-hc="#01BC8C" data-loop="true"></i> Change Email
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
                                    {!! Form::open(['action'=>'UserController@userEmailUpdate','method'=>'POST']) !!}
                                    {!! csrf_field()!!}
                                        <div class="panel-body">
                                            <div class="form-group col-md-12">
                                                <div class="col-md-6">
                                                    <label class="pull-left">Email:</label>
                                                    <input type="email" id="oldemail" class="form-control" name="oldemail" value="{{ auth()->user()->email }}" readonly>
                                                        @if ($errors->has('oldemail'))
                                                            <span class="invalid-feedback">
                                                                <strong class="text-red">{{ $errors->first('oldemail') }}</strong>
                                                            </span>
                                                        @endif
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="pull-left">New Email:</label>
                                                    <input type="text" id="email" class="form-control" name="email" value="">
                                                        @if ($errors->has('email'))
                                                            <span class="invalid-feedback">
                                                                <strong class="text-red">{{ $errors->first('email') }}</strong>
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
                                        @if($flash = session('error'))
                                        <script>
                                            swal({
                                            title: "Old Password doesn't match to Current Password!",
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