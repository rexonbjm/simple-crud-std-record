<?php
include 'connection.php';

if(isset($_GET['id'])){
    $id = $_GET['id'];
    
    // Fetch the student record based on the provided ID
    $query = "SELECT * FROM students WHERE id = '$id'";
    $result = mysqli_query($connection, $query);
    
    if(mysqli_num_rows($result) == 1){
        $row = mysqli_fetch_assoc($result);
        $fname = $row['first_name'];
        $lname = $row['last_name'];
        $grade = $row['grade'];
    }
}

if(isset($_POST['edit_student'])){
    $id = $_POST['id'];
    $fname = $_POST['first_name'];
    $lname = $_POST['last_name'];
    $grade = $_POST['grade'];

    // Update the student record
    $query = "UPDATE students SET first_name='$fname', last_name='$lname', grade='$grade' WHERE id='$id'";
    $result = mysqli_query($connection, $query);

    if(!$result){
        die("Query failed" .mysqli_error($connection));
    } else{
        header('location:index.php?edit_msg=Student record updated successfully');
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Student Information</title>
    <link rel="stylesheet" href="editpage.css">
</head>
<body>
    <div class="container">
        <div class="box1">
            <h2>Edit Student Information</h2>
        </div>
        <form action="edit.php" method="post">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <div class="form-group">
                <label for="first_name">First Name:</label>
                <input type="text" id="first_name" name="first_name" value="<?php echo $fname; ?>">
            </div>
            <div class="form-group">
                <label for="last_name">Last Name:</label>
                <input type="text" id="last_name" name="last_name" value="<?php echo $lname; ?>" required>
            </div>
            <div class="form-group">
                <label for="grade">Grade:</label>
                <input type="text" id="grade" name="grade" value="<?php echo $grade; ?>" required> 
            </div>
            <input type="submit" class="submit-btn" name="edit_student" value="Update">
        </form>
    </div>
</body>
</html>

