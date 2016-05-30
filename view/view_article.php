<html>
<head>
    <meta charset="utf-8">
    <title>Index</title>
    <style type="text/css">

    </style>
</head>
<body>

<?php
    if(!is_object($article)) {
        echo 'Такой записи не существует';
        exit;
    }

    echo "<h1>Вы читаете новость № $article->id</h1>\n
          <h2>Это - $article->title</h2>\n
          <h3>Сама статья:<br>$article->lead</h3>\n
          <a href='http://profitphp2.local/index.php'> Назад </a>";
?>

</body>
</html>







