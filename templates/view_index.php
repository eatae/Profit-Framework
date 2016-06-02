<html>
<head>
    <meta charset="utf-8">
    <title>Index</title>
    <style type="text/css">
        table
        {
            margin: 20px;
            border: 2px solid silver;
        }
        td, th
        {
            padding: 10px;
            border: 2px solid silver;
        }
    </style>
</head>
<body>
    <table>
        <th>Ссылка на новость</th>
        <th>Название</th>
        <th>Автор</th>
        <?php
        foreach($this->news as $val): ?>
            <tr>
                <td><a href='article.php?id=<?php echo $val->id; ?>'>Новость № <?php echo $val->id; ?></a></td>
                <td><?php echo $val->title; ?></td>
                <td><?php echo ($val->authorName) ? $val->authorName : 'Нет автора'?></td>
            </tr>
        <?php endforeach ?>
    </table>
</body>
</html>