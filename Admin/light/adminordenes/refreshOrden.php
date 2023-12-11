<?php
                                        include '../adminTool/bd_conn.php';

                                        $consulta = "SELECT * FROM ORDERS";
                                        $result = $con->query($consulta);


                                        if ($result->num_rows > 0) {
                                            echo "<table id='orderTable' class='table table-hover js-basic-example dataTable table-custom spacing5'>";
                                            echo "<tbody id='orderTableBody'>";

                                            while ($row = $result->fetch_assoc()) {
                                                echo "<tr>";
                                                echo "<td>" . $row['IDORDER'] . "</td>";
                                                $orderID = $row['IDORDER'];
                                                echo "<td>" . $row['TOTAL'] . "</td>";
                                                echo "<td>" . $row['CREATEDATE'] . "</td>";
                                                echo "<td>" . $row['STATUS'] . "</td>";
                                                echo "<td>" . $row['ADDRESS'] . "</td>";
                                                echo "<td>" . $row['IDUSER'] . "</td>";
                                                echo "<td>" . $row['ORDERDETAIL'] . "</td>";
                                                echo "<td>

                                                <button type='button' class='btn btn-info btn-infoOrden mb-2' data-bs-toggle='modal' data-bs-target='#infoOrden' data-bs-id='$orderID'> 
                                                <i class='fa fa-info-circle'></i>
                                                <span>Ver</span></button>
                                                
                                                <button type='button' class='btn btn-editarOrden btn-warning mb-2' data-bs-toggle='modal'  data-bs-target='#editOrden' data-bs-id='$orderID' >
                                                <i class='fa fa-pencil'></i>
                                                <span>Editar</span></button>
                                            
                                                <button type='button' class='btn btn-borrarOrden btn-danger mb-2 js-sweetalert' data-type='confirm' data-bs-id='$orderID'>
                                                <i class='fa fa-trash-o'></i> 
                                                <span>Eliminar</span></button>
                                        
                                                </td>";
                                                echo "</tr>";
                                            }
                                            echo "</tbody>";

                                            echo "</table>";
                                        } else {
                                            echo "No hay Ordenes";
                                        }
                                        include '../adminTool/bd_disconn.php'
                                    ?>