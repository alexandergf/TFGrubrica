<?php
session_start();
require_once('../js/ver_rubrica.php');
?>
<html>
<head>
	<title>Veure rubrica</title>
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
	  inici();
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
			<select id="select_rubrica" name="select_rubrica"></select>
	        <input type="submit" name="submit" id="submit">
		</form>
	</div>
</body>
</html> 