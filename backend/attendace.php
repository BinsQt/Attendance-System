<?php
include('connection.php');
date_default_timezone_set("Asia/Manila");
$userkey = $_GET['user_key'];
$timein = $_GET['timein'];
$timeout = $_GET['timeout'];
$date = date("Y-m-d");
$time = date("h:i A");
$twentyfour = date("H:i");

$attendance = ($timein == 1) ? "Present" : "Absent";

$absent = "SELECT * FROM schedule";
$absent_ = mysqli_query($conn, $absent);
while($row = mysqli_fetch_assoc($absent_)) {
    $time_out = $row["time_out"];
    if ($twentyfour > $time_out) {
        $attendance = "Absent";
    }
}

$sql_att = "INSERT INTO student_attendance (user_key, timein, date, time, timeout, twentyfour) VALUES 
('$userkey', '$attendance', '$date', '$time', '$timeout', '$twentyfour')";

if (mysqli_query($conn,$sql_att)) {
    $message = "SELECT * 
    FROM student_data
    LEFT JOIN student_attendance 
    ON student_data.user_key = student_attendance.user_key
    LEFT JOIN schedule 
    ON student_attendance.date = schedule.date";
    
    $sendMsg = mysqli_query($conn, $message);

    while($row = mysqli_fetch_assoc($sendMsg)) {
        $user_key = $row["user_key"];
        $name = $row["fullname"];
        $user_keys = $_GET["user_key"];
        $timeIn_ = date("h:i A");
        $contactNumber = $row["contactNumber"];
        $time_in = $row['time_in'];
        $date = $row['date'];
        $twentyfour = $row['twentyfour'];

        $sendMessage = ($user_key != $user_keys) ? 0 : 1;

        if($twentyfour > $time_in) {
            echo"Late";
            $sql_send = "INSERT INTO student_contacts (user_key, recipientNumber, sendMessage, name, timeIn) VALUES 
            ('$user_key', '$contactNumber', '$sendMessage', '$name', '$timeIn_')";

            if(mysqli_query($conn,$sql_send)) {
                echo"Late";
            } else {
                echo "error";
            }

        } elseif ($time < $time_in) {
            echo "Not Late";
        }
    }
} else {
    echo "Error: " . $sql_att . "<br>" . $conn->error;  
}
?>


<?php
//collect late students from database then send to hardware
$sendselect = "SELECT * FROM student_contacts";

$result = mysqli_query($conn, $sendselect);
    while($row = mysqli_fetch_assoc($result)) {
        $user_keys = $row["user_key"];
        $contactNumbers = $row["recipientNumber"];
        $sendMessages = $row["sendMessage"];
        $names = $row["name"];
        $timeIn = $row["timeIn"];
    }
    echo "User: $user_keys, Number: $contactNumbers, One: $sendMessages, FullName: $names, TimeIn: $timeIn";


?>

