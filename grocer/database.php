<?php
    require 'db_connection.php';

    if(isset($_POST['addProduct'])){
        function add_product($NAME, $CATEGORY, $PRICE, $QUANTITY) {
            $sql = "BEGIN ADD_PRODUCT(:NAME, :CATEGORY, :PRICE, :QUANTITY); END;";
            
            $conn = connection();
            $stmt = oci_parse($conn, $sql);
            oci_bind_by_name($stmt, ':NAME', $NAME);
            oci_bind_by_name($stmt, ':CATEGORY', $CATEGORY);
            oci_bind_by_name($stmt, ':PRICE', $PRICE);
            oci_bind_by_name($stmt, ':QUANTITY', $QUANTITY);
            
            if (!$stmt) {
                $m = oci_error($conn);
                trigger_error('Could not parse statement: ' . $m['message'], E_USER_ERROR);
                header("refresh: 0");
              }
              $ex = oci_execute($stmt);
              if (!$ex) {
                $m = oci_error($stmt);
                trigger_error('Could not excecute statement: ' . $m['message'], E_USER_ERROR);
                header("refresh: 0");
              }
              oci_free_statement($stmt);
              oci_close($conn);
        }

        $NAME = $_REQUEST['name'];
        $CATEGORY = $_REQUEST['category'];
        $PRICE = $_REQUEST['price'];
      
        $QUANTITY = $_REQUEST['quantity'];

        add_product($NAME, $CATEGORY, $PRICE, $QUANTITY);
    }

    if(isset($_POST['delete'])){
        $conn = connection();
        function DELETE_PRODUCT($PRODUCT_ID, $conn) {
            $sql = "DELETE FROM PRODUCT WHERE ID = :PRODUCT_ID";
            
            $stmt = oci_parse($conn, $sql);
            oci_bind_by_name($stmt, ':PRODUCT_ID', $PRODUCT_ID);
            
            try {
                oci_execute($stmt);
                
                $rowsAffected = oci_num_rows($stmt);
                
                if ($rowsAffected > 0) {
                } else {
                    echo "Failed to delete product.";
                }
                
                oci_free_statement($stmt);
                oci_close($conn);
            } catch (Exception $e) {
                echo "Failed to delete product: " . $e->getMessage();
            }
        }

        $PRODUCT_ID = $_POST['delete'];

        DELETE_PRODUCT($PRODUCT_ID, $conn);
    }

    

    if (isset($_POST['update'])) {
        function UPDATE_PRODUCT($ID, $NAME, $CATEGORY, $PRICE, $QUANTITY) {
            $conn = connection();
            $sql = "UPDATE PRODUCT SET NAME = :NAME, CATEGORY = :CATEGORY, PRICE = :PRICE, QUANTITY = :QUANTITY WHERE ID = :ID";
            
            $stmt = oci_parse($conn, $sql);
            oci_bind_by_name($stmt, ':NAME', $NAME);
            oci_bind_by_name($stmt, ':CATEGORY', $CATEGORY);
            oci_bind_by_name($stmt, ':PRICE', $PRICE);
            oci_bind_by_name($stmt, ':QUANTITY', $QUANTITY);
            oci_bind_by_name($stmt, ':ID', $ID);
            
            try {
                oci_execute($stmt);
                
                $rowsAffected = oci_num_rows($stmt);
                
                if ($rowsAffected > 0) {
                } else {
                    echo "Failed to update Product. ";
                }
                
                oci_free_statement($stmt);
                oci_close($conn);
            } catch (Exception $e) {
                echo " Failed to update Product " . $e->getMessage();
            }
        }

        
        $ID = $_REQUEST['update'];
        $NAME = $_REQUEST['name'];
        $CATEGORY = $_REQUEST['category'];
        $PRICE = $_REQUEST['price'];
        $QUANTITY = $_REQUEST['quantity'];


        UPDATE_PRODUCT($ID, $NAME, $CATEGORY, $PRICE, $QUANTITY);
    }

    if(isset($_POST["login"])){
        
            $id = $_POST['id'];
            $password = $_POST['password'];
            
            $conn = connection();
            
            $s = oci_parse($conn, "select ID,PASSWORD from ADMIN where ID='$id' and PASSWORD='$password'");       
            oci_execute($s);
            $row = oci_fetch_all($s, $res);
            if($row){
                    header("location: product.php");
            }else{
                    echo "wrong password or username";
            }
    }

?>