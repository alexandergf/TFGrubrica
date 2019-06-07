<?php
session_start();
?>
<html>
<head>
	<title>Veure rubrica</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="../css/header.css">
	<link rel="stylesheet" href="../css/home.css">
	<script type="text/javascript" src="../js/header.js"></script>
	<script type="text/javascript" src="../js/estudiante.js"></script>
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
		<img src="../resources/images/ver_rubrica.jpg" id="imgEva">
	</div>
	<div class="formulario">
		<form method="POST" action="rubrica.php">
			<select id="select_rubrica" name="select_rubrica">
	          <option value="Quina rúbrica dessitja veure?">Quina rúbrica dessitja veure?</option>
	          <option value="1">Rúbrica 1</option>
	          <option value="2">Rúbrica 2</option>
	          <option value="3">Rúbrica 3</option>
	        </select>
	        <input type="submit" name="submit">
		</form>
	</div>
</body>
</html> 