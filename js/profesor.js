function redirec(){
	var value=document.getElementById("select_list").value;
	if (value == "iniciar") {
		location.href='../html/nova_rubrica.php';
	} else if (value == "continuar") {
		//location.href='../html/penjar_rubrica.php';
	} else if (value == "veure"){
		//location.href='../html/penjar_rubrica.php';
	}
}