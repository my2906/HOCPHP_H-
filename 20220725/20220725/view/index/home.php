<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang chu</title>
</head>
<body>
    <h1>Trang chu. So sach la: <?php echo $n ?></h1>
    <table>
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
</body>
</html>