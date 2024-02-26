<?php
include 'connection.php';

if(isset($_GET['id'])){
    $id = $_GET['id'];

    // Delete the student record
    $query = "DELETE FROM students WHERE id='$id'";
    $result = mysqli_query($connection, $query);

    if(!$result){
        die("Query failed" .mysqli_error($connection));
    } else{
        header('location:index.php?delete_msg=Student record deleted successfully');
    }
}
?>
