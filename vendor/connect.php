<?php

//Clase que mediante PDO y orientación a objetos accedemos a las BBDD
class DB
{

    private $con;  //Propiedad que retorna el objeto PDO resultante de la conexión

    private $host = "localhost";

    private $user = "root";

    private $pass = "";

    protected $dbname;

    public $filas = array();

    //Constructor que recibe la base de datos sobre la que nos vamos a conectar
    public function __construct($base)
    {
        $this->dbname = $base;
    }

    private function Conectar()
    {
        try {
            $pdo = new PDO("mysql:host=$this->host;dbname=$this->dbname", $this->user, $this->pass);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_SILENT);
            $pdo->setAttribute(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, true);
        } catch (PDOException $e) {
            echo "Error al conectar con la BBDD";
            echo $e->getMessage();
        }


        $this->con = $pdo;  //Le asignamos el objeto PDO a la propiedad local
    }


    private function Cerrar()
    {
        $this->con = NULL;
    }

    public function ConsultaSimple($consulta, $param)
    {
        $this->Conectar();

        $sta = $this->con->prepare($consulta);

        if (!$sta->execute($param)) {
            throw new Exception("Error en la consulta: " . $sta->errorInfo()[2]);
        }

        $this->Cerrar();
    }


    public function ConsultaDatos($consulta, $param)
    {
        $this->Conectar();
    
        $this->filas = array(); // Vaciamos el array filas (para no acumular las de consultas anteriores)
    
        $sta = $this->con->prepare($consulta);
    
        if ($sta->execute($param)) {
            while ($fila = $sta->fetch(PDO::FETCH_ASSOC)) {
                $this->filas[] = $fila;
            }
        } else {
            echo "<b>Error en la consulta</b>";
        }
    
        $this->Cerrar();
    }
}

?>