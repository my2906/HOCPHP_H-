<?php 
class Category extends Db 
{
    function all()
    {
        return $this->selectQuery('select * from category');
    }

    function store()
    {
        
    }

    function delete()
    {

    }
//tra ve 1 category co cat_id=$id
    function edit($id)
    {

    }

    function update()
    {
        
    }
}