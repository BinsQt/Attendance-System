<?php 
include('connection.php');

if(isset($_GET['schedule_submit'])) {
    date_default_timezone_set("Asia/Manila");
    $time_in = $_GET['timein'];
    $time_out = $_GET['timeout'];
    $date = $_GET['date'];

    }

    $sql_att = "INSERT INTO schedule (time_in, time_out, date) VALUES 
    ('$time_in', '$time_out', '$date')";

if (mysqli_query($conn,$sql_att)) {
    echo '<script>window.location="/attendance-system/index.php"</script>';
    // echo "success";

} else {
    echo "Error: " . $sql_att . "<br>" . $conn->error;  
}

$conn->close();
?>