<?php
                        include '../adminTool/bd_conn.php';

                        $consulta = "SELECT * FROM SUPPLIER";
                        $result = $con->query($consulta);


                        if ($result->num_rows > 0) {
                            echo "<table id='supplierTable' class='table table-hover js-basic-example dataTable table-custom spacing5'>";
                            echo "<tbody id='supplierTableBody'>";

                            while ($row = $result->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td>" . $row['IDSUPPLIER'] . "</td>";
                                $proveedorID = $row['IDSUPPLIER'];
                                echo "<td>" . $row['NAME'] . "</td>";
                                echo "<td>" . $row['SOCIALID'] . "</td>";
                                echo "<td>" . $row['PHONE'] . "</td>";
                                echo "<td>" . $row['POC'] . "</td>";
                                echo "<td>" . $row['EMAIL'] . "</td>";
                                echo "<td>" . $row['ADDRESS'] . "</td>";
                                echo "<td>

                                    <button type='button' class='btn btn-info btn-infoProveedor mb-2' data-bs-toggle='modal' data-bs-target='#infoProveedor' data-bs-id='$proveedorID'> 
                                    <i class='fa fa-info-circle'></i>
                                    <span>Ver</span></button>
                                    
                                    <button type='button' class='btn btn-editarProveedor btn-warning mb-2' data-bs-toggle='modal' data-bs-id='$proveedorID' data-bs-target='#editProveedor' >
                                    <i class='fa fa-pencil'></i>
                                    <span>Editar</span></button>
                                  
                                    <button type='button' class='btn btn-borrarProveedor btn-danger mb-2 js-sweetalert' data-type='confirm' data-bs-id='$proveedorID'>
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
                            echo "No hay proveedores";
                        }
                        include '../adminTool/bd_disconn.php'
                            ?>