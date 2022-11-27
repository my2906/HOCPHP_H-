<!-- <?php 
echo '<pre>';print_r($detail);
?> -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit</title>
</head>
<body>
    <form action="product_update.php " method='post' enctype="multipart/form-data">
        <table>
            <tr>
                <td>Ma sach</td>
                <td>
                    <input type=" text" name='book_id' value='<?php  echo $detail['book_id']?>'>
                         </td>
            </tr>
            <tr>
                <td>Ten sach</td>
                <td><input type=" text" name='book_name' value='<?php  echo $detail['book_name']?>'></td>
            </tr>
            <tr>
                <td>Gia</td>
                <td><input type=" text" name='price' value='<?php  echo $detail['price']?>'></td>
            </tr>
            <tr>
                <td> Hình</td>
                <td>
                    <input type="file" name='img'>
                    <img src='<?php echo IMG_PRODUCT.'/'.$detail['img'] ?>'>
                </td>
            </tr>
            <tr>
                <td> Loại</td>
                <td>
                    <select name="cat_id" id="">
                        <?php
                        foreach($cat as $item)
                        {
                            $s ='';
                            if($detail['cat_id']==$item['cat_id'])$s='selected';
                            ?>
                            <option value="<?php echo $item['cat_id'] ?>" <?php  echo $s;?>>
                        <?php echo $item['cat_name'] ?>
                        </option>
                            <?php
                        }
                        ?>

                    </select>
                </td>
            </tr>
            <tr>
                <td> Nhà XB</td>
                <td>
                
                </td>
            </tr>
            <tr>
                <td colspan="2"><input type="submit"> </td>
               
            </tr>
        </table>

    </form>
</body>
</html>
