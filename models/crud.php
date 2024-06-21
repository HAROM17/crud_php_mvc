<?php

require_once "conexion.php";

class Datos extends Conexion{

    #REGISTROS USUARIOS
    public static function registroUsuarioModel($datosModel, $tabla){

        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (usuario, password, email) 
        VALUES (:usuario,:password,:email)");
        #PREPARE() PREPARA UNA SENTENCIA SQL PARA SER EJECUTADA POR EL METODO PDOSTATEMENT::EXECUTE()

        $stmt -> bindParam(":usuario",$datosModel["usuario"],PDO::PARAM_STR);
        $stmt -> bindParam(":password",$datosModel["password"],PDO::PARAM_STR);
        $stmt -> bindParam(":email",$datosModel["email"],PDO::PARAM_STR);
        #binParam() VINCULA UNA VARIABLE DE PHP A UN PARAMETRO DE SUSTITUCION CON NOMBRE 
        #DE SIGNO DE INTERROGACION CORRESPONDIENTE DE LA SENTENCIA SQL QUE FUE USADA PARA PREPARAR LA SENTENCIA

        if($stmt->execute()){

            return "success";

        }else{

            return "error";

        }

        $stmt->close();

    }

    #INGRESO USUARIOS
    #-------------------------------------------------------------
    public static function ingresoUsuariosModel($datosModel,$tabla){

        $stmt = Conexion::conectar()->prepare("SELECT usuario,password FROM $tabla WHERE usuario = :usuario");
        $stmt->bindParam(":usuario",$datosModel["usuario"],PDO::PARAM_STR);
        $stmt -> execute();

        #FETCH() OBTIENE UNA FILA DE UN CONJUNTO DE RESULTADOS ASOCIADOS AL OBJETO PDOSTATMENT
        return $stmt->fetch();

        $stmt->close();

    }

    #VISTA USUARIOS
	#-------------------------------------

	public static function vistaUsuariosModel($tabla){

		$stmt = Conexion::conectar()->prepare("SELECT id, usuario, password, email FROM $tabla");	
		$stmt->execute();

		#fetchAll(): Obtiene todas las filas de un conjunto de resultados asociado al objeto PDOStatement. 
		return $stmt->fetchAll();

		$stmt->close();

	}

    #EDITAR USUARIO
	#-------------------------------------

	public static function editarUsuarioModel($datosModel, $tabla){

		$stmt = Conexion::conectar()->prepare("SELECT id, usuario, password, email FROM $tabla WHERE id = :id");
		$stmt->bindParam(":id", $datosModel, PDO::PARAM_INT);	
		$stmt->execute();

		return $stmt->fetch();

		$stmt->close();

	}

    #ACTUALIZAR USUARIO
	#-------------------------------------

	public static function actualizarUsuarioModel($datosModel, $tabla){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET usuario = :usuario,
         password = :password, email = :email WHERE id = :id");

		$stmt->bindParam(":usuario", $datosModel["usuario"], PDO::PARAM_STR);
		$stmt->bindParam(":password", $datosModel["password"], PDO::PARAM_STR);
		$stmt->bindParam(":email", $datosModel["email"], PDO::PARAM_STR);
		$stmt->bindParam(":id", $datosModel["id"], PDO::PARAM_INT);

		if($stmt->execute()){

			return "success";

		}

		else{

			return "error";

		}

		$stmt->close();

	}

    # ELIMINAR USUARIO
    public static function eliminarUsuarioModel($id, $tabla) {
        $stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id = :id");
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);

        if ($stmt->execute()) {
            return "success";
        } else {
            return "error";
        }

        $stmt->close();
    }

}