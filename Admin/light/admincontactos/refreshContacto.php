<?php
                        include '../adminTool/bd_conn.php';

                        $consulta = "SELECT * FROM CONTACT";
                        $result = $con->query($consulta);


                        if ($result->num_rows > 0) {
                            echo "<table id='contactTable' class='table table-hover js-basic-example dataTable table-custom spacing5'>";                      
                            echo "<tbody id='contactTableBody'>";

                            while ($row = $result->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td>" . $row['IDCONTACT'] . "</td>";
                                $contactID = $row['IDCONTACT'];
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

                                echo "</tr>";
                            }

                            echo "</tbody>";
                            echo "<tfoot>

            </tfoot>";
                            echo "</table>";
                        } else {
                            echo "No hay contactos";
                        }
                        include '../adminTool/bd_disconn.php'
                            ?>