@extends('layouts.main')
@section('left_teams')
    <div class="left-side sticky-left-side" style='background-color: #006D96;'>
        <!--logo and iconic logo end-->
        <div class="left-side-inner">
            <div class="scrollbar scrollbar1">
                <!--sidebar nav start-->
                <ul class="nav nav-pills nav-stacked custom-nav" style="margin-top: 0 !important; ">
                    <li style="height: 58px!important;" class="active"><a href="{{ url('/') }}"><img
                                    src="{{ asset('icons/4.png') }}" style="width: 41px;height: 47px" alt="Home"/></a>
                    </li>
                </ul>
                <!--sidebar nav end-->
                <div class="text-center">
                    <a href="{{ url('/teams/more') }}"><img src="{{ asset('images/17.png') }}"/></a>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('content')
    <div id="page-wrapper">
        <!-- contact -->
        <div class="contact signup-body" style="margin-top: 0">
            <div class="login-body">
                <div class="login-heading">
                    <h3>Sign up</h3>
                </div>
                <div class="login-info">
                    <form method="POST" action="{{ url('/register') }}">
                        {{ csrf_field() }}
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                        <input type="text" class="user" name="name" placeholder="Name" id="name" value="{{ old('name') }}" required autofocus />
                            @if ($errors->has('name'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                            @endif
                        </div>
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <input type="text" class="user" name="email" placeholder="Email" id="email" value="{{ old('email') }}" required />
                            @if ($errors->has('email'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                            @endif
                        </div>
                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                        <input type="password" name="password" class="lock" placeholder="Password" />

                            @if ($errors->has('password'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                            @endif
                        </div>
                        <input type="password" id="password-confirm" name="password_confirmation"  class="lock" placeholder="Confirm Password" />
                        <input type="submit" name="Sign In" value="Sign up">
                    </form>
                </div>
            </div>
        </div>
        <!-- //contact -->
    </div>
@endsection
