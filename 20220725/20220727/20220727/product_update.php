<?php
include './config.php';
function loadClass($className)
{
    include "./model/$className.php";

}
spl_autoload_register('loadClass');

$book= new Book();
$book->update();
header('location:index_admin.php');

?>