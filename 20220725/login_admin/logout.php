<?php 
if (!isset($_SESSION)) session_start();
unset( $_SESSION['login']);
unset($_SESSION['thongtin']);
header('location:login.html');