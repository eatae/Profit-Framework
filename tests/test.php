<?php

require __DIR__ .'/../classes/Db.php';



function checkId($id)
{
    $db = new Db();
    $sql = 'SELECT id FROM news WHERE id = :id';
    return $db->execute($sql, [':id'=>$id]);
}











/*
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