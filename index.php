<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>CRUD </title>
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
</head>
<body>

<div class="container">
	<h1 class="page-header text-center">Productos</h1>
	<div class="row">
		<div class="col-sm-8 col-sm-offset-2">
			<a href="#addnew" class="btn btn-primary" data-toggle="modal">Nuevo Producto</a>
<?php 
	session_start();
	if(isset($_SESSION['message'])){
		?>
		<div class="alert alert-info text-center" style="margin-top:20px;">
			<?php echo $_SESSION['message']; ?>
		</div>
		<?php

		unset($_SESSION['message']);
	}
?>
<table class="table table-bordered table-striped" style="margin-top:20px;">
	<thead>
		<th>ID</th>
		<th>Nombres</th>
		<th>Descripcion</th>
		<th>Acciones</th>
		
	</thead>
	<tbody>
		<?php
			//incluimos el fichero de conexion
			include_once('dbconect.php');

			$database = new Connection();
			$db = $database->open();
			try{	
				$sql = 'SELECT * FROM producto';
				foreach ($db->query($sql) as $row) {
					?>
					<tr>
						<td><?php echo $row['id']; ?></td>
						<td><?php echo $row['nombre']; ?></td>
						<td><?php echo $row['descripcion']; ?></td>
						
						<td>
						<a href="#edit_<?php echo $row['id']; ?>" class="btn btn-success btn-sm" data-toggle="modal"> Editar</a>

							<a href="#delete_<?php echo $row['id']; ?>" class="btn btn-danger btn-sm" data-toggle="modal">Borrar</a>
						</td>
						<?php include('EditarModal.php'); ?>

						<?php include('BorrarModal.php'); ?>
					</tr>
					<?php 
				}
			}
			catch(PDOException $e){
				echo "Hubo un problema en la conexión: " . $e->getMessage();
			}

			//Cerrar la Conexion
			$database->close();

		?>
				</tbody>
			</table>
		</div>
	</div>
</div>
<?php include('AgregarModal.php'); ?>
<script src="js/jquery.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
</body>
</html>