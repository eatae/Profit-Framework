<html>
<head>
    <meta charset="utf-8">
    <title>Index</title>
    <style>
    p
    {
        border: 2px dotted darkseagreen;
        font: 150% Arial;
    }
    h1
    {
        border: 2px dotted darkseagreen;
        font: 150% sans-serif;
    }
    </style>
</head>
<body>
    <h1>Красивая страница 404</h1>
    <p>
        <?php echo $this->exception; ?>
        <br>
        Ошибка 404: не найдено.
    </p>

    <a href="/index">Главная</a>
</table>
</body>
</html>