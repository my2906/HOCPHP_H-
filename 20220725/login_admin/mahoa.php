<?php 
$p1 ='123456';
$salt1='!*)';
$salt2='#%&(';
$p2 = md5($salt1 . $p1 .$salt2 );
echo $p2;//save in db
