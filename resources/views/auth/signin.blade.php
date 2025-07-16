<x-auth-layout>
<<<<<<< HEAD
    <div class="az-card-signin shadow">
        <h1 class="text-primary text-center font-weight-bold mb-3">
            <span class="text-info">i</span>Clear
        </h1>

        <div class="text-center mb-4">
            <h4 class="font-weight-bold mb-1">Welcome back!</h4>
            <small class="text-muted">Please sign in to continue</small>
        </div>

        <form action="index.html" method="POST">
            @csrf

            <div class="form-group">
                <label>Username</label>
                <input type="email" class="form-control" name="email" placeholder="Enter your username">
            </div>

            <div class="form-group">
                <label>Password</label>
                <input type="password" class="form-control" name="password" placeholder="Enter your password">
            </div>

            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
        </form>

        <div class="mt-3 text-center">
            <a href="#" class="d-block mb-2">Forgot password?</a>
            <small>Don't have an account?
                <a href="{{ route('register.student') }}" class="font-weight-bold text-primary">Create one</a>
            </small>
        </div>
    </div><!-- az-card-signin -->
=======
    <div class="d-flex justify-content-center align-items-center min-vh-100">
        <div class="card shadow p-4" style="max-width: 600px; width: 100%;">
            <h1 class="text-primary text-center font-weight-bold mb-4">
                <span class="text-info">i</span>Clear
            </h1>

            @if(session('success'))
                <div class="alert alert-success mt-2">
                    {{ session('success') }}
                </div>
            @endif

            <form action="{{ route('login.submit') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label>ID Number or Username</label>
                    <input type="text" name="username" class="form-control" value="{{ old('username') }}" required>
                    @error('username') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                <div class="form-group mt-2">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control" required>
                    @error('password') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                <button type="submit" class="btn btn-primary btn-block mt-3">Login</button>
            </form>

            <div class="text-center mt-3">
                <small>Don't have an account?
                    <a href="{{ route('register.student') }}" class="font-weight-bold text-primary">Create one</a>
                </small>
            </div>
        </div>
    </div>
>>>>>>> 298cde63cad50d4fecfcfcfc777f3cc3cd2612b4
</x-auth-layout>
