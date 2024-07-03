<?php
require('../config/config.php');

if (isset($_GET['category_id'])) {
    $category_id = $_GET['category_id'];

    // Trim the category_id to remove any extra spaces
    $category_id = trim($category_id);

    // Check if $category_id is a valid integer
    if (!ctype_digit($category_id)) {
        echo "Invalid category ID.";
        exit; // Exit the script
    }

    // Prepare the SQL query
    $query = "DELETE FROM category WHERE category_id = $category_id";

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
