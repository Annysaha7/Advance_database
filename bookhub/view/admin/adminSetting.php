<?php
    include ("../../model/database.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Admin/Setting</title>
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
            

            
            <div class="container" style="width: 70vh">
                <h1>Settings</h1>
                <form class="text-center border border-light p-5" method="POST">

                <p class="h4 mb-4">Change Password</p>

                <input type="text" name="newPassword" class="form-control mb-4" placeholder="new password">
                <input type="text" name="confirmPassword" class="form-control mb-4" placeholder="confirm password">

                <button class="btn btn-info my-4 btn-block" type="submit" name="changeAdminPassword">Change</button>
                </form>
            </div>
            
</body>
</html>


