<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>testing</title>
</head>
<body>
    <form action="backend\attendace.php" method="get">
        <div>
            <label for="userkey">User Key</label>
            <input type="int" name="user_key">
        </div>
        <div>
            <label for="ifpresent">if present</label>
            <input type="int" name="ifpresent">
        </div>
        <button type="submit" name="attendance_submit">Submit</button>
    </form>
    
</body>
</html>