<?PHP
	session_start();
	$rub = $_GET["rub"];
	$apartado = $_GET["apartado"];
	$accion = $_GET["accion"];
	
	if ($accion == "atras") {
		$apartado--;
		header("location:../html/evaluar_rubrica.php?rub=$rub&apartado=$apartado");
	} elseif ($accion == "alante") {
		$apartado++;
		header("location:../html/evaluar_rubrica.php?rub=$rub&apartado=$apartado");
	} else{
		header("location:../html/evaluar_rubrica.php?rub=$rub&apartado=$apartado");
	}
?>