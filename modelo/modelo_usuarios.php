<?php 


include_once "../configuracion/Conexion.php";


class modelo_usuarios {
	private $conexion;


	public function __construct() 
	{
		$this->conexion = $GLOBALS['conexion'];
	}


	public function listarUsuarios()
	{
		$query = "SELECT * FROM usuarios";
		$statement = $this->conexion->prepare($query);
		$statement->execute();
		$usuarios = $statement->fetchAll(PDO::FETCH_ASSOC); 
		return $usuarios;
	}

	public function mostrarUsuario($Id)
	{
		$query ="SELECT * FROM USUARIOS WHERE Id = :Id";
		$statement = $this->conexion->prepare($query);
		$statement->bindParam(':Id', $Id);
		$statement->execute();

		$usuario = $statement->fetch(PDO::FETCH_ASSOC);
		return $usuario;
	}



	public function crearUsuario($Nombre, $Edad, $Correo, $Nacionalidad)
	{
		$query = "INSERT INTO usuarios values (:Nombre, :Edad, :Correo, :Nacionalidad)";
		$statement =  $this->conexion->prepare($query);
		$statement->bindParam(':Nombre', $Nombre);
		$statement->bindParam(':Edad', $Edad);
		$statement->bindParam(':Correo', $Correo);
		$statement->bindParam(':Nacionalidad', $Nacionalidad);
		$resultados = $statement->execute();
		
		if ($resultados) {
			$fila_afectadas = $statement->rowCount();
			if ($fila_afectadas > 0) {
				return true;
			}else{
				return false;
			}
		}else{
			return false;
		}
	}



	public function actualizarUsuario($Id, $Nombre, $Edad, $Correo, $Nacionalidad)
	{
		$query = "UPDATE usuarios SET Nombre = :Nombre, Edad = :Edad, Correo = :Correo, Nacionalidad = :Nacionalidad WHERE Id = :Id";
		$statement = $this->conexion->prepare($query);
		$statement->bindParam(":Nombre", $Nombre);
		$statement->bindParam(":Edad", $Edad);
		$statement->bindParam(":Correo", $Correo);
		$statement->bindParam(":Nacionalidad", $Nacionalidad);
		$statement->bindParam(":Id", $Id);
		$resultados = $statement->execute();

		if ($resultados) {
			$fila_afectadas = $statement->rowCount();
			return $fila_afectadas > 0;
		}else{
			return false;
		}
	}



	public function eliminarUsuario($Id)
	{
		$query = "DELETE usuarios WHERE  Id = :Id";
		$statement = $this->conexion->prepare($query);
		$statement->bindParam(":Id", $Id);
		$statement->execute();
		$fila_afectadas = $statement->rowCount();
		return $fila_afectadas > 0;
	}
}

?>