<?php

require_once("conectar.php");
require_once("helpers.php");


class horas extends conectar{ 

	private $db; 

	public function __construct(){
        $this->db=parent::conectar();
        parent::setNames();   
  }

  
  public function guardarHorasExtras($entrada,$salida,$fecha,$descripcion,$cedula,$totalHoras){
    $sql = "insert into horas values(null,
      '".$entrada."',
      '".$salida."',
      '".$fecha."',
      '".$descripcion."',
      '".$cedula."',
      '".$totalHoras."');";
      $this->db->query($sql);
  }

  public function guardarHoraEntrada($entrada,$fecha,$cedula){
    $sql2 = "update usuarios set estado = 1 where cedula = '".$cedula."'";
    $this->db->query($sql2);
    $sql = "insert into horas values(null,
      '".$entrada."',
      null,
      '".$fecha."',
      null,
      '".$cedula."',
      null);";
      return $this->db->query($sql);
  }

  public function guardarHoraSalida($salida,$desc,$cedula,$totalFinal) {
    $sql2 = "update usuarios set estado = 0 where cedula = '".$cedula."'";
    $this->db->query($sql2);

    $sql = "update horas set 
    descripcion = '".$desc."',
    salida  = '".$salida."',
    TotalHoras = '".$totalFinal."'
    where 
    salida is null and cedula ='".$cedula."'";
    
    return $this->db->query($sql);
  }

  public function recupeHoraEn($cedula){


   $sql = " select entrada from horas where salida is null and cedula ='".$cedula."'"; 
    $datos= $this->db->query($sql);
    $arreglo = array();
    
    while($reg=$datos->fetch_object())
       {
            $arreglo[]=$reg;
       }
       
       return $arreglo; 
  }

  public function generaReporte($mes){
    $sql = " select * from horas where 
             fecha like  '%".$mes."%' ";
    
   $datos= $this->db->query($sql);
      $arreglo = array();
      while($reg=$datos->fetch_object())
       {
            $arreglo[]=$reg;
       }
       
       return $arreglo;
  }

  

}

?>
