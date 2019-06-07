function redirec(){
	var value=document.getElementById("select_list").value;
	if (value == "enviar") {
		//location.href='../html/ver_rubrica.php';
	} else if (value == "veure"){
		location.href='../html/veure_rubrica.php';
	}
}