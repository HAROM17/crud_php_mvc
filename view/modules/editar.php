<?php
session_start();
if (!isset($_SESSION["validar"]) || !$_SESSION["validar"]) {
    header("location:index.php?action=ingresar");
    exit();
}
?>

<h1>EDITAR USUARIO</h1>
<form method="post">
    <?php
    $editarUsuario = new Plantilla();
    // Mostrar el formulario de edición del usuario
    $editarUsuario->editarUsuarioController();

    // Manejar la eliminación de usuario
    if (isset($_GET["action"]) && $_GET["action"] == "eliminar") {
        $editarUsuario->eliminarUsuarioController();
    }

    // Manejar la actualización de usuario
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $editarUsuario->actualizarUsuarioController();
    }
    ?>
</form>
