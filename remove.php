<?php
    $empleado = new Employees();
    if(isset($_POST)){
        $id = $_POST['id'];
        
        $res = $empleado->delete($id);                     
        if($res){
            echo '<div class="alert alert-success" role="alert">¡Registro Eliminado!</div>';
        }else {
            echo '<div class="alert alert-danger" role="alert">Error al eliminar!</div>';
        }
    }  
?>