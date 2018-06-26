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
    $estado = $_SESSION['estado'];   
?>



    <!DOCTYPE html>
    <html>

    <head>
        <title>INICIO ADMIN</title>
        
        <link rel="stylesheet" type="text/css" href="../diseño/css/admin.css">
        
        <link rel="stylesheet" type="text/css" href="../diseño/css/reloj.css">

        <link rel="stylesheet" type="text/css" href="../diseño/boots/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="../diseño/boots/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="../diseño/boots/bootstrap-theme.css">
        <link rel="stylesheet" type="text/css" href="../diseño/boots/bootstrap-theme.min.css">
    </head>

    <body>
        <input type="hidden" name="" value="<?php echo $estado; ?>" id="a">
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
                <a id="boton1" class="btn2" href="reportesTra.php">Reportes</a>
                <a id="boton1" class="btn3" href="trabajadoresAdmin.php">Trabajadores</a>
                <a id="boton1" class="btn4" href="../control/logout.php">Salir</a>

            </div>

            <div id="derecha">

                <div id="clockdate">
                    <div class="clockdate-wrapper">
                        <div id="clock"></div>
                        <div id="date"></div>
                    </div>
                </div>


                <!--<a href="../control/guardarHoraEntrada.php">ENTRADA</a>-->


                <div id="botones">
                <input class='entrada' id="entrada" type="button" value="Entrada" name='entrada'>
                <input class='salida' id="salida" type="button"  value="Salida" name= 'salida'>
                </div> 
                
                    <div id= 'textArea'>
                            <textarea rows="10" cols="60" id="txt" name="txt"></textarea>  
                    </div>

               
            </div>

        </main>

        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>    
        <script src="https://momentjs.com/downloads/moment.min.js"></script>
        <script src="https://momentjs.com/downloads/moment-timezone.min.js"></script>   
        <script src="../js/admin.js"></script>
        
        
    </body>

    </html>
