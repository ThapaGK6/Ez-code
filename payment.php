<?php  
require('includes/header.php');
include('includes/navbar.php')
?>

<body>
<?php  

require('admin/config/config.php');

@session_start();

?>
<style>
      .payment-methods {
            display: flex;
            flex-wrap: wrap;
            justify-content: flex-start;
        }
        .payment-methods img {
            width: 100px;
            margin: 10px;
            transition: transform 0.3s ease-in-out;
        }
        .payment-methods img:hover {
            transform: scale(1.1);
        }
        .container {
            display: flex;
            align-items: center;
            margin-top: 200px;
        }
        .left-content {
            flex: 1;
            text-align: left;
        }
        .right-content {
            flex: 1;
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
        }

</style>
<body>
<?php
$ip= getIPAddress();
$get_user= "SELECT * from users where user_ip= '$ip'";
$result= mysqli_query($con, $get_user);
$run_query= mysqli_fetch_array($result);
$user_id= $run_query['user_id'];


?>



    <div class="container">
        <div class="row mb-4">
            <div class="col-12">
                <h1>Payment Methods</h1>
            </div>
        </div>
        <div class="row payment-methods">
            <div class="col-md-4 col-sm-6 mb-4">
            <a href="enroll.php?user_id=<?php echo $user_id; ?>">
    <img src="https://upload.wikimedia.org/wikipedia/commons/b/b5/PayPal.svg" alt="PayPal">
</a>

            </div>
            <div class="col-md-4 col-sm-6 mb-4">
               <a href=""> <img src="https://seeklogo.com/images/S/skrill-logo-8F19E97B7F-seeklogo.com.png" alt="Skrill"></a>
            </div>
            <div class="col-md-4 col-sm-6 mb-4">
               <a href=""><img src="https://hostbillapp.com/appstore/payment_stripe/images/thumbnails/m_logo.png" alt="Stripe"></a> 
            </div>
            <div class="col-md-4 col-sm-6 mb-4">
               <a href=""><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/b/b0/Apple_Pay_logo.svg/1280px-Apple_Pay_logo.svg.png" alt="Apple Pay"></a> 
            </div>
            <div class="col-md-4 col-sm-6 mb-4">
                <img src="https://pnghq.com/wp-content/uploads/google-pay-logo-symbol-png-photo.png" alt="Google Pay">
            </div>
            <div class="col-md-4 col-sm-6 mb-4">
                <img src="https://cdn4.iconfinder.com/data/icons/flat-brand-logo-2/512/visa-512.png" alt="Visa">
            </div>
            <div class="col-md-4 col-sm-6 mb-4">
                <img src="https://upload.wikimedia.org/wikipedia/commons/a/a4/Mastercard_2019_logo.svg" alt="MasterCard">
            </div>
            <div class="col-md-4 col-sm-6 mb-4">
                <img src="https://cdn-icons-png.freepik.com/512/5968/5968311.png" alt="Discover">
            </div>
            <div class="col-md-4 col-sm-6 mb-4">
                <img src="https://cdn.pixabay.com/photo/2017/03/12/02/57/bitcoin-2136339_640.png" alt="Bitcoin">
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>