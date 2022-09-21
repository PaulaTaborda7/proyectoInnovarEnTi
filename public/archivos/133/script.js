// NO MOVER
var puntaje = null;

// Poner en la segunda cadena (que está vacía) el número de la opción correcta
var idOpcionCorrecta = "imagen" + "2";

// NO MOVER
var idSeleccion = null;

//CUANDO TERMINEN DE HACER LA ACTIVIDAD, COMENTAR LA SIGUIENTE LÍNEA PARA QUITAR EL BORDE DEL CONTENEDOR
//document.getElementsByClassName("contenedor")[0].style.border="solid black";

// NO MOVER
var boton = document.getElementById('btn-continuar');
boton.addEventListener('click', procesarPuntaje, false);

// NO MOVER
function mostrarContinuar() {
	document.getElementById('continuar').style.display = "block";
}

// NO MOVER
function ocultarContinuar() {
	document.getElementById('continuar').style.display = "none";
}

// NO MOVER
function procesarPuntaje() {
	if (puntaje == null || isNaN(puntaje)) {
		var texto = 'Por favor completa la actividad';
		if (typeof parent.mostrarAlerta === "function") {
			parent.mostrarAlerta(texto);
		} else {
			alert(texto);
		}
		ocultarContinuar();
	} else {
		console.log("El puntaje es: ", puntaje);
		parent.enviarPuntaje(puntaje);
	}
}

// NO MOVER
function Error() {
	puntaje = 0;
}

// NO MOVER
function Correcto() {
	puntaje = 1;
}

// NO MOVER
function sonido() {
	var audio = document.getElementById("audio");
	audio.pause();
	audio.currentTime = 0;
	audio.play();
}

// NO MOVER
function seleccionar(id){
	id = "imagen"+id;
	// console.log("El id del seleccionado es:", id);
	
	let opciones = document.getElementsByClassName("opciones");
	// console.log(opciones);

	for(let i = 0; i < opciones.length; i++){
		let idOpcionActual = "imagen"+(i+1);
		document.getElementById(idOpcionActual).style.border = "none"
	}

	document.getElementById(id).style.border = "solid thick lightgreen";

	idSeleccion = id;
	mostrarContinuar();
	calificar();
}

// NO MOVER
function calificar(){
	if (idSeleccion == idOpcionCorrecta){
		Correcto();
	}else{
		Error();
	}
}