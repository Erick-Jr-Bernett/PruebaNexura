
<div class="modal fade " id="delete<?php echo $id?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Desea Eliminar Contacto</h5>
        </div>


        <div class="m-4">
            <h1 class="text-center">¿Esta seguro de querer eliminar al usuario?</h1>
            <h4 class="text-center m-3"><?php echo $nombre ?></h4>
        </div>

        <div class="modal-footer">
            <button type="button" class="btn btn-light" data-disniss="modal">Cancelar</button>
            <form action="index.php" method="POST">
                <input type="hidden" name="id" value="<?php echo $id?>">
                <button type="submit" id="btnGuardar" class="btn btn-danger" name="eliminar">Eliminar</button>
            </form>
        </div>
    </div>
</div>
</div>

