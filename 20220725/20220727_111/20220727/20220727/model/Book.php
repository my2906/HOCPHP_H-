<?php 
class Book extends Db 
{
    function all()
    {
        $sql ="select * from book ";
        return $this->selectQuery($sql);
    }
/*
lay ngau nhien n cuon sach
*/
    function random($n=4)
    {
        $sql ="select * from book order by rand() limit 0, $n";
        return $this->selectQuery($sql);
    }

    function search($keyword, $cat_id='', $pub_id='')
    {
        $sql ="select * from book where book_name like ? ";
        $arrParam =["%$keyword%"];
        if ($cat_id !='')
        {
            $sql = $sql .' and cat_id=? ';
            $arrParam[] = $cat_id;
        }
        if ($pub_id !='')
        {
            $sql = $sql .' and pub_id=? ';
            $arrParam[] = $pub_id;
        }

        return $this->selectQuery($sql, $arrParam);
    }
 
    function delete($book_id)
    {
        $sql ="delete from book where book_id = ?";
        $arrParam =[$book_id];
        $detail = $this->detail($book_id);
        $img = $detail['img'];//lay ten hinh cua sach ra
        $n= $this->updateQuery($sql, $arrParam);
        if ($n>0) //xoa ok
        {
            unlink(IMG_PRODUCT .'/'. $img);//xoa (kiem tra file hinh co kg)
            //if_file(IMG_PRODUCT .'/'. $img)
        }
        return $n;
    }
    
    /*
    Ham lay ve chi tiet 1 book co id la book_id
    - param: book_id: ma sach (string)
    - return: 
        - Array chi tiet cua sach.
        - array[]: mang rong
    */
    function detail($book_id)
    {
        $sql ="select * from book where book_id=? ";
        $arrParam = [$book_id];
        $data = $this->selectQuery($sql, $arrParam);
       // print_r($data);
        //mang 2 chieu co 1 phan tu data[0]
        if (Count($data)>0)
        return $data[0];
        return [];//mang rong
    }

    function update()
    {
        $book_id=isset($_POST['book_id'])?$_POST['book_id']:'';
        $book_name=isset($_POST['book_name'])?$_POST['book_name']:'';
        $cat_id=isset($_POST['cat_id'])?$_POST['cat_id']:'';
        $pub_id=isset($_POST['pub_id'])?$_POST['pub_id']:'';
        $price=isset($_POST['price'])?$_POST['price']:'';
        if( $_FILES['img']['error']>0)
        {
            $sql=" update book set book_name=?,price=?, cat_id=?
             where book_id=?";
             $arrParam=[$book_name,$price,$cat_id,$book_id];
        }
        else
        {
            $sql=" update book set book_name=?,price=?, cat_id=?, img=?
            where book_id=?";
            $img= time().'-'.$_FILES['img']['name'];
            $arrParam=[$book_name,$price,$cat_id, $img,$book_id];
            move_uploaded_file($_FILES['img']['tmp_name'],IMG_PRODUCT.'/'.$img);

        }
// echo $sql; print_r ($arrParam);
// print_r ($_FILES);

        $n=$this->updateQuery($sql,$arrParam);
    }
}