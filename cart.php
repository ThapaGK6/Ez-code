<?php
// Establishing database connection
$server = "localhost";
$username = "root";
$password = "";
$dbname = "ezcode";
$con = new mysqli($server, $username, $password, $dbname);

// Check connection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}



// Include header and navbar
require('includes/header.php');
require('includes/navbar.php');

// Include course functions
// include('functions/course_function.php');
// include('functions/common_function.php');

?>
<style>
    .cart_img{
        width: 90px;
        height:90px;
        object-fit: contain;
    }
   
    .delete-button {
        border: none; /* Remove border */
        background: none; /* Remove background */
        padding: 0; /* Remove padding */
    }
</style>



</head>
<!-- table  -->
<div class="container">
    <div class="row">
    <form action="" method="post">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Course Name</th>
                    <th> Thumbnail</th>
                    <th>Price</th>
                    <th></th>
                  
                    <th  class= "colspan=2">Delete</th>
                </tr>
            </thead>
            <tbody>
       <!--  makeing dynamic data -->

       <?php
      global $con;
      $ip = getIPAddress();
      $total_price = 0;
  
      $cart_query = "SELECT * FROM cart_detail WHERE ip = '$ip'";
      $result = mysqli_query($con, $cart_query);
  
      while($row = mysqli_fetch_array($result)){
          $course_id = $row['course_id']; // Fetch the value of 'course_id' from the row
          $select_course = "SELECT * FROM courses WHERE course_id= '$course_id'";
          $result_course = mysqli_query($con, $select_course);
  
          while($row_course_price = mysqli_fetch_array($result_course)){
              $course_price = $row_course_price['price'];
              $price_table=$row_course_price['price'];
              $course_name= $row_course_price['course_name'];
              $course_img= $row_course_price['course_img'];
              $total_price = $total_price + $course_price;
?>
                <tr>
                    <td><?php echo $course_name    ?></td>
                    <td><img class="cart_img" src="admin/assets/img/<?php echo htmlspecialchars($course_img); ?>" alt=""></td>

                    <td><?php echo $course_price    ?></td>
                   
                    <td><input type="checkbox" name="removeitem[]" value="<?php echo  $course_id   ?>"></td>
              
                    <td>
                   <input type="submit" value="remove" class="bg-info" name="remove_cart">
                <!-- <input type="submit" value="remove" class="delete-button" name="remove"><i class="fas fa-trash"></i></button> -->
                   
                
                       
                    </td>
                </tr>
                <?php  }
          
        }


?>
            </tbody>
        </table>
        <div class="d-flex">
            <h4 class="px-3">
                Total: <strong class="text-danger"><?php echo $total_price ?>/-</strong>
               <button class="bg-success px-3 border-0 text-white ms-5">   <a class="text-light text-decoration-none" href="courses.php ">Go back</button> </a>
                 <button class="bg-danger px-3 border-0 text-white" > <a href="buynow.php" class="text-light text-decoration-none">Buy Now</a>
                 </button> 
            </h4>
        </div>
    </div>
</div>
</form>

<!-- function to remove item
--
<?php
function remove_item(){
    global $con;
    if(isset($_POST['remove_cart'])){
        foreach($_POST['removeitem'] as $remove_id) {
            echo $remove_id; // This line will output the ID of the item to be removed, which can be helpful for debugging
            $delete_query = "DELETE FROM cart_detail WHERE course_id = $remove_id";
            $delete = mysqli_query($con, $delete_query);
            if($delete){
              echo "<script>window.open('cart.php', '_self')</script>";
            }
        }
    }
}

remove_item();
?>





  
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

