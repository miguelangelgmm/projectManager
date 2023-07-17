<?php
if(!isset($urlConnect)){
    require_once("../vendor/connect.php");
}else{
    require_once($urlConnect);
}

require_once("user.php");

class DaoUser extends DB
{
    public $users = array();

    public function __construct($base)
    {
        $this->dbname = $base;
    }

    public function Insert($usuario)
    {
        $param = array();
        $param[":name"] = $usuario->name;
        $param[":password"] = $usuario->password;
        $param[":email"] = $usuario->email;
        $param[":image"] = $usuario->image;

        $consulta = "INSERT INTO user (id, name, password, email,image) VALUES (null, :name, :password, :email,:image)";

        $this->ConsultaSimple($consulta, $param);
    }

    public function Get($name) {
        $param = array();
        $param[":name"] = $name;
    
        $consulta = "SELECT * FROM user WHERE name = :name";
    
        $this->ConsultaDatos($consulta, $param);
        $resultado = $this->filas;
        if ($resultado !== false && !empty($resultado)) {
            $user = new User();
            $user->id = $resultado[0]['id'];
            $user->name = $resultado[0]['name'];
            $user->password = $resultado[0]['password'];
            $user->email = $resultado[0]['email'];
            $user->image = $resultado[0]['image'];
    
            return $user;
        } else {
            // El usuario no fue encontrado
            return null;
        }
    }

    public function Update($usuario)
    {
        $param = array();
        $param[":id"] = $usuario->id;
        $param[":name"] = $usuario->name;
        $param[":password"] = $usuario->password;
        $param[":email"] = $usuario->email;
        $param[":image"] = $usuario->image;

        $consulta = "UPDATE user SET name=:name, password=:password, email=:email,image=:image WHERE id=:id";

        $this->ConsultaSimple($consulta, $param);
    }

    public function UpdateImg($id,$image)
    {
        $param = array();
        $param[":id"] = $id;
        $param[":image"] = $image;

        $consulta = "UPDATE user SET image=:image WHERE id=:id";

        $this->ConsultaSimple($consulta, $param);
    }
    public function existeNombreUsuario($userName)
    {
        $param = array(":name" => $userName);
        $consulta = "SELECT COUNT(*) AS count FROM user WHERE name = :name";

        $this->ConsultaDatos($consulta, $param);
        $resultados = $this->filas;

        return $resultados[0]['count'] > 0;


    }

    public function existeCorreoElectronico($email)
    {
        $param = array(':email' => $email);
        $consulta = "SELECT COUNT(*) AS count FROM user WHERE email = :email";
    
        $this->ConsultaDatos($consulta, $param);
    
        $resultados = $this->filas;
    
        return $resultados[0]['count'] > 0;
    }

    public function GetById($id) {
        $param = array();
        $param[":id"] = $id;
    
        $consulta = "SELECT * FROM user WHERE id = :id";
    
        $this->ConsultaDatos($consulta, $param);
        $resultado = $this->filas;
        if ($resultado !== false && !empty($resultado)) {
            $user = new User();
            $user->id = $resultado[0]['id'];
            $user->name = $resultado[0]['name'];
            $user->password = $resultado[0]['password'];
            $user->email = $resultado[0]['email'];
            $user->image = $resultado[0]['image'];
    
            return $user;
        } else {
            // El usuario no fue encontrado
            return null;
        }
    }
}
?>