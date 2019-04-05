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
                    <i class="livicon" data-name="user-add" data-size="14" data-color="#333" data-hovercolor="#333"></i> Add User
                </a>
            </li>
        </ol>
    </section>
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        <i class="livicon" data-name="user-add" data-size="18" data-c="#fff" data-hc="#fff" data-loop="true"></i> {{$title}}
                    </h3>
                </div>
                {!! Form::open(['id'=>'commentForm','action'=>'UserController@storeUser', 'method'=>'POST']) !!}
                {!! csrf_field() !!}
                    <div class="panel-body form-horizontal" style="margin-top:30px">
                        <div class="container">
                            <div class="form-group">
                                <div class="col-sm-4">
                                    <label class="pull-left">Firstname *</label>
                                    <input type="text" id="fname" class="form-control{{ $errors->has('firstname') ? ' is-invalid' : '' }}" name="fname" value="{{ old('fname') }}">
                                        @if($errors->has('firstname'))
                                            <span class="invalid-feedback">
                                                <strong class="text-red">{{ $errors->first('firstname') }}</strong>
                                            </span>
                                        @endif
                                </div>
                                <div class="col-sm-2">
                                    <label class="pull-left">Initial *</label>
                                    <input maxlength="1" type="text" id="minitial" class=" text-uppercase form-control{{ $errors->has('minitial') ? ' is-invalid' : '' }}" name="minitial" value="{{ old('minitial') }}">
                                        @if ($errors->has('initial'))
                                            <span class="invalid-feedback">
                                                <strong class="text-red">{{ $errors->first('initial') }}</strong>
                                            </span>
                                        @endif
                                </div>
                                <div class="col-md-4">
                                    <label class="pull-left">Lastname *</label>
                                    <input type="text" id="sname" class="form-control{{ $errors->has('sname') ? ' is-invalid' : '' }}" name="sname" value="{{ old('sname') }}">
                                        @if ($errors->has('surname'))
                                            <span class="invalid-feedback">
                                                <strong class="text-red">{{ $errors->first('surname') }}</strong>
                                            </span>
                                        @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-10">
                                    <label class="pull-left">Email:</label>
                                    <input type="email" id="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}">
                                        @if ($errors->has('email'))
                                            <span class="invalid-feedback">
                                                <strong class="text-red">{{ $errors->first('email') }}</strong>
                                            </span>
                                        @endif
                                </div>
                            </div>
                            {{-- <div class="form-group">
                                <div class="col-sm-10">
                                    <label class="pull-left">Position:</label>
                                    <input type="text" id="position" class="form-control{{ $errors->has('position') ? ' is-invalid' : '' }}" name="position" value="{{ old('position') }}">
                                        @if ($errors->has('position'))
                                            <span class="invalid-feedback">
                                                <strong class="text-red">{{ $errors->first('position') }}</strong>
                                            </span>
                                        @endif
                                </div>
                            </div> --}}
                            <div class="form-group">
                                <div class="col-sm-10"><label class="pull-left">Position:</label></div>
                                <div class="col-sm-10">
                                    <select class="form-control select21" id="position" title="Select Position..." name="position">
                                        <option disabled selected>Select Role</option>
                                        <option value="2,Statistician">Statistician</option>
                                        <option value="2,Administrative Aide">Administrative Aide</option>
                                        <option value="2,Utility Worker and Messenger">Utility Worker and Messenger</option>
                                        <option value="2,Office Clerk">Office Clerk</option>
                                        <option value="2,Research Staff">Research Staff</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-10">
                                    <label class="pull-left">Password:</label>
                                    <input type="password" id="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password">
                                        @if ($errors->has('password'))
                                            <span class="invalid-feedback">
                                                <strong class="text-red">{{ $errors->first('password') }}</strong>
                                            </span>
                                        @endif
                                </div>
                            </div>
                            <div class="form-group">
                                    <div class="col-sm-10">
                                    <label class="pull-left">Confirm Password:</label>
                                    <input type="password" id="password_confirmation" class="form-control" name="password_confirmation">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel-footer text-center">
                        <a href="/users" class="btn btn-warning"><i class="livicon" data-name="chevron-left" data-loop="true" data-size="15" data-c="#fff"></i> Back</a>
                        <button type="submit" class="btn btn-success"><i class="livicon" data-name="save" data-loop="true" data-size="15" data-c="#fff"></i> Submit</button>
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</aside>
@endsection