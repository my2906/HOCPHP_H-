<?php 
include './config.php';
function loadClass($className)
{
    include "./model/$className.php";
}
spl_autoload_register('loadClass');

$mybook = new Book();
//$data = $mybook->random(10);
$data = $mybook->all();
$n = $mybook->n;
include "./view/index/home.php";