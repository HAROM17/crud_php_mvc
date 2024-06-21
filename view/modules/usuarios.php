<?php

session_start();
if(!$_SESSION["validar"]){

    header("location:index.php?action=ingresar");
    exit();
}
?>

<h1>BIENVENIDO SEÑOR USUARIO</h1>
<table border="1">
    <thead>
        <tr>
            <th>Usuario</th>
            <th>Contraseña</th>
            <th>Email</th>
            <th>Editar</th>
            <th>Eliminar</th>
        </tr>
    </thead>
    <tbody>
        <?php
            $vistausuario = new Plantilla();
            $vistausuario -> vistaUsuariosController();
        ?>
    </tbody>
</table>