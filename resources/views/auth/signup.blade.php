<x-auth-layout>
    <div class="d-flex justify-content-center align-items-center min-vh-100">
        <div class="card shadow p-4" style="max-width: 600px; width: 100%;">
            <h1 class="text-primary text-center font-weight-bold mb-4">
                <span class="text-info">i</span>Clear
            </h1>

            <form action="{{ route('register.student.submit') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label>Student ID</label>
                    <input type="text" class="form-control" name="student_id" value="{{ old('student_id') }}" required>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label>First Name</label>
                        <input type="text" class="form-control" name="first_name" value="{{ old('first_name') }}" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Middle Name</label>
                        <input type="text" class="form-control" name="middle_name" value="{{ old('middle_name') }}">
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label>Last Name</label>
                        <input type="text" class="form-control" name="last_name" value="{{ old('last_name') }}" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Suffix</label>
                        <input type="text" class="form-control" name="suffix" value="{{ old('suffix') }}">
                    </div>
                </div>

                <div class="form-group">
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
            </form>

            <div class="text-center mt-3">
                <small>Already have an account?
                    <a href="{{ route('login.student') }}" class="font-weight-bold text-primary">Sign In</a>
                </small>
            </div>
        </div>
    </div>
</x-auth-layout>
