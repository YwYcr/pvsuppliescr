<div class="table-responsive"> 
    <?php
    include '../adminTool/bd_conn.php';

    $consulta = "CALL GetAllUsers();";
    $result = $con->query($consulta);


    if ($result->num_rows > 0) {
        echo "<table id='userTable' class='table table-hover js-basic-example dataTable table-custom spacing5'>";
        echo "<thead><tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Primer Apellido</th>
            <th>Segundo Apellido</th>
            <th>Email</th>
            <th>Teléfono</th> 
            <th>Rol</th> 
            <th>Estado</th> 
            <th>Acciones</th>
            </tr></thead>";
        echo "<tbody id='userTableBody'>";

        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['IDUSER'] . "</td>";
            $userId = $row['IDUSER'];
            echo "<td>" . $row['NAME'] . "</td>";
            echo "<td>" . $row['FLASTNAME'] . "</td>";
            echo "<td>" . $row['SLASTNAME'] . "</td>";
            echo "<td>" . $row['EMAIL'] . "</td>";
            echo "<td>" . $row['PHONE'] . "</td>";
            echo "<td>" . $row['ROL'] . "</td>";
            echo "<td>" . ($row['activo'] == 1 ? 'Activo' : 'Inactivo') . "</td>";


            echo "<td>
                <button type='button' class='btn btn-info btn-infoUsuarios  mb-2' data-bs-toggle='modal' data-bs-target='#infoUser' data-bs-id='$userId'> 
                <i class='fa fa-info-circle'></i>
                <span>Ver</span></button>
                <button type='button' class='btn btn-editar btn-editarUser btn-warning mb-2' data-bs-toggle='modal' data-bs-id='$userId' data-bs-target='#editUser' >
                <i class='fa fa-pencil'></i>
                <span>Editar</span></button>";

            if ($row['activo'] == 1) {
                echo " <button type='button' class='btn btn-borrar btn-borrarUser btn-danger mb-2 js-sweetalert' data-type='confirm' data-bs-id='$userId'>
                <i class='fa fa-times'></i> 
                <span>Desactivar</span></button>";
            } else {
                echo " <button type='button' class='btn btn-Active btn-ActiveUser btn-success mb-2 js-sweetalert' data-type='confirm' data-bs-id='$userId'>
                <i class='fa fa-check'></i> 
                <span>Activar</span></button>";
            }
     
            echo " <button type='button' class='btn btn-pass btn-upPassUser btn-dark mb-2' data-bs-toggle='modal' data-bs-id='$userId' data-bs-target='#editPass'>
                <i class='fa fa-key'></i> 
                <span>Cambiar Contraseña</span></button>
                </td>";

            echo "</tr>";
        }

        echo "</tbody>";
        echo "<tfoot>
                <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Primer Apellido</th>
                <th>Segundo Apellido</th>
                <th>Email</th>
                <th>Teléfono</th> 
                <th>Rol</th> 
                <th>Estado</th> 
                <th>Acciones</th>
                </tr>
            </tfoot>";
        echo "</table>";
    } else {
        echo "No hay usuarios";
    }
    include '../adminTool/bd_disconn.php'
    ?>

</div>

<script src="../assets/js/pages/tables/jquery-datatable.js"></script>