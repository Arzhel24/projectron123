<?php
    // Start Session
    session_start();

    if(!isset($_SESSION['username']) || $_SESSION['role'] != 'admin') {
        header("Location: index.php");
        exit();
    }

    // Include database connection file
    include('db/connection.php');

    // Check if client ID is provided in the URL
    if(isset($_GET['ID'])) {
        // Get ID value
        $client_id = $_GET['ID'];

        // Fetch the current client data
        $sql = "SELECT * FROM users WHERE ID = '$client_id'";
        $result = $conn->query($sql);

        // Check if the client exists
        if($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $firstname = $row['firstname'];
            $lastname = $row['lastname'];
            $role = $row['role'];
            
        }
    } else {
        // No client ID, redirect to Admin Dashboard
        header("Location: admin_dashboard.php");
    }
    $grade1 = '';
    $grade2 = '';
    $grade3 = '';
    $grade4 = '';
    $grade5 = '';
    $grade6 = '';
    $grade7 = '';


    // UPDATE FUNCTION
    // Check if update button is triggered
    if(isset($_POST['update'])) {
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $role = $_POST['role'];
        $grade1 = $_POST['grade1'];
        $grade2 = $_POST['grade2'];
        $grade3 = $_POST['grade3'];
        $grade4 = $_POST['grade4'];
        $grade5 = $_POST['grade5'];
        $grade6 = $_POST['grade6'];
        $grade7 = $_POST['grade7'];

        // Update the user data in the database
        $update_sql = "UPDATE users SET firstname = '$firstname', lastname = '$lastname', role = '$role', grade1 = '$grade1', grade2 = '$grade2', grade3 = '$grade3', grade4 = '$grade4', grade5 = '$grade5', grade6 = '$grade6', grade7 = '$grade7' WHERE ID = $client_id";

        if($conn->query($update_sql) === TRUE) {
            $message = "Client updated successfully!";
            $message_class = "alert-success";
        } else {
            $message = "Error Updating Client Data: " . $conn->error;
            $message_class = "alert-danger";
        }
    }


    // DELETE FUNCTION (Assuming you want to add a delete button for this client)
    if(isset($_POST['delete'])) {
        // Delete the client from the database
        $delete_sql = "DELETE FROM users WHERE ID = $client_id";

        if($conn->query($delete_sql) === TRUE) {
            $message = "Client deleted successfully!";
            $message_class = "alert-success";
            header("Location: admin_dashboard.php"); // Redirect to dashboard after deletion
            exit();
        } else {
            $message = "Error Deleting Client: " . $conn->error;
            $message_class = "alert-danger";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Client</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #e9ecef;
            font-family: 'Arial', sans-serif;
            color: #495057;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .form-container {
            width: 100%;
            max-width: 600px;
            padding: 40px;
            background-color: #ffffff;
            border-radius: 15px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }

        .form-header {
            margin-bottom: 25px;
            background-color: #007bff;
            color: white;
            padding: 15px;
            text-align: center;
            font-size: 1.6rem;
            font-weight: bold;
            border-radius: 10px;
        }

        .form-group label {
            font-size: 1.1rem;
            font-weight: 600;
            color: #343a40;
        }

        .form-control {
            border: 1px solid #ced4da;
            border-radius: 5px;
            padding: 12px;
            font-size: 1rem;
            transition: border-color 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
        }

        .form-control:focus {
            border-color: #007bff;
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
        }

        .btn-primary {
            margin-top: 10px;
            background-color: #007bff;
            border: 1px solid #007bff;
            padding: 14px;
            font-size: 1.1rem;
            font-weight: 600;
            border-radius: 5px;
            width: 100%;
            transition: background-color 0.3s, border-color 0.3s;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }

        .btn-danger {
            background-color: #dc3545;
            border: 1px solid #dc3545;
            padding: 14px;
            font-size: 1.1rem;
            font-weight: 600;
            border-radius: 5px;
            width: 100%;
            transition: background-color 0.3s, border-color 0.3s;
        }

        .btn-danger:hover {
            background-color: #c82333;
            border-color: #c82333;
        }

        .back-link {
            display: block;
            margin-top: 25px;
            text-align: center;
            color: #007bff;
            font-weight: 600;
            text-decoration: none;
            font-size: 1.1rem;
            transition: color 0.3s ease-in-out;
        }

        .back-link:hover {
            color: #0056b3;
            text-decoration: underline;
        }

        .alert {
            margin-bottom: 20px;
            font-weight: 600;
        }

        .alert-success {
            background-color: #d4edda;
            border-color: #c3e6cb;
            color: #155724;
        }

        .alert-danger {
            background-color: #f8d7da;
            border-color: #f5c6cb;
            color: #721c24;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <form action="" method="POST">
            <!-- Display Success or Error Message -->
            <?php if(isset($message)): ?>
                <div class="alert <?php echo $message_class; ?>">
                    <?php echo $message; ?>
                </div>
            <?php endif; ?>

            <div class="form-header">
                Edit Student
            </div>

            <div class="form-group">
                <label for="firstname">Firstname:</label>
                <input type="text" class="form-control" name="firstname" id="firstname" value="<?php echo htmlspecialchars($firstname); ?>" required>
            </div>
            
            <div class="form-group">
                <label for="lastname">Lastname:</label>
                <input type="text" class="form-control" name="lastname" id="lastname" value="<?php echo htmlspecialchars($lastname); ?>" required>
            </div>
            <div class="form-group">
                <label for="firstname">IT ETHICS:</label>
                <input type="text" class="form-control" name="grade1" id="grade1" value="<?php echo htmlspecialchars($grade1); ?>" required>
            </div>
            <div class="form-group">
                <label for="firstname">RIZAL:</label>
                <input type="text" class="form-control" name="grade2" id="grade2" value="<?php echo htmlspecialchars($grade2); ?>" required>
            </div>
            <div class="form-group">
                <label for="firstname">INFO MANAGEMENT	:</label>
                <input type="text" class="form-control" name="grade3" id="grade3" value="<?php echo htmlspecialchars($grade3); ?>" required>
            </div>
            <div class="form-group">
                <label for="firstname">PATH FIT	:</label>
                <input type="text" class="form-control" name="grade4" id="grade4" value="<?php echo htmlspecialchars($grade4); ?>" required>
            </div>
            <div class="form-group">
                <label for="firstname">INTRODUCTION TO COMPUTING	:</label>
                <input type="text" class="form-control" name="grade5" id="grade5" value="<?php echo htmlspecialchars($grade5); ?>" required>
            </div>
            <div class="form-group">
                <label for="firstname">DSA:</label>
                <input type="text" class="form-control" name="grade6" id="grade6" value="<?php echo htmlspecialchars($grade6); ?>" required>
            </div>
            <div class="form-group">
                <label for="firstname">BPO:</label>
                <input type="text" class="form-control" name="grade7" id="grade7" value="<?php echo htmlspecialchars($grade7); ?>" required>
            </div>
            
            <div class="form-group">
                <label for="role">Role:</label>
                <select name="role" id="role" class="form-control">
                    <option value="client" <?php if($role == 'client') echo 'selected'; ?>>Client</option>
                    <option value="admin" <?php if($role == 'admin') echo 'selected'; ?>>Admin</option>
                </select>
            </div>

            <button type="submit" name="update" class="btn btn-primary">Update Record</button>
            
        </form>

        <a href="admin_dashboard.php" class="back-link">Back to Admin Dashboard</a>
    </div>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
</body>
</html>
