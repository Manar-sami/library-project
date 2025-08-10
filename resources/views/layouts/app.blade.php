<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>مكتبة أونلاين</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #f9f9f9;
            color: #333;
        }
        a {
            color: #007bff;
            text-decoration: none;
            margin: 0 5px;
        }
        a:hover {
            text-decoration: underline;
        }
        table {
            border-collapse: collapse;
            width: 100%;
            background-color: #fff;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: right;
        }
        th {
            background-color: #f2f2f2;
        }
        button {
            cursor: pointer;
            background-color: #dc3545;
            border: none;
            padding: 5px 10px;
            color: white;
            border-radius: 3px;
        }
        button:hover {
            background-color: #c82333;
        }
        input, select {
            padding: 5px;
            margin: 5px 0 10px 0;
            width: 100%;
            box-sizing: border-box;
        }
        form div {
            max-width: 400px;
        }
    </style>
</head>
<body>

    <header>
        <h2>مكتبة أونلاين</h2>
        <hr />
    </header>

    <main>
        @yield('content')
    </main>

</body>
</html>
