<?php 
require('../config/config.php');
require('../includes/header.php');
require('../includes/navbar.php');
require('../includes/sidebar.php');
?>

<main id="main" class="main">
    <?php
    if (isset($_GET['delete'])) {
    ?>
        <div class="container alert alert-success alert-dismissible fade show" role="alert">
            <strong>Category is Deleted!</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php
    }
    ?>

    <div class="pagetitle">
        <h1>Manage category</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item">Courses</li>
                <li class="breadcrumb-item active">Manage Courses</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Manage Courses</h5>
                        <a class="btn btn-primary btn-sm" href="create.php" role="button">Add Courses</a>

                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Course</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $select = 'SELECT * FROM courses';
                                $result = mysqli_query($con, $select);
                                $i = 1;
                                while ($data = $result->fetch_assoc()) {
                                ?>
                                    <tr>
                                        <td><?php echo $i++; ?></td>
                                        <td><?php echo htmlspecialchars($data['course_name']); ?></td>
                                        <td>
                                            <a class="btn btn-primary btn-sm" href="edit.php?course_id=<?php echo $data['course_id']; ?>" role="button">Edit</a>
                                            <a class="btn btn-danger btn-sm" onclick="return confirm('Do you want to delete this category?');" href="delete.php?course_id=<?php echo $data['course_id']; ?>">Delete</a>
                                        </td>
                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main><!-- End #main -->
<?php require('../includes/footer.php'); ?>
