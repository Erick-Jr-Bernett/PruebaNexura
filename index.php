<?php 
    include 'Class/Access.php';
    include 'Class/Employees.php';
    include 'Class/Areas.php';
    include 'Class/Roles.php';
    include 'Template/header.php';

    if (isset($_REQUEST["guardar"])){
        include 'register.php';
    } 
    
    if (isset($_REQUEST["eliminar"])){
        include 'remove.php';
    } 
    
    if (isset($_REQUEST["editar"])){
        include 'update.php';
    }


    include 'Template/Table.php';

    

    include 'Template/add.php';    

    //include 'Template/delete.php';

    include 'Template/footer.php';
?>