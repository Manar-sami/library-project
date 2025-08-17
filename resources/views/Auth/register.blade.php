<!DOCTYPE html>
<html>
<head>
    <title>تسجيل مؤلف جديد</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            background-color: #007BFF;
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .register-box {
            background: #fff;
            padding: 30px;
            border-radius: 12px;
            width: 400px;
            text-align: center;
            box-shadow: 0 4px 10px rgba(0,0,0,0.2);
        }

        h2 {
            margin-bottom: 20px;
            color: #333;
        }

        label {
            display: block;
            text-align: right;
            margin-bottom: 5px;
            font-weight: bold;
        }

        input {
            width: 90%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-size: 14px;
        }

        button {
            width: 95%;
            padding: 12px;
            background-color: #007BFF;
            border: none;
            border-radius: 6px;
            color: #fff;
            font-size: 16px;
            cursor: pointer;
        }

        button:hover {
            background-color: #0056b3;
        }

        .error {
            color: red;
            margin-bottom: 15px;
        }
    </style>
</head>
<body>
    <div class="register-box">
        <h2>تسجيل مؤلف جديد</h2>

        @if ($errors->any())
            <div class="error">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('register.submit') }}">
            @csrf

            <label>الاسم:</label>
            <input type="text" name="name" value="{{ old('name') }}" required>

            <label>رمز التعريف:</label>
            <input type="text" name="code" value="{{ old('code') }}" required>

            <label>البريد الإلكتروني:</label>
            <input type="email" name="email" value="{{ old('email') }}" required>

            <label>البلد:</label>
            <input type="text" name="country" value="{{ old('country') }}" required>

            <label>كلمة السر:</label>
            <input type="password" name="password" required>

            <label>تأكيد كلمة السر:</label>
            <input type="password" name="password_confirmation" required>

            <button type="submit">تسجيل</button>
        </form>
    </div>
</body>
</html>
