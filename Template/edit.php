<?php 
    $roles = new Roles();
    $areas = new Areas();
    $empleado = new Employees();
    $listAreas = $areas->list();
    $listRoles = $roles->list();
?> 
<div class="modal fade " id="edit<?php echo $id;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Registrar empleado</h5>
            </div>    
            <form class="row g-3 m-4" method="POST" action="./index.php">
                <div class="col-md-12">
                    <label  class="form-label">Nombres</label>
                    <input type="text" class="form-control"  name="nombres" value="<?php echo $nombre;?>" required>
                </div>
                <div class="col-md-12">
                    <label  class="form-label">Correo electrónico</label>
                    <input type="text" class="form-control"  name="email" value="<?php echo $email;?>" required>
                </div>
                <div class="col-12">
                    <label for="inputApellidos" class="form-label">Sexo</label>
                    <fieldset class="form-group">
                        <div class="row">
                        <div class="col-sm-10">
                            <div class="form-check">
                            <input class="form-check-input" type="radio" name="sexos" <?php echo ($sexo=='Masculino')?'checked':'' ?>  value="M">
                            <label class="form-check-label" >
                                Masculino
                            </label>
                            </div>
                            <div class="form-check">
                            <input class="form-check-input" type="radio" name="sexos"  <?php echo ($sexo=='Femenino')?'checked':'' ?> value="F">
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
                                $selected = "";
                                if($row['nombre']==$area){
                                    $selected = "selected";
                                }
                                echo '<option '.$selected.' value="'.$row['id'].'">'.$row['nombre'].'</option>';
                            }
                        ?>
                    </select>
                </div>
                <div class="col-md-12">
                    <label for="inputDireccion" class="form-label">Descripción</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="description"><?php echo $descripcion ?></textarea>
                </div>
                <div class="col-md-12">
                <input type="checkbox" class="form-check-input" name="boletin[]"  <?php echo ($boletin=='Si')?'checked':'' ?>  value="1" >
                <label class="form-check-label">Quiero recibir boletín</label>
                </div>
                <div class="col-md-12">
                    <label  class="form-label">Roles</label>
                    <div class="form-check">
                        <?php                
                            $Select = array();
                            $cont = 0;
                            $listRolEmpleado = $empleado->GetRolesEmployees($id);
                            while($fil = mysqli_fetch_array($listRolEmpleado)){
                                $Select[$cont] = $fil['rol_id'];
                                $cont++;
                            }
                            
                            while ($raw=mysqli_fetch_array($listRoles)){                                
                                $isChecked = '';
                                //aca hago una comparacion entre el id del input que pintara y los id de los roles del usuario
                                (in_array(intval($raw['id']), $Select) ? $isChecked = "checked" : $isChecked = "");
                                echo '<input class="form-check-input" type="checkbox" name="roles[]" value="'.$raw['id'].'" '. $isChecked .'><label class="form-check-label" for="exampleRadios2">'.$raw['nombre'].'</label></br>';
                            }
                        ?>
                    </div>
                </div>

    
            <div class="modal-footer">
                <input type="hidden" name="id" value="<?php echo $id?>">
                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancelar</button>
                <button type="submit" id="btnUpdate" class="btn btn-dark" name="editar">Actualizar</button>
            </div>
            </form>
        </div>
    </div>
</div>