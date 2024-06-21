<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!--estilos css-->
    <link rel="stylesheet" href="./view/css/style.css">
</head>
<body>
    <!--Cabecera de la pagina (Logo)-->
    <header>
        <h1>LOGO EMPRESA</h1>
    </header>
    <?php 
    include "modules/navegacion.php" 
    ?>
    <!--Menu de la lista de la pagina-->
    <section>
        <?php
            $mvc = new Plantilla();
            $mvc -> enlacesPaginasController();
        ?>
    </section>
</body>
</html>