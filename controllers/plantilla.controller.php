<?php

class Plantilla{

    public static function ControladorPlantilla(){

        require "view/template.php";

    }

    public static function enlacesPaginasController(){

        if(isset($_GET["action"])){
            $enlacesController = $_GET["action"];

        }else{
            $enlacesController = "index";
        }

        $respuesta = EnlacePaginas::enlacesPaginasModel($enlacesController);

        include $respuesta;
    }

    #REGISTRO DE USUARIOS
    #---------------------------------------------------------
    public static function registroUsuarioController(){
        if(isset($_POST["usuarioRegistro"])){

            $datosController = array("usuario"=>$_POST["usuarioRegistro"],
                                    "password"=>$_POST["passwordRegistro"],
                                    "email"=>$_POST["emailRegistro"]);
            
            $respuesta = Datos::registroUsuarioModel($datosController,"usuarios");

            if($respuesta == "success"){

                header("location:index.php?action=ok");

            }else{

                header("location:index.php");

            }

        }
    }

    #INGRESO USUARIO
    #-------------------------------------------------------------
    public static function ingresoUsuarioController(){

        if(isset($_POST["usuarioIngreso"])){

            $datosController = array("usuario"=>$_POST["usuarioIngreso"],
                                    "password"=>$_POST["passwordIngreso"]);

            $respuesta = Datos::ingresoUsuariosModel($datosController,"usuarios");

            if($respuesta["usuario"] == $_POST["usuarioIngreso"] && $respuesta["password"] ==
            $_POST["passwordIngreso"]){

                session_start();
                $_SESSION["validar"] = true;

                header("location:index.php?action=usuarios");

            }else{
                header("location:index.php?action=fallo");
            }

        }

    }

     #VISTA DE USUARIOS
	#------------------------------------

	public static function vistaUsuariosController(){

		$respuesta = Datos::vistaUsuariosModel("usuarios");

		#El constructor foreach proporciona un modo sencillo de iterar sobre arrays. foreach funciona sólo sobre arrays y objetos, y emitirá un error al intentar usarlo con una variable de un tipo diferente de datos o una variable no inicializada.

		foreach($respuesta as $row => $item){
		echo'<tr>
				<td>'.$item["usuario"].'</td>
				<td>'.$item["password"].'</td>
				<td>'.$item["email"].'</td>
				<td><a href="index.php?action=editar&id='.$item["id"].'"><button>Editar</button></a></td>
				<td><a href="index.php?action=usuarios&idBorrar='.$item["id"].'"><button>Borrar</button></a></td>
			</tr>';

		}

	}

    #EDITAR USUARIO
	#------------------------------------

	public static function editarUsuarioController(){

		$datosController = $_GET["id"];
		$respuesta = Datos::editarUsuarioModel($datosController, "usuarios");

		echo'<input type="hidden" value="'.$respuesta["id"].'" name="idEditar">
			 <input type="text" value="'.$respuesta["usuario"].'" name="usuarioEditar" required>
			 <input type="text" value="'.$respuesta["password"].'" name="passwordEditar" required>
			 <input type="email" value="'.$respuesta["email"].'" name="emailEditar" required>
			 <input type="submit" value="Actualizar">';
	}
    #ACTUALIZAR USUARIO
	#------------------------------------
	public static function actualizarUsuarioController(){

		if(isset($_POST["usuarioEditar"])){

			$datosController = array( "id"=>$_POST["idEditar"],
							          "usuario"=>$_POST["usuarioEditar"],
				                      "password"=>$_POST["passwordEditar"],
				                      "email"=>$_POST["emailEditar"]);
			$respuesta = Datos::actualizarUsuarioModel($datosController, "usuarios");

			if($respuesta == "success"){

				header("location:index.php?action=cambio");

			}

			else{

				echo "error";

			}

		}
	}

    // Método para eliminar usuario
    public static function eliminarUsuarioController() {
        if(isset($_GET["idBorrar"])) {
            $datosController = $_GET["idBorrar"];
            $respuesta = Datos::eliminarUsuarioModel($datosController, "usuarios");

            if($respuesta == "success") {
                header("location:index.php?action=usuarios");
            } else {
                echo "error al intentar eliminar usuario";
            }
        }
    }

}