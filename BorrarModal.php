
<!-- Delete -->
<div class="modal fade" id="delete_<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center><h4 class="modal-title" id="myModalLabel">Borrar Producto</h4></center>
            </div>
            <div class="modal-body">	
            	<p class="text-center">¿Esta seguro de Borrar el producto?</p>
				<h2 class="text-center"><?php echo $row['nombre'].' '.$row['descripcion']; ?></h2>
			</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"> Cancelar</button>
                <a href="BorrarRegistro.php?id=<?php echo $row['id']; ?>" class="btn btn-danger"> Si</a>
            </div>

        </div>
    </div>
</div>