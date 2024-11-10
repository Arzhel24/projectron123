<?php
    // Start session
    session_start();

    if(!isset($_SESSION['username']) || $_SESSION['role'] != 'admin') {
        header("Location: index.php");
        exit();
    }

    // Include connection string
    include('db/connection.php');

    // Create variable that will store search value
    $search_query = '';

    // Check if search query is submitted
    if(isset($_GET['search'])) {
        $search_query = $conn->real_escape_string($_GET['search']);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
            color: #495057;
        }
        .container {
            margin-top: 50px;
        }
        .logout-link {
            color: #005bb5;
            text-decoration: none;
            font-weight: bold;
        }
        .logout-link:hover {
            color: #c82333;
            text-decoration: underline;
        }
        .table-container {
            margin-top: 30px;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.1);
        }
        .table thead th {
            background-color: #007bff;
            color: white;
            text-align: center;
            border-top: 2px solid #0056b3;
        }
        .table tbody tr {
            text-align: center;
            border-bottom: 1px solid #ddd;
        }
        .table tbody tr:hover {
            background-color: #f1f1f1;
            cursor: pointer;
        }
        .search-container {
            margin-top: 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .search-container input, .search-container select {
            margin-right: 10px;
            border-radius: 5px;
            border: 1px solid #ced4da;
            padding: 10px;
            font-size: 1rem;
        }
        .search-container button {
            background-color: #007bff;
            border: none;
            color: white;
            font-weight: bold;
            padding: 10px 20px;
            border-radius: 5px;
            font-size: 1rem;
            transition: background-color 0.3s ease;
        }
        .search-container button:hover {
            background-color: #0056b3;
        }
        .btn-primary {
            background-color: #007bff;
            border: none;
            font-weight: bold;
        }
        .btn-primary:hover {
            background-color: #0056b3;
        }
        .action-links a {
            color: #007bff;
            text-decoration: none;
        }
        .action-links a:hover {
            text-decoration: underline;
        }
        .no-data-message {
            font-size: 1.2rem;
            font-weight: bold;
            color: #6c757d;
        }
        .card-header {
            background-color: #007bff;
            color: white;
            font-weight: bold;
            font-size: 1.2rem;
            border-radius: 5px;
            padding: 15px;
            text-align: center;
        }
        .table-responsive {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2 class="text-center">Admin Dashboard</h2>
        <p class="text-center">Welcome, Admin <?php echo $_SESSION['username']; ?> <a href="logout.php" class="logout-link float-right">Logout</a></p>
        
        <!-- Search Form -->
        <div class="search-container">
            <form action="" method="get" class="form-inline">
                <input type="text" name="search" class="form-control" placeholder="Search by username" value="<?php echo $search_query; ?>">
                <select name="search_field" class="form-control">
                    <option value="username">Username</option>
                    <option value="firstname">Firstname</option>
                    <option value="lastname">Lastname</option>
                </select>
                <button type="submit" class="btn btn-primary">Search</button>
            </form>
        </div>

        <!-- Table for displaying users -->
        <div class="table-container">
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Username</th>
                            <th>Firstname</th>
                            <th>Lastname</th>
                            <th>Role</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // Modify SQL query based on search input
                        if (!empty($search_query)) {
                            $search = $_GET['search'];
                            $search_field = $_GET['search_field'];
                            $sql = "SELECT * FROM users WHERE role='client' AND $search_field LIKE '%$search%'";
                        } else {
                            $sql = "SELECT * FROM users WHERE role='client'";
                        }

                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                            $count = 1;
                            while ($row = $result->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td>$count</td>";
                                echo "<td>" . htmlspecialchars($row['username']) . "</td>";
                                echo "<td>" . htmlspecialchars($row['firstname']) . "</td>";
                                echo "<td>" . htmlspecialchars($row['lastname']) . "</td>";
                                echo "<td>" . htmlspecialchars($row['role']) . "</td>";
                                echo "<td>" . htmlspecialchars($row['grade1']) . "</td>";
                                echo "<td>" . htmlspecialchars($row['grade2']) . "</td>";
                                echo "<td class='action-links'>";
                                echo "<a href='edit_client.php?ID=" . $row['ID'] . "'>Edit</a> | ";
                                echo "<a href='delete_client.php?ID=" . $row['ID'] . "' onclick='return confirm(\"Are you sure you want to delete this client?\");'>Delete</a>";
                                echo "</td>";
                                echo "</tr>";
                                $count++;
                            }
                        } else {
                            echo "<tr><td colspan='6' class='text-center no-data-message'>No clients found</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
</body>
</html>
