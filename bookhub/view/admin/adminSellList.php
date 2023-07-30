<?php
    include ("../../model/database.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Admin/Sell List</title>
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
<div class="container-fluid">
    <div class="row">
        <div class="col min-vh-100 p-4">
            

            
            <div class="container">
                <h1>Register Sells</h1>
                <form class="text-center border border-light p-5" method="POST">

                <p class="h4 mb-4">New Book</p>

                <input type="number" name="memberid" id="defaultRegisterFormEmail" class="form-control mb-4" placeholder="10001">
                <input type="number" name="bookid" id="defaultRegisterFormEmail" class="form-control mb-4" placeholder="18007">

                <button class="btn btn-info my-4 btn-block" type="submit" name="sell">Register</button>
                <?php 
                    $restrationError;
                ?>
                </form>
            </div>


            <div class="container mt-5 pt-5">
            <div>
                <table class="table table-success table-striped">
                    <thead>
                        <tr>
                        <th scope="col">TRANSACTION ID</th>
                        <th scope="col">MEMBER ID</th>
                        <th scope="col">BOOK ID</th>
                        <th scope="col">DATE</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                        <?php
                        $res = SHOWALLSELL();
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


