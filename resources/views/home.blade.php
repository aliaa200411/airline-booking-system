<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Flight Booking System - Home</title>

    <!-- Google Fonts: Poppins (أوزان غامقة) -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: url("https://static.sayidaty.net/styles/900_scale/public/2024-03/330466.jpg.webp") no-repeat center center fixed;
            background-size: cover;
            color: white;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            font-family: 'Poppins', sans-serif;
            padding: 20px;
            text-align: center;
        }

        .glass-container {
            background: rgba(255, 255, 255, 0.1);
            border-radius: 20px;
            padding: 40px 30px;
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.37);
            border: 1px solid rgba(255, 255, 255, 0.18);
            max-width: 400px;
            width: 100%;
        }

        .welcome-text {
            font-size: 1.5rem;
            margin-bottom: 10px;
            font-weight: 600; /* تغميق الخط */
        }

        h1 {
            margin-bottom: 30px;
            font-weight: 700; /* تغميق العنوان */
            font-size: 2.5rem;
        }

        .btn-glass {
            width: 100%;
            margin: 12px 0;
            font-size: 1.1rem;
            padding: 12px;
            border-radius: 14px;
            background: rgba(255, 255, 255, 0.15);
            border: 1px solid rgba(255, 255, 255, 0.3);
            color: white;
            backdrop-filter: blur(10px);
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 600; /* تغميق زر */
            text-decoration: none;
        }

        .btn-glass:hover {
            background: rgba(255, 255, 255, 0.25);
            transform: scale(1.03);
        }

        .icon {
            margin-left: 10px;
            font-size: 1.3rem;
        }
    </style>
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</head>
<body>

    <div class="glass-container">
        <div class="welcome-text">Welcome aboard! Your journey begins here.</div>
        <h1>Flight Booking</h1>

        

        <a href="{{ route('passenger.dashboard') }}" class="btn btn-glass">
            Dashboard <i class="fas fa-user icon"></i>
        </a>
        <a href="{{ route('flights.index') }}" class="btn btn-glass">
            View Flights <i class="fas fa-plane-departure icon"></i>
        </a>

        <a href="{{ route('logout') }}" class="btn btn-glass">
            Logout <i class="fas fa-sign-out-alt icon"></i>
        </a>
    </div>

</body>
</html>
