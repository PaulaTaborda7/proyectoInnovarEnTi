// NO MOVER
var puntaje = 0.01;

// Agregar los id de los div de las opciones correctas en forma de arreglo
var opcionesCorrectas = ["imagen1", "imagen4", "imagen5"];

// NO MOVER
var valorBueno = 1/opcionesCorrectas.length;
var valorMalo = valorBueno/2;

// NO MOVER
var seleccionadas = Array();

// NO MOVER
var idSeleccion = null;

//CUANDO TERMINEN DE HACER LA ACTIVIDAD, COMENTAR LA SIGUIENTE LÍNEA PARA QUITAR EL BORDE DEL CONTENEDOR
// document.getElementsByClassName("contenedor")[0].style.border="solid black";

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

	// Si ya está seleccionada y la acaban de volver a pulsar, voy a quitar su selección
	if(seleccionadas.includes(id)){
		document.getElementById(id).style.border = "3px gray solid";
		let indice = seleccionadas.indexOf(id);
		seleccionadas.splice(indice, 1);
	}else{ // Si no está seleccionada, le pongo el borde y la guardo en el arreglo
		document.getElementById(id).style.border = "solid lightgreen";
		let child = document.getElementById(id).firstElementChild;
		child.style.border = "none";
		seleccionadas.push(id);
	}
	
	// console.log("Las opciones seleccionadas hasta el momento son", seleccionadas);
	if(seleccionadas.length > 0){
		mostrarContinuar();
		calificar();
	}else{
		ocultarContinuar();
	}
	
}

// NO MOVER
function calificar(){
	puntaje = 0.0;
	let correctas = 0;
	for(let i = 0; i < opcionesCorrectas.length; i++){
		if(seleccionadas.includes(opcionesCorrectas[i])){
			puntaje += valorBueno;
			correctas += 1;
		}
	}
	puntaje = puntaje - ((valorMalo) * (seleccionadas.length - correctas));
	if(puntaje < 0){
		puntaje = 0;
	}
}