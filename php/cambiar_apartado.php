<?PHP
	include "protege.php";
	require_once("../php/conexion_pdo.php");
	$db = new Conexion();

	$rub = $_GET["rub"];
	$apartado = $_GET["apartado"];
	$accion = $_GET["accion"];
	$nom = $_POST["nombreAlumno"];
	$dbTabla='Posee'.$rub;
	$consulta = "SELECT COUNT(*) FROM $dbTabla WHERE idApartado=:ia"; 
	$result = $db->prepare($consulta);
	$result->execute(array(":ia" => $apartado));
	$total = $result->fetchColumn();

	

	$dbTabla='Pert'.$rub;
	$dbTabla2='Tiene';
	$dbTabla3='ALUMNO';

	$consulta = "SELECT COUNT(*) FROM $dbTabla WHERE idTFG=(SELECT idTFG FROM $dbTabla2 INNER JOIN $dbTabla3 ON $dbTabla2.idAlum=$dbTabla3.idUsuario AND $dbTabla3.nombre=:it)"; 
	$result = $db->prepare($consulta);
	$result->execute(array(":it" =>$nom));
	$aux = $result->fetchColumn();

	if($aux == 0){
		for ($i = 1; $i <= $total; $i++) {
			$consulta="INSERT INTO $dbTabla VALUES ((SELECT idTFG FROM $dbTabla2 INNER JOIN $dbTabla3 ON $dbTabla2.idAlum=$dbTabla3.idUsuario AND $dbTabla3.nombre=:it),:isub,:nota)";
			$result2= $db->prepare($consulta);
			if($result2->execute(array(":it" =>$nom, ":isub" => $i, ":nota" => $_POST[$i]))){
				print_r("Guay".$i.$_POST[$i]);
			}
		}
	} else {
		for ($i = 1; $i <= $total; $i++) {
			if($_POST[$i] != null){
				$consulta="UPDATE $dbTabla SET notaSubapartado = :nota WHERE idTFG=(SELECT idTFG FROM $dbTabla2 INNER JOIN $dbTabla3 ON $dbTabla2.idAlum=$dbTabla3.idUsuario AND $dbTabla3.nombre=:it) AND idSub = :isub";
				$result2= $db->prepare($consulta);
				if($result2->execute(array(":it" =>$nom, ":isub" => $i, ":nota" => $_POST[$i]))){
					print_r("Bien".$i.$_POST[$i]);
				}
			}
		}
	}	
	
	if ($accion == "atras") {
		$apartado--;
		header("location:../html/evaluar_rubrica.php?rub=$rub&apartado=$apartado");
	} elseif ($accion == "alante") {
		$apartado++;
		header("location:../html/evaluar_rubrica.php?rub=$rub&apartado=$apartado");
	} else{
		header("location:../html/profesor.php");
	}
?>