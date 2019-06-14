<?php
//<iframe id='iframe' src='evaluar_rubrica.php?rub=".$rub."'></iframe>"
	session_start();
?>
<html>
<head>
	<title>Rubrica <?php echo $rub;?></title>
	<meta charset="utf-8">
	<script type="text/javascript" src="../js/evaluar.js"></script>
	<link rel="stylesheet" href="../css/evaluar_rubrica.css">
	<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
</head>
<body>
<?php
	$rub = $_GET["rub"];
	$apartado=$_GET["apartado"];
	$perfil=$_GET["perfil"];
	if($perfil != "profesor"){
		$perfil="estudiante";
	}
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
			echo "<h2 id='title'>Primera rúbrica TFG (versión $perfil)</h2>";
			break;
		case 2:
			echo "<h2 id='title'>Segona rúbrica TFG (versión $perfil)</h2>";
			break;
		case 3:
			echo "<h2 id='title'>Tercera rúbrica TFG (versión $perfil)</h2>";
			break;
		default:
			echo "<h2 id='title'>Rúbrica TFG (versión $perfil)</h2>";
			break;
	}
	echo "<div class='subtitle'><h2>".$fila->titulo." (".$fila->porcentage."%)</h2></div>";
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
			echo "<h3>".$fila["nombre"]."</h3>";
			echo "<script>mostrar($is,$rub,$apartado);</script>";
			echo "<div id='guia$is'></div>";
			echo "<h3>Teniendo en cuenta los criterios anteriores, califica la pregunta:</h3>";
			//action='guardar_apartado.php?rub=".$rub."&apartado=".$apartado."
			echo "<div class='answer' id='answer'>";
			for ($i = 0; $i <= 10; $i++) {
				if($perfil != "profesor"){
					if ($i == $fila["notaSubapartado"]) {
						print "<div id='colum' class='colum'><input type='radio' class='res' id='res' name='".$fila["idSub"]."' value='$i' checked disabled><p class='res-num' id='res-num'>$i</p></div>";
					}else{
						print "<div id='colum' class='colum'><input type='radio' class='res' id='res' name='$fila[0]' value='$i' disabled><p class='res-num' id='res-num'>$i</p></div>";
					}
				}else{
					print "<div id='colum' class='colum'><input type='radio' class='res' id='res' name='$fila[0]' value='$i'><p class='res-num' id='res-num'>$i</p></div>";
				}
			}
			echo "</div>";
		$is++;
			
		}
		echo "<div class='buttons' id='buttons'>";
		$atras="../php/cambiar_apartado.php?rub=$rub&apartado=$apartado&accion=atras";
		if ($apartado>1) {
			echo "<input type='button' class='btn-at' id='btn-at' onclick=\"pag('$atras')\" value='Atras'>";
		}
		$alante="../php/cambiar_apartado.php?rub=$rub&apartado=$apartado&accion=alante";
		if ($apartado<$total) {
			echo "<input type='button' class='btn-si' id='btn-si' onclick=\"pag('$alante')\" value='Siguiente'>";
		}
		$enviar="";
		if ($apartado==$total) {
			echo "<input type='button' class='btn-si' id='btn-si' onclick=\"pag('$enviar')\" value='Enviar'>";
		}
		echo "</div>";
		echo "</form>";
	}
?>
</body>
</html>
