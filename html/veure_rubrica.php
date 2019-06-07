<?php
session_start();
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
    });
    </script> 
</head>
<body>
	<div id="headerOUT"></div>
	<div class="intro_img">
		<img src="../resources/images/cordinador.jpg" id="imgEva">
	</div>
	<div class="formulario">
	    <form class="formulario_ini" method="post" action="../php/rubrica_vista.php">
			<select id="select_grau" name="select_grau">
	          <option value="Selecciona el Grau">Selecciona el Grau</option>
	          <option value="Grau en Diseño Animació i Art Digital">Grau en Diseño Animació i Art Digital</option>
	          <option value="Grau en Multimèdia">Grau en Multimèdia</option>
	          <option value="Grau en Disseny i Desenvolupament de Videojocs">Grau en Disseny i Desenvolupament de Videojocs</option>
	        </select>
	        <select id="select_est" name="select_est">
	          <option value="Seleccion estudiant">Seleccion estudiant</option>
	          <option value="Estudiant 1">Estudiant 1</option>
	          <option value="Estudiant 2">Estudiant 2</option>
	          <option value="Rosa María Puig i Tresserres">Rosa María Puig i Tresserres</option>
	          <option value="Estudiant 3">Estudiant 3</option>
	          <option value="Jacinto González López">Jacinto González López</option>
	          <option value="Estudiant 5">Estudiant 5</option>
	          <option value="Estudiant 6">Estudiant 6</option>
	        </select>
	        <select id="select_rub" name="select_rub">
	          <option value="Selecciona la rúbrica">Selecciona la rúbrica</option>
	          <option value="Primera rúbrica">Primera rúbrica</option>
	          <option value="Segona rúbrica">Segona rúbrica</option>
	          <option value="Tribunal">Tribunal</option>
	        </select>
			<input type="submit" name="submit">
		</form>
	</div>
</body>
</html> 