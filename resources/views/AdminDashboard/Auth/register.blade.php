@extends('welcome')

@section('content')

<div class="container" style="max-width: 800px; margin-top: 50px;">
    @if (session('success'))
        <h6 class="alert alert-success text-center">{{ session('success') }}</h6>
    @endif

    <div class="card card-primary">
        <div class="card-header text-center">
            <h3 class="card-title">User Registration</h3>
        </div>

        <form method="POST" action="{{ url('/register') }}" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                
                <!-- Name -->
                <div class="form-group">
                    <label for="name">{{ __('Name') }}</label>
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" 
                           name="name" value="{{ old('name') }}" required autofocus placeholder="Enter your name">
                    @error('name')
                        <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                    @enderror
                </div>

                <!-- Email -->
                <div class="form-group">
                    <label for="email">{{ __('Email') }}</label>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" 
                           name="email" value="{{ old('email') }}" required placeholder="Enter your email">
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

                <!-- Role Selection -->
                <div class="form-group">
                    <label for="role">{{ __('Role') }}</label>
                    <select id="role" class="form-control @error('role') is-invalid @enderror" name="role" required>
                        <option value="user">User</option>
                        <option value="admin">Admin</option>
                    </select>
                    @error('role')
                        <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                    @enderror
                </div>

            </div>

            <!-- Submit Button -->
            <div class="card-footer text-center">
                <button type="submit" class="btn btn-primary">Register</button>
                <p class="mt-3">
                    Already have an account? <a href="{{ url('/getlogin') }}" class="text-primary">Login here</a>
                </p>
            </div>
        </form>
    </div>
</div>

@endsection
