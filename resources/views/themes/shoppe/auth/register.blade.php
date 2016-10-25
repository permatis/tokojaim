@extends('themes.shoppe.partials.main')

@section('content')
    <div class="header">
    @include('themes.shoppe.partials.navbar')
    </div>
    <div class="main">
        <div class="content">
            <h2 style="text-align: center;margin-bottom: -30px;">Registrasi Area</h2>
            <div class="forms">
                <form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
                {{ csrf_field() }}

                    <label for="name" class="col-md-4 control-label">Name</label>
                        <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}">

                        @if ($errors->has('name'))
                            <span class="help-block">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                        @endif

                    <label for="email" class="col-md-4 control-label">E-Mail Address</label>
                        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}">

                        @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif

                    <label for="password" class="col-md-4 control-label">Password</label>
                        <input id="password" type="password" class="form-control" name="password">

                        @if ($errors->has('password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif

                    <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation">

                        @if ($errors->has('password_confirmation'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password_confirmation') }}</strong>
                            </span>
                        @endif

                        <button type="submit" class="btn btn-primary">
                            <i class="fa fa-btn fa-user"></i> Register
                        </button>
                </form>
            </div>
        </div>
    </div>
@endsection
