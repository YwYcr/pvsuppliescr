<div class="imgbody">
    <div class="col-xl-5 col-lg-12">
        <div class="table-responsive">
            <?php
            include '../adminTool/bd_conn.php';

            $stmt = $con->prepare("CALL GetAllProducts()");
            $stmt->execute();
            $result = $stmt->get_result();


            if ($result->num_rows > 0) {
                echo "<table id='prodTable' class='table table-hover js-basic-example table-custom spacing5'>";
                echo "<thead><tr>
                    <th>Product ID</th>
                    <th>Nombre</th>
                    <th>Marca</th>
                    </tr></thead>";
                echo "<tbody id='prodTableBody'>";

                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row['IDPRODUCT'] . "</td>";
                    $productID = $row['IDPRODUCT'];
                    echo "<td>" . $row['NAME'] . "</td>";
                    echo "<td>" . $row['BRAND'] . "</td>";
                    echo "</tr>";
                }

                echo "</tbody>";
                echo "<tfoot>
                    <tr>
                    <th>Product ID</th>
                    <th>Nombre</th>
                    <th>Marca</th>
                    </tr>
                </tfoot>";
                echo "</table>";
            } else {
                echo "No hay productos";
            }
            $stmt->close();
            include '../adminTool/bd_disconn.php'
            ?>
        </div>
    </div>
    <div class="col-xl-7 col-lg-12">
    
        <div class="table-responsive">
            <table id='imageTable' class='table table-hover js-basic-example dataTable table-custom spacing5'>
                <thead><tr>
                    <th>Nombre</th>
                    <th>Image</th>
                    <th>Principal</th>
                    </tr></thead>
                <tbody id='imageTableBody'>
                    <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    </tr>
                </tbody>
                <tfoot>
                    <tr>
                    <th>Nombre</th>
                    <th>Image</th>
                    <th>Principal</th>
                    </tr>
                </tfoot>
                </table>
        </div>
    </div>
</div>
<script src="../assets/js/pages/tables/jquery-datatable.js"></script>

<script src="\pvsuppliescr\Admin\light\adminScript\imagenes.js"></script>