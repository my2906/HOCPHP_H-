<?php 
class Publisher extends Db 
{
    function all()
    {
        return $this->selectQuery('select * from publisher');
    }

    function store()
    {
        
    }

    function delete()
    {

    }
//tra ve 1 publish co cat_id=$id
    function edit($id)
    {

    }

    function update()
    {
        
    }
}