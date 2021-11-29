<?php

require __DIR__ .'/../autoload.php';


class User
{
    public $test;

    public function __construct()
    {
        $this->test = function($x){
            return 3 + $x;
        };
    }
}

$user = new User();
// Call to undefined method User::test()
var_dump($user->test);
echo call_user_func($user->test, 3);

//Parse error: syntax error, unexpected '('
//echo ($user->test)();









/*GENERATOR*/
//-----------
// Возврат значений
/*
function one() {
    echo 'start <br>';
    for ($i = 1; $i <= 3; $i++) {
        // more code
        yield $i;
        echo "Property yield in func one $i<br>";
        yield $i;
    }
    echo 'stop';
}

$generator = one();

foreach ($generator as $value) {
    echo "$value <br>";
}










/*...*/
//----
/*
function sum($one, ...$nums)
{
    var_dump($nums);
    return array_sum($nums);
}

sum(1, 2, 3, 4, 5);









/*GENERATOR*/
//-----------
// Возврат значений
/*
function one() {
    for ($i = 1; $i <= 3; $i++) {
        // more code
        yield $i;
        echo "Property yield in func one $i<br>";
        yield $i;
    }
}

$generator = one();

foreach ($generator as $value) {
    echo "$value <br>";
}





/*GENERATOR*/
//-----------
// Возврат значений
/*
function gen()
{
    yield 'a';
    yield 'b';
    yield 'name'=> 'John';
    yield 'd';
    yield 10=> 'e';
    yield 'f';
}
foreach (gen() as $key => $value)
    echo "$key: $value <br>";





/*GENERATOR*/
//-----------
/*
function numbers()
{
    echo"START<br>";
    for ($i= 0; $i< 5; ++$i) {
        yield $i;
    }
    echo "FINISH<br>";
}

foreach (numbers() as $value) {
    echo "VALUE: $value <br>";
}









/*CLOSURE*//*
------------

class User
{
    private $_name;
    function __construct($n){ $this->_name = $n; }

    function sayHello($word)
    {
        return function() use($word)
        {
            echo "$word {$this->_name}!";
        };
     }
}

$user = new User('John');     //замкнули
$user->sayHello('Привет');     //придет функция Привет John
$a = $user->sayHello('Hello');
$a();











/*


$str = 'closure';

$func = function($x) use ($str)
        {
            echo $x .' '. $str . '<br>';
        };

$func('Здесь x');


$str = 'open';
$func('Здесь y');










/*
$art = new App\models\Article();


function delete()
{
    if(empty($this->id))
        return false;

    echo '<pre>';
    echo $this->id;

    $sql = 'DELETE FROM news WHERE id = :id';
    $db = new App\Db();
    $db->execute($sql, [':id'=>$this->id]);
        //throw new App\Exceptions\NotFoundException('Ошибка findById');
    var_dump($db);
    return true;
}

















/*
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
/*
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