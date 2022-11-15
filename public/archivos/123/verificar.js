function alerta(){
    let val = document.getElementById("valor").value;
    if( val== 5){
        swal('FELICITACIONES', 'La respuesta es correcta', 'success');

    }else{
        swal('INCORRECTO', 'No es la respuesta correcta', 'error');
    }
}