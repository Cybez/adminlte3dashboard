@extends('welcome')

@section('content')

<div class="container" style="max-width: 800px; margin-top: 50px;">

     @if (session('success'))
        <h6 class="alert alert-success text-center">{{ session('success') }}</h6>
    @endif
    @if (session('error'))
        <h6 class="alert alert-success text-center">{{ session('error') }}</h6>
    @endif

    <div class="card card-primary">
        <div class="card-header text-center">
            <h3 class="card-title">User Login</h3>
        </div>

        <form method="POST" action="{{ url('/login') }}" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                
                <!-- Email -->
                <div class="form-group">
                    <label for="email">{{ __('Email') }}</label>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" 
                           name="email" value="{{ old('email') }}" required autofocus placeholder="Enter your email">
                    @error('email')
                        <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                    @enderror
                </div>

                <!-- Password -->
                <div class="form-group">
                    <label for="password">{{ __('Password') }}</label>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" 
                           name="password" required placeholder="Enter your password">
                    @error('password')
                        <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                    @enderror
                </div>
            </div>

            <!-- Submit Button -->
            <div class="card-footer text-center">
                <button type="submit" class="btn btn-primary">Login</button>
                <p class="mt-3">
                    Don't have an account? <a href="{{ url('/getregister') }}" class="text-primary">Register here</a>
                </p>
            </div>
        </form>
    </div>
</div>

@endsection