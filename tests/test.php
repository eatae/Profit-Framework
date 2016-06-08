<?php

require __DIR__ .'/../autoload.php';



$art = new \App\models\Article();

$art->title = 'check_forms';
echo '<br>';
$art->id = 7;
echo 'ЗДЕСЯ';
echo '<br>';
$art->lead = 'check_forms';
var_dump($art);



//$g = insert($art);
echo 'GGGGGGGG';
var_dump($g);


function insert($obj)
{
    /* получаем все имена свойств объекта */
        $props = [];
        $binds = [];
        $params = [];

        foreach($obj as $key => $val){
            if($key === 'id') continue;

            $props[] = $key;    //имена свойст / столбцов
            $binds[] = ':' . $key;  //для подстановки (:lead,..)
            $params[':' .$key] = $val;  //значения
        }
        echo "<pre>";
        var_dump($props, $binds, $params);


        $sql = 'INSERT INTO news
            ('. implode(', ', $props) .')
                  VALUES ('. implode(', ', $binds) .')';

    var_dump($sql);

        $db = new App\Db();
        //если запрос исполнился
        if($db->execute($sql, $params)) {
            $obj->id = $db->insertId();
            return true;
        }
        //иначе
        return false;
}

















//return $st_hdr->execute($params);

/*
 *
 *
 *
 *
 *
 * //use App;

$db_hdr = new \PDO('mysql:host=127.0.0.1; dbname=profitphp2', 'root', '');

$sql = "INSERT INTO news(title, lead)
          VALUES('test', 'test')";

$st_hdr = $db_hdr->prepare($sql);
$q = $st_hdr->execute();
var_dump($q);


$art = new \App\models\Article();

var_dump($art);


$art->title = 'HHHH';
echo '<br>';
$art->id = 7;
echo 'ЗДЕСЯ';
echo '<br>';
$art->lead = 'XXXX';
var_dump($art);
$art = $art->update();
var_dump($art);
/*
$article = new models\Article();

$article->id = 1;

var_dump($article->authorName);

/*

$str = '\Name\Space\Space::$b';
echo trim($str, '\\');
echo '<br>';
echo str_replace('\\', '/', lcfirst($str));
echo '<br>';
echo $str;




class Singleton
{
    private $pr = 2;

    public function sum($pub)
    {
        return $pub * $this->pr;
    }
}

$s = new Singleton();
echo $s->sum(10);





function checkId($id)
{
    $db = new Db();
    $sql = 'SELECT id FROM news WHERE id = :id';
    return $db->execute($sql, [':id'=>$id]);
}




function update($arr, $id)
{
    $set = '';
    $params = [];

    foreach($arr as $key => $val){
        //получаем стр. id = :id,
        $set .= $key.'=:'.$key . ',';
        $params[':'.$key] = $val;
    }

    $sql = 'UPDATE news
        SET ' . substr($set, 0, -1) .
        ' WHERE id = '. $id;

    $db = new Db();
    return $db->execute($sql, $params);
}


$arr = ['title' => 'TEST UPDATE',
        'lead' => 'TEST UPDATE'];

$id = 9;

var_dump(update($arr, $id));






function delete($id)
{
    if(empty($id) or !checkId($id))
        echo 'f';

    $sql = 'DELETE FROM news WHERE id = :id';
    $db = new Db();
    return $db->execute($sql, [':id'=>$id]);
}

var_dump(delete(10));





function checkId($id)
{
    $db = new Db();
    $sql = 'SELECT id FROM news ' .'WHERE id = :id;';
    return $db->execute($sql, [':id'=>$id]);
}

echo '<pre>';

var_dump(checkId(2));



/*


*/