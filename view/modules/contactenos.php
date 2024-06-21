<?php

session_start();
if(!$_SESSION["validar"]){

    header("location:index.php?action=ingresar");
    exit();
}
?>

<h1>Pagina de Contactenos</h1>