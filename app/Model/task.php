<?php
class Task
{
    private $id;
    private $project_id;
    private $name;
    private $description;
    private $start_date;
    private $end_date;
    private $state;
    private $subtasks;

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