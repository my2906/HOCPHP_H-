<?php 
include './config.php';
function loadClass($className)
{
    include "./model/$className.php";
}
spl_autoload_register('loadClass');

$id = isset($_GET['id'])?$_GET['id']:'';
if ($id !=='')
{
    $book = new Book();
    $detail = $book->detail($id);

    $catObj = new Category();
    $cat= $catObj->all();
    $pubObj = new Publisher();
    $pub= $pubObj->all();
    include 'view/product_edit/home.php';
}
else 
header('location:index.php');
