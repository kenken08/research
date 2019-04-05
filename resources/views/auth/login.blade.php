@extends('layouts.app')
@section('css')
@include('landingpage.logincss')
@endsection
@section('contents')
<div class="container">
        <!--Content Section Start -->
        <div class="row">
            <div class="box animation flipInX">
                <div class="box1">
                    <div class="box2">  
                        <a href="/"><img src="images/cmulogo.png" alt="logo" href="/" class="img-responsive"></a>
                    <h4>{{ __('Login') }}</h4>
                    </div>
                    
                    <form action="{{route('login')}}" method="POST">
                        @csrf
                        <div class="form-group {{ $errors->has('email') ? 'is-invalid' : ' '}}" style="margin-bottom:30px">
                            <label class="sr-only"></label>
                            <input class="form-control" id="email" type="email" name="email" placeholder="Email" value="{{old('email')}}">
                            @if($errors->has('email'))
                                <span class="invalid-feedback">
                                    <strong class="text-red">{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
                        

                        <div class="form-group {{ $errors->has('password') ? 'is-invalid' : ' '}}" style="margin-bottom:30px">
                            <label class="sr-only"></label>
                            <input class="form-control" id="password" type="password" name="password" placeholder="Password">
                            @if ($errors->has('password'))
                                <span class="invalid-feedback">
                                    <strong class="text-red">{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>

                        <input type="submit" class="btn btn-block btn-primary" value="Login">
                        <p>Don't have an account? <a href="/sign-up"><strong> Sign up</strong></a></p>
                    </form>
                </div>
                {{-- <div class="bg-light animation flipInX">
                    <a href="forgot.html">Forgot Password?</a>
                </div> --}}
            </div>
        </div>
        <!-- //Content Section End -->
</div>
@endsection
@section('scripts')
@endsection