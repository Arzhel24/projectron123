<?php
    //start session
    session_start();
    if(!isset($_SESSION['username']) || $_SESSION['role'] != 'client')
    {
        header("Location: index.php");
        exit();
    }

    
    include('db/connection.php');

    if(isset($_GET['ID'])) {
        // Get ID value
        $client_id = $_GET['ID'];

        // Fetch the current client data
        $sql = "SELECT * FROM users WHERE ID = '$client_id'";
        $result = $conn->query($sql);

        // Check if the client exists
        if($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $grade1 = $row['grade1'];
            $grade2 = $row['grade2'];
            $grade3 = $row['grade3'];
            $grade4 = $row['grade4'];
            $grade5 = $row['grade5'];
            $grade6 = $row['grade6'];
            $grade7 = $row['grade7'];
            
            
        }
         }
        
   
?>
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Management System</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }
        .container {
            max-width: 800px;
            margin: auto;
            background: white;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        h1 {
            color: #003366; /* Dark blue */
            text-align: center;
        }
        h2 {
            color: #005bb5; /* Blue */
            margin-top: 20px;
        }
        p {
            text-align: right;
        }
        a.logout-link {
            color: #005bb5; /* Blue */
            text-decoration: none;
            font-weight: bold;
        }
        a.logout-link:hover {
            text-decoration: underline;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #e6f0ff; /* Light blue */
            color: #003366; /* Dark blue */
        }
        button {
            background-color: #005bb5; /* Blue */
            color: white;
            border: none;
            padding: 10px 15px;
            border-radius: 5px;
            cursor: pointer;
        }
        button:hover {
            background-color: #004494; /* Darker blue */
        }
    </style>
</head>
<body>

    <div class="container">
        <h1>Student Management System</h1>
        <p><a href="logout.php" class="logout-link">Logout</a></p>

        <!-- Student Profile Section -->
        <section id="studentProfile">
        <?php
    echo"Welcome Student ".$_SESSION['username'];
    
    ?>
        </section>

        <!-- Course Enrollment Overview -->
        <section id="courseEnrollment">
            <h2>Enrolled Courses</h2>
            <table>
                <thead>
                    <tr>
                        <th>Course Name</th>
                        <th>Instructor</th>
                        <th>Credits</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>INFO MANAGEMENT</td>
                        <td>Prof. Jomar Sangil</td>
                        <td>3</td>
                    </tr>
                    <tr>
                        <td>BPO</td>
                        <td>Prof. Ross Ramirez</td>
                        <td>3</td>
                    </tr>
                    <tr>
                        <td>DSA</td>
                        <td>Prof. Mark Verzon</td>
                        <td>3</td>
                    </tr>
                    <tr>
                        <td>INTRODUCTION TO COMPUTING</td>
                        <td>Prof. Jomar Sangil</td>
                        <td>3</td>
                    </tr>
                    <tr>
                        <td>RIZAL</td>
                        <td>Prof. Ralph Paras</td>
                        <td>3</td>
                    </tr>
                    <tr>
                        <td>PATH FIT</td>
                        <td>Prof. Kim Lorenz</td>
                        <td>3</td>
                    </tr>
                    <tr>
                        <td>IT ETHICS</td>
                        <td>Prof. Jhuerome Bacani</td>
                        <td>3</td>
                    </tr>
                </tbody>
            </table>
        </section>

        <!-- Grades Overview -->
        <section id="gradesPerformance">
            <h2>Grades</h2>
            <table>
                <thead>
                    <tr>
                        <th>Course Name</th>
                        <th>Grade</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>IT ETHICS</td>
                        <td> <?= $row['grade1'] ?></td>
                        
                    </tr>
                    <tr>
                        <td>RIZAL</td>
                        <td><?= $row['grade2'] ?></td>
                    </tr>
                    <tr>
                        <td>INFO MANAGEMENT</td>
                        <td><?= $row['grade3'] ?></td>
                    </tr>
                    <tr>
                        <td>PATH FIT</td>
                        <td><?= $row['grade4'] ?></td>
                    </tr>
                    <tr>
                        <td>INTRODUCTION TO COMPUTING</td>
                        <td><?= $row['grade5'] ?></td>
                    </tr>
                    <tr>
                        <td>DSA</td>
                        <td><?= $row['grade6'] ?></td>
                    </tr>
                    <tr>
                        <td>BPO</td>
                        <td><?= $row['grade7'] ?></td>
                    </tr>
                </tbody>
            </table>
        </section>

        <!-- Attendance Record -->
        <section id="attendanceRecord">
            <h2>Attendance Record</h2>
            <table>
                <thead>
                    <tr>
                        <th>Course Name</th>
                        <th>Attendance</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>PATH FIT</td>
                        <td>95%</td>
                    </tr>
                    <tr>
                        <td>RIZAL</td>
                        <td>90%</td>
                    </tr>
                    <tr>
                        <td>IT ETHICS</td>
                        <td>95%</td>
                    </tr>
                    <tr>
                        <td>INFO MANAGEMENT</td>
                        <td>95%</td>
                    </tr>
                    <tr>
                        <td>DSA</td>
                        <td>95%</td>
                    </tr>
                    <tr>
                        <td>BPO</td>
                        <td>95%</td>
                    </tr>
                    <tr>
                        <td>INTRODUCTION TO COMPUTING</td>
                        <td>95%</td>
                    </tr>
                </tbody>
            </table>
        </section>

        <!-- Assignments Overview -->
        <section id="assignments">
            <h2>Assignments</h2>
            <table>
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Due Date</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>PATH FIT</td>
                        <td>2024-11-10</td>
                        <td>Completed</td>
                    </tr>
                    <tr>
                        <td>RIZAL</td>
                        <td>2024-11-15</td>
                        <td>Pending</td>
                    </tr>
                    <tr>
                        <td>INFO MANAGEMENT</td>
                        <td>2024-11-15</td>
                        <td>Pending</td>
                    </tr>
                    <tr>
                        <td>INTRODUCTION TO COMPUTING</td>
                        <td>2024-11-15</td>
                        <td>Pending</td>
                    </tr>
                    <tr>
                        <td>DSA</td>
                        <td>2024-11-15</td>
                        <td>Pending</td>
                    </tr>
                    <tr>
                        <td>BPO</td>
                        <td>2024-11-15</td>
                        <td>Pending</td>
                    </tr>
                    <tr>
                        <td>IT ETHICS</td>
                        <td>2024-11-15</td>
                        <td>Pending</td>
                    </tr>
                </tbody>
            </table>
        </section>
    </div>
</body>
</html>
