<?php
session_start();
?>
<html>
<head>
	<title>Penjar rubrica</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="../css/header.css">
	<link rel="stylesheet" href="../css/home.css">
	<link rel="stylesheet" href="../css/penjar_rubrica.css">
	<script type="text/javascript" src="../js/header.js"></script>
	<script type="text/javascript" src="../js/penjar_rubrica.js"></script>
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
		<img src="../resources/images/subir_rubrica.jpg" id="imgEva">
	</div>
	<div class="formulario">
		<form action="../php/insertRubrica.php" method="POST" enctype="multipart/form-data">
			<select id="select_rub" name="select_rub">
	          <option value="Quina rúbrica dessitja veure?">Quina rúbrica dessitja penjar?</option>
	          <option value="1">Rúbrica 1</option>
	          <option value="2">Rúbrica 2</option>
	          <option value="3">Rúbrica 3</option>
	        </select>
	        
	        <label for="userfile" id="userfile" >
	        	<input type="file" id='file_input' name="file_input" />
	        	<img src="../resources/logos/upload_logo.png" id='image_input' onclick="image()" />
	        </label>	    	
	        <button type="submit" name="submit" id="submit">Subir</button>
		</form>
	</div>
</body>
</html> 