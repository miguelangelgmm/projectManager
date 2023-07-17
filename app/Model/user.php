<?php
class User
{
    private $id;
    private $name;
    private $password;
    private $email;
    private $image;
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