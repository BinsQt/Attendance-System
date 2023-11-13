<?php 
include('connection.php');
    //collect students who tapped from hardware
    date_default_timezone_set("Asia/Manila");
    $userkey = $_GET['user_key'];
    $timein = $_GET['timein'];
    $timeout = $_GET['timeout'];
    $date = date("Y-m-d");
    $time = date("H:i A");
   
    $sql_att = "INSERT INTO student_attendance (user_key, timein, date, time, timeout) VALUES 
    ('$userkey', '$timein', '$date', '$time', '$timeout')";

    if (mysqli_query($conn,$sql_att)) {
        //send student to database for lates
        $message = "SELECT * 
        FROM student_data
        LEFT JOIN student_attendance 
        ON student_data.user_key = student_attendance.user_key
        JOIN schedule 
        ON student_attendance.date = schedule.date";
        
        $sendMsg = mysqli_query($conn, $message);

        while($row = mysqli_fetch_assoc($sendMsg)) {
        $user_key = $row["user_key"];
        $user_keys = $_GET["user_key"];
        $contactNumber = $row["contactNumber"];
        $time_in = $row['time_in'];
        $date = $row['date'];
        // $sendMessage = 1;
        if($user_key != $user_keys) {
            $sendMessage = 0;
        }else {
            $sendMessage = 1;
        }
        }

        if($timein < $time_in) {
            $sql_send = "INSERT INTO student_contacts (user_key, recipientNumber, sendMessage) VALUES 
            ('$user_key', '$contactNumber', '$sendMessage')";

        if(mysqli_query($conn,$sql_send)) {
            echo"N";
        } else {
            echo "error";
        }

        } elseif ($timein > $time_in) {

            echo "Late";
        }

    } else {
        echo "Error: " . $sql_att . "<br>" . $conn->error;  
    }

    
?>

<?php
//collect late students from database then send to hardware
$sendselect = "SELECT * FROM student_contacts   ";

$result = mysqli_query($conn, $sendselect);
    while($row = mysqli_fetch_assoc($result)) {
        $user_keys = $row["user_key"];
        $contactNumbers = $row["recipientNumber"];
        $sendMessages = $row["sendMessage"];
    }
    echo "User: $user_keys, Number: $contactNumbers, One: $sendMessages";


?>

