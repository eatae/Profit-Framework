<html>
<head>
    <meta charset="utf-8">
    <title>Admin_access</title>
    <style type="text/css">
        form
        {
            padding: 16px;
            margin: 20px;
            border: 2px solid silver;
        }

        input
        {
            margin: 22px;
        }
    </style>
</head>
<body>
    <form action='/Admin' method='post'>
        login:<input name='login' type="text" />root
        <br>
        pass: <input name='pass' type='password' />000
        <br>
        <input type='submit' value="Отправить" />
    </form>
    <a href="/Index">Главная страница</a>
</body>
</html>