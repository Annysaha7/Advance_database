<?php
    include ("../../model/database.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Admin/Book</title>
</head>
<body>

                <a href="./adminProfile.php" class="nav-link text-truncate">
                    <i class="fs-5 bi-house"></i><span class="ms-1 d-none d-sm-inline">Profile</span>
                </a>
                <a href="./adminBook.php" class="nav-link text-truncate">
                    <i class="fs-5 bi-house"></i><span class="ms-1 d-none d-sm-inline">Book</span>
                </a>

                <a href="./adminWriter.php" class="nav-link text-truncate">
                    <i class="fs-5 bi-house"></i><span class="ms-1 d-none d-sm-inline">Writer</span>
                </a>

                <a href="./adminMember.php" class="nav-link text-truncate">
                    <i class="fs-5 bi-house"></i><span class="ms-1 d-none d-sm-inline">Member</span>
                </a>

                <a href="./adminSellList.php" class="nav-link text-truncate">
                    <i class="fs-5 bi-house"></i><span class="ms-1 d-none d-sm-inline">Sell List</span>
                </a>

                <a href="./adminAdmins.php" class="nav-link text-truncate">
                    <i class="fs-5 bi-table"></i><span class="ms-1 d-none d-sm-inline">Admins</span></a>

                <a href="./adminSetting.php" class="nav-link text-truncate">
                    <i class="fs-5 bi-grid"></i><span class="ms-1 d-none d-sm-inline">Settings</span></a>

                <a href="../../control/logout.php" class="nav-link text-truncate">
                    <i class="fs-5 bi-people"></i><span class="ms-1 d-none d-sm-inline">Log out</span> </a>

<form action="">
<?php 
if(isset($_POST['updatBook'])){
    function UPBOOK() {
        $id = $_POST['updatBook'];
        $connection = connection();
        $sql = "SELECT *
                FROM BOOK where BOOKID = $id";
        
        $stmt = oci_parse($connection, $sql);
        
        try {
            oci_execute($stmt);
            while ($row = oci_fetch_assoc($stmt)) {
               
                
                        echo  '<form method="POST">

                        <p class="h4 mb-4">Update Book</p>
        
                        <input type="text" name="title" id="defaultRegisterFormEmail" class="form-control mb-4" value=' . $row['TITLE'] . '>
                        <input type="text" name="author" id="defaultRegisterFormEmail" class="form-control mb-4" value=' . $row['AUTHOR'] . '>
                        <input type="date" name="publication" id="defaultRegisterFormEmail" class="form-control mb-4" value=' . date('Y-m-d', strtotime($row['PUBLICATION'])) . '>
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
?>
</form>

<div class="container-fluid">
    <div class="row">
        <div class="col min-vh-100 p-4">
           

            
            <div class="container">
                <h1>Library</h1>
                <form class="text-center border border-light p-5" method="POST">

                <p class="h4 mb-4">New Book</p>

                <input type="text" name="title" id="defaultRegisterFormEmail" class="form-control mb-4" placeholder="Life">
                <input type="text" name="author" id="defaultRegisterFormEmail" class="form-control mb-4" placeholder="Nicolas">
                <input type="date" name="publication" id="defaultRegisterFormEmail" class="form-control mb-4">
                <input type="text" name="language" id="defaultRegisterFormEmail" class="form-control mb-4" placeholder="Bangla">
                <input type="number" name="available" id="defaultRegisterFormEmail" class="form-control mb-4" placeholder="100">
                <input type="number" name="total" id="defaultRegisterFormEmail" class="form-control mb-4" placeholder="10000">
                    
                <button class="btn btn-info my-4 btn-block" type="submit" name="addBook">ADD Book</button>
                <?php 
                    $restrationError;
                ?>
                </form>
            </div>


            <div class="d-flex justify-content-between container">
                <h3>Book List</h3>
                <form class="d-flex" role="search" method="POST">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="data">
                    <button class="btn btn-outline-success" type="submit" name="searchFromBooks">Search</button>
                </form>
            </div>

            <div class="container mt-3">
            <div>
                <table class="table table-success table-striped">
                    <thead>
                        <tr>
                        <th scope="col">BOOK ID</th>
                        <th scope="col">TITLE</th>
                        <th scope="col">AUTHOR</th>
                        <th scope="col">PUBLICATION</th>
                        <th scope="col">LANGUAGE</th>
                        <th scope="col">AVAILABLE COPIES</th>
                        <th scope="col">TOTAL COPIES</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                        <?php
                        $connection = connection();
                        function BOOKS($connection) {
                            $sql = "SELECT *
                                    FROM BOOK";
                            
                            $stmt = oci_parse($connection, $sql);
                            
                            try {
                                oci_execute($stmt);
                                
                                while ($row = oci_fetch_assoc($stmt)) {
                                    // Process each row and display course information
                                    echo "</tr>";
                                    echo "<td>" . $row['BOOKID'] . "<td> ";
                                    echo "<td>" . $row['TITLE'] . "<td>";
                                    echo "<td>" . $row['AUTHOR'] . "<td> ";
                                    echo "<td>" . $row['PUBLICATION'] . "<td> ";
                                    echo "<td>" . $row['LANGUAGE'] . "<td> ";
                                    echo "<td>" . $row['AVAILABLECOPIES'] . "<td> ";
                                    echo "<td>" . $row['TOTALCOPIES'] . "<td> ";
                                    echo "<td>" . "<form method='POST'>  <button type='submit' value=". $row['BOOKID'] ." name='deleteBOok'> Delete </button>  </form>" . "<td>" ;
                                    echo "<td>" . "<form method='POST'>  <button type='submit' value=". $row['BOOKID'] ." name='updatBook'> Update </button>  </form>" . "<td>" ;
                                    echo "</tr>";
                                }
                                
                                oci_free_statement($stmt);
                            } catch (Exception $e) {
                                echo "Failed to retrieve courses: " . $e->getMessage();
                            }
                        }
                        
                        // Usage example:
                        BOOKS($connection);
                    ?>
                    </tbody>
                </table>
            </div>
            </div>
            
</body>
</html>


