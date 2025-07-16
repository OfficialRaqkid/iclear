<x-auth-layout>
    <div class="d-flex justify-content-center align-items-center min-vh-100">
<<<<<<< HEAD
        <div class="card shadow p-4" style="max-width: 500px; width: 100%;">
=======
        <div class="card shadow p-4" style="max-width: 600px; width: 100%;">
>>>>>>> 298cde63cad50d4fecfcfcfc777f3cc3cd2612b4
            <h1 class="text-primary text-center font-weight-bold mb-4">
                <span class="text-info">i</span>Clear
            </h1>

<<<<<<< HEAD
            <form action="page-profile.html" method="POST">
                @csrf

                <div class="form-group">
                    <label>Academic Title</label>
                    <input type="text" class="form-control" name="academic_title" placeholder="e.g., Dr., Prof.">
=======
            <form action="{{ route('register.student.submit') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label>Student ID</label>
                    <input type="text" class="form-control" name="student_id" value="{{ old('student_id') }}" required>
>>>>>>> 298cde63cad50d4fecfcfcfc777f3cc3cd2612b4
                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">
<<<<<<< HEAD
                        <label>Firstname</label>
                        <input type="text" class="form-control" name="firstname" placeholder="First name">
                    </div>
                    <div class="form-group col-md-6">
                        <label>Middlename</label>
                        <input type="text" class="form-control" name="middlename" placeholder="Middle name">
=======
                        <label>First Name</label>
                        <input type="text" class="form-control" name="first_name" value="{{ old('first_name') }}" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Middle Name</label>
                        <input type="text" class="form-control" name="middle_name" value="{{ old('middle_name') }}">
>>>>>>> 298cde63cad50d4fecfcfcfc777f3cc3cd2612b4
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">
<<<<<<< HEAD
                        <label>Lastname</label>
                        <input type="text" class="form-control" name="lastname" placeholder="Last name">
                    </div>
                    <div class="form-group col-md-6">
                        <label>Suffix</label>
                        <input type="text" class="form-control" name="suffix" placeholder="e.g., Jr., III">
=======
                        <label>Last Name</label>
                        <input type="text" class="form-control" name="last_name" value="{{ old('last_name') }}" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Suffix</label>
                        <input type="text" class="form-control" name="suffix" value="{{ old('suffix') }}">
>>>>>>> 298cde63cad50d4fecfcfcfc777f3cc3cd2612b4
                    </div>
                </div>

                <div class="form-group">
<<<<<<< HEAD
                    <label>Email</label>
                    <input type="email" class="form-control" name="email" placeholder="you@example.com">
                </div>

                <div class="form-group">
                    <label>Password</label>
                    <input type="password" class="form-control" name="password" placeholder="Enter password">
                </div>

                <button type="submit" class="btn btn-primary btn-block">Create Account</button>
=======
                    <label>Contact Number</label>
                    <input type="tel" class="form-control" name="contact_number" value="{{ old('contact_number') }}" required>
                </div>

                <div class="form-group">
                    <label>Home Address</label>
                    <textarea class="form-control" name="address" rows="2" required>{{ old('address') }}</textarea>
                </div>

                {{-- Program Selector --}}
                <div class="form-group">
                    <label>Program</label>
                    <select class="form-control" name="program_id" required>
                        <option value="">-- Select Program --</option>
                        @foreach($programs as $program)
                            <option value="{{ $program->id }}" {{ old('program_id') == $program->id ? 'selected' : '' }}>
                                {{ $program->department->abbreviation }} - {{ $program->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                {{-- Year Level Selector --}}
                <div class="form-group">
                    <label>Year Level</label>
                    <select class="form-control" name="year_level_id" required>
                        <option value="">-- Select Year Level --</option>
                        @foreach($yearLevels as $level)
                            <option value="{{ $level->id }}" {{ old('year_level_id') == $level->id ? 'selected' : '' }}>
                                {{ $level->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <button type="submit" class="btn btn-primary btn-block mt-3">Create Account</button>
>>>>>>> 298cde63cad50d4fecfcfcfc777f3cc3cd2612b4
            </form>

            <div class="text-center mt-3">
                <small>Already have an account?
<<<<<<< HEAD
                    <a href="{{ route('login.student') }}" class="font-weight-bold text-primary">Sign In</a>
=======
                    <a href="{{ route('login') }}" class="font-weight-bold text-primary">Sign In</a>
>>>>>>> 298cde63cad50d4fecfcfcfc777f3cc3cd2612b4
                </small>
            </div>
        </div>
    </div>
</x-auth-layout>
