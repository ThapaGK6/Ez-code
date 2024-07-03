<?php
// including the database

// Establishing database connection
$server = "localhost";
$username = "root";
$password = "";
$dbname = "ezcode";
$con = new mysqli($server, $username, $password, $dbname);

//getn ip function

function getIPAddress() {  
    //whether ip is from the share internet  
     if(!empty($_SERVER['HTTP_CLIENT_IP'])) {  
                $ip = $_SERVER['HTTP_CLIENT_IP'];  
        }  
    //whether ip is from the proxy  
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {  
                $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];  
     }  
//whether ip is from the remote address  
    else{  
             $ip = $_SERVER['REMOTE_ADDR'];  
     }  
     return $ip;  
}  
$ip = getIPAddress();  
// echo 'User Real IP Address - '.$ip;  



// cart function









?>