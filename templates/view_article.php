<html>
<head>
    <meta charset="utf-8">
    <title>Index</title>
    <style type="text/css">

    </style>
</head>
<body>


<?php
    if(!is_object($this->article)) {
        echo 'Такой записи не существует';
        echo "<a href='http://profitphp2.local/index.php'>На главную</a>";
        exit;
    }

    echo "<h1>Вы читаете новость № {$this->article->id}</h1>\n
          <h2>Это - {$this->article->title}</h2>\n
          <h3>Сама статья:<br>{$this->article->lead}</h3>\n
          <h4>Автор:<br>{$this->article->authorName}</h4>\n
          <a href='http://profitphp2.local/index.php'> Назад </a>";
?>

</body>
</html>







