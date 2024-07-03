<?php
require('../config/config.php');
session_start();
if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = md5($_POST['password']);

    if ($username != "" && $password != "") {
        $select = "SELECT * from admin where username = '$username' AND password= '$password'";
        $result = mysqli_query($con, $select);
        if (mysqli_num_rows($result) > 0) {
            $data = mysqli_fetch_assoc($result);
            
            $_SESSION['name'] = $data['name'];
            $_SESSION['username'] = $data['username'];
            header("Refresh:0; url = ../dashboard.php?msg=success");
        }
        else{

            header("Refresh:0; url = ../index.php?error");

        }
    }
    else{
        echo "all field are required";
    }
}
