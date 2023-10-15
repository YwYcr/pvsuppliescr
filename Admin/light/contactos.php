<div class="block-header">
            <div class="row clearfix">
                <div class="col-md-6 col-sm-12">
                    <h1>Control de Contactos</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php"><img src="bedicon.svg" alt="Bed Icon" style="height: 1rem;"></a></li>
                        <li class="breadcrumb-item active" aria-current="page">Contactos</li>
                           </ol>
                    </nav>
                </div>            
                <div class="col-md-6 col-sm-12 text-right hidden-xs" data-bs-toggle="modal" data-bs-target="#createContacto">
                    <a href="javascript:void(0);" class="btn btn-sm btn-primary" title="" ><i class="icon-user-follow"></i><span>  Crear Contacto</span></a>
                </div>
            </div>
        </div>

        <div class="container-fluid">
            
            <div class="row clearfix">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="header">
                            <h2>Información de Contactos 
                                <!-- <small>Basic example without any additional modification classes</small> -->
                            </h2>
                            <ul class="header-dropdown dropdown">
                                
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
                            <?php
                            include '../../bd_conn.php';

                            $consulta = "SELECT * FROM CONTACT";
                            $result = $con->query($consulta);


                            if ($result->num_rows>0){
                                echo "<table class='table table-hover js-basic-example dataTable table-custom spacing5>'";
                                echo "<tr><th>Num de Contacto</th><th>Nombre</th><th>Email</th><th>Asunto</th><th>Mensaje</th><th>Acciones</th></tr>";

                                while ($row = $result->fetch_assoc()){
                                    echo "<tr>";
                                    echo "<td>" . $row['IDCONTACT'] . "</td>";
                                    $contactID= $row['IDCONTACT'];
                                    echo "<td>" . $row['NAME'] . "</td>";
                                    echo "<td>" . $row['EMAIL'] . "</td>";
                                    echo "<td>" . $row['SUBJECT'] . "</td>";
                                    echo "<td>" . $row['MESSAGE'] . "</td>";                              

                                    echo "<td>

                                    <button type='button' class='btn btn-info btn-infoContacto mb-2' data-bs-toggle='modal' data-bs-target='#infoContacto' data-bs-id='$contactID'> 
                                    <i class='fa fa-info-circle'></i>
                                    <span>Ver</span></button>
                                    
                                    <button type='button' class='btn btn-editar btn-editarContacto btn-warning mb-2' data-bs-toggle='modal' data-bs-id='$contactID' data-bs-target='#editContacto' >
                                    <i class='fa fa-pencil'></i>
                                    <span>Editar</span></button>
                                  
                                    <button type='button' class='btn btn-borrar btn-borrarContacto btn-danger mb-2 js-sweetalert' data-type='confirm' data-bs-id='$contactID'>
                                    <i class='fa fa-trash-o'></i> 
                                    <span>Eliminar</span></button>
                             
                                    </td>";

                                }
                                echo "</table>";
                            }else {
                                echo "No hay contactos";
                            }                            
                            include '../../bd_disconn.php'
                            ?>
                         </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
