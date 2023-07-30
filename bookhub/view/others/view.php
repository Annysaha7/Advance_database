<?php
    include ("../../model/database.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="../bootstrap.css">
    <script src="../bootstrap.js"></script>
    <title>Views</title>
</head>
<body>
<?php
  include("navbar.php")
 ?>
    <div class="container mt-5 pt-5">
    <h3>SELLING HISTORY</h3>
    <div>
        <table class="table table-success table-striped">
            <thead>
                <tr>
                <th scope="col">TITLE</th>
                <th scope="col">COPIES SOLD</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                <?php
                $res = SHOWSOLDHISTORY();
                while ($row = oci_fetch_array($res, OCI_RETURN_NULLS+OCI_ASSOC)) {
                    
                    echo '<tr>';
                    foreach ($row as $item) 
                    {
                        echo '<td>'.($item !== null ? htmlentities($item, ENT_QUOTES) : '&nbsp').'</td>';
                    }
                    echo '</tr>';
                    }
            ?>
                </tr>
            </tbody>
        </table>
    </div>
    </div>

    <div class="container mt-5 pt-5">
    <h3>ENGLISH BOOKS</h3>
    <div>
        <table class="table table-success table-striped">
            <thead>
                <tr>
                <th scope="col">BOOK ID</th>
                <th scope="col">TITLE</th>
                <th scope="col">AUTHOR</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                <?php
                $res = SHOWENGLISHBOOK();
                while ($row = oci_fetch_array($res, OCI_RETURN_NULLS+OCI_ASSOC)) {
                    
                    echo '<tr>';
                    foreach ($row as $item) 
                    {
                        echo '<td>'.($item !== null ? htmlentities($item, ENT_QUOTES) : '&nbsp').'</td>';
                    }
                    echo '</tr>';
                    }
            ?>
                </tr>
            </tbody>
        </table>
    </div>
    </div>

    <div class="container mt-5 pt-5">
    <h3>SPECIAL BOOKS</h3>
    <div>
        <table class="table table-success table-striped">
            <thead>
                <tr>
                    <th scope="col">TITLE</th>
                    <th scope="col">AUTHOR</th>
                    <th scope="col">PUBLICATION</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                <?php
                $res = SHOWSPECIALBOOKS();
                while ($row = oci_fetch_array($res, OCI_RETURN_NULLS+OCI_ASSOC)) {
                    
                    echo '<tr>';
                    foreach ($row as $item) 
                    {
                        echo '<td>'.($item !== null ? htmlentities($item, ENT_QUOTES) : '&nbsp').'</td>';
                    }
                    echo '</tr>';
                    }
            ?>
                </tr>
            </tbody>
        </table>
    </div>
    </div>
</body>
</html>


