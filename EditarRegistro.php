<?php
	session_start();
	include_once('dbconect.php');

	if(isset($_POST['editar'])){
		$database = new Connection();
		$db = $database->open();
		try{
			$id = $_GET['id'];
			$nombre = $_POST['nombre'];
			$descripcion = $_POST['descripcion'];
			

			$sql = "UPDATE producto SET nombre = '$nombre', descripcion = '$descripcion' WHERE id = '$id'";
			//if-else statement in executing our query
			$_SESSION['message'] = ( $db->exec($sql) ) ? 'Producto actualizado correctamente' : 'No se pudo actualizar Producto';

		}
		catch(PDOException $e){
			$_SESSION['message'] = $e->getMessage();
		}

		//Cerrar la conexión
		$database->close();
	}
	else{
		$_SESSION['message'] = 'Complete el formulario de edición';
	}

	header('location: index.php');

?>