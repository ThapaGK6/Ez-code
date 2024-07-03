
<?php

require('../config/config.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $data = "DELETE FROM users where user_id='$id'";
    $data_result = mysqli_query($con, $data);

    header("Refresh:0; URL=manage.php?delete");
}

?>