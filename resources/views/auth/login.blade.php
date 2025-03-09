@extends('web.layouts.app')

@section('content')
<div class="d-flex align-items-center justify-content-center min-vh-100" style="background: linear-gradient(to right, #6a11cb, #2575fc);">
    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <h3 class="card-title text-center">NOVUS</h3>
                <form method="POST" action="{{ route('login') }}">
                    {{ csrf_field() }}

                    <div class="mb-3">
                        <label for="email" class="form-label">Username / Email</label>
                        <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" autofocus>
                        @if ($errors->has('email'))
                        <div class="invalid-feedback">
                            {{ $errors->first('email') }}
                        </div>
                        @endif
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password">
                        @if ($errors->has('password'))
                        <div class="invalid-feedback">
                            {{ $errors->first('password') }}
                        </div>
                        @endif
                    </div>

                    <button type="submit" class="btn btn-primary">Login</button>
                    <a class="ms-3" href="{{ route('password.request') }}">Forget password?</a>
                </form>
                <!-- <p class="mt-3">You have no account? <a href="{{ route('register') }}">Click here</a>.</p> -->
            </div>
        </div>
    </div>
</div>
@endsection
