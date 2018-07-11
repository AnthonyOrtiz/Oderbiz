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

  public function generaReporte($ced,$mes){
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

  public function generaNewReporte($mes){
    $h = 0;
    $m = 0;
    $aux1 = 0;
    $aux2 = 0;
    $aux3 = 0;
    $aux4 = '';
    $t = '';
    $arreglo = array("cedula", "horasTotal");


    $sql = " select * from horas where 
             fecha like  '%".$mes."%' ";
    
    $sql2 = " select * from usuarios";

    $datos= $this->db->query($sql);
    $horas = array();

    while($reg=$datos->fetch_object()){
          $horas[]=$reg;
    }

    $datos= $this->db->query($sql2);
    $usuarios = array();

    while($reg=$datos->fetch_object()){
          $usuarios[]=$reg;
    }

    foreach ($usuarios as $dato1) {

      foreach ($horas as $dato2) {
        if ($dato1->cedula == $dato2->cedula) {
            if (isset($dato->TotalHoras)) {
                list($h,$m) = explode(":",$dato->TotalHoras);
                $aux1 += $h;
                $aux2 += $m;
            }         
        }  
      }
       $aux1 += intval($aux2/60);
       $aux3 = $aux2%60;
       $aux4 = $aux1.':'.$aux3;
       $formato = strtotime($aux4);
       $t  = date("H:i",$formato);
       
       array_push($arreglo, $dato1->cedula, $t);
    }

    return $arreglo;
  }

}

?>
