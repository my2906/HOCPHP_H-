<?php 
class Db{
    protected $connect = null;
    public $n = 0;//so dong ket qua
    function __construct()
    {
        $this->connect= new PDO('mysql:host='.HOST.';dbname='.DB, USER, PW);
        $this->connect->query('set names utf8');
     }
/*
- ham su dung cho cac sql select
- sql: query co tham so
- arrParam: mang chu data cho cac tham so
return cac dong data trong database 
*/
    protected function selectQuery($sql, $arrPram=[])
    {
        $stm = $this->connect->prepare($sql);
        $stm->execute($arrPram);
        $data = $stm->fetchAll(PDO::FETCH_ASSOC);
       //$data = $stm->fetchAll(PDO::FETCH_OBJ);
        $this->n = $stm->rowCount();
        return $data;
    }

    /*
- ham su dung cho cac sql update, insert, delete
- sql: query co tham so
- arrParam: mang chu data cho cac tham so
return cac dong data trong database 
*/
protected function updateQuery($sql, $arrPram=[])
{
    $stm = $this->connect->prepare($sql);
    $stm->execute($arrPram);
    $this->n = $stm->rowCount();
    return $this->n;
}

}

//protected+public: duoc ke thua
//private: kg duc ke thua

