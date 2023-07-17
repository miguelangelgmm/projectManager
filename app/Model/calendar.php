<?php
class Calendar
{
    private $id;
    private $user_id;
    private $date;
    private $content;
    private $type;
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