

var respuestaCorrectaDelInput = 'frutos';

function mostrarContinuar() {
	document.getElementById('continuar').style.display = "block";
}

function ocultarContinuar() {
	document.getElementById('continuar').style.display = "none";
}


function sonido() {
	var audio = document.getElementById("audio");
	audio.pause();
	audio.currentTime = 0;
	audio.play();
}

function calificarRespuesta() {
	var respuesta = document.getElementById('respuesta').value;
	respuesta = respuesta.toLowerCase()
	if (respuesta == 'frutos' || respuesta == 'fruto' || respuesta == 'fruta' || respuesta == 'frutas' || respuesta == 'tomate' || respuesta == 'tomates') {
		alert('¡Muy bien! La respuesta es correcta');
		mostrarContinuar()
	} else {
		alert('¡Incorrecto! Podrás hacerlo la próxima vez');
	}
}