@extends('themes.shoppe.partials.main')

@section('content')
    <div class="header">
    @include('themes.shoppe.partials.navbar')
    </div>
    <div class="main">
        <div class="content">
            <h2 style="text-align: center;margin-bottom: -30px;">Register Area</h2>
            <div class="forms">
                <form role="form" method="POST" action="{{ url('/register') }}">
                {{ csrf_field() }}

                    <label for="name">Name</label>
                        <input id="name" type="text" name="name" value="{{ old('name') }}">

                        @if ($errors->has('name'))
                            <span class="error">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                        @endif

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

                    <label for="password-confirm">Confirm Password</label>
                    <input id="password-confirm" type="password" name="password_confirmation">

                        @if ($errors->has('password_confirmation'))
                            <span class="error">
                                <strong>{{ $errors->first('password_confirmation') }}</strong>
                            </span>
                        @endif

                        <button type="submit">Register</button>
                </form>
            </div>
        </div>
    </div>
@endsection
