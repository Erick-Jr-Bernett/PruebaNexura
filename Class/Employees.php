<?php
class Employees{

    private $nombres;
    private $email;
    private $sexo;
    private $area;
    private $boletin;
    private $descripcion;
  
        
    function list(){
        $sql = "SELECT 
                    e.id,
                    e.nombre,e.email,
                    case e.sexo
                        when 'M' then 'Masculino'
                        when 'F' then 'Femenino'
                    end as Sexo,
                    a.nombre Area,
                    case e.boletin
                        when 1 then 'Si'
                        when 0 then 'No'
                    end as Boletin,
                    e.descripcion
                FROM empleado e
                INNER JOIN areas a on a.id = e.area_id";
        $con = new Access();
        $res = mysqli_query($con->Conect, $sql);
        return $res;
    }

    function create($nombre,$email,$sexo,$area,$boletin,$descripcion){
        $sql = "INSERT INTO empleado(nombre,email,sexo,area_id,boletin,descripcion) VALUES ('$nombre','$email','$sexo','$area','$boletin','$descripcion') ";
        $conn = new Access();
        $res = mysqli_query($conn->Conect, $sql);
        if($res){
            return mysqli_insert_id($conn->Conect);
        }else{
            return 0;
        }
    }

    function RoleAssign($EmpleadoId, $RolId){
        $sql = "INSERT INTO empleado_rol(empleado_id,rol_id) VALUES ('$EmpleadoId','$RolId')";
        $cone = new Access();
        $res = mysqli_query($cone->Conect, $sql);
        if($res){
            return true;
        }else {
            return false;
        }
    }


    function DeleteRoleAssign($EmpleadoId){
        $sql = "DELETE empleado_rol FROM empleado_rol WHERE empleado_id = $EmpleadoId";
        $con = new Access();
        $res = mysqli_query($con->Conect, $sql);
        if($res){
            return true;
        }else {
            return false;
        }
    }


    function update($id,$nombre,$email,$sexo,$area,$boletin,$descripcion){
        $sql = "UPDATE empleado SET
         nombre = '$nombre',
         email = '$email',
         sexo = '$sexo',
         area_id = '$area',
         boletin = '$boletin',
         descripcion = '$descripcion'
         WHERE id = $id";
         $con = new Access();
         $res = mysqli_query($con->Conect, $sql);
         if($res){
            return true;
        }else{
            return false;
        }
    }

    function GetRolesEmployees($EmpleadoId){
        $sql = "SELECT * FROM empleado_rol e WHERE  e.empleado_id = $EmpleadoId";
        $con = new Access();
        $res = mysqli_query($con->Conect, $sql);
        return $res;
    }

    function delete($id){
        $sql = "DELETE e.*, er.* FROM empleado e
        INNER JOIN empleado_rol er ON er.empleado_id = e.id
        WHERE e.id = $id";
        $con = new Access();
        $res = mysqli_query($con->Conect, $sql);
        return $res;
    }

}
?>