<?php

function connection()
    {   
    $username = 'system';
    $password = 'tiger';
    $connection_string='localhost/XE'; 
        $con = oci_connect($username, $password,$connection_string);
        if(!$con){

        $error = oci_error();
        trigger_error(htmlentities($error['message'], ENT_QUOTES),E_USER_ERROR);
           
        }

        return $con;
    }
    
?>