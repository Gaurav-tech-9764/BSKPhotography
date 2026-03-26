<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login - BSK Photography</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #1a1a2e 0%, #16213e 50%, #0f3460 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Segoe UI', sans-serif;
        }
        .login-card {
            background: rgba(255,255,255,0.05);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255,255,255,0.1);
            border-radius: 20px;
            padding: 50px 40px;
            width: 100%;
            max-width: 420px;
        }
        .login-card h2 {
            color: #c9a96e;
            font-weight: 700;
            letter-spacing: 2px;
            text-align: center;
            margin-bottom: 10px;
        }
        .login-card p.subtitle {
            color: rgba(255,255,255,0.5);
            text-align: center;
            margin-bottom: 30px;
            font-size: 0.9rem;
        }
        .form-control {
            background: rgba(255,255,255,0.08);
            border: 1px solid rgba(255,255,255,0.15);
            color: #fff;
            padding: 12px 15px;
            border-radius: 10px;
        }
        .form-control:focus {
            background: rgba(255,255,255,0.12);
            border-color: #c9a96e;
            color: #fff;
            box-shadow: 0 0 0 3px rgba(201,169,110,0.2);
        }
        .form-control::placeholder { color: rgba(255,255,255,0.3); }
        .form-label { color: rgba(255,255,255,0.7); font-size: 0.85rem; font-weight: 500; }
        .btn-login {
            background: #c9a96e;
            color: #1a1a2e;
            font-weight: 700;
            letter-spacing: 1px;
            padding: 12px;
            border: none;
            border-radius: 10px;
            width: 100%;
            text-transform: uppercase;
            font-size: 0.9rem;
            transition: all 0.3s;
        }
        .btn-login:hover {
            background: #b08d4f;
            color: #fff;
            transform: translateY(-2px);
            box-shadow: 0 5px 20px rgba(201,169,110,0.3);
        }
        .form-check-label { color: rgba(255,255,255,0.5); font-size: 0.85rem; }
        .back-link { color: rgba(255,255,255,0.4); text-decoration: none; font-size: 0.85rem; }
        .back-link:hover { color: #c9a96e; }
    </style>
</head>
<body>
    <div class="login-card">
        <h2><i class="bi bi-camera"></i></h2>
        <h2>BSK Photography</h2>
        <p class="subtitle">Admin Panel Login</p>

        @if($errors->any())
            <div class="alert alert-danger py-2" style="background: rgba(220,53,69,0.15); border-color: rgba(220,53,69,0.3); color: #ff6b6b; font-size: 0.85rem; border-radius: 10px;">
                @foreach($errors->all() as $error)
                    <div>{{ $error }}</div>
                @endforeach
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="mb-3">
                <label class="form-label">Email Address</label>
                <input type="email" name="email" class="form-control" value="{{ old('email') }}" placeholder="admin@example.com" required autofocus>
            </div>
            <div class="mb-3">
                <label class="form-label">Password</label>
                <input type="password" name="password" class="form-control" placeholder="Enter password" required>
            </div>
            <div class="mb-4 form-check">
                <input type="checkbox" class="form-check-input" name="remember" id="remember">
                <label class="form-check-label" for="remember">Remember me</label>
            </div>
            <button type="submit" class="btn-login">Sign In</button>
        </form>

        <div class="text-center mt-4">
            <a href="{{ route('home') }}" class="back-link"><i class="bi bi-arrow-left"></i> Back to Website</a>
        </div>
    </div>
</body>
</html>
