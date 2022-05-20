<?php

class Roles{
    private $id;
    private $nombre;

    function list(){
        $sql = "SELECT * FROM roles";
        $con = new Access();
        $res = mysqli_query($con->Conect, $sql);
        return $res;
    }
}
?>