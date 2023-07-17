<?php
class Notification
{
    private $id;
    private $user_notificate;
    private $user_id;
    private $type;
    private $content;

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