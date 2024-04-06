<?php
session_start();
include_once('dbconect.php');

if(isset($_POST['agregar'])){
    $database = new Connection();
    $db = $database->open();
    try{
        // hacer uso de una declaración preparada para prevenir la inyección de sql
        $stmt = $db->prepare("INSERT INTO producto (nombre, descripcion) VALUES (:nombre, :descripcion)");
        // instrucción if-else en la ejecución de nuestra declaración preparada
        $_SESSION['message'] = ( $stmt->execute(array(':nombre' => $_POST['nombre'] , ':descripcion' => $_POST['descripcion'])) ) ? 'Producto guardado correctamente' : 'Algo salió mal. No se puede agregar Producto';   
        
    }
    catch(PDOException $e){
        $_SESSION['message'] = $e->getMessage();
    }

    // cerrar la conexion
    $database->close();
}

else{
    $_SESSION['message'] = 'Rellene el formulario';
}

header('location: index.php');
    
?>
