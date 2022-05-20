<?php 
    $roles = new Roles();
    $areas = new Areas();
    $listAreas = $areas->list();
    $listRoles = $roles->list();
?> 
<div class="modal fade " id="add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Registrar empleado</h5>
            </div>    
            <form class="row g-3 m-4" method="POST" action="./index.php">
                <div class="col-md-12">
                    <label  class="form-label">Nombres</label>
                    <input type="text" class="form-control"  name="nombres" required>
                </div>
                <div class="col-md-12">
                    <label  class="form-label">Correo electrónico</label>
                    <input type="text" class="form-control"  name="email" required>
                </div>
                <div class="col-12">
                    <label for="inputApellidos" class="form-label">Sexo</label>
                    <fieldset class="form-group">
                        <div class="row">
                        <div class="col-sm-10">
                            <div class="form-check">
                            <input class="form-check-input" type="radio" name="sexos"  value="M">
                            <label class="form-check-label" >
                                Masculino
                            </label>
                            </div>
                            <div class="form-check">
                            <input class="form-check-input" type="radio" name="sexos"  value="F">
                            <label class="form-check-label" >
                                Femenino
                            </label>
                            </div>
                        </div>
                        </div>
                    </fieldset>
                </div>
                <div class="col-12">
                    <label for="inputNac" class="form-label">Área</label>
                    <select class="form-control" name="area" required>
                        <option>Seleccione ---</option>
                        <?php 
                            while ($row=mysqli_fetch_array($listAreas)){
                                echo '<option value="'.$row['id'].'">'.$row['nombre'].'</option>';
                            }
                        ?>
                    </select>
                </div>
                <div class="col-md-12">
                    <label for="inputDireccion" class="form-label">Descripción</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="description"></textarea>
                </div>
                <div class="col-md-12">
                <input type="checkbox" class="form-check-input" name="boletin[]" value="1">
                <label class="form-check-label">Quiero recibir boletín</label>
                </div>
                <div class="col-md-12">
                    <label  class="form-label">Roles</label>
                    <div class="form-check">
                        <?php 
                            while ($raw=mysqli_fetch_array($listRoles)){
                                echo '<input class="form-check-input" type="checkbox" name="roles[]" value="'.$raw['id'].'" ><label class="form-check-label" for="exampleRadios2">'.$raw['nombre'].'</label></br>';
                            }
                        ?>
                    </div>
                </div>

    
            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancelar</button>
                <button type="submit" id="btnGuardar" class="btn btn-dark" name="guardar">Guardar</button>
            </div>
            </form>
        </div>
    </div>
</div>