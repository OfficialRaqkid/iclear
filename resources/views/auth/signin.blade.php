<x-auth-layout>
    <!-- Updated login view -->
    <div class="d-flex justify-content-center align-items-center min-vh-100">
        <div class="card shadow p-4" style="max-width: 500px; width: 100%;">
            <h2 class="text-center text-primary">Student Login</h2>

            @if(session('success'))
                <div class="alert alert-success mt-2">
                    {{ session('success') }}
                </div>
            @endif

            <form action="{{ route('login.student.submit') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label>Student ID</label>
                    <input type="text" name="student_id" class="form-control" value="{{ old('student_id') }}" required>
                    @error('student_id') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                <div class="form-group mt-2">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control" required>
                    @error('password') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                <button type="submit" class="btn btn-primary btn-block mt-3">Login</button>
            </form>
        </div>
    </div>
</x-auth-layout>

