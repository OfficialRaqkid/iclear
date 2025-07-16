<x-auth-layout>
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
</x-auth-layout>
