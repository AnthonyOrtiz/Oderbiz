

<?php

session_start();

?>

<?php 
require_once "../clases/usuarios.php";

$usuario = new usuario();

$usuario1 = $_POST['email']; 
$password = $_POST['password'];

 
$u = $usuario->getUser($usuario1);

if (empty($u)){
	
	header("Location: ../index.php");	

}else{ 

	foreach ($u as $dato) {

    	if ($dato->cedula == $usuario1 && $dato->contrasenia==$password) {
    		$espacio = '  ';	 
        	$_SESSION['loggedin'] = true;
       		$_SESSION['username'] = $dato->nombres.$espacio.$dato->apellidos;
            $_SESSION['foto'] = $dato->foto;
            $_SESSION['rol'] = $dato->rol;
            $_SESSION['cedula'] = $dato->cedula;
            $_SESSION['estado'] = $dato->estado;
        	$_SESSION['start']    = time();   
            $_SESSION['expire'] = $_SESSION['start'];
            

            if($dato->rol == 1){

                 header("Location: ../vistas/inicioAdmin.php");
               
            }else{
                 header("Location: ../vistas/marcarHora.php");
            }
        	
    	}
	}
}

	



?>