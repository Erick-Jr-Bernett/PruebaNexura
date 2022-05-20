<?php 
$empleados = new Employees();
$listado=$empleados->list();
?>
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <button id="btnNuevo" type="button" class="btn btn-success my-3" data-bs-toggle="modal" data-bs-target="#add"><i class="fa-solid fa-user-plus"></i>Nuevo</button>
        </div>
    </div>
</div>

<div class="container py-4">
    <div class="row">
        <div class="col-lg-12">
            <div class="table-responsive">
                <table id="tablaPersonas" class="table table-striped table-condensed" style="width:100%">
                <thead>
                    <tr>
                        <th>Nombres</th>
                        <th>Email</th>
                        <th>Sexo</th>
			            <th>Area</th>
                        <th>Boletín</th>
                        <th>Modificar</th>
                        <th>Eliminar</th>
                    </tr>
                </thead>                 
                <tbody>    
                <?php 
                    while ($row=mysqli_fetch_object($listado)){
                        $id = $row->id;
                        $nombre = $row->nombre;
                        $email=$row->email;
                        $sexo=$row->Sexo;
                        $area=$row->Area;
                        $boletin=$row->Boletin;
                        $descripcion=$row->descripcion;
                ?>
                <tr>
                    <td><?php echo $nombre;?></td>
                    <td><?php echo $email;?></td>
                    <td><?php echo $sexo;?></td>
                    <td><?php echo $area;?></td>
                    <td><?php echo $boletin;?></td>
                    <td><button id="btnEdit" type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#edit<?php echo $id;?>"><i class="fa-solid fa-pen-to-square"></i></button></td>
                    <td><button id="btnEdit" type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#delete<?php echo $id;?>"><i class="fa-solid fa-trash-can"></i></button></td>
                </tr>	

                <?php include 'Template/edit.php'; ?>

                <?php include 'Template/delete.php'; ?>
                <?php                    
                    }
                ?>  
                </tbody>
                </table>
            </div>
        </div>
    </div>
</div>