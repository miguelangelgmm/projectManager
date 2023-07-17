<?php
class Note
{
    private $id;
    private $user_id;
    private $contenido;
    private $title;
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