@extends('welcome')

@section('content')

<div class="container" style="max-width: 800px; margin-top: 50px;">
    @if (session('success'))
        <h6 class="alert alert-success text-center">{{ session('success') }}</h6>
    @endif

    <div class="card card-primary">
        <div class="card-header text-center">
            <h3 class="card-title">Update User</h3>
        </div>

        <form method="POST" action="{{ url('/updateusers', $user->id) }}" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                
                <!-- Name -->
                <div class="form-group">
                    <label for="name">{{ __('Name') }}</label>
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" 
                           name="name" value="{{ old('name', $user->name) }}" required>
                    @error('name')
                        <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                    @enderror
                </div>

                <!-- Email -->
                <div class="form-group">
                    <label for="email">{{ __('Email') }}</label>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" 
                           name="email" value="{{ old('email', $user->email) }}" required>
                    @error('email')
                        <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                    @enderror
                </div>

                <!-- Password (Optional) -->
                <div class="form-group">
                    <label for="password">{{ __('New Password (Leave empty to keep current)') }}</label>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" 
                           name="password">
                    @error('password')
                        <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                    @enderror
                </div>

                <!-- Confirm Password -->
                <div class="form-group">
                    <label for="confirmpassword">{{ __('Confirm New Password') }}</label>
                    <input id="confirmpassword" type="password" class="form-control @error('confirmpassword') is-invalid @enderror" 
                           name="confirmpassword">
                    @error('confirmpassword')
                        <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                    @enderror
                </div>

                <!-- Role Selection -->
                <div class="form-group">
                    <label for="role">{{ __('Role') }}</label>
                    <select id="role" class="form-control @error('role') is-invalid @enderror" name="role" required>
                        <option value="user" {{ $user->role == 'user' ? 'selected' : '' }}>User</option>
                        <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
                    </select>
                    @error('role')
                        <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                    @enderror
                </div>

            </div>

            <!-- Submit Button -->
            <div class="card-footer text-center">
                <button type="submit" class="btn btn-primary">Update User</button>
            </div>
        </form>
    </div>
</div>

@endsection
