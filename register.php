<?php
    $empleado = new Employees();
    if(isset($_POST)){
        $nombre = $_POST['nombres'];
        $email = $_POST['email'];
        $sexo =  $_POST['sexos'];
        $area =  $_POST['area'];
        $descripcion = $_POST['description'];
        
        if(!empty($_POST['boletin'])){
            $boletin = 1;
        }else{
            $boletin = 0;
        }

        $res = $empleado->create($nombre,$email,$sexo,$area,$boletin,$descripcion);                     
        if($res > 0){
        if(!empty($_POST['roles'])){
            foreach($_POST['roles'] as $seleccion){
                $resi = $empleado->RoleAssign($res,$seleccion);
            }
            if($resi){
                echo '<div class="alert alert-success" role="alert">¡Registro Exitoso!</div>';
            }else {
                echo '<div class="alert alert-danger" role="alert">Error al registrar roles!</div>';
            }
        }                        
        }else{
        echo '<div class="alert alert-danger" role="alert">Error al registrar!</div>';
        }
    }  
?>