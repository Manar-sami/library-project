

<!DOCTYPE html>
<html>
<head>
    <title>Author Login</title>
</head>
<body>
    <h2>تسجيل دخول المؤلف</h2>

    @if($errors->any())
        <div style="color:red;">
            {{ $errors->first() }}
        </div>
    @endif

    <form method="POST" action="{{ route('author.login.submit') }}">
        @csrf
        <label>البريد الإلكتروني:</label>
        <input type="email" name="email" required autofocus><br><br>

        <label>كلمة المرور:</label>
        <input type="password" name="password" required><br><br>

        <button type="submit">دخول</button>
    </form>
</body>
</html>
