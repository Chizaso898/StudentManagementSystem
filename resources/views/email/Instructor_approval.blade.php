html

<!DOCTYPE html>
<html>
<head>
    <title>Instructor Approval</title>
</head>
<body>
    <h2>Hello, {{ $name }}</h2>
    <p>Your request to become an instructor has been approved.</p>
    <p>Please create your password using the link below:</p>
    <a href="{{ url('/set-password?email=' . $email) }}">Set Password</a>
    <p>After setting your password, you can log in with your email and password.</p>
    <p>Thank you for joining us!</p>
</body>
</html>
