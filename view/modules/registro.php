<h1>REGISTRO DE USUARIO</h1>

<form method="post" onsubmit="return validarRegistro()">

    <label for="usuarioRegistro">Usuario</label>
    <input type="tex" placeholder="Máximo 6 caracteres" maxlength="6" name="usuarioRegistro"
     id="usuarioRegistro" required>

    <label for="passwordRegistro">Contraseña</label>
    <input type="password" placeholder="Minimo 6 caracteres, incluir número(s) y una Mayuscula"
     name="passwordRegistro" id="passwordRegistro" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}" required>

    <label for="emailRegistro">Email</label>
    <input type="tex" placeholder="Escriba su correo electrónico correctamente" 
     name="emailRegistro" id="emailRegistro" required>
    
    <p style="text-align: center;">
        <input type="checkbox" id="terminos"><a href="#">Acepta los términos y condiciones</a>
    </p>

    <input type="submit" value="Enviar">

</form>

<?php 

    $registro = new Plantilla();
    $registro -> registroUsuarioController();

    if(isset($_GET["action"])){

        if($_GET["action"] == "ok"){

            echo "Registro Exitoso";

        }

    }

?>