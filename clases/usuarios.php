<?php

require_once("conectar.php");
require_once("helpers.php");


class usuario extends conectar{

	private $db; 

	public function __construct(){
        $this->db=parent::conectar();
        parent::setNames();   
    }
 
    public function getUser($user){

    	$sql = "select cedula,contrasenia,nombres,apellidos,rol,estado,foto from usuarios where cedula='".$user."'";
    	$datos= $this->db->query($sql);
    	$arreglo = array();
    	while($reg=$datos->fetch_object())
       {
            $arreglo[]=$reg;
       }
       
       return $arreglo; 
    }


    public function getTrabajadores(){
       $sql="select cedula, nombres, apellidos, email, fechaNacimiento, departamento from usuarios;";
      //pasar la consulta a la libreria query
       $datos= $this->db->query($sql);
       $arreglo=array();//declaramos arrglo
       //estructura repetitiva p' almacenar los datos
       //de la cosulta en el array
       while($reg=$datos->fetch_object())
       {
            $arreglo[]=$reg;
       }
       //retorna los datos
       return $arreglo;
    }

    public function agregarTrabajador($ced,$pass,$nomb,$apell,$fecha,$correo,$tele,$dire,$depa){
        $sql = "INSERT INTO usuarios (
        cedula, 
        contrasenia, 
        nombres, 
        apellidos, 
        fechaNacimiento, 
        email, 
        telefono, 
        direccion,
         departamento) values (
        '".$ced."',
        '".$pass."',
        '".$nomb."',
        '".$apell."',
        '".$fecha."',
        '".$correo."',
        '".$tele."',
        '".$dire."',
        '".$depa."');";
        $this->db->query($sql);
    }

    public function getTrabajador($ced){
      $sql="select cedula, 
        contrasenia, 
        nombres, 
        apellidos, 
        fechaNacimiento, 
        email, 
        telefono, 
        direccion,
         departamento from usuarios where cedula = '".$ced."'";
          $datos= $this->db->query($sql);
       $arreglo=array();
       
       while($reg=$datos->fetch_object())
       {
            $arreglo[]=$reg;
       }
       return $arreglo; 
    }

     public function actualizarTrabajador($ced,$pass,$nomb,$apell,$fecha,$correo,$tele,$dire,$depa){
      $sql = "update usuarios set 
        cedula = '".$ced."',
        contrasenia =  '".$pass."',
        nombres = '".$nomb."',
        apellidos = '".$apell."',
        fechaNacimiento =  '".$fecha."',
        email = '".$correo."',
        telefono = '".$tele."',
        direccion = '".$dire."',
         departamento ='".$depa."' where cedula ='".$ced."'";

          $this->db->query($sql);
      
    }

}

?>
