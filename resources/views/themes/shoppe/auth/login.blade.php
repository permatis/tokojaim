@extends('themes.shoppe.partials.main')

@section('content')
    <div class="header">
    @include('themes.shoppe.partials.navbar')
    </div>
    <div class="main">
        <div class="content">
            <h2 style="text-align: center;margin-bottom: -30px;">Login Area</h2>
            <div class="forms">
                <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
                    {{ csrf_field() }}
                    
                    <label for="email">E-Mail Address</label>
                    <input id="email" type="email" name="email" value="{{ old('email') }}">
                    @if ($errors->has('email'))
                        <span class="error">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif

                    <label for="password">Password</label>
                    <input id="password" type="password" name="password">

                    @if ($errors->has('password'))
                        <span class="error">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif

                    <div class="checkbox">
                        <label>
                            <input type="checkbox" name="remember"> Remember Me
                        </label>
                    </div>

                    <button type="submit"> Login </button>

                    <a class="btn btn-link" href="{{ url('/password/reset') }}">Forgot Your Password?</a>
                </form>
            </div>
        </div>
    </div>

@endsection
