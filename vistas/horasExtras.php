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
                    <input type="text" id="cedula" name="cedula" placeholder="Cedula" autofocus="true" class="form-control" required="true" value="<?php echo $datos[0]->cedula;?>" /></div>
                </div>
                <div class="form-group row">
                    <label for="nombres" class="col-sm-2 col-form-label">Nombres:</label>
                    <div class="col-sm-10">
                    <input type="text" name="nombres" id="nombres" placeholder="Nombres" autofocus="true" class="form-control" required="true" value="<?php echo $datos[0]->nombres;?>" /></div>
                </div>
                <div class="form-group row">
                    <label for="apellidos" class="col-sm-2 col-form-label">Apellidos:</label>
                    <div class="col-sm-10">
                    <input type="text" name="apellidos" id="apellidos" plid="horaEntrada" aceholder="apellidos" autofocus="true" class="form-control" required="true" value="<?php echo $datos[0]->apellidos;?>" /></div>
                </div>
                <div class="form-group row">
                    <label for="fecha" class="col-sm-2 col-form-label">Fecha:</label>
                    <div class="col-sm-10">
                        <input type="date" name="fecha" id="fecha" required="true" class="form-control"/>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="horaEntrada" class="col-sm-2 col-form-label">Hora Entrada:</label>
                    <div class="col-sm-10"><input type="time" id="horaEntrada" name="hora" value="00:00:00" max="23:59:59" min="00:00">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="horaSalida" class="col-sm-2 col-form-label">Hora Salida:</label>
                    <div class="col-sm-10"><input type="time" id="horaSalida" name="hora" value="00:00:00" max="23:59:59" min="00:00">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="descripcion" class="col-sm-2 col-form-label">Descripción:</label>
                    <div class="col-sm-10"> <textarea rows="7" cols="60" class="txt" id="txt" name="txt"></textarea>
                    </div>
                </div>
                <hr />
                <input type="button" value="Guardar" class="btn btn-primary" id="a" />
            </form>
        </div>

    </main>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>    
        <script src="../js/horasExtras.js"></script>
    </body>

    </html>
