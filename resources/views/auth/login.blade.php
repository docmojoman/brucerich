@extends('layouts.private')

@section('content')

    <div id="admin">
    <div class="grid-container">
      <div class="grid-x grid-margin-x margin-top-80">
        <div class="cell medium-6 medium-offset-3">
          <h1 class="h2">Login</h1>
            <form class="login-form" method="POST" action="{{ route('login') }}">

                {{ csrf_field() }}

            <label for="email">E-Mail Address</label>

            <input id="email" type="email" name="email" value="{{ old('email') }}" aria-describedby="emailHelpText" required autofocus>

            @if ($errors->has('email'))
                <span class="help-text" id="emailHelpText">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif

            <label for="password">Password</label>

            <input id="password" type="password" name="password" aria-describedby="passwordHelpText" required>

            @if ($errors->has('password'))
                <span class="help-text" id="passwordHelpText">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif

            <label>
                <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
            </label>

            <button type="submit" class="button large dark expanded">
                Login
            </button>

            <a href="{{ route('password.request') }}">
                &nbsp;
                Forgot Your Password?
            </a>

          </form>
        </div>
      </div>

        </div>

    </div>

@endsection
