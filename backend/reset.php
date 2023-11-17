<?php
include('connection.php');

$reset = "DELETE FROM schedule";

if (mysqli_query($conn, $reset)) {
    echo '<script>alert("Successfully Deleted!"); window.location="/attendance-system/index.php"</script>';
} else {
    echo "Error deleting record: " . mysqli_error($conn);
  }

  $reset1 = "DELETE FROM student_contacts";

if (mysqli_query($conn, $reset1)) {
    echo '<script>alert("Successfully Deleted!"); window.location="/attendance-system/index.php"</script>';
} else {
    echo "Error deleting record: " . mysqli_error($conn);
  }
  $reset2 = "DELETE FROM student_attendance";

if (mysqli_query($conn, $reset2)) {
    echo '<script>alert("Successfully Deleted!"); window.location="/attendance-system/index.php"</script>';
} else {
    echo "Error deleting record: " . mysqli_error($conn);
  }

  mysqli_close($conn);
?>