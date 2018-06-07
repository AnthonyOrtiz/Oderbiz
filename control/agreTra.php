
<?php

		
		$ced = $_POST["cedula"];
		$pass = $_POST["contrasenia"];
		$nomb = $_POST["nombres"];
		$apell = $_POST["apellidos"];
		$fecha = $_POST["fecha"];
		$correo = $_POST["correo"];
		$tele = $_POST["telefono"];
		$dire= $_POST["direccion"];
		$depa	= $_POST["departamento"];
		echo $ced,$pass,$nomb,$apell,$fecha,$correo,$tele,$dire,$depa;

	
		require_once "../clases/usuarios.php";
		$usu=new usuario();
		$usu->agregarTrabajador($ced,$pass,$nomb,$apell,$fecha,$correo,$tele,$dire,$depa);

		header("Location: ../vistas/trabajadoresAdmin.php");
		


?>

