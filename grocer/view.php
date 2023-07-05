<?php
    include ("database.php");
?>


<!DOCTYPE html>
<html lang="en">
    <head>Views</head>
    <body> 

    <form method="POST"> 
            <button class="btn btn-outline-secondary" type="submit" name="views">Simple View</button>
    </form> 

        <table>
            
                <?php
                        if(isset($_POST['views'])){
                            $connection = connection();
                            $sql = oci_parse($connection,"CREATE OR REPLACE VIEW FRUIT AS SELECT NAME, PRICE FROM PRODUCT WHERE CATEGORY = 'Fruits' ") ;
                            $res = oci_execute($sql);
                            function PRODUCTS($connection) {
                            $sql = "SELECT * FROM FRUIT";
                            
                            $stmt = oci_parse($connection, $sql);
                            
                            try {
                                oci_execute($stmt);

                                echo "<thead>";
                                echo "<tr>";
                                echo "<th>NAME</th>";
                                echo "<th>PRICE</th>";
                                echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                echo  "<tr>";
                                
                                while ($row = oci_fetch_assoc($stmt)) {
                                    echo "<tr>";
                                    echo "<td>" . $row['NAME'] . "<td> ";
                                    echo "<td>" . $row['PRICE'] . "<td>";
                                    echo "</tr>";
                                }
                                
                                oci_free_statement($stmt);
                            } catch (Exception $e) {
                                echo "Failed to retrieve Products: " . $e->getMessage();
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


