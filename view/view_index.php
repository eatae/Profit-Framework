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
        <?php
        foreach($data as $val){
            echo "<tr>
                    <td><a href='article.php?id={$val['id']}'>Новость № {$val['id']}</a></td>
                    <td>{$val['title']}</td>
                 </tr>";
        }
        ?>
    </table>
</body>
</html>