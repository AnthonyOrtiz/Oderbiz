    <?php
    session_start();

        if(!isset($_SESSION['cedula']))  { 
                 
                header('Location: ../index.php');  
                 
                exit(); 
        } 
        if($_SESSION['rol']==0){
        	header("Location: ../vistas/marcarHora.php");
        }
    ?>


    <?php
    	require_once("../clases/horas.php");
    	require_once("../clases/usuarios.php");
    ?>


<!DOCTYPE html>
<html>

<head>
    <title>REPORTES TRABAJADOR</title>
    <link rel="stylesheet" type="text/css" href="../diseño/css/reportesTra.css">
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
              

                <form  id="formulario1" name="form" method="post" action="">
                    <p>
                        <label for="cedula">Cedula:</label>
                        <input type="text" name="cedula" placeholder="Cedula" autofocus="true" class="form-control" required="true" />
                    </p>
                    <p>
                        <label for="mes">Mes:</label>
                        <input type="text" name="mes" class="form-control" required="true" />
                    </p>

                    <input type="submit" name="submit" value="BUSCAR" id="SALIDA" class="btn btn-primary btn-lg" />
                </form>

                <div id="tabla">
                    <table class="table table-dark">
                        <thead>
                            <tr class="info">
                                <th>Cedula</th>
                                <th>entrada</th>
                                <th>salida</th>
                                <th>Fecha</th>
                                <th>Descripcion</th>
                                <th>Total Dia</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                             if(isset($_POST["cedula"])){
                                $h = 0;
                                $m = 0;
                                $aux1 = 0;
                                $aux2 = 0;
                                $aux3 = 0;
                                $aux4 = '';
                                $t = '';
                                $horas=new horas();
                                $h=$horas->generaReporte($_POST["cedula"],$_POST["mes"]);
                               
    						foreach($h as $dato) {
                                
                                if (isset($dato->TotalHoras)) {
                                    list($h,$m) = explode(":",$dato->TotalHoras);
                                    $aux1 += $h;
                                    $aux2 += $m;
                                }
    					    ?>
                                <tr>
                                    <td>
                                        <?php echo $dato->cedula ?>
                                    </td>
                                    <td>
                                        <?php echo $dato->entrada ?>
                                    </td>
                                    <td>
                                        <?php echo $dato->salida ?>
                                    </td>
                                    <td>
                                        <?php echo $dato->fecha ?>
                                    </td>
                                    <td>
                                        <?php echo $dato->descripcion ?>
                                    </td>

                                    <td>
                                      
                                       <?php echo $dato->TotalHoras ?>
                                    </td>

                                </tr>
                            <?php 
        							} 
                                     
                                     $aux1 += intval($aux2/60);
                                     $aux3 = $aux2%60;
                                     $aux4 = $aux1.':'.$aux3;
                                     $formato = strtotime($aux4);
                                     $t  = date("H:i",$formato);
                                    
                            ?>

                                    <tr>
                                        <td> </td>
                                        <td> </td>
                                        <td> </td>
                                        <td> </td>
                                        <td>Total</td>
                                         <td>
                                            <?php echo $t ?>
                                        </td>
                                    </tr>
                            <?php 
                                }else{

                                }
    						?>
                            
                        </tbody>
                    </table>
                </div>

                <div class="col-md-4">
                    <button onclick="myFunction()" id="GenerarMysql" class="btn btn-default">Crear PDF MySQL</button>
                </div>
               
               <script type="text/javascript">
                    function myFunction() {
                        var parametro = $("#txt").val();
                       

                            var pdf = new jsPDF();
                            pdf.text(20, 20, "REPORTE<?php echo $dato->cedula ?>");

                            var columns = ["Datos Usuario", "H. entrada", "H. Salida", "Fecha", "Descripcion",
                             "Total Dia"];

                            var data = [
                                    <?php 
                                        $a = 0;
                                        $m = 0;
                                        $aux1 = 0;
                                        $aux2 = 0;
                                        $aux3 = 0;
                                        $aux4 = '';
                                        $t = '';
                                        $horas=new horas();

                                        $h=$horas->generaReporte($_POST["cedula"],$_POST["mes"]);
                                        $usuario=new usuario();
                                        $u=$usuario->getTrabajadores();

                                        foreach($u as $dato1) {
                                    ?>
                                            ["<?php echo $dato1->nombres; ?>", " ", " ", " "," "," "],
                                    <?php
                                            foreach($h as $dato) {

                                                if ($dato1->cedula == $dato->cedula and isset($_POST["cedula"])) {
                                                    list($a,$m) = explode(":",$dato->TotalHoras);
                                                    $aux1 += $a;
                                                    $aux2 += $m;
                                    ?>  

                                                    ["<?php echo $dato->cedula; ?>", "<?php echo $dato->entrada; ?>","<?php echo $dato->salida; ?>","<?php echo $dato->fecha; ?>","<?php echo $dato->descripcion; ?>","<?php echo $dato->TotalHoras; ?>"],
                                    <?php 
                                                }
                                            }
                                            $aux1 += intval($aux2/60);
                                            $aux3 = $aux2%60;
                                            $aux4 = $aux1.':'.$aux3;
                                            $formato = strtotime($aux4);
                                            $t  = date("H:i",$formato);   
                                            

                                    ?>
                                          [" ", " ", " ", " ","TOTAL","<?php echo $t; ?>"],
                                          [" ", " ", " ", " "," "," "],  
                                    <?php
                                            $a = 0;
                                            $m = 0;
                                            $aux1 = 0;
                                            $aux2 = 0;
                                            $aux3 = 0;
                                            $aux4 = '';
                                            $t = '';
                                        }
                                    ?>
                                        ];

                                pdf.autoTable(columns, data, {
                                    margin: {
                                        top: 25
                                    }
                                });
                                pdf.save('Reporte del Mes '+'<?php echo $_POST["mes"] ?>.pdf');

                }
               </script>

            </div>

    </main>
        <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>  
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <script src="../js/jspdf.min.js"></script>
        <script src="../js/jspdf.plugin.autotable.min.js"></script>
        <!--<script src="../js/pdf.js"></script>-->
        <script src="../js/reportesTra.js"></script>
</body>

</html>
