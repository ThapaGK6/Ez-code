<?php
// including the database

// Establishing database connection
$server = "localhost";
$username = "root";
$password = "";
$dbname = "ezcode";
$con = new mysqli($server, $username, $password, $dbname);


//getting course

function course(){
    

    //condition to check category (isset or not)

    if(!isset($_GET['category'])){
      global $con;
        $select_query = "SELECT * FROM courses";
        $result_query = mysqli_query($con, $select_query);

        while ($row = mysqli_fetch_assoc($result_query)) {
            $course_id = $row['course_id'];
            $course_name = $row['course_name'];
            $course_desc = $row['course_desc'];
            $category_id = $row['category_id'];
            $course_img = $row['course_img'];
            $price = $row['price'];

            echo "<div class='col-md-4 mt-3'>
                      <div class='card'>
                        <img src='admin/uploads/course_img/$course_img' class='card-img-top' alt='Course Image'>
                        <div class='card-body'>
                          <h5 class='card-title'>$course_name</h5>
                          <p class='card-text'>$course_desc</p>
                          Price: Rs.  <span class='fw-bold text-danger' > $price </span>
                         <a href='courses.php?add_to_cart=$course_id' <button class='btn btn-primary ms-3'>Add to cart</button> </a>
                          
                        </div>
                      </div>
                    </div>";
        }
    }
}


//getting category

function specific_course(){
    global $con;

    //condition to check category
    if(isset($_GET['category'])){
        $category_id = $_GET['category'];
        $select_query = "SELECT * FROM courses where category_id=$category_id";
        $result_query = mysqli_query($con, $select_query);
        $num_of_rows=mysqli_num_rows($result_query);
        if($num_of_rows==0){
          echo "<h2 class='text-center'> No available courses</h2>";
        }

        while ($row = mysqli_fetch_assoc($result_query)) {
            $course_id = $row['course_id'];
            $course_name = $row['course_name'];
            $course_desc = $row['course_desc'];
            $category_id = $row['category_id'];
            $course_img = $row['course_img'];
            $price = $row['price'];

            echo "<div class='col-md-4 mt-3'>
                      <div class='card'>
                        <img src='admin/uploads/course_img/$course_img'  class='card-img-top  ' alt='Course Image' >
                        <div class='card-body'>
                          <h5 class='card-title'>$course_name</h5>
                          <p class='card-text'>$course_desc</p>
                          <a href='courses.php?add_to_cart=$course_id'
                           <button class='btn btn-primary ms-3'>Add to cart</button> </a>
                          <button class='btn btn-danger ms-5'>$price</button>
                        </div>
                      </div>
                    </div>";
        }
    }
}

//category_sidebar

function category(){
    global $con;

    $select_category = "SELECT * FROM category";
    $result_category = mysqli_query($con, $select_category);

    while ($row_data = mysqli_fetch_assoc($result_category)) {
        $category_name = $row_data['category_name'];
        $category_id = $row_data['category_id'];
        echo "<li class='list-group-item bg-danger text-white'><a href='courses.php?category=$category_id' class='nav-link text-light'> $category_name </a></li>";
    }
}
// searching courses
// searching courses
// searching courses
// searching courses
// searching courses


function search_course(){
  global $con;
  if (isset($_GET['search_data_course'])) {
    $search_data_value=$_GET['search_data']; // corrected variable name
    $search_query= "SELECT * FROM courses WHERE course_name LIKE '%$search_data_value%'";
    $result_query = mysqli_query($con, $search_query);

    while ($row = mysqli_fetch_assoc($result_query)) {
        $course_id = $row['course_id'];
        $course_name = $row['course_name'];
        $course_desc = $row['course_desc'];
        $category_id = $row['category_id'];
        $course_img = $row['course_img'];
        $price = $row['price'];

        echo "<div class='col-md-4 mt-3'>
                  <div class='card'>
                    <img src='admin/uploads/course_img/$course_img' class='card-img-top' alt='Course Image'>
                    <div class='card-body'>
                      <h5 class='card-title'>$course_name</h5>
                      <p class='card-text'>$course_desc</p>
                      <a href='courses.php?add_to_cart=$course_id' <button class='btn btn-primary ms-3'>Add to cart</button> </a>
                      <button class='btn btn-danger ms-2'>$price</button> <!-- Corrected margin class -->
                    </div>
                  </div>
                </div>";
    }
  

}
}


// cart function

function cart(){
  global $con;

  if(isset($_GET['add_to_cart'])){
      $ip = getIPAddress();  
      $get_course_id = $_GET['add_to_cart'];
      
      $select_query = "SELECT * FROM cart_detail WHERE ip = '$ip' AND course_id = '$get_course_id'";
      $result_query = mysqli_query($con, $select_query);
      $num_of_rows = mysqli_num_rows($result_query);
      
      if($num_of_rows > 0){
          echo "<script>alert('This course is already in the cart')</script>";
          echo "<script>window.open('course.php,'_self')</script>";
      } else {
          $insert_query = "INSERT INTO cart_detail (course_id, ip) VALUES ('$get_course_id', '$ip')";
          $result_query=mysqli_query($con, $insert_query);
          echo "<script>alert('item added to cart')</script>";
          echo "<script>window.open('course.php,'_self')</script>";

      }
  }
}


// cart items number

function cart_item(){
  
  if(isset($_GET['add_to_cart'])){
    global $con;
      $ip = getIPAddress();  
      // $get_course_id = $_GET['add_to_cart'];
      $select_query = "SELECT * FROM cart_detail WHERE ip = '$ip' ";
      $result_query = mysqli_query($con, $select_query);
      $num_of_rows = mysqli_num_rows($result_query);
    }
    else{
      global $con;
      $ip = getIPAddress();  
      $select_query = "SELECT * FROM cart_detail WHERE ip = '$ip'";
      $result_query = mysqli_query($con, $select_query);
      $num_of_rows = mysqli_num_rows($result_query);
      }
      echo $num_of_rows;
  }


  // total cart price

  function total_cart_price(){
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
            $total_price += $course_price;
        }
    }

    echo $total_price;
}

//enroll details
function enroll_details(){
  global $con;
  $name= $_SESSION['name'];
  $get_detail= "SELECT * from users where name = '$name'";
  $result_query= mysqli_query($con, $get_detail);
  while($row_query= mysqli_fetch_array($result_query)){
    $user_id= $row_query['user_id'];
    if(!isset($_GET['edit_account']));
  }

}











    





?>




