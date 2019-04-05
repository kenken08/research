@extends('layouts.app')
@section('css')
@include('landingpage.registercss')
@endsection
@section('contents')
<div class="container">
        <!--Content Section Start -->
        <div class="row">
            <div class="box animation flipInX">
                <div class="box1">
                    <a href="/"><img src="images/cmulogo.png" alt="logo" href="/" class="img-responsive"></a>
                    <h4>Register</h4>
                </div>
                @if($flash = session('error'))
                    <script>
                        swal({
                        title: "Oops! Something Went Wrong",
                        text: "",
                        icon: "error",
                        button: "OK",
                        });
                    </script>
                @elseif($flash = session('registered'))
                    <script>
                        swal({
                        title: "Registered Successfully",
                        text: "",
                        icon: "success",
                        button: "OK",
                        });
                    </script>
                @endif
                    {!!Form::open(['action'=>'UserController@store', 'method'=>'POST', 'enctype'=>'multipart/form-data'])!!}
                    @csrf
                    <div class="form-group col-md-12">
                        {{-- <label class="sr-only"></label> --}}
                        <div class="col-md-6">
                            <label class="pull-left">Firstname:</label>
                            <input type="text" id="fname" class="form-control{{ $errors->has('fname') ? ' is-invalid' : '' }}" name="fname" value="{{ old('fname') }}" required autofocus>
                                @if ($errors->has('fname'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('fname') }}</strong>
                                    </span>
                                @endif
                        </div>
                        <div class="col-md-2">
                        <label class="pull-left">Initial:</label>
                        <input maxlength="1" type="text" id="minitial" class="form-control{{ $errors->has('minitial') ? ' is-invalid' : '' }}" name="minitial" value="{{ old('minitial') }}" required autofocus>
                            @if ($errors->has('minitial'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('minitial') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="col-md-4">
                        <label class="pull-left">Lastname:</label>
                        <input type="text" id="sname" class="form-control{{ $errors->has('sname') ? ' is-invalid' : '' }}" name="sname" value="{{ old('sname') }}" required autofocus>
                            @if ($errors->has('sname'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('sname') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                
                    <div class="form-group col-md-12">
                        {{-- <label class="sr-only"></label> --}}
                        <div class="col-md-6">
                            <label class="pull-left">Email:</label>
                            <input type="email" id="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>
                                @if ($errors->has('email'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                        </div>
                        <div class="col-md-6">
                            <label class="pull-left">Student ID:</label>
                            <input type="number" id="studentid" class="form-control{{ $errors->has('studentid') ? ' is-invalid' : '' }}" name="studentid" value="{{ old('studentid') }}" required autofocus>
                                @if ($errors->has('studentid'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('studentid') }}</strong>
                                    </span>
                                @endif
                        </div>
                    </div>
                    <div class="form-group col-md-12">
                            {{-- <label class="sr-only"></label> --}}
                        <div class="col-md-12">
                            {{-- <label class="pull-left">Select Your Course</label> --}}
                            <select name="progid" class="form-control">
                                @foreach($col as $college)
                                    <optgroup label="{{$college->cname}}">
                                        @foreach($prog as $program)
                                            @if($program->collegeid==$college->id)
                                            <option value="{{$program->collegeid.','.$program->id}}">{{$program->pname}}</option>
                                            @endif
                                        @endforeach
                                    </optgroup>
                                @endforeach
                            </select>                              
                        </div>
                    </div>
                    <div class="form-group col-md-12">
                        {{-- <label class="sr-only"></label> --}}
                        <div class="col-md-6">
                            <label class="pull-left">Password:</label>
                            <input type="password" id="Password1" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                        </div>
                            <div class="col-md-6">
                            {{-- <label class="sr-only"></label> --}}
                            <label class="pull-left">Confirm Password:</label>
                            <input type="password" id="Password2" class="form-control" name="password_confirmation" required>
                        </div>
                    </div>
                    <div class="form-group col-md-12">
                            {{-- <label class="sr-only"></label> --}}
                        <div class="col-md-12">
                                <input type="submit" class="btn btn-block btn-primary" value="Sign up">
                        </div>
                    </div>
                    
                    Have account already? Please go to <a href="/login"> Sign In</a>
                    {!!form::close()!!} 
            </div>
        </div>
        <!-- //Content Section End -->
    </div>
@endsection
@section('scripts')
@endsection


