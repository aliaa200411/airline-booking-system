<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Airline Booking System</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body {
            margin: 0;
            font-family: 'Roboto', sans-serif;
            background: url(https://plus.unsplash.com/premium_photo-1679830513886-e09cd6dc3137?fm=jpg&q=60&w=3000&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MXx8ZmxpZ2h0fGVufDB8fDB8fHww) no-repeat center center fixed;
            background-size: cover;
        }

        .overlay {
            background: rgba(0, 0, 0, 0.6);
            position: absolute;
            inset: 0;
        }

        .login-container {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            z-index: 2;
            width: 90%;
            max-width: 400px;
            background: white;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.3);
            text-align: center;
            
        }

        h2 {
            margin-bottom: 20px;
            color: #333;
        }

        input, select {
            width: 100%;
            padding: 12px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 8px;
            font-size: 16px;
        }

        button {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 12px;
            width: 100%;
            border-radius: 8px;
            font-size: 16px;
            cursor: pointer;
            transition: background 0.3s;
        }

        button:hover {
            background-color: #0056b3;
        }

        .container-wrap {
            position: relative;
            min-height: 100vh;
        }

        .text-link {
            margin-top: 10px;
            display: block;
            font-size: 14px;
        }
    </style>
</head>
<body>
    <div class="container-wrap">
        <div class="overlay"></div>
        <div class="login-container">
            <h2>Login</h2>

            @if(session('error'))
                <p style="color:red;">{{ session('error') }}</p>
            @endif

            <form method="POST" action="{{ url('/login') }}">
                @csrf

                <label for="email" style="display: none;">Email</label>
                <input type="email" name="email" id="email" placeholder="Email" required>

                <label for="password" style="display: none;">Password</label>
                <input type="password" name="password" id="password" placeholder="Password" required>

                <label for="role" style="display: none;">Role</label>
                <select name="role" id="role" required>
                    <option value="" disabled selected>Select Role</option>
                    <option value="user">User</option>
                    <option value="admin">Admin</option>
                </select>

                <button type="submit">Login</button>
                            <a class="text-link" href="{{ route('password.request') }}">Forgot your password?</a>

            </form>

            <a class="text-link" href="{{ route('register') }}">Don't have an account? Register</a>
        </div>
    </div>
</body>
</html>
