<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - JTrip</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            min-height: 100vh;
            font-family: 'Poppins', sans-serif;
            background: #f4f7f5;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 32px;
        }

        .auth-card {
            width: 100%;
            max-width: 1120px;
            min-height: 720px;
            background: #fff;
            border-radius: 28px;
            overflow: hidden;
            display: grid;
            grid-template-columns: 1.05fr 1fr;
            box-shadow: 0 30px 70px rgba(0,0,0,.12);
        }

        .auth-visual {
            position: relative;
            padding: 48px;
            color: #fff;
            background:
                linear-gradient(rgba(6,78,59,.78), rgba(6,78,59,.88)),
                url('{{ asset('admin/assets/images/papuma.png') }}') center/cover no-repeat;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .brand {
            font-weight: 800;
            font-size: 24px;
            margin-bottom: 16px;
        }

        .visual-title {
            font-size: 48px;
            line-height: 1.12;
            font-weight: 800;
            max-width: 420px;
            margin-bottom: 18px;
        }

        .visual-text {
            font-size: 14px;
            line-height: 1.8;
            max-width: 420px;
            opacity: .9;
        }

        .auth-form {
            padding: 70px 70px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .form-title {
            font-size: 32px;
            font-weight: 800;
            color: #161616;
            margin-bottom: 8px;
        }

        .form-subtitle {
            font-size: 14px;
            color: #6b7280;
            margin-bottom: 28px;
        }

        .google-btn {
            width: 100%;
            height: 46px;
            border: 1px solid #e5e7eb;
            border-radius: 10px;
            background: #f8f8f8;
            font-weight: 600;
            cursor: pointer;
            margin-bottom: 24px;
        }

        .divider {
            text-align: center;
            font-size: 11px;
            color: #9ca3af;
            font-weight: 700;
            letter-spacing: .8px;
            margin-bottom: 22px;
        }

        label {
            display: block;
            font-size: 12px;
            font-weight: 700;
            color: #374151;
            margin-bottom: 8px;
        }

        .input-box {
            height: 48px;
            background: #e9eaec;
            border-radius: 10px;
            display: flex;
            align-items: center;
            padding: 0 14px;
            margin-bottom: 18px;
        }

        .input-box span {
            color: #777;
            margin-right: 10px;
            font-size: 14px;
        }

        .input-box input {
            border: none;
            outline: none;
            background: transparent;
            width: 100%;
            font-size: 13px;
            font-family: inherit;
        }

        .form-extra {
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: 12px;
            margin-bottom: 24px;
        }

        .form-extra a,
        .bottom-text a {
            color: #065f46;
            text-decoration: none;
            font-weight: 700;
        }

        .btn-submit {
            width: 100%;
            height: 52px;
            border: none;
            border-radius: 10px;
            background: #065f46;
            color: #fff;
            font-weight: 800;
            font-family: inherit;
            cursor: pointer;
            box-shadow: 0 10px 20px rgba(6,95,70,.25);
        }

        .bottom-text {
            text-align: center;
            font-size: 13px;
            color: #6b7280;
            margin-top: 28px;
        }

        .input-box {
                position: relative;
                height: 48px;
                background: #e9eaec;
                border-radius: 10px;
                display: flex;
                align-items: center;
                padding: 0 14px;
                margin-bottom: 18px;
            }

            .input-icon {
                width: 18px;
                margin-right: 10px;
                opacity: 0.7;
            }

            .input-box input {
                border: none;
                outline: none;
                background: transparent;
                width: 100%;
                font-size: 13px;
                font-family: inherit;
            }

            .password-box {
                padding-right: 40px;
            }

            .toggle-password {
                position: absolute;
                right: 12px;
                width: 18px;
                cursor: pointer;
                opacity: 0.7;
            }
            
            .google-btn {
                width: 100%;
                height: 46px;
                border: 1px solid #e5e7eb;
                border-radius: 10px;
                background: #f8f8f8;
                font-weight: 600;
                cursor: pointer;
                margin-bottom: 24px;
                color: #374151;
                text-decoration: none;
                display: flex;
                align-items: center;
                justify-content: center;
                gap: 10px;
            }

            .google-icon {
                width: 18px;
                height: 18px;
            }

        @media(max-width: 900px) {
            .auth-card {
                grid-template-columns: 1fr;
            }

            .auth-visual {
                min-height: 320px;
            }

            .auth-form {
                padding: 40px 28px;
            }

            .visual-title {
                font-size: 34px;
            }
        }
    </style>
</head>
<body>

<div class="auth-card">
    <div class="auth-visual">
        <div class="brand">J-TRIP</div>
        <div class="visual-title">
            Temukan Keajaiban Alam Kota Jember.
        </div>
        <div class="visual-text">
            Akses destinasi wisata terbaik, pemesanan tiket, dan panduan eksklusif dalam satu genggaman.
        </div>
    </div>

    <div class="auth-form">
        <h1 class="form-title">Selamat Datang Kembali</h1>
        <p class="form-subtitle">Masuk untuk melanjutkan petualangan Anda.</p>

        <a href="{{ url('/auth/google') }}" class="google-btn">
            <img src="{{ asset('assets/icons/google.png') }}" alt="Google" class="google-icon">
            <span>Lanjutkan dengan Google</span>
        </a>

        <div class="divider">ATAU GUNAKAN EMAIL</div>

        <form action="{{ url('/login') }}" method="POST">
            @csrf

            <label>Email</label>
            <div class="input-box">
                <img src="{{ asset('assets/icons/email.png') }}" class="input-icon">
                <input type="email" name="email" placeholder="contoh@email.com">
            </div>

            <label>Password</label>
            <div class="input-box password-box">
                <img src="{{ asset('assets/icons/password.png') }}" class="input-icon">

                <input type="password" name="password" id="password" placeholder="••••••••">

                <img src="{{ asset('assets/icons/eye.png') }}"
                    class="toggle-password"
                    onclick="togglePassword()"
                    id="eyeIcon">
            </div>

            <div class="form-extra">
                <label style="margin:0;font-weight:500;">
                    <input type="checkbox"> Ingat saya
                </label>
                <a href="#">Lupa Password?</a>
            </div>

            <button type="submit" class="btn-submit">Masuk</button>
        </form>

        <div class="bottom-text">
            Belum punya akun? <a href="{{ url('/register') }}">Daftar sekarang</a>
        </div>
    </div>
</div>

<script>
function togglePassword() {
    const input = document.getElementById("password");
    const icon = document.getElementById("eyeIcon");

    if (input.type === "password") {
        input.type = "text";
        icon.src = "{{ asset('assets/icons/eye-off.svg') }}";
    } else {
        input.type = "password";
        icon.src = "{{ asset('assets/icons/eye.svg') }}";
    }
}
</script>

</body>
</html>
