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
	$u=$usuario->getTrabajadores();
	//print_r($u);
	//exit;
 ?>



    <!DOCTYPE html>
    <html>

    <head>
        <title>LISTADO TRABAJADORES</title>
        <link rel="stylesheet" type="text/css" href="../diseño/css/trabajadoresAdmin.css">

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
            <div>
                <p>
                    <a href="agregarTrabajador.php" class="btn btn-primary"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Agregar</a>
                </p>
                <div id="tabla">
                    <table class="table table-dark">
                        <thead >
                            <tr>
                                <th scope="col">Cedula</th>
                                <th scope="col">Nombres</th>
                                <th scope="col">Apellidos</th>
                                <th scope="col">Email</th>
                                <th scope="col">Fecha Nac</th>
                                <th scope="col">Departamento</th>
                                <th scope="col">Editar</th>
                                <th scope="col">H. extras</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
    							foreach($u as $dato) {
    					    ?>
                            <tr>
                                <td>
                                    <?php echo $dato->cedula ?>
                                </td>
                                <td>
                                    <?php echo $dato->nombres ?>
                                </td>
                                <td>
                                    <?php echo $dato->apellidos ?>
                                </td>
                                <td>
                                    <?php echo $dato->email ?>
                                </td>
                                <td>
                                    <?php echo $dato->fechaNacimiento ?>
                                </td>
                                <td>
                                    <?php echo $dato->departamento ?>
                                </td>

                                <td>
                                    <a href="editarTrabajador.php?cedula=<?php echo $dato->cedula ?>">
                                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>

                                    </a>
                                </td>
                                <td>
                                    <a href="horasExtras.php?cedula=<?php echo $dato->cedula ?>">
                                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>

                                    </a>
                                </td>
                            </tr>
                            <?php 
    							 	} 
    							 ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </main>

        <script src="../js/jquery-1.10.2.js"></script>
        <script src="../js/bootstrap.min.js"></script>
        <script src="../js/funciones.js"></script>
        <script src="../js/trabajadoresAdmin.js"></script>


    </body>

    </html>
