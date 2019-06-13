<?php
    session_start();
    require_once("../php/conexion_pdo.php");
	$db = new Conexion();
	$dbTabla='PROFESOR';
	$consulta="SELECT * FROM $dbTabla WHERE idUsuario != :iu";
	$result = $db->prepare($consulta);
	$result->execute(array(":iu" => $_SESSION["id"]));
?>
<html>
<head>
	<title>Home</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="../css/header.css">
	<link rel="stylesheet" href="../css/home.css">
	<script type="text/javascript" src="../js/header.js"></script>
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
        <form id="mensajes-form" method="POST" action="../php/mensajes.php">
            <div id="destinatario">
                <p>Per a:</p>
                <select id="select_profesor" name="select_profesor">
                    <option value="Selecciona al profesor" selected="selected">Selecciona al profesor</option>
                    <?php
                        foreach ($result as $fila){
                            echo "<option value='".$fila[idUsuario]."'>".$fila[nombre]." ".$fila[apellido]."</option>";
                        }
                    ?>
                </select>
            </div>
            <div id="asunto">
                <p>Assumpte:</p>
                <input type="text" id="asumpto-mensaje" name="asumpto-mensaje">
            </div>
            
            <div id="texto-mensaje">
                <p>Enviar:</p>
            </div>
            <textarea rows="4" cols="50" name="comment">
            Enter text here...</textarea>
            <input type="submit" name="submit" id="submit">
            </form>
        <table id="mensajes-table">
    
        </table>
    </div>
</body>
</html> 