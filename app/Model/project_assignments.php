<?php
class Project_assignments
{
    private $project_id;
    private $user_id;
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