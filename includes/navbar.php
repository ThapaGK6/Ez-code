<?php
// Include header and navbar
// require('includes/header.php');
// require('includes/navbar.php');

// Include course functions
include('./functions/course_function.php');
include('./functions/common_function.php');
include('users_section/auth_user/session.php');
@session_start();
$user_img = 'user_img'; // Example image file


?>
<style>
  *{
    list-style: none;
  }

    .dropdown-menu {
  border-radius: 4px;
  padding: 10px 0;
  animation-name: dropdown-animate;
  animation-duration: 0.2s;
  animation-fill-mode: both;
  border: 0;
  box-shadow: 0 5px 30px 0 rgba(82, 63, 105, 0.2);
}

.dropdown-menu .dropdown-header,
.dropdown-menu .dropdown-footer {
  text-align: center;
  font-size: 15px;
  padding: 10px 25px;
}

.dropdown-menu .dropdown-footer a {
  color: #444444;
  text-decoration: underline;
}

.dropdown-menu .dropdown-footer a:hover {
  text-decoration: none;
}

.dropdown-menu .dropdown-divider {
  color: #a5c5fe;
  margin: 0;
}

.dropdown-menu .dropdown-item {
  font-size: 14px;
  padding: 10px 15px;
  transition: 0.3s;
}

.dropdown-menu .dropdown-item i {
  margin-right: 10px;
  font-size: 18px;
  line-height: 0;
}

.dropdown-menu .dropdown-item:hover {
  background-color: #f6f9ff;
}

@media (min-width: 768px) {
  .dropdown-menu-arrow::before {
    content: "";
    width: 13px;
    height: 13px;
    background: #fff;
    position: absolute;
    top: -7px;
    right: 20px;
    transform: rotate(45deg);
    border-top: 1px solid #eaedf1;
    border-left: 1px solid #eaedf1;
  }
}

@keyframes dropdown-animate {
  0% {
    opacity: 0;
  }

  100% {
    opacity: 1;
  }

  0% {
    opacity: 0;
  }
}

  
</style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<nav class="navbar navbar-expand-lg navbar-light bg-white">
    <div class="container-fluid">
      <a class="navbar-brand" href="./index.php"><img src="assests/image/logo1.png" height="50px" alt=""></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-center" id="navbarSupportedContent">
        <ul class="navbar-nav mx-auto"> <!-- 'mx-auto' class aligns items horizontally center -->
          <li class="nav-item"> 
            <a class="nav-link" href="./index.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="./about.php">About</a>
          </li> 
          <li class="nav-item">
            <a class="nav-link" href="./courses.php">Courses</a>
          </li>
        
          <li class="nav-item">
            <a class="nav-link" href="./contact.php">Contacts</a>
          </li>
          <li class="nav-item ms-5">
    <a class="nav-link" style=" list-style-type: none;" href="./cart.php">  <i class="fa fa-shopping-cart" aria-hidden="true"></i>    <sup><?php cart_item(); ?></sup></a>
</li>

        </ul>
      </div>
      <!-- Search button outside of the collapse div -->
      
      

      <!-- drop down for profile
       
      -->
      <?php if (isset($_SESSION['name'])) { ?>
      <li class="nav-item dropdown pe-3">

<a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">

<?php


$name = $_SESSION['name'];
$user_img_query = "SELECT user_img FROM users WHERE name= '$name'";
$result_img = mysqli_query($con, $user_img_query);

if ($result_img) {
    $row_image = mysqli_fetch_array($result_img);
    if ($row_image) {
        $user_img = $row_image['user_img'];
        echo "<img src='admin/uploads/user_img/" . htmlspecialchars($user_img) . "' height='35px' width='40px' alt='User Image' class='rounded-circle'>";
    }
}
?>





  <span class="d-none d-md-block dropdown-toggle ps-2"><?php echo $_SESSION['name']; ?></span>
</a><!-- End Profile Iamge Icon -->

<ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
  <li class="dropdown-header">
    <h6> <?php  echo "<img src='admin/uploads/user_img/" . htmlspecialchars($user_img) . "' height='35px' width='40px' alt='User Image' class='rounded-circle'>";   ?> <?php echo $_SESSION['name'];  ?> </h6>
  </li>
  <li>
    <hr class="dropdown-divider">
  </li>

  <li>
    <a class="dropdown-item d-flex align-items-center" href="profile.php">
      <i class="bi bi-person"></i>
      <span>My Profile</span>
    </a>
  </li>
  <li>
    <hr class="dropdown-divider">
  </li>

  <li>
    <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
      <i class="bi bi-gear"></i>
      <span>Account Settings</span>
    </a>
  </li>
  <li>
    <hr class="dropdown-divider">
  </li>

 
  <li>
    <hr class="dropdown-divider">
  </li>

  <li>
    <a class="dropdown-item d-flex align-items-center" href="logout.php">
      <i class="bi bi-box-arrow-right"></i>
      <span>Sign Out</span>
    </a>
      </li>
</ul>
    <?php } else { ?>
      <a id="login" href="login.php" class="btn btn-outline-primary ms-3"><i class="fa fa-sign-in"></i> Login</a>
    <?php } ?>
  </div>
      
     



    </div>
  </nav>