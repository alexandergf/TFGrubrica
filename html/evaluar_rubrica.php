<?php
//<iframe id='iframe' src='evaluar_rubrica.php?rub=".$rub."'></iframe>"
	session_start();
?>
<html>
<head>
	<title>Rubrica <?php echo $rub;?></title>
	<meta charset="utf-8">
	<script type="text/javascript" src="../js/evaluar.js"></script>
	<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
	<link rel="stylesheet" href="../css/evaluar_rubrica.css">
</head>
<body>
<?php
	$rub = $_GET["rub"];
	$apartado=$_GET["apartado"];
	require_once("../php/conexion_pdo.php");
	$db = new Conexion();


	$dbTabla='APARTADOS'.$rub; 
	$consulta = "SELECT COUNT(*) FROM $dbTabla";  
	$result = $db->prepare($consulta);
	$result->execute();
	$total = $result->fetchColumn();



	$dbTabla='APARTADOS'.$rub; 
	$consulta = "SELECT * FROM $dbTabla WHERE idApartado=:ia"; 
	$result = $db->prepare($consulta);
	$result->execute(array(":ia" => $apartado));
	$fila=$result->fetchObject();
	switch ($rub) {
		case 1:
			echo "<h2>Primera rúbrica TFG (versión estudiante)</h2>";
			break;
		case 2:
			echo "<h2>Segona rúbrica TFG (versión estudiante)</h2>";
			break;
		case 3:
			echo "<h2>Tercera rúbrica TFG (versión estudiante)</h2>";
			break;
		default:
			echo "<h2>Rúbrica TFG (versión estudiante)</h2>";
			break;
	}
	echo "<div class='subtitle'><h3>".$fila->titulo." (".$fila->porcentage."%)</h3></div>";
	$dbTabla='Posee'.$rub;	
	$dbTabla2='SUBAPARTADOS'.$rub; 
	$dbTabla3='Pert'.$rub;
	$consulta = "SELECT $dbTabla.idSub, nombre, notaSubapartado FROM $dbTabla INNER JOIN $dbTabla2 ON $dbTabla2.idSub=$dbTabla.idSub AND idApartado=:is INNER JOIN $dbTabla3 ON $dbTabla3.idSub=$dbTabla.idSub"; 
	//SELECT Posee1.idSub, nombre, notaSubapartado FROM Posee1 INNER JOIN SUBAPARTADOS1 ON SUBAPARTADOS1.idSub=Posee1.idSub AND Posee1.idApartado=1 INNER JOIN Pert1 ON Pert1.idSub=Posee1.idSub
	$result = $db->prepare($consulta);
	$result->execute(array(":is" => $apartado));
	if (!$result) {
		//fallo
		echo "Error";
	} else {
		echo "<form method='POST' name='form' id='form' >";
		$is=0;
		foreach ($result as $fila) {
			echo "<p>".$fila["nombre"]."</p>";
			echo "<script>mostrar($is,$rub,$apartado);</script>";
			echo "<div id='guia$is'></div>";
			echo "<p>Teniendo en cuenta los criterios anteriores, califica la pregunta:</p>";
			//action='guardar_apartado.php?rub=".$rub."&apartado=".$apartado."
			for ($i = 0; $i <= 10; $i++) {
				if ($i == $fila["notaSubapartado"]) {
					print "<input type='radio' name='".$fila["idSub"]."' value='$i' checked disabled> $i";
				}else{
					print "<input type='radio' name='$fila[0]' value='$i' disabled> $i";
				}
			    
			}
$is++;
			
		}
		echo "<div class='buttons'>";
		$atras="../php/cambiar_apartado.php?rub=$rub&apartado=$apartado&accion=atras";
		if ($apartado>1) {
			echo "<input type='button' onclick=\"pag('$atras')\" value='Atras'>";
		}
		$alante="../php/cambiar_apartado.php?rub=$rub&apartado=$apartado&accion=alante";
		if ($apartado<$total) {
			echo "<input type='button' onclick=\"pag('$alante')\" value='Siguiente'>";
		}
		echo "</div>";
		echo "</form>";
	}
?>
</body>
</html>
