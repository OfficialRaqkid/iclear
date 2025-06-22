<x-auth-layout>
    <div class="az-card-signin">
        <h1 class="az-logo"><span>i</span>Clear</h1>
        <div class="az-signin-header">
            <h2>Welcome back!</h2>
            <h4>Please sign in to continue</h4>

            <form action="index.html">
                <div class="form-group">
                    <label>Email</label>
                    <input type="text" class="form-control" placeholder="Enter your email">
                </div><!-- form-group -->
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" class="form-control" placeholder="Enter your password">
                </div><!-- form-group -->
                <button class="btn btn-az-primary btn-block">Sign In</button>
            </form>
        </div><!-- az-signin-header -->
        <div class="az-signin-footer">
            <p><a href="">Forgot password?</a></p>
            <p>Don't have an account? <a href="page-signup.html">Create an Account</a></p>
        </div><!-- az-signin-footer -->
    </div><!-- az-card-signin -->
</x-auth-layout>
