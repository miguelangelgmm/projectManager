<?php
class Project
{
    private $id;
    private $name;
    private $description;
    private $creator_id;
    public function __get($name)
    {
        return $this->$name;
    }

    public function __set($name, $value)
    {
        $this->$name = $value;
    }
    
}

?>