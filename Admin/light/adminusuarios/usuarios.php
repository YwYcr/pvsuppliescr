<div class="block-header">
    <div class="row clearfix">
        <div class="col-md-6 col-sm-12">
            <h1>Control de Usuarios</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php"><img src="bedicon.svg" alt="Bed Icon"
                                style="height: 1rem;"></a></li>
                    <li class="breadcrumb-item active" aria-current="page">Usuarios</li>
                </ol>
            </nav>
        </div>
        <div class="col-md-6 col-sm-12 text-right hidden-xs" data-bs-toggle="modal" data-bs-target="#createUser">
            <a href="javascript:void(0);" class="btn btn-sm btn-primary" title=""><i class="icon-user-follow"></i><span>
            Agregar usuario</span></a>
        </div>
    </div>
</div>

<div class="container-fluid">

    <div class="row clearfix">
        <div class="col-lg-12">
            <div class="card">
                <div class="header">
                    <h2>Información de usuarios
                        <!-- <small>Basic example without any additional modification classes</small> -->
                    </h2>
                    <ul class="header-dropdown dropdown">
                        <!-- show 100 entries -->
                        <li><a href="javascript:void(0);" class="full-screen"><i class="icon-frame"></i></a></li>
                        <!-- <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="javascript:void(0);">Action</a></li>
                                        <li><a href="javascript:void(0);">Another Action</a></li>
                                        <li><a href="javascript:void(0);">Something else</a></li>
                                    </ul>
                                </li> -->
                    </ul>
                </div>
                <div class="body">
                    <div class="table-responsive">
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <input type="text" class="form-control" id="searchUserInput"
                                    placeholder="Buscar usuario">
                            </div>
                            <div class="col-md-6 text-right">
                                <button class="btn btn-primary" onclick="searchUser()">Buscar</button>
                            </div>
                        </div>
                        <?php
                        include '../adminTool/bd_conn.php';

                        $consulta = "SELECT * FROM USERS";
                        $result = $con->query($consulta);


                        if ($result->num_rows > 0) {
                            echo "<table id='userTable' class='table table-hover js-basic-example dataTable table-custom spacing5'>";
                            echo "<thead><tr>
                            <th>Num de Usuario</th>
                            <th>Nombre</th>
                            <th>Primer Apellido</th>
                            <th>Segundo Apellido</th>
                            <th>Email</th>
                            <th>Telefono</th> 
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
                                
                                echo "<td>

                                    <button type='button' class='btn btn-info btn-infoUsuarios  mb-2' data-bs-toggle='modal' data-bs-target='#infoUser' data-bs-id='$userId'> 
                                    <i class='fa fa-info-circle'></i>
                                    <span>Ver</span></button>
                                    
                                    <button type='button' class='btn btn-editar btn-editarUser btn-warning mb-2' data-bs-toggle='modal' data-bs-id='$userId' data-bs-target='#editUser' >
                                    <i class='fa fa-pencil'></i>
                                    <span>Editar</span></button>
                                  
                                    <button type='button' class='btn btn-borrar btn-borrarUser btn-danger mb-2 js-sweetalert' data-type='confirm' data-bs-id='$userId'>
                                    <i class='fa fa-trash-o'></i> 
                                    <span>Eliminar</span></button>
                             
                                    </td>";

                                echo "</tr>";
                            }

                            echo "</tbody>";
                            echo "<tfoot>
                    <tr>
                    <th>Num de Usuario</th>
                    <th>Nombre</th>
                    <th>Primer Apellido</th>
                    <th>Segundo Apellido</th>
                    <th>Email</th>
                    <th>Telefono</th> 
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
                </div>
            </div>
        </div>


    </div>