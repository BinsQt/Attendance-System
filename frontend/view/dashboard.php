<?php 
include('frontend\view\navbar.php');
require_once('backend\connection.php');

$select = "SELECT * 
FROM student_data
LEFT JOIN student_attendance 
ON student_data.user_key = student_attendance.user_key
JOIN schedule 
ON student_attendance.date = schedule.date
ORDER BY fullname ASC";

$result = mysqli_query($conn, $select);

?>

<script>
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});

$(document).ready(function(){
  $("#sortDate").on("input", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>

<div class="page">
    <div class="sidebar">
        <div class="side-header">
            <div>
            <div class="icon">
                <img src="frontend\img\—Pngtree—vector edit profile icon_4101351.png" alt="" class="image">
            </div>
            <div>
                <h3>Adviser</h3>
            </div>
            </div>
            <div class="sections">
            <div>
                <h2>Sections</h2>
            </div>
            <div>
                <ul>
                    <li><button class="sec active">Section 1</button></li>
                    <li><button class="sec">Section 2</button></li>
                    <li><button class="sec">Section 3</button></li>
                    <li><button class="sec">Section 4</button></li>
                    <li><button class="sec">Section 5</button></li>
                </ul>
            </div>
            </div>
        </div>
        <div class="sidebar-footer"> 
        <div x-data="{ open: false }">
            <button @click="open = ! open" class="but-settings">Settings</button>
                
            <div x-show="open" @click.outside="open = false" class="settings">
                <h1>Settings</h1>
                <br><br>
                <div>
                    <form class="sched" action="backend\schedule.php" method="get">
                        <h4>Edit Schedule</h4>

                        <div class="date">
                            <label for="date">Date</label>
                            <input type="date" name="date" value="<?php echo date("Y-m-d"); ?>">
                        </div>

                        <div class="ti-to">
                            <div>
                                <label for="timein">Time In</label>
                                <input type="time" name="timein">
                            </div>

                            <div>
                                <label for="timeout">Time In</label>
                                <input type="time" name="timeout">
                            </div>
                        </div>



                        <div>
                            <button type="submit" name="schedule_submit">Set Schedule</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
            <a href="#" class=logout>Logout</a>
        </div>
    </div>
    <div class="content">
        <div class="main">
            <div class="main-header">
            <div>
                <input id="myInput" type="text" class="search" placeholder="Search..">
            </div>
                <div class="crud">

                <div x-data="{ open: false }">
                    <button @click="open = ! open" class="add">Add Student</button>
                
                    <div x-show="open" @click.outside="open = false" class="alpine">
                        <div class="addstudent">
                            <div>
                               <h2>Add Student</h2> 
                            </div>
                            
                            <div>
                            <form action="backend\addstudent.php" method="post">
                                <div class="blocks">
                                <div class="section">
                                    <label for="lname">Last Name</label>
                                    <input type="text" name="lname" id="">
                                </div>

                                <div class="section">
                                    <label for="fname">First Name</label>
                                    <input type="text" name="fname" id="">
                                </div>

                                <div class="section">
                                    <label for="mname">Middle Name</label>
                                    <input type="text" name="mname" id="">
                                </div>
                                </div>

                                <div class="section">
                                    <label for="address">Address</label>
                                    <input type="text" name="address" id="">
                                </div>

                                <div class="blocks">
                                <div class="section">
                                    <label for="section">Section</label>
                                    <select name="section" id="section">
                                        <option value="0"> </option>
                                        <option value="1">Section 1 </option>
                                        <option value="2">Section 2 </option>
                                        <option value="3">Section 3 </option>                                    
                                    </select>
                                </div>

                                <div class="section">
                                    <label for="grade">Grade</label>
                                    <select name="grade" id="grade">
                                        <option value="0"></option>
                                        <option value="1">Grade 1</option>
                                        <option value="2">Grade 2</option>
                                        <option value="3">Grade 3</option>
                                        <option value="4">Grade 4</option>
                                        <option value="5">Grade 5</option>
                                        <option value="6">Grade 6</option>
                                        <option value="7">Grade 7</option>
                                        <option value="8">Grade 8</option>
                                        <option value="9">Grade 9</option>
                                        <option value="10">Grade 10</option>
                                        <option value="11">Grade 11</option>
                                        <option value="12">Grade 12</option>

                                    </select>
                                </div>

                                <div class="section">
                                    <label for="sex">Sex</label>
                                    <select name="sex" id="sex">
                                        <option value="0"> </option>
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                    </select>
                                </div>

                                </div>

                                <div class="blocks">
                               <div class="section">
                                    <label for="birthday">Date of Birth</label>
                                    <input type="date" name="birthday" id="">
                                </div>

                                <div class="section">
                                    <label for="user_key">User Key</label>
                                    <input type="text" name="user_key" id="user_key">
                                </div>

                                <div class="section">
                                    <label for="contactNumber">Contact Number</label>
                                    <input type="text" name="contactNumber" id="contactNumber">
                                </div>
                                </div>
 
                                <div class="section">
                                    <input type="submit" name="submit" value="Submit" class="submit-b"> 
                                </div>
                                
                            </form>

                            </div>

                        
                        </div>
                    </div>
                </div>

                <div x-data="{ open: false }">
                    <button @click="open = ! open" class="edit">Edit Student</button>
                
                    <div x-show="open" @click.outside="open = false" class="alpine">Contents...</div>
                </div>

                <div x-data="{ open: false }">
                    <button @click="open = ! open" class="delete">Delete Student</button>
                
                    <div x-show="open" @click.outside="open = false" class="alpine">Contents...</div>
                </div>

                </div>
                
            </div>
            <div class="tbl">
                <div class="table-title">
                    <h1>Section 1</h1>
                    <div class="sortDate">
                        <h3>date: </h3>
                        <input type="date" name="sortDate" id="sortDate">
                    </div>
                    <div x-data="{ open: false }">
                        <span>Sort:</span>

                        <button @click="open = ! open">Sort By:</button>
                    
                        <div x-show="open" @click.outside="open = false" class="alpines">
                        <button>time in</button>
                        </div>
                    </div>
                </div>
                
                <table id="student-tb">
                    <thead>
                    <tr>
                        <th>Last Name</th>
                        <th>First Name</th>
                        <th>Middle Name</th>
                        <th>Attendance</th>
                        <th>user_key</th>
                        <th>Date</th>
                        <th>Time In</th>
                        <th>Time Out</th>
                        <th>Late</th>
                        <th>View</th>	
                    </tr>
                    </thead>
                    
                    <tbody id="myTable"> 
                        <tr>
                        <?php 
                            while($row = mysqli_fetch_assoc($result)) {
                                $user_key = $row["user_key"];
                                $name = $row["fullname"];
                                $date = $row['date'];
                                $time = $row['time'];
                                $timein = $row['timein'];
                                $timeout = $row['timeout'];
                                $time_in = $row['time_in'];
                                $time_out = $row['time_out'];
                                $section = $row["section"];
                                $grade = $row["grade"];
                                $address = $row["address"];
                                $sex = $row["sex"];
                                $birthday = $row["dateofbirth"];
                                $contactNumber = $row["contactNumber"];


                        ?>
                        <td>
                        <?php 
                            // lastname
                            $name_parts = explode(" ", $name);

                            $lastname = array_slice($name_parts, 0)[0];

                            echo $lastname

                        ?>
                        </td>

                        <td>
                        <?php 
                            //firstname
                            $name_parts = explode(" ", $name);
                            $firstname = array_slice($name_parts, 2);
                            foreach ($firstname as $fname){
                                echo $fname . " ";
                            }          
                        ?>          
                        </td>

                        <td>
                        <?php   
                            //middlename
                            $name_parts = explode(" ", $name);
                            $middlename = array_slice($name_parts, 1)[0];

                            echo $middlename;
                        ?>  
                        </td>

                        <td>
                        <?php      
                            //attendance
                            if ($time >= $timeout && $date) {
                                echo "Absent"; 
                            } elseif ($attendance = 1) {
                                echo "Present";

                                
                            } else {
                                echo"*";
                            }
                        ?>  
                        </td>

                        <td>
                        <?php   
                            echo $user_key
                        ?>  
                        </td>

                        <td>
                        <?php   
                            echo $date
                        ?>  
                        </td>
                            
                        <td>
                        <?php   
                            // echo $timein
                            if ($timein = 1) {
                                echo $time;
                            }
                        ?>  
                        </td>

                        <td>
                        <?php   
                            // echo $timeout
                           
                            if ($timeout = 1) {
                                echo $time;
                            }
                        ?>  
                        </td>

                        <td>
                        <?php   
                            if($time > $time_in) { 
                                echo "Late";
                            } 
                        ?>  
                        </td>

                        <td>
                            <button>View</button>
                        </td>


                    </tr> 
                    
    
                        <?php 
                            }
                        ?>
                    </tbody>
                    
                </table>

            </div>
        </div>
        <div class="footer">
            <div class="yearly-avg">

            </div>
            <div class="monthly-avg">

            </div>
            <div class="weekly-avg">
                
            </div>
        </div>
    </div>
</div>


</body>
</html>