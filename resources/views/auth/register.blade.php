html

<!-- resources/views/auth/register.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>
<body>

    <h2>Register</h2>

    <form action="{{ route('register') }}" method="POST">
        @csrf

        <!-- Name Input -->
        <div>
            <label for="name">Name</label>
            <input type="text" name="name" id="name" value="{{ old('name') }}" required>
            @error('name')
                <div>{{ $message }}</div>
            @enderror
        </div>

        <!-- Email Input -->
        <div>
            <label for="email">Email</label>
            <input type="email" name="email" id="email" value="{{ old('email') }}" required>
            @error('email')
                <div>{{ $message }}</div>
            @enderror
        </div>

        <!-- Password Input -->
        <div>
            <label for="password">Password</label>
            <input type="password" name="password" id="password" required>
            @error('password')
                <div>{{ $message }}</div>
            @enderror
        </div>

        <!-- Confirm Password Input -->
        <div>
            <label for="password_confirmation">Confirm Password</label>
            <input type="password" name="password_confirmation" id="password_confirmation" required>
        </div>

        <!-- Role Selection -->
        <div>
            <label for="role">Role</label>
            <select name="role" id="role" required>
                <option value="student">Student</option>
                <option value="instructor">Instructor</option>
            </select>
            @error('role')
                <div>{{ $message }}</div>
            @enderror
        </div>

        <button type="submit">Register</button>
    </form>

</body>
</html>
