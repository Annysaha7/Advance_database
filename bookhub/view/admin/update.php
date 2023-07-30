<?php
    include ("../../model/database.php");

    

if(isset($_POST['updatBook'])){
    function UPBOOK() {
        $id = $_POST['updatBook'];
        $connection = connection();
        $sql = "SELECT *
                FROM BOOK where BOOKID = $id";
        echo $id;
        
        $stmt = oci_parse($connection, $sql);
        
        try {
            oci_execute($stmt);
            
            while ($row = oci_fetch_assoc($stmt)) {
                
                        echo  '<form method="POST">

                        <p class="h4 mb-4">Update Book</p>
        
                        <input type="text" name="title" id="defaultRegisterFormEmail" class="form-control mb-4" value=' . $row['TITLE'] . '>
                        <input type="text" name="author" id="defaultRegisterFormEmail" class="form-control mb-4" value=' . $row['AUTHOR'] . '>
                        <input type="date" name="publication" value='.  date('Y-m-d', strtotime($row['PUBLICATION'])) . '>
                        <input type="text" name="language" id="defaultRegisterFormEmail" class="form-control mb-4" value=' . $row['LANGUAGE'] . '>
                        <input type="number" name="available" id="defaultRegisterFormEmail" class="form-control mb-4" value=' . $row['AVAILABLECOPIES'] . '>
                        <input type="number" name="total" id="defaultRegisterFormEmail" class="form-control mb-4" value=' . $row['TOTALCOPIES'] . '>
                        <button type="submit" name="finalUpdate" value='. $row['BOOKID'] .'>Update Book</button>

                        </form>';
            }
        } catch (Exception $e) {
            echo "Failed to retrieve courses: " . $e->getMessage();
        }
    }

    UPBOOK();
}

if(isset($_POST['finalUpdate'])){
    echo "Hello";
}
?>