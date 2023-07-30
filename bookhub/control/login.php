<?php 
    session_start();
    $loginError = "";
    include("../model/database.php");

    if(isset($_POST["login"])){
        if(empty($_REQUEST["id"])){
        $loginError = 'Please insert your id';
    }
    elseif(empty($_REQUEST["password"])){
        $loginError = 'Please input your password';
    }
    else{
            $id = $_POST['id'];
            $password = $_POST['password'];
            
            $conn = oci_connect("system", "tiger", "//localhost/xe");
            
            $s = oci_parse($conn, "select ID,PASSWORD from ADMIN where ID='$id' and PASSWORD='$password'");       
            oci_execute($s);
            $row = oci_fetch_all($s, $res);
            if($row){
                    header("location: http://localhost/bookhub/view/admin/adminProfile.php");
            }else{
                $loginError = "wrong password or username";
            }
        }
}
?>