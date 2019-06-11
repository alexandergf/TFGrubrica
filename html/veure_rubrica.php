<?php
session_start();
require_once('../js/veure_rubrica.php');
?>
<html>
<head>
	<title>Veure rúbrica</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="../css/header.css">
	<link rel="stylesheet" href="../css/home.css">
	<script type="text/javascript" src="../js/header.js"></script>
	<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script> 
    $(function(){
	  $("#headerOUT").load("header.php"); 
	  document.getElementById("submit").disabled = true;
    });
    </script> 
</head>
<body>
	<div id="headerOUT"></div>
	<div class="intro_img">
		<img src="../resources/images/cordinador.jpg" id="imgEva">
	</div>
	<div class="formulario">
	<div class="formulario">
		<form method="POST" action="rubrica.php" id="formulario">
			<select id="select_grau" name="select_grau" onchange="selectGrau()">
	          <option selected value="Selecciona el Grau">Selecciona el Grau</option>
	          <option value="diseny">Grau en Diseño Animació i Art Digital</option>
	          <option value="multi">Grau en Multimèdia</option>
	          <option value="jocs">Grau en Disseny i Desenvolupament de Videojocs</option>
	        </select>
	        <select id="select_estudiant" name="select_estudiant" onchange="selectEst()">
	        </select>
	        <select id="select_rubrica" name="select_rubrica">
	        </select>  
	        <input type="hidden" name="perfil" ><!--value="profesor">-->
	        <input type="submit" id="submit" name="submit">
		</form>
	</div>
	</div>
</body>
</html> 