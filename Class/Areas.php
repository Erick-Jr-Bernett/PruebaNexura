<?php

class Areas{
    private $id;
    private $nombre;

    function list(){
        $sql = "SELECT * FROM areas";
        $con = new Access();
        $res = mysqli_query($con->Conect, $sql);
        return $res;
    }
}
?>