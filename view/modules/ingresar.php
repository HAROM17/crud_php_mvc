<h1>INGRESAR</h1>
<form method="post">

    <input type="text" placeholder="Usuario" name="usuarioIngreso" required>

    <input type="password" placeholder="Contraseña" name="passwordIngreso" required>

    <input type="submit" value="Enviar">

</form>

<?php 

    $ingreso = new Plantilla();
    $ingreso -> ingresoUsuarioController();

    if(isset($_GET["action"])){

        if($_GET["action"] == "fallo"){

            echo "Falló al ingresar al sistema";

        }

    }

?>