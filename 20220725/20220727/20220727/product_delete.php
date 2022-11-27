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
    $n = $book->delete($id);
}

header('location:index_admin.php');