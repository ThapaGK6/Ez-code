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
?>

</head>
<body>
<div class="container mt-5">
  <div class="row">
    <div class="col text-center ms-5">
      <h1 class="text-center">Course</h1>
    </div>
    <div class="col">
      <form class="form-inline justify-content-end d-flex " action="" method="get" >
        <input class="form-control w-25" type="text" placeholder="" name="search_data">
       
       <input type="submit" value="search" class="btn" name="search_data_course">
      </form>
    </div>
  </div>
</div>

<div class="container mt-5">
  <div class="row">
    <!-- Sidebar -->
    <div class="col-md-3 sidebar ">
      <h3 class="">Category</h3>

<!-- Dynamic data
   Category sidebar calling using functioin
-->
<?php
category();
?>
    </div>

    <!-- Main Content -->


    <div class="col-md">
      <div class="row">

<!-- fetching products
with function -->
<?php
search_course();
course();
specific_course();
?>





  
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

