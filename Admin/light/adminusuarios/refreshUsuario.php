<?php
                        include '../adminTool/bd_conn.php';

                        $consulta = "SELECT * FROM USERS";
                        $result = $con->query($consulta);


                        if ($result->num_rows > 0) {
                            echo "<table id='userTable' class='table table-hover js-basic-example dataTable table-custom spacing5'>";
                            // echo "<thead><tr>
                            // <th>Num de Usuario</th>
                            // <th>Nombre</th>
                            // <th>Primer Apellido</th>
                            // <th>Segundo Apellido</th>
                            // <th>Email</th>
                            // <th>Telefono</th> 
                            // <th>Acciones</th>
                            // </tr></thead>";
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

                </tfoot>";
                            echo "</table>";
                        } else {
                            echo "No hay usuarios";
                        }
                        include '../adminTool/bd_disconn.php'
                            ?>