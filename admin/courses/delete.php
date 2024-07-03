<?php
require('../config/config.php');

if (isset($_GET['course_id'])) {
    $course_id = $_GET['course_id'];

    // Trim the course_id to remove any extra spaces
    $course_id = trim($course_id);

    // Check if $course_id is a valid integer
    if (!ctype_digit($course_id)) {
        echo "Invalid category ID.";
        exit; // Exit the script
    }

    // Prepare the SQL query
    $query = "DELETE FROM courses WHERE course_id = $course_id";

    // Execute the query
    $result = mysqli_query($con, $query);

    // Check for errors
    if (!$result) {
        // If query execution fails, display an error message
        echo "Error deleting category: " . mysqli_error($con);
        exit; // Exit the script
    }

    // Redirect to index.php with a success message
    header("Location: index.php?delete=success");
    exit; // Exit the script
} else {
    echo "Category ID not provided.";
    exit; // Exit the script
}
?>
