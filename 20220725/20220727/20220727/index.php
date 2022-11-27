<?php 
//kiem tra dang nhap
if (!isset ($_SESSION) ) session_start();
if (!isset($_SESSION['login'])) //chua dang nhap
{
    header('location:login.html');//chuyen trang
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang chu</title>
    <style>
        table#tbproduct img{width: 100px;}
    </style>
</head>
<body>
    <form action="index_admin.php" method='get'>
        Ten sach: <input type="text" name='keyword' value='<?php echo $kw ?>'>
        Loai <select name="cat_id" id="">
            <option value="">Tat ca</option>
            <?php 
            foreach($dataCat as $k=>$item)
            {
                ?>
                <option value="<?php echo $item['cat_id'] ?>">
                    <?php echo $item['cat_name'] ?>
                </option>
                <?php
            }
            ?>
        </select>

        Nha xb <select name="pub_id" id="">
            <option value="">Tat ca</option>
            <?php 
            foreach($dataPub as $k=>$item)
            {
                ?>
                <option value="<?php echo $item['pub_id'] ?>"><?php echo $item['pub_name'] ?></option>
                <?php
            }
            ?>
        </select>
        <input type="submit" value="Tim kiem">
    </form>
    <h1>Trang chu. So sach tim duoc la: <?php echo $n ?></h1>
    <table id='tbproduct'>
        <tr>
            <td>stt</td>
            <td>masach</td>
            <td>Ten sach</td>
            <td>Hinh</td>
            <td>Gia</td>
            <td>#</td>
        </tr>
        <?php 
        foreach($data as $k=>$item)
        {
            ?>
            <tr>
            <td><?php echo $k+1 ?></td>
            <td><?php echo $item['book_id'] ?></td>
            <td><?php echo $item['book_name'] ?></td>
            <td> <img src='images/product/<?php echo $item['img'] ?>'>   </td>
            <td><?php echo $item['price'] ?></td>
            <td>
            <a href="product_edit.php?id=<?php echo $item['book_id'] ?>">Sửa</a>
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
