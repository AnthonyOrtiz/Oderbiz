<?php
session_start();

if(!isset($_SESSION['cedula']))  
    { 
         
        header('Location: ../index.php');  
         
        exit(); 
    } 
    if($_SESSION['rol']==0){
        header("Location: ../vistas/marcarHora.php");

    }
?>

    <?php  
	require_once("../clases/usuarios.php");
	$usuario=new usuario();
	$datos = $usuario->getTrabajador($_GET["cedula"]);

	//$u=$usuario->getTrabajador();
	//print_r($u);
	//exit;
 ?>

    <!DOCTYPE html>
    <html>

    <head>
        <title>EDITAR TRABAJADOR</title>
        <link rel="stylesheet" type="text/css" href="../diseño/css/agregrarTrabajador.css">

        <link rel="stylesheet" type="text/css" href="../diseño/boots/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="../diseño/boots/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="../diseño/boots/bootstrap-theme.css">
        <link rel="stylesheet" type="text/css" href="../diseño/boots/bootstrap-theme.min.css">
    </head>

    <body>

        <?php 
            $foto = $_SESSION['foto'];
        ?>

    <main>
        
        <div id="izquierda">

                <div id='logo'>
                    <img src="../diseño/imagenes/logo.png">
                </div>
                
                <div id="perfil">
                    <img src="<?php echo $foto?>">
                </div>

                <a id="boton1" class="btn1" href="inicioAdmin.php">Registrar Horario</a>
                <a id="boton2" class="btn2" href="reportesTra.php">Reportes</a>
                <a id="boton3" class="btn3" href="trabajadoresAdmin.php">Trabajadores</a>
                <a id="boton4" class="btn4" href="../control/logout.php">Salir</a>

        </div>

        <div id="derecha">
            <?php $cedula = $_GET["cedula"];  ?>

            <p>
                <a href="trabajadoresAdmin.php" class="btn btn-primary"></span>Atras</a>
            </p>

            <form name="form" action="../control/actualizaTra.php" method="post">

                <div class="form-group row">
                    <label for="cedula" class="col-sm-2 col-form-label">Cedula:</label>
                    <div class="col-sm-10">
                    <input type="text" name="cedula" placeholder="Cedula" autofocus="true" class="form-control" required="true" value="<?php echo $datos[0]->cedula;?>" /></div>
                </div>
                <div class="form-group row">
                    <label for="nombres" class="col-sm-2 col-form-label">Nombres:</label>
                    <div class="col-sm-10">
                    <input type="text" name="nombres" placeholder="Nombres" autofocus="true" class="form-control" required="true" value="<?php echo $datos[0]->nombres;?>" /></div>
                </div>
                <div class="form-group row">
                    <label for="apellidos" class="col-sm-2 col-form-label">Apellidos:</label>
                    <div class="col-sm-10">
                    <input type="text" name="apellidos" placeholder="apellidos" autofocus="true" class="form-control" required="true" value="<?php echo $datos[0]->apellidos;?>" /></div>
                </div>
                <div class="form-group row">
                    <label for="fecha" class="col-sm-2 col-form-label">Fecha Nacimiento:</label>
                    <div class="col-sm-10">
                    <input type="date" name="fecha" class="form-control" value="<?php echo $datos[0]->fechaNacimiento;?>" /></div>
                </div>
                <div class="form-group row">
                    <label for="telefono" class="col-sm-2 col-form-label">Teléfono:</label>
                    <div class="col-sm-10">
                    <input type="text" name="telefono" placeholder="Teléfono" class="form-control" required="true" value="<?php echo $datos[0]->telefono;?>" /></div>
                </div>
                <div class="form-group row">
                    <label for="correo" class="col-sm-2 col-form-label">E-Mail:</label>
                    <div class="col-sm-10">
                    <input type="email" name="correo" placeholder="E-Mail" class="form-control" required="true" value="<?php echo $datos[0]->email;?>"/></div>
                </div>
                <div class="form-group row">
                    <label for="departamento" class="col-sm-2 col-form-label">Departamento:</label>
                    <div class="col-sm-10">
                    <input type="text" name="departamento" placeholder="departamento" autofocus="true" class="form-control" required="true" value="<?php echo $datos[0]->departamento;?>" /></div>
                </div>
                <div class="form-group row">
                    <label for="direccion" class="col-sm-2 col-form-label">Direccion:</label>
                    <div class="col-sm-10">
                    <input type="text" name="direccion" placeholder="Direccion" autofocus="true" class="form-control" required="true" value="<?php echo $datos[0]->direccion;?>" /></div>
                </div>
                <div class="form-group row">
                    <label for="contrasenia" class="col-sm-2 col-form-label">Contraseña:</label>
                    <div class="col-sm-10">
                    <input type="text" name="contrasenia" placeholder="Contraseña" autofocus="true" class="form-control" required="true" value="<?php echo $datos[0]->contrasenia;?>" /></div>
                </div>

                <hr />
                <input type="submit" value="Guardar" class="btn btn-primary" />
            </form>
        </div>

    </main>
        <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>  
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <script src="../js/trabajadoresAdmin.js"></script>
    </body>

    </html>
