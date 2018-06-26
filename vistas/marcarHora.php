<?php
session_start();

    if(!isset($_SESSION['cedula']))  
    { 
         
        header('Location: ../index.php');  
         
        exit(); 
    } 
    if($_SESSION['rol']==1){
    	header("Location: ../vistas/inicioAdmin.php");
        
    }
    $estado = $_SESSION['estado'];   
?>


    <!DOCTYPE html>
    <html>

    <head>
        <title>MARCAR HORA TRABAJADOR</title>
         
        <link rel="stylesheet" type="text/css" href="../diseño/css/trabajadro.css">
        <link rel="stylesheet" type="text/css" href="../diseño/css/reloj.css">
            
       
        
    </head>

    <body>
        <input type="hidden" name="" value="<?php echo $estado; ?>" id="a">
        <?php 
            $foto = $_SESSION['foto'];

        ?>
        
    <div id='logo'>
         <img src="../diseño/imagenes/logo.png">
    </div>

    <div id='btnSalir'>
            <a href="../control/logout.php"><img src="../diseño/imagenes/btnSalir.png"></a>
    </div>

    <main>

         <div id="clockdate">
            <div class="clockdate-wrapper">
                <div id="clock"></div>
                <div id="date"></div>
            </div>
        </div>

        <div id="perfil">
            <img  src="<?php echo $foto?>" >
            
        </div>

        <div id="botones">
            <input class='entrada' id="entrada" type="button" value="Entrada" name='entrada'>
            <input class='salida' id="salida" type="button"  value="Salida" name= 'salida'>

        </div>
        
        

        <div id= 'textArea'>
            <textarea rows="7" cols="60" class="txt" id="txt" name="txt"></textarea>   
        </div>

    </main>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>  
        <script src="https://momentjs.com/downloads/moment.min.js"></script>
        <script src="https://momentjs.com/downloads/moment-timezone.min.js"></script>   
        <script src="../js/trabajador.js"></script>
    </body>

    </html>
