<?php 
include('backend/connection.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Attendance System</title>
    <link rel="stylesheet" href="frontend\css\style.css">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="frontend\js\app.js"></script>

    <style>
        .top {
            background-color: #ddb591;
            display: flex;
            justify-content: center;
            height: 4vw;
            width: 100%;
            align-items: center;
        }

        h1 {
            color: black;
        }
    </style>
</head>
<body>
<div class="top">
    <h1>Student Attendance System</h1>
</div>