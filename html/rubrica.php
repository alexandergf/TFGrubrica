<?PHP
	session_start();
	$rub = $_POST["select_rubrica"];
	$perfil=$_POST["perfil"];
	require_once("../php/conexion_pdo.php");
	$db = new Conexion();

	$dbTabla='Tiene'; 
	$dbTabla2='RUBRICA'.$rub;
	$dbTabla3='ALUMNO';
	if ($perfil == "profesor") {
		$consulta="SELECT documento FROM $dbTabla2 INNER JOIN $dbTabla ON $dbTabla2.idTFG=$dbTabla.idTFG INNER JOIN $dbTabla3 ON $dbTabla.idAlum=$dbTabla3.idUsuario AND $dbTabla3.nombre=:iu";
		$n=explode(" ", $_POST["select_estudiant"]);	
		$alumno=$n[0];
		//SELECT documento FROM RUBRICA1 INNER JOIN Tiene ON RUBRICA1.idTFG=Tiene.idTFG INNER JOIN ALUMNO ON Tiene.idAlum=ALUMNO .idUsuario AND ALUMNO.nombre='Alexander'
	}else{
		$consulta="SELECT documento FROM $dbTabla2 INNER JOIN $dbTabla ON $dbTabla2.idTFG=$dbTabla.idTFG AND $dbTabla.idAlum=:iu";
		$alumno=$_SESSION["id"];
	}
		$result = $db->prepare($consulta);
		$result->execute(array(":iu" => $alumno));
		if (!$result) {
			//Fallo
		}else{
			$fila=$result->fetchObject();
			$pdf=$fila->documento;
			echo $pdf;
		}
	$dbTabla='ALUMNO'; 
	$dbTabla2='Tiene';
	$dbTabla3='TFG';
	if ($perfil == "profesor") {
		$consulta="SELECT nombre,apellido,$dbTabla3.titulo FROM $dbTabla INNER JOIN $dbTabla2 ON $dbTabla2.idAlum=$dbTabla.idUsuario AND $dbTabla.nombre=:iu INNER JOIN $dbTabla3 ON $dbTabla3.idTFG=$dbTabla2.idTFG";
	}else{
		$consulta="SELECT nombre,apellido,$dbTabla3.titulo FROM $dbTabla INNER JOIN $dbTabla2 ON $dbTabla2.idAlum=$dbTabla.idUsuario AND $dbTabla.idUsuario=:iu INNER JOIN $dbTabla3 ON $dbTabla3.idTFG=$dbTabla2.idTFG";
	}
	
	//SELECT nombre,apellido,TFG.titulo FROM ALUMNO INNER JOIN Tiene ON Tiene.idAlum=ALUMNO.idUsuario AND ALUMNO.idUsuario=1 INNER JOIN TFG ON TFG.idTFG=Tiene.idTFG 
		$result = $db->prepare($consulta);
		$result->execute(array(":iu" => $alumno));
		if (!$result) {
			//Fallo
		}else{
			$fila=$result->fetchObject();
			$nom=$fila->nombre;
			$cognom=$fila->apellido;
			$titulo=$fila->titulo;
		}
?>
<html>
<head>
	<title>Rubrica <?php echo $rub;?></title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="../css/header.css">
	<link rel="stylesheet" href="../css/rubrica.css">
	<script type="text/javascript" src="../js/header.js"></script>
	<script type="text/javascript" src="../js/rubrica.js"></script>
	<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script> 
    $(function(){
      $("#headerOUT").load("header.php"); 
    }); 
    </script> 
</head>
<body>
	<div id="headerOUT"></div>
	<div id="bodyOUT">
		<span class="intro" id="intro">Trabajo de Fin de Grado: <?php echo $titulo." de ".$nom." " . $cognom ; ?></span>
		<p>Documento: Memoria del TFG (solo lectura)</p>
		<?php 
			echo "<iframe id='pdf' src='../rubricas_pdf/" . $pdf . "'></iframe>"; 
		 	echo "<iframe id='iframe' src='evaluar_rubrica.php?rub=".$rub."&apartado=1'></iframe>"; 
		 	if ($perfil == "profesor") {
		 		echo "<iframe id='frases' src='../resources/pdf/frases.pdf'></iframe>";
		 	}
		 ?>

		<div class="return">
			<button id="btn" onclick="volver('<? echo $perfil; ?>')">Tornar a l'inici</button>
		</div>
	</div>
</body>
</html> 