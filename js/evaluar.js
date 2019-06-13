function pag(num){ 
	$('form').attr('action',num); 
	$('form').submit(); 
} 
function mostrar(num,rub,apartat){
	$("#guia").empty();
	  $.getJSON("../resources/json/rubrica"+rub+"/apartat"+apartat+".json",
			function(data){
			console.log(data);
				for(var i = 0; i < data.valoracions[num].length; i++){
					console.log(data.valoracions[0][i]["text"] + "Hola");
					$("#guia"+num).append("<p>"+data.valoracions[num][i]["text"]+"</p>");	
			  	}
		})
}
