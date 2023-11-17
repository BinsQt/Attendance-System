<?php
include('connection.php');

$del_stu= "DELETE FROM student_data";

if (mysqli_query($conn, $del_stu)) {
    echo '<script>alert("Successfully Deleted!"); window.location="/attendance-system/index.php"</script>';
} else {
    echo "Error deleting record: " . mysqli_error($conn);
  }


  mysqli_close($conn);
?>