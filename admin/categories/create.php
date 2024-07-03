<?php require('../includes/header.php'); ?>

<?php require('../includes/navbar.php'); ?>

<?php require('../includes/sidebar.php'); ?>

<main id="main" class="main">

  <div class="pagetitle">
    <h1>Create Category</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
        <li class="breadcrumb-item">categories</li>
        <li class="breadcrumb-item active">Create caregory</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->
  
  <section class="section">
    <div class="row">
      <div class="col-lg-12">


        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Create Category</h5>

            
<?php

if (isset($_POST['submit'])) {
  $category_name = $_POST['category_name'];

//   select data from database
$select_query = "SELECT * FROM category WHERE category_name = '$category_name'";
$result_select = mysqli_query($con, $select_query);
$number = mysqli_num_rows($result_select);
if ($number > 0) {
    echo "<script> alert('Category already exists')</script>";
} else {
    // Proceed with other actions if the category doesn't exist
}



  if ($category_name !="") {
    $insert = "INSERT INTO category(category_name) VALUES('$category_name')";
    $result = mysqli_query($con, $insert);

    if ($result) {
?>
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>category is added</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    <?php
      // header("Refresh:2; URL=index.php?success");
      echo "<meta http-equiv=\"refresh\" content=\"2;URL=index.php\">";
    } else {
    ?>
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>category is not created</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
<?php
    
    }
  } else {

   
  }
}

?>



            <!-- Multi Columns Form -->
            <form class="row g-3" action="" method="POST" enctype="multipart/form-data">
              <div class="col-md-6">
                <label for="inputName5" class="form-label">Category</label>
                <input type="text" class="form-control" name="category_name" id="inputName5">
              </div>
             
              <!-- <div class="col-md-6">
                  <label for="inputAddress5" class="form-label">Address</label>
                  <input type="text" class="form-control" id="inputAddres5s" placeholder="1234 Main St">
                </div> -->
              <div class="col-md-12">
                <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                <button type="reset" class="btn btn-secondary">Reset</button>
              </div>
            </form><!-- End Multi Columns Form -->

          </div>
        </div>

      </div>
    </div>
  </section>

</main><!-- End #main -->

<?php require('../includes/footer.php'); ?>