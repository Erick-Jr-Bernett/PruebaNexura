<?php
    $empleado = new Employees();
    if(isset($_POST)){
        $nombre = $_POST['nombres'];
        $email = $_POST['email'];
        $sexo =  $_POST['sexos'];
        $area =  $_POST['area'];
        $descripcion = $_POST['description'];
        $id = $_POST['id'];
        
        if(!empty($_POST['boletin'])){
            $boletin = 1;
        }else{
            $boletin = 0;
        }

        $res = $empleado->update($id,$nombre,$email,$sexo,$area,$boletin,$descripcion);                     
        if($res){
        if(!empty($_POST['roles'])){
            $del = $empleado->DeleteRoleAssign($id);
            if($del){
                foreach($_POST['roles'] as $seleccion){
                    $resi = $empleado->RoleAssign($id,$seleccion);
                }
                if($resi){
                    echo '<div class="alert alert-success" role="alert">¡Actualizado Exitoso!</div>';
                }else {
                    echo '<div class="alert alert-danger" role="alert">Error al editar roles!</div>';
                }
            }else{
                echo '<div class="alert alert-danger" role="alert">Error al eliminar roles!</div>';
            }            
        }                        
        }else{
        echo '<div class="alert alert-danger" role="alert">Error al editar!</div>';
        }
    }  
?>