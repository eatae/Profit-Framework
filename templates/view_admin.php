<html>
<head>
    <meta charset="utf-8">
    <title>Admin</title>
    <style type="text/css">
        form {
            border: 2px silver solid;
            padding: 12px;

        }
    </style>
</head>
<body>

<>

<form action='/Admin/MakeArticle/'>
    <input type="hidden" name="item" value="insert">
    <p><b>Новая новость:</b></p>
    <p>Заголовок: <input type='text' name='title'></p>
    <p>Содержание <input type='text' name='lead' size='40'></p>
    <input type='submit' value='Отправить'>
</form>

<form action='/Admin/MakeArticle/'>
    <input type="hidden" name="item" value="update">
    <p><b>Обновление новости</b></p>
    <p>Номер новости (id): <input type='text' name='id'></p>
    <p>Новый заголовок: <input type='text' name='title'></p>
    <p>Новое содержание <input type='text' name='lead' size='40'></p>
    <input type='submit' value='Отправить'>
</form>

<form action='<?=$_SERVER['PHP_SELF']?>'>
    <input type="hidden" name="item" value="delete">
    <p><b>Удаление новости</b></p>
    <p>Номер новости (id): <input type='text' name='id'></p>
    <input type='submit' value='Отправить'>
</form>
</body>
