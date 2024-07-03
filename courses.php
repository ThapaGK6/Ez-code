

<?php
// Establishing database connection
include('admin/config/config.php');




// Include header and navbar
require('includes/header.php');
require('includes/navbar.php');

// Include course functions
// include('functions/course_function.php');
// include('functions/common_function.php');

?>


</head>
<body>
<div class="container mt-5">
  <div class="row">
    <div class="col text-center ms-5">
      <h1 class=" t">Course</h1> 
    </div>
    <div class="col">
      <form class="form-inline justify-content-end d-flex" action="search.php" method="get" >
        <input class="form-control w-25" type="text" placeholder=" " name="search_data">
        <!-- <button class="btn btn-primary" type="submit"><img src="https://static-00.iconduck.com/assets.00/search-icon-2048x2048-cmujl7en.png" width="18px" alt=""></button> -->
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
course();
specific_course();
$ip = getIPAddress();  

////calling cart function
cart();



?>





  
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

