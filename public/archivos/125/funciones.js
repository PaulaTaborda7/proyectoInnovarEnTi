function verificarValor(){

    let valorCorrecto = 4;

    let valorObtenido=document.getElementById("inputNumero").value;

    if(valorObtenido==""){
        alert("El campo esta vacio");
    }else{
        if(valorObtenido < 0){
            alert("El valor es negativo");
        }else{
            if(valorObtenido == valorCorrecto){
                alert("El valor es correcto");
            }
            else{
                alert("El valor es incorrecto");
            }
        }
    }
}