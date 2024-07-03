<?php
require('../includes/header.php');
require('../includes/navbar.php');
require('../includes/sidebar.php');

if (isset($_POST['submit'])) {
    $course_name = $_POST['course_name'];
    $course_desc = $_POST['course_desc'];
    $category_id = $_POST['category'];
    $course_img = $_FILES['course_img']['name'];
    $tmp_img = $_FILES['course_img']['tmp_name'];
    $price = $_POST['Price'];

    if ($course_name == "" or $course_desc == "" or $category_id == "" or $course_img == "" or $price == "") {
        echo "<script>alert('Fill all the form')</script>";
        exit();
    } else {
        move_uploaded_file($tmp_img, "../uploads/course_img/$course_img");

        // Establish database connection and insert data
        // $con should be defined here
        $insert_courses = "INSERT INTO courses (course_name, course_desc, category_id, course_img, price)
                     VALUES ('$course_name','$course_desc','$category_id','$course_img','$price')";
        $result_query = mysqli_query($con, $insert_courses);
    }
}
?>

<main id="main" class="main">
    <div class="pagetitle">
        <h1>Create Users</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item">Users</li>
                <li class="breadcrumb-item active">Create Courses</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Create Courses</h5>
                        <!-- Multi Columns Form -->
                        <form class="row g-3" action="" method="POST" enctype="multipart/form-data">
                            <div class="col-md-6">
                                <label for="inputEmail5" class="form-label">Course Name</label>
                                <input type="text" class="form-control" name="course_name" id="inputEmail5">
                            </div>
                            <div class="col-md-6">
                                <label for="inputPassword5" class="form-label">Course Description</label>
                                <input type="text" class="form-control" name="course_desc" id="inputPassword5">
                            </div>
                            <div class="col-md-6">
                                <label for="inputPassword5" class="form-label">Course category</label>
                                <br>
                                <select name="category" id="" class="form-select">
                                    <?php
                                    $select_query = "SELECT * FROM category";
                                    $result_query = mysqli_query($con, $select_query);
                                    while ($row = mysqli_fetch_assoc($result_query)) {
                                        $category_name = $row['category_name'];
                                        $category_id = $row['category_id'];
                                        echo "<option value='$category_id'>$category_name</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="inputEmail5" class="form-label">Thumbnail</label>
                                <input type="file" class="form-control" name="course_img" id="inputEmail5">
                            </div>
                            <div class="col-md-6">
                                <label for="inputEmail5" class="form-label">Course Price</label>
                                <input type="text" class="form-control" name="Price" id="priceInput">
                            </div>
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
