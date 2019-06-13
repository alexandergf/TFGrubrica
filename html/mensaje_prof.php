<?php
    session_start();
    require_once("../php/conexion_pdo.php");
    $db = new Conexion();

    $dbTabla='MENSAJES';
    $dbTabla2='PROFESOR';
	$consulta="SELECT * FROM $dbTabla INNER JOIN $dbTabla2 ON $dbTabla2.idUsuario=$dbTabla.coordinador AND $dbTabla.idMensaje=:iu";
	$result = $db->prepare($consulta);
    $result->execute(array(":iu" => $_GET["mensaje"]));
    $fila=$result->fetchObject();
?>
<html>
<head>
	<title>Mensajes</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="../css/header.css">
	<link rel="stylesheet" href="../css/home.css">
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
        <div id="first-line">
            <p>De:</p>
            <?php echo $fila->nombre . " " . $fila->apellido;?>
        </div>
        <div id="second-line">
            <p>Assumpte:</p>
            <?php echo $fila->asumpto;?>
        </div>
        <div id="third-line">
            <p>Data:</p>
            <?php echo $fila->fecha;?>
        </div>
        <div id="messaje-line">
            <?php echo $fila->contenido;?>
        </div>
    </div>
</body>
</html> 