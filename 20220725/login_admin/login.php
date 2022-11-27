<?php 
if (!isset($_SESSION)) session_start();
$u = isset($_POST['u'])?$_POST['u']:'';
$p = isset($_POST['p'])?$_POST['p']:'';

//hop le: u=admin, p=123456
$p = md5($p);//da ma hoa
include './config.php';
$pdo = new PDO('mysql:host=localhost;dbname=book', 'root', '');
$pdo->query('set names utf8');

$sql="select * from admin where username='$u' and password='$p' ";
// echo $sql;exit;
$stm = $pdo->query($sql);
$soketqua = $stm->rowCount();

// echo "Co $soketqua "; exit;
//if ($u=='ADMIN' && $p== '123') //kiem tra trong database
if($soketqua>0)
{
    $row = $stm->fetch();//lay ra 1 dong ket qua
    $_SESSION['login']=1;
    $_SESSION['thongtin']= ['username'=> $row['username'], 'name'=>$row['name'] ];

    header('location:index.php');
    exit;
}
header('location:login.html');