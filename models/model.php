<?php

class EnlacePaginas
{

    public static function enlacesPaginasModel($enlacesModel)
    {

        if ($enlacesModel == "ingresar" || $enlacesModel == "usuarios" ||
            $enlacesModel == "editar" || $enlacesModel == "salir") {
            $module = "view/modules/" . $enlacesModel . ".php";
        } else if ($enlacesModel == "index"){
            $module = "view/modules/registro.php";
        } else if ($enlacesModel == "ok"){
            $module = "view/modules/registro.php";
        } else if ($enlacesModel == "contactenos"){
            $module = "view/modules/contactenos.php";
        } else if ($enlacesModel == "fallo"){
            $module = "view/modules/ingresar.php";
        } else if ($enlacesModel == "cambio"){
            $module = "view/modules/usuarios.php";
        } else {
            $module = "view/modules/registro.php";
        }
        return $module;
    }
}
