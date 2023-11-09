<?php 
include('connection.php');
?>

<?php
if(isset($_POST['submit'])) {
$name = $_POST['lname'] . " " . $_POST['mname'] . " " . $_POST['fname'];
$section = $_POST['section'];
$grade = $_POST['grade'];
$address = $_POST['address'];
$sex = $_POST['sex'];  
$birthday = $_POST['birthday'];  
$user_key = $_POST['user_key']; 
$contactNumber = $_POST['contactNumber'];
}


$sql = "INSERT INTO student_data (fullname, section, grade, address, sex, dateofbirth, user_key, contactNumber) VALUES 
('$name', '$section', '$grade', '$address', '$sex', '$birthday', '$user_key', '$contactNumber')";

if (mysqli_query($conn,$sql)) {
    echo '<script>window.location="/attendance-system/index.php"</script>';

} else {
    echo "Error: " . $sql . "<br>" . $conn->error;  
}

$conn->close();
?>