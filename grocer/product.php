<?php
    include ("database.php");
?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Product</title>
    </head>
    <body>

        

        <form method="POST">
<?php
    if (isset($_POST['edit'])) {
                        function UPDATEPRODUCT()
                        {
                            $ID = $_POST['edit'];
                            $connection = connection();
                            $sql = "SELECT * FROM PRODUCT where ID = $ID";

                            $stmt = oci_parse($connection, $sql);

                            try {
                                oci_execute($stmt);
                                while ($row = oci_fetch_assoc($stmt)) {


                                    echo '<form method="POST">

                                    <p class="h4 mb-4">Update Product</p>
        
                                    <input type="text" name="name"  value=' . $row['NAME'] . '>
                                    <input type="text" name="category"  value=' . $row['CATEGORY'] . '>
                                    <input type="number" name="price"  value=' . $row['PRICE'] . '>
                                    <input type="number" name="quantity"  value=' . $row['QUANTITY'] . '>
        
                                    <button name="update" value=' . $row['ID'] . '>Update</button>
                                </form>';
                                }
                            } catch (Exception $e) {
                                echo "Failed to retrieve product: " . $e->getMessage();
                            }
                        }

                        UPDATEPRODUCT();
                    }
                        else{
                            echo '<form class="text-center border border-light p-5" method="POST">

                            <p class="h4 mb-4">New Product</p>

                            <input type="text" name="name" class="form-control mb-4" placeholder="APPLE">
                            <input type="text" name="category" class="form-control mb-4" placeholder="FRUITS">
                            <input type="number" name="price" class="form-control mb-4" placeholder="180 TK">
                            <input type="number" name="quantity" class="form-control mb-4" placeholder="100 Unit">

                            <button class="btn btn-info my-4 btn-block" type="submit" name="addProduct">ADD</button>
                        </form>';
                        }
                    ?>

                </form>
            </div>

        <h1>Products</h1>
        

        <form method="POST"> 
            <input type="text" name="searchValue">
            <button class="btn btn-outline-secondary" type="submit" name="search">Search</button>
        </form> 

        <table>
            <thead>
                <tr>
                <th>ID</th>
                <th>NAME</th>
                <th>CATEGORY</th>
                <th>PRICE</th>
                <th>QUANTITY</th>
                <th>CREATED_AT</th>
                <th>DELETE</th>
                <th>EDIT</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                <?php
                        if(isset($_POST['search'])){
                            $connection = connection();
                            function PRODUCTS($value, $connection) {
                            $sql = "SELECT * FROM PRODUCT where NAME LIKE '%$value%' OR CATEGORY LIKE'%$value%'";
                            
                            $stmt = oci_parse($connection, $sql);
                            
                            try {
                                oci_execute($stmt);
                                
                                while ($row = oci_fetch_assoc($stmt)) {
                                    echo "</tr>";
                                    echo "<td>" . $row['ID'] . "<td> ";
                                    echo "<td>" . $row['NAME'] . "<td>";
                                    echo "<td>" . $row['CATEGORY'] . "<td> ";
                                    echo "<td>" . $row['PRICE'] . "<td> ";
                                    echo "<td>" . $row['QUANTITY'] . "<td> ";
                                    echo "<td>" . $row['CREATED_AT'] . "<td> ";
                                    echo "<td>" . "<form method='POST'>  <button type='submit' value=". $row['ID'] ." name='delete'> Delete </button>  </form>" . "<td>" ;
                                    echo "<td>" . "<form method='POST'>  <button type='submit' value=". $row['ID'] ." name='edit'> Edit </button>  </form>" . "<td>" ;
                                    echo "</tr>";
                                }
                                
                                oci_free_statement($stmt);
                            } catch (Exception $e) {
                                echo "Failed to retrieve Products: " . $e->getMessage();
                            }
                        }
                        $value = $_POST['searchValue'];
                        PRODUCTS($value, $connection);
                        }
                        else{
                            
                        $connection = connection();
                        function PRODUCTS($connection) {
                            $sql = "SELECT * FROM PRODUCT";
                            
                            $stmt = oci_parse($connection, $sql);
                            
                            try {
                                oci_execute($stmt);
                                
                                while ($row = oci_fetch_assoc($stmt)) {
                                    echo "</tr>";
                                    echo "<td>" . $row['ID'] . "<td> ";
                                    echo "<td>" . $row['NAME'] . "<td>";
                                    echo "<td>" . $row['CATEGORY'] . "<td> ";
                                    echo "<td>" . $row['PRICE'] . "<td> ";
                                    echo "<td>" . $row['QUANTITY'] . "<td> ";
                                    echo "<td>" . $row['CREATED_AT'] . "<td> ";
                                    echo "<td>" . "<form method='POST'>  <button type='submit' value=". $row['ID'] ." name='delete'> Delete </button>  </form>" . "<td>" ;
                                    echo "<td>" . "<form method='POST'>  <button type='submit' value=". $row['ID'] ." name='edit'> Edit </button>  </form>" . "<td>" ;
                                    echo "</tr>";
                                }
                                
                                oci_free_statement($stmt);
                            } catch (Exception $e) {
                                echo "Failed to retrieve products: " . $e->getMessage();
                            }
                        }
                        PRODUCTS($connection);
                        }
                    ?>
                </tr>
            </tbody>
        </table>
    </body>
</html>


