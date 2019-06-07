<?php
	require_once("../php/conexion_pdo.php");
	$db = new Conexion();
	$array= array("diseny" => array(),"multi" => array(),"jocs" => array());
	$dbTabla='ALUMNO'; 
	$dbTabla2='Tiene';
	$dbTabla3='TFG';
	$consulta="SELECT nombre,apellido,$dbTabla3.grado FROM $dbTabla INNER JOIN $dbTabla2 ON $dbTabla2.idAlum=$dbTabla.idUsuario INNER JOIN $dbTabla3 ON $dbTabla3.idTFG=$dbTabla2.idTFG";
	$result = $db->prepare($consulta);
	$result->execute();
	foreach ($result as $fila) {
		switch ($fila[grado]) {
		    case "Grau en Diseño Animació i Art Digital":
		        array_push($array["diseny"],$fila[nombre] . " " . $fila[apellido]);
		        break;
		    case "Grau en Multimèdia":
		        array_push($array["multi"],$fila[nombre] . " " . $fila[apellido]);
		        break;
		    case "Grau en Disseny i Desenvolupament de Videojocs":
		        array_push($array["jocs"],$fila[nombre] . " " . $fila[apellido]);
		        break;
		    default:
		    	//no hay nombre grado
		    	break;
		}
	}
	$diseny=implode(",",$array["diseny"]);
	$multi=implode(",",$array["multi"]);
	$jocs=implode(",",$array["jocs"]);
?>
//Comentario prueba
<script type="text/javascript">
var diseny =[];
var multi=[];
var jocs=[];
<?php foreach($array['diseny'] as $fila){ echo 'diseny.push(\''.$fila.'\');';}?>
<?php foreach($array['multi'] as $fila){ echo 'multi.push(\''.$fila.'\');';}?> 
<?php foreach($array['jocs'] as $fila){ echo 'jocs.push(\''.$fila.'\');';}?>   

function selectGrau(){
	var fillEstudiant = function(){
		var selected = $('#select_grau').val(); 
		$('#select_estudiant').empty();
		switch(selected) {
		  case "diseny":
		    diseny.forEach(function(element,index){
				$('#select_estudiant').append('<option value="'+element+'">'+element+'</option>');
			});
		    break;
		  case "multi":
		    multi.forEach(function(element,index){
				$('#select_estudiant').append('<option value="'+element+'">'+element+'</option>');
			});
		    break;
		  case "jocs":
		    jocs.forEach(function(element,index){
				$('#select_estudiant').append('<option value="'+element+'">'+element+'</option>');
			});
		} 
	}
	fillEstudiant();
	selectEst();
};

function selectEst(){
	var fillRub = function(){
		//var selected = $('#select_estudiant').val();
		$('#select_rubrica').empty();
		$('#select_rubrica').append('<option value="1">Rúbrica 1</option>');
		$('#select_rubrica').append('<option value="2">Rúbrica 2</option>');
		$('#select_rubrica').append('<option value="3">Rúbrica 3</option>');
		/*options[selected].forEach(function(element,index){
			$('#select_estudiant').append('<option value="'+element+'">'+element+'</option>');
		});*/
	}
	fillRub();
};
</script>