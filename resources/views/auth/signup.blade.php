<x-auth-layout>
    <div class="d-flex justify-content-center align-items-center min-vh-100">
        <div class="card shadow p-4" style="max-width: 500px; width: 100%;">
            <h1 class="text-primary text-center font-weight-bold mb-4">
                <span class="text-info">i</span>Clear
            </h1>

            <form action="page-profile.html" method="POST">
                @csrf

                <div class="form-group">
                    <label>Academic Title</label>
                    <input type="text" class="form-control" name="academic_title" placeholder="e.g., Dr., Prof.">
                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label>Firstname</label>
                        <input type="text" class="form-control" name="firstname" placeholder="First name">
                    </div>
                    <div class="form-group col-md-6">
                        <label>Middlename</label>
                        <input type="text" class="form-control" name="middlename" placeholder="Middle name">
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label>Lastname</label>
                        <input type="text" class="form-control" name="lastname" placeholder="Last name">
                    </div>
                    <div class="form-group col-md-6">
                        <label>Suffix</label>
                        <input type="text" class="form-control" name="suffix" placeholder="e.g., Jr., III">
                    </div>
                </div>

                <div class="form-group">
                    <label>Email</label>
                    <input type="email" class="form-control" name="email" placeholder="you@example.com">
                </div>

                <div class="form-group">
                    <label>Password</label>
                    <input type="password" class="form-control" name="password" placeholder="Enter password">
                </div>

                <button type="submit" class="btn btn-primary btn-block">Create Account</button>
            </form>

            <div class="text-center mt-3">
                <small>Already have an account?
                    <a href="{{ route('login.student') }}" class="font-weight-bold text-primary">Sign In</a>
                </small>
            </div>
        </div>
    </div>
</x-auth-layout>
