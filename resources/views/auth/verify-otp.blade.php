<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Verifikasi OTP - J-TRIP</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body style="font-family: Arial, sans-serif; background:#f5f5f5; padding:40px;">

<div style="max-width:420px;margin:auto;background:#fff;padding:28px;border-radius:18px;">
    <h2 style="margin-top:0;color:#155c43;">Verifikasi Email</h2>

    <p>Kode OTP sudah dikirim ke:</p>
    <p><strong>{{ $email }}</strong></p>

    @if(session('success'))
        <div style="background:#e8f5ec;color:#155c43;padding:10px;border-radius:10px;margin-bottom:12px;">
            {{ session('success') }}
        </div>
    @endif

    @if($errors->any())
        <div style="background:#fee2e2;color:#991b1b;padding:10px;border-radius:10px;margin-bottom:12px;">
            {{ $errors->first() }}
        </div>
    @endif

    <form method="POST" action="{{ route('verify.otp.submit') }}">
        @csrf
        <input type="hidden" name="email" value="{{ $email }}">

        <label>Kode OTP</label>
        <input type="text"
               name="otp_code"
               maxlength="6"
               placeholder="Masukkan 6 digit OTP"
               style="width:100%;padding:12px;margin:8px 0 16px;border:1px solid #ddd;border-radius:10px;"
               required>

        <button type="submit"
                style="width:100%;padding:12px;background:#155c43;color:#fff;border:0;border-radius:10px;font-weight:bold;">
            Verifikasi
        </button>
    </form>

    <form method="POST" action="{{ route('verify.otp.resend') }}" style="margin-top:12px;">
        @csrf
        <input type="hidden" name="email" value="{{ $email }}">

        <button type="submit"
                style="width:100%;padding:12px;background:#fff;color:#155c43;border:1px solid #155c43;border-radius:10px;font-weight:bold;">
            Kirim Ulang OTP
        </button>
    </form>
</div>

</body>
</html>