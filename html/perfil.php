<?php
include "../php/protege.php";
$resp=$_GET["perfil"];
?>
<html>
<head>
	<title>Perfil</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="../css/header.css">
	<link rel="stylesheet" href="../css/home.css">
	<link rel="stylesheet" href="../css/perfil.css">
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
		<img src="../resources/images/evaluacion_tfg.jpg" id="imgEva">
	</div>
	<div class="formulario">
		<form method="POST" action="../php/revperfil.php">
			<select id="select_list" name="select_list">
	          <option selected value="Selecciona el teu perfil">Selecciona el teu perfil</option>
	          <option value="Coordinador">Coordinador</option>
	          <option value="Professor">Professor</option>
	          <option value="Estudiant">Estudiant</option>
	        </select>
	        <input type="submit" name="submit" value="Seguir">
		</form>
		<?php
		if(!empty($resp)){
			echo "<div id='respuesta'><p>No tiene permisos para entrar en $resp.</p></div>";
		}	
		?>
	</div>
</body>
</html> 