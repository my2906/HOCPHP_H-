<?php 
include './config.php';
function loadClass($className)
{
    include "./model/$className.php";
}
spl_autoload_register('loadClass');

$mybook = new Book();
//$data = $mybook->random(10);
$kw = isset($_GET['keyword'])?$_GET['keyword']:'';
$cat_id = isset($_GET['cat_id'])?$_GET['cat_id']:'';
$pub_id = isset($_GET['pub_id'])?$_GET['pub_id']:'';
//keyword=php&
//cat_id=&
//pub_id=hcm
//$data = $mybook->all();
$data = $mybook->search($kw, $cat_id, $pub_id);
$n = $mybook->n;

$mycat = new Category();
$dataCat = $mycat->all();

$mypub = new Publisher();
$dataPub = $mypub->all();
include "./view/index/home.php";