<?php
require __DIR__ . '/models/Article.php';
if(!isset($_GET['item'])) {
    include __DIR__ . '/view/view_admin.php';
    exit;
}

$article = new Article();

switch($_GET['item']){
    case 'insert':
        if($_GET['title'] and $_GET['lead']){
            $article->title = $_GET['title'];
            $article->lead = $_GET['lead'];
            $article->save();
            include __DIR__ . '/view/view_admin.php';
        }else{
            include __DIR__ . '/view/view_admin_err.php';
        };
        break;

    case 'update':
        if($_GET['title'] and $_GET['lead'] and $_GET['id']){
            $article->id = $_GET['id'];
            $article->title = $_GET['title'];
            $article->lead = $_GET['lead'];
            $article->save();
            include __DIR__ . '/view/view_admin.php';
        }else{
            include __DIR__ . '/view/view_admin_err.php';
        };
        break;

    case 'delete':
        if($_GET['id']){
            $article->id = $_GET['id'];
            var_dump($article->delete());
            include __DIR__ . '/view/view_admin.php';
        }else{
            include __DIR__ . '/view/view_admin_err.php';
        };
        break;

}