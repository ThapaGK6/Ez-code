
 <?php
 if(!isset($_SESSION['username'])){
    include ('payment.php');
 }else{
    include('login.php');
 }
?>
