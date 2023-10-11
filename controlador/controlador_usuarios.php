<?php 

include "../modelo/modelo_usuarios.php";

$usuarios = new modelo_usuarios();



switch ($_REQUEST['opcion']) {

	case 'listarUsuarios':

		$resultados = $usuarios->listarUsuarios();
		$datos = array();

		foreach ($resultados as  $dato) {
			$datos[] = array(

				"0"=> 
				'<a href="#" data-bs-toggle="tooltip" title="Actualizar usuario" onclick="mostrarUsuario('.$dato['Id'].')" ><i class="fa fa-edit fa-lg text-warning"></i></a>'
				. 
				' <a href="#" data-bs-toggle="tooltip" title="Eliminar usuario" onClick="eliminarUsuario('.$dato['Id'].')"><i class="fa fa-trash fa-lg text-danger"></i></a>',

				"1"=>$dato['Id'] . " - " . $dato['Nombre'],
				"2"=>$dato['Edad'],
				"3"=>$dato['Correo'],
				"4"=>$dato['Nacionalidad'],
			);
		}

		$results=array(
				 "sEcho"=>1,//info para datatables
				 "iTotalRecords"=>count($datos),//enviamos el total de registros al datatable
				 "iTotalDisplayRecords"=>count($datos),//enviamos el total de registros a visualizar
				 "aaData"=>$datos);

		echo json_encode($results);

	break;
	
	case 'mostrarUsuario':

		$Id = $_POST['Id'];
		$respuesta = $usuarios->mostrarUsuario($Id);
		echo json_encode($respuesta);

	break;


	case 'guardar_editarUsuario':

		$Id = isset($_POST['Id']) ?  $_POST['Id'] : null;
		$Nombre = isset($_POST['Nombre']) ? $_POST['Nombre'] : null;
		$Edad = isset($_POST['Edad']) ? $_POST['Edad'] : null;
		$Correo = isset($_POST['Correo']) ? $_POST['Correo'] : null;
		$Nacionalidad = isset($_POST['Nacionalidad']) ? $_POST['Nacionalidad'] : null;

		if (empty($Id)) {
			$respuesta = $usuarios->crearUsuario($Nombre, $Edad, $Correo, $Nacionalidad);
			echo $respuesta ? "si" : "no";
		}else{
			$respuesta = $usuarios->actualizarUsuario($Id, $Nombre, $Edad, $Correo, $Nacionalidad);
			echo $respuesta ? "si" : "no";
		}


	break;

	case 'eliminarUsuario':
			$Id = $_POST['Id'];
			$respuesta = $usuarios->eliminarUsuario($Id);
			echo $respuesta ? "si" : "no";
		break;


	default:
	break;
}



?>