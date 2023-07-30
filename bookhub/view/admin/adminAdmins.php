<?php
    include ("../../model/database.php");
?>
<!DOCTYPE html>
<html lang="en">
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
<div class="container-fluid">
    <div class="row">
        <div class="col min-vh-100 p-4">
            
            <div class="container mt-5 pt-5">
            <h1>ADMINS</h1>
            <div class="d-flex justify-content-center">
                <table class="table table-success table-striped">
                    <thead>
                        <tr>
                        <th scope="col">ID</th>
                        <th scope="col">EMAIL</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                        <?php
                        $res = SHOWALLADMIN();
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


