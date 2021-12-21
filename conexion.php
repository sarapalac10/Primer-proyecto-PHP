<?php 

class conexion{

    private $servidor="localhost";
    private $usuario="root";
    private $contrasena="";
    private $conexion;

    function __construct(){
        try{
            $this->conexion=new PDO("mysql:host=$this->servidor;dbname=album", $this->usuario, $this->contrasena);
            $this->conexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        } catch( PDOException $error){
            return "Fallo en la conexión".$error;
        }
    }

    function ejecutar($sql){ //Se puede insertar/borrar/actualizar

        $this->conexion->exec($sql);
        return $this->conexion->lastInsertId(); 
    } 

    public function consultar($sql){
        $sentencia=$this->conexion->prepare($sql);
        $sentencia->execute();
        return $sentencia->fetchAll();
        }

    }
   


?>