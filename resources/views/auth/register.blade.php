<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - JTrip</title>
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
            max-width: 1180px;
            min-height: 760px;
            background: #fff;
            border-radius: 28px;
            overflow: hidden;
            display: grid;
            grid-template-columns: 1.05fr 1fr;
            box-shadow: 0 30px 70px rgba(0,0,0,.12);
        }

        .auth-visual {
            padding: 48px;
            color: #fff;
            background:
                linear-gradient(rgba(6,78,59,.72), rgba(6,78,59,.86)),
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
            font-size: 46px;
            line-height: 1.12;
            font-weight: 800;
            max-width: 430px;
            margin-bottom: 18px;
        }

        .visual-text {
            font-size: 14px;
            line-height: 1.8;
            max-width: 420px;
            opacity: .9;
        }

        .auth-form {
            padding: 48px 64px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .form-title {
            font-size: 30px;
            font-weight: 800;
            color: #161616;
            margin-bottom: 8px;
        }

        .form-subtitle {
            font-size: 13px;
            color: #6b7280;
            margin-bottom: 24px;
        }

        label {
            display: block;
            font-size: 12px;
            font-weight: 700;
            color: #374151;
            margin-bottom: 8px;
        }

        .input-box,
        .select-box {
            height: 46px;
            background: #e9eaec;
            border-radius: 10px;
            display: flex;
            align-items: center;
            padding: 0 14px;
            margin-bottom: 14px;
        }

        .input-box span {
            color: #777;
            margin-right: 10px;
            font-size: 14px;
        }

        .input-box input,
        .select-box select {
            border: none;
            outline: none;
            background: transparent;
            width: 100%;
            font-size: 13px;
            font-family: inherit;
        }

        .grid-2 {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 14px;
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
            margin-top: 8px;
            box-shadow: 0 10px 20px rgba(6,95,70,.25);
        }

        .terms {
            font-size: 11px;
            color: #6b7280;
            margin: 8px 0 18px;
        }

        .terms a,
        .bottom-text a {
            color: #065f46;
            text-decoration: none;
            font-weight: 700;
        }

        .bottom-text {
            text-align: center;
            font-size: 13px;
            color: #6b7280;
            margin-top: 26px;
            padding-top: 22px;
            border-top: 1px solid #e5e7eb;
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

        @media(max-width: 900px) {
            .auth-card {
                grid-template-columns: 1fr;
            }

            .auth-visual {
                min-height: 300px;
            }

            .auth-form {
                padding: 36px 26px;
            }

            .visual-title {
                font-size: 34px;
            }

            .grid-2 {
                grid-template-columns: 1fr;
                gap: 0;
            }
        }
    </style>
</head>
<body>

<div class="auth-card">
    <div class="auth-visual">
        <div class="brand">J-TRIP</div>
        <div class="visual-title">
            Mulai Petualangan Alam Anda di Jember.
        </div>
        <div class="visual-text">
            Jelajahi keindahan tersembunyi, dari bukit hijau hingga pantai eksotis melalui satu genggaman cerdas.
        </div>
    </div>

    <div class="auth-form">
        <h1 class="form-title">Buat Akun Baru</h1>
        <p class="form-subtitle">Lengkapi data diri Anda untuk mulai mengeksplorasi.</p>

        <form action="{{ url('/register') }}" method="POST">
            @csrf

            <label>Nama Lengkap</label>
            <div class="input-box">
                <img src="{{ asset('assets/icons/orang.png') }}" class="input-icon">
                <input type="text" name="name" placeholder="Nama lengkap">
            </div>

           <label>Email</label>
            <div class="input-box">
                <img src="{{ asset('assets/icons/email.png') }}" class="input-icon">
                <input type="email" name="email" placeholder="contoh@email.com">
            </div>

            <label>No Telepon</label>
            <div class="input-box">
                <img src="{{ asset('assets/icons/phone.png') }}" class="input-icon">
                <input type="text" name="no_telp" placeholder="08xxxx">
            </div>

            <div class="grid-2">
                <div>
                    <label>Kewarganegaraan</label>
                    <div class="select-box">
                        <select name="kewarganegaraan">
                            <option value="domestik">Domestik</option>
                            <option value="mancanegara">Mancanegara</option>
                        </select>
                    </div>
                </div>

                <div>
                    <label>Jenis Identitas</label>
                    <div class="select-box">
                        <select name="jenis_identitas">
                            <option value="nik">NIK</option>
                            <option value="passport">Passport</option>
                        </select>
                    </div>
                </div>
            </div>

            <label>Nomor Identitas</label>
            <div class="input-box">
                <img src="{{ asset('assets/icons/identity.png') }}" class="input-icon">
                <input type="text" name="nomor_identitas">
            </div>

            <div class="grid-2">
                <div>
                    <label>Jenis Kelamin</label>
                    <div class="select-box">
                        <select name="jenis_kelamin">
                            <option value="">Pilih</option>
                            <option value="laki-laki">Laki-laki</option>
                            <option value="perempuan">Perempuan</option>
                        </select>
                    </div>
                </div>

                <div>
                    <label>Tanggal Lahir</label>
                    <div class="input-box">
                        <input type="date" name="tanggal_lahir">
                    </div>
                </div>
            </div>

            <label>Password</label>
            <div class="input-box password-box">
                <img src="{{ asset('assets/icons/password.png') }}" class="input-icon">

                <input type="password" name="password" id="password" placeholder="••••••••">

                <img src="{{ asset('assets/icons/eye.png') }}"
                    class="toggle-password"
                    id="eyeIcon"
                    onclick="togglePassword()">
            </div>

            <label>Konfirmasi Password</label>
            <div class="input-box password-box">
                <img src="{{ asset('assets/icons/password.png') }}" class="input-icon">

                <input type="password" name="password_confirmation" id="confirmPassword" placeholder="••••••••">

                <img src="{{ asset('assets/icons/eye.png') }}"
                    class="toggle-password"
                    id="eyeIconConfirm"
                    onclick="toggleConfirmPassword()">
            </div>

            <div class="terms">
                <input type="checkbox"> Saya menyetujui <a href="#">Syarat & Ketentuan</a> serta <a href="#">Kebijakan Privasi</a>.
            </div>

            <button type="submit" class="btn-submit">Daftar</button>
        </form>

        <div class="bottom-text">
            Sudah punya akun? <a href="{{ url('/login') }}">Masuk di sini</a>
        </div>
    </div>
</div>

<script>
function togglePassword() {
    const input = document.getElementById("password");
    const icon = document.getElementById("eyeIcon");

    if (input.type === "password") {
        input.type = "text";
        icon.src = "{{ asset('assets/icons/eye-off.png') }}";
    } else {
        input.type = "password";
        icon.src = "{{ asset('assets/icons/eye.png') }}";
    }
}

function toggleConfirmPassword() {
    const input = document.getElementById("confirmPassword");
    const icon = document.getElementById("eyeIconConfirm");

    if (input.type === "password") {
        input.type = "text";
        icon.src = "{{ asset('assets/icons/eye-off.png') }}";
    } else {
        input.type = "password";
        icon.src = "{{ asset('assets/icons/eye.png') }}";
    }
}
</script>
}
</script>

</body>
</html>
