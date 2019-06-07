<?PHP
	session_start();
	$rub = $_POST["select_rub"];
	require_once("conexion_pdo.php");
	$db = new Conexion();
	$nombre=explode("@", $_SESSION["nombre"]);
	$_SESSION["nombre"]=$nombre[0];
	$extension=explode(".",$_FILES['file_input']['name']);
	$extension=$extension[count($extension)-1];
	$_FILES["file_input"]["name"]=$rub . $_SESSION["id"] . $_SESSION["nombre"] . "." . $extension;

	if ($_FILES['file_input']['type'] != 'application/pdf') {
		print "<p>Error 1</p>\n";
	} else {
		if ($_FILES["file_input"]["error"] > 0) {
			print "<p>Error 2</p>\n";
		} else {
			if (move_uploaded_file($_FILES["file_input"]["tmp_name"],"../rubricas_pdf/" . $_FILES["file_input"]["name"])) {
				$dbTabla='Tiene'; 
				$consulta = "SELECT idTFG FROM $dbTabla WHERE idAlum=:iu"; 
				$result = $db->prepare($consulta);
				$result->execute(array(":iu" => $_SESSION["id"]));
				if (!$result) {
					//Fallo
					print "<p>Error en la consulta. 1</p>\n";
				}else{
					$fila=$result->fetchObject();
					$dbTabla='RUBRICA'.$rub; 
					$consulta="SELECT COUNT(idTFG) FROM $dbTabla WHERE idTFG=:it";
					$result2 = $db->prepare($consulta);
					$result2->execute(array(":it" => $fila->idTFG));
					if (!$result2) {
						//Fallo
						print "<p>Error en la consulta. 2</p>\n";
					} else {
						$total=$result2->fetchColumn();
						if ($total == 0) {
							$consulta="INSERT INTO $dbTabla VALUES (:it,:nom,:nota)";
							$result3= $db->prepare($consulta);
							if ($result3->execute(array(":it" =>$fila->idTFG, ":nom" => $_FILES["file_input"]["name"], ":nota" => "null"))) {
								//Insertado
								header("location:../html/estudiante.php");
							} else {
								//Fallo insert
								print "<p>Error en la consulta. 3</p>\n";
							}
						} else {
							$consulta="UPDATE $dbTabla SET documento=:nom WHERE idTFG=:it";
							$result3= $db->prepare($consulta);
							if ($result3->execute(array(":it" =>$fila->idTFG, ":nom" => $_FILES["file_input"]["name"]))) {
								//Actualizado
								header("location:../html/estudiante.php");
							} else {
								//Fallo actualizacion
								print "<p>Error en la consulta. 4</p>\n";
							}
						}
					}
				}
				
			} else {
				//Fallo al mover el fichero
				print "<p>Fallo al mover el fichero</p>\n";
			}
		}
	}
?>