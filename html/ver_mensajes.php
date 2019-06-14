<?php
    session_start();
    require_once("../php/conexion_pdo.php");
    $db = new Conexion();
    $aux = "si";
	$dbTabla='MENSAJES';
	$consulta="SELECT COUNT(*) FROM $dbTabla WHERE profesor = :iu";
	$result = $db->prepare($consulta);
    $result->execute(array(":iu" => $_SESSION["id"]));
    $total=$result->fetchColumn();
    if($total == 0){
        $aux = "no";
        echo $total;
    }else{
        $dbTabla='MENSAJES';
        $consulta="SELECT * FROM $dbTabla WHERE profesor = :iu";
        $result = $db->prepare($consulta);
        $result->execute(array(":iu" => $_SESSION["id"]));
    }
    $dbTabla='PROFESOR';
    $consulta="SELECT * FROM $dbTabla";
    $result2 = $db->prepare($consulta);
    $result2->execute();
?>
<html>
<head>
	<title>Mensajes</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/home.css">
    <link rel="stylesheet" href="../css/ver_mensaje.css">
	<script type="text/javascript" src="../js/ver_mensajes.js"></script>
	<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script> 
    $(function(){
      $("#headerOUT").load("header.php"); 
    });
    </script> 
</head>
<body>
	<div id="headerOUT"></div>
	<div class="intro_img">
		<img src="../resources/images/mensajes.jpg" id="imgEva" />
    </div>
    <div id="mensajes-body">
        <table id="mensajes-table">
            <tr>
                <th>De</th>
                <th>Assumpte</th>
                <th>Data</th>
            </tr>
            <tr>
                <?php
                    if($aux == "no"){
                        echo "<td>No hay mensajes.</td>";
                    }else{
                        foreach ($result as $fila){
                            foreach ($result2 as $fila2){
                                if($fila[coordinador] == $fila2[idUsuario]){
                                    echo "<td>$fila2[nombre] $fila2[apellido]</td>";
                                }
                                
                            }
                            
                            echo "<td id='assu'>$fila[asumpto]</td>";
                            $fecha=explode(" ",$fila[fecha]);
	                        $fecha=$fecha[0];
                            echo "<td id='date'>$fecha</td>";
                            echo "<td id='btn-id'><button id='btn-mensaje' onclick='redirec($fila[idMensaje])'>VEURE</button></td>";
                            
                        }
                    }
                ?>
            </tr>
        </table>
    </div>
</body>
</html> 