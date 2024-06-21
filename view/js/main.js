function validarRegistro(){

    var usuario = document.querySelector("#usuarioRegistro").value

    var password = document.querySelector("#passwordRegistro").value

    var email = document.querySelector("#emailRegistro").value

    var terminos = document.querySelector("#terminos").value

    /*VALIDAR USUARIO*/
    if(usuario != ""){

        var caracteres = usuario.length;
        var expresiones = /^[a-zA-Z0-9]*$/;

        if(caracteres > 6){
            document.querySelector("label[for='usuarioRegistro']").innerHTML += "<br>Escriba por favor al menos 6 caracteres.";
            return false;
        }

        if(!expresiones.test(usuario)){
            document.querySelector("label[for='usuarioRegistro']").innerHTML += "<br>Escriba por favor al menos 6 caracteres.";
            return false;
        }

    }

}