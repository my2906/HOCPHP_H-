<?php 
//kiem tra dang nhap
if (!isset ($_SESSION) ) session_start();
if (!isset($_SESSION['login'])) //chua dang nhap
{
    header('location:login.html');//chuyen trang
    exit;
}
include './config.php';
function loadClass($className)
{
    include "./model/$className.php";
}
spl_autoload_register('loadClass');
$mybook = new Book();
$data = $mybook->random(10);
$data = $mybook->all();
$n = $mybook->n;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang chu</title>
</head>
<body>
    <h1>Trang admin<br>
    Số lượng sản phẩm: <?php echo $n ?></h1>
    <table>
        <tr>
            <td><h3>STT</h3></td>
            <td><h3>MÃ SP</h3></td>
            <td><h3>TÊN GIA VỊ</h3></td>
            <td><h3>HÌNH</h3></td>
            <td><h3>GIÁ</h3></td>
            <td><h3>QUẢN LÝ</h3></td>
        </tr>
        <?php 
        foreach($data as $k=>$item)
        {
            ?>
            <tr>
            <td><?php echo $k+1 ?></td>
            <td><?php echo $item['book_id'] ?></td>
            <td><?php echo $item['book_name'] ?></td>
            <td><?php echo $item['img'] ?></td>
            <td><?php echo $item['price'] ?></td>
            <td>
                <a href="product_delete.php?id=<?php echo $item['book_id'] ?>">Xoa</a>
            </td>
        </tr>
            <?php
        }
        ?>
        
    </table>
    <h1><a href="logout.php">Thoat</a></h1>
</body>
</html>






