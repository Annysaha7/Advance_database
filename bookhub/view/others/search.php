<?php
    include ("../../model/database.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="../bootstrap.css">
    <script src="../bootstrap.js"></script>
    <title>Book Collection</title>
</head>
<body class="container">
<?php
  include("navbar.php")
 ?>
    <h2 class="text-center mt-5">Book Collection</h2>
    <div class="d-flex justify-content-end container">
        
      <form class="d-flex  mt-5" role="search" method="POST">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="data">
        <button class="btn btn-outline-success" type="submit" name="search">Search</button>
      </form>
    </div>

    <div class="container mt-3">
                <div>
                    <table class="border">
                        <thead>
                            <tr>
                            <th scope="col">BOOK ID</th>
                            <th scope="col">TITLE</th>
                            <th scope="col">AUTHOR</th>
                            <th scope="col">PUBLICATION</th>
                            <th scope="col">LANGUAGE</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                            <?php
                            $res = SHOWCOLLECTION();
                            while ($row = oci_fetch_array($res, OCI_RETURN_NULLS | OCI_ASSOC)) {
                                
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


