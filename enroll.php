<?php  
require('includes/header.php');
?>
<?php  
require('includes/navbar.php');
require('admin/config/config.php');

if(isset($_GET['user_id'])){
    $user_id= $_GET['user_id'];
    
}


$get_ip= getIPAddress();
$total_amount=0;
$cart_query= "Select * from cart_detail where ip = '$get_ip' ";
$result_cart_amt= mysqli_query($con, $cart_query);
$bill_no= mt_rand();
$status= 'enrolled';

$count_course= mysqli_num_rows($result_cart_amt);
while ($row_amt=mysqli_fetch_array($result_cart_amt)){
    $course_id= $row_amt['course_id'];
    $select_course= "Select * from courses where course_id = '$course_id' ";
    $run_amt= mysqli_query($con, $select_course);
    while($row_course_amt= mysqli_fetch_array($run_amt)){
        $course_amt = array($row_course_amt['price']);
        $course_value= array_sum($course_amt);
        $total_amount+=$course_value;
        
    }
}

// enroll from cart 

$get_cart= "SELECT * from cart_detail";
$run_cart= mysqli_query($con, $get_cart);
$get_item_quantity= mysqli_fetch_array($run_cart);
$quantity= $get_item_quantity['quantity'];
if($quantity==0){
    $quantity=1;
    $total= $total_amount;
}else{
    $quantity=$quantity;
    $total= $total_amount * $quantity;
}
$insert_enroll = "INSERT INTO enroll (user_id, amount, bill_no, enroll_date, status) VALUES ($user_id, $total_amount, '$bill_no', NOW(), '$status')";

$result_query= mysqli_query($con, $insert_enroll);
if($result_query){
    echo "<script> alert ('Sucessfuly enroleed')</script>";
    echo "<script> window.open('profile.php')</script>";

}


// delete items from cart after enroll

$empty_cart= "Delete from cart_detail where ip= '$get_ip' ";
$result_delete= mysqli_query($con, $empty_cart);




?>