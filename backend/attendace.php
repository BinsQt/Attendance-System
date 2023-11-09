<?php 
include('connection.php');

// if(isset($_GET['attendance_submit'])) {
//     date_default_timezone_set("Asia/Manila");
//     $userkey = $_GET['user_key'];
//     $timein = $_GET['timein'];
//     $timeout = $_GET['timeout'];
//     $date = date("Y-m-d");
//     $time = date("H:i A");
//     }

    date_default_timezone_set("Asia/Manila");
    $userkey = $_GET['user_key'];
    $timein = $_GET['timein'];
    $timeout = $_GET['timeout'];
    $date = date("Y-m-d");
    $time = date("H:i A");

    $sql_att = "INSERT INTO student_attendance (user_key, timein, date, time, timeout) VALUES 
    ('$userkey', '$timein', '$date', '$time', '$timeout')";

if (mysqli_query($conn,$sql_att)) {
    echo "success";
} else {
    echo "Error: " . $sql_att . "<br>" . $conn->error;  
}


?>

<?php

$sqlselect = "SELECT * FROM student_contacts";

$result = mysqli_query($conn, $sqlselect);

if ($timein > $time_in && $date) {
  
    while($row = mysqli_fetch_assoc($result)) {
        $user_key = $row["user_key"];
        $contactNumber = $row["recipientNumber"];
        $sendMessage = $row["sendMessage"];
    }
    echo "User: $user_key, Number: $contactNumber, One: $sendMessage";
}



$conn->close();
?>

