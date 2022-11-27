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
        return $this->updateQuery($sql, $arrParam);
    }
}