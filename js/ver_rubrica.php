<?php
require_once("../php/conexion_pdo.php");
$db = new Conexion();
//$_SESSION["nombre"];
$contador=0;
$dbTabla='RUBRICA1';
$dbTabla2='Tiene';
//SELECT COUNT(documento) FROM RUBRICA1 INNER JOIN Tiene ON RUBRICA1.idTFG=Tiene.idTFG AND Tiene.idAlum=1
$consulta = "SELECT COUNT(documento) from $dbTabla INNER JOIN $dbTabla2 ON  $dbTabla.idTFG=$dbTabla2.idTFG AND $dbTabla2.idAlum=:iu"; 
$result = $db->prepare($consulta);
$result->execute(array(":iu" => $_SESSION["id"]));
$total = $result->fetchColumn();
if($total == 1){
    $dbTabla='RUBRICA2';
    $consulta = "SELECT COUNT(documento) from $dbTabla INNER JOIN $dbTabla2 ON  $dbTabla.idTFG=$dbTabla2.idTFG AND $dbTabla2.idAlum=:iu"; 
    $result = $db->prepare($consulta);
    $result->execute(array(":iu" => $_SESSION["id"]));
    $total = $result->fetchColumn();
    if($total == 1){
        $dbTabla='RUBRICA3';
        $consulta = "SELECT COUNT(documento) from $dbTabla INNER JOIN $dbTabla2 ON  $dbTabla.idTFG=$dbTabla2.idTFG AND $dbTabla2.idAlum=:iu"; 
        $result = $db->prepare($consulta);
        $result->execute(array(":iu" => $_SESSION["id"]));
        $total = $result->fetchColumn();
        if($total == 1){
            $contador=3;
        }else{
            $contador=2;
        }
    }else{
        $contador=1;
    }
}
?>
<script type="text/javascript">
function inici(){
	
		var valor = <?php echo $contador; ?>;
		$('#select_rubrica').empty();
		switch(valor){
			case 3:
				$('#select_rubrica').append('<option value="1">Rúbrica 1</option>');
				$('#select_rubrica').append('<option value="2">Rúbrica 2</option>');
				$('#select_rubrica').append('<option value="3">Rúbrica 3</option>');
				break;
			case 2:
				$('#select_rubrica').append('<option value="2">Rúbrica 2</option>');
				$('#select_rubrica').append('<option value="3">Rúbrica 3</option>');
				break;
			case 1:
				$('#select_rubrica').append('<option value="1">Rúbrica 1</option>');
				break;
			default:
				$('#select_rubrica').append('<option value="error">No hay rúbricas que ver.</option>');
				break;
		}
		if(valor != 0){
            document.getElementById("submit").disabled = false;
        }
};
</script>