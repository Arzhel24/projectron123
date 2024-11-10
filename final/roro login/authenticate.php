<?php
// include database connection file
include('db/connection.php');
// start a session variable to manage user data
session_start();


if(isset($_POST['login']))
{
   
    //sanitize the user name to prevent SQL injection
    $username = $conn->real_escape_string($_POST['username']);
    // get password from the form(not yet encrypted) 
    $password = $_POST['password'];

    //SQL query to select user data from data based on the username
    $sql_username = "SELECT * FROM users WHERE username='$username'";

    // execute query
    $result = $conn->query($sql_username);
    // check if the query returned any results
    if ($result->num_rows > 0)
    {
        
        //Fetch the associated user data
        $row = $result->fetch_assoc();
        //verify password againts stored hash password 


        if(password_verify($password, $row['password']))
        {
           
            //set session variables for username and role
            $_SESSION['username'] = $username;
            $_SESSION['role'] = $row['role'];
            $_SESSION['ID'] = $row['ID'];
        

            //redirect the user to the appropriate dashboard

            if($row['role'] == 'admin')
            {   
                //redirect the admin to the  dashboard
                header("Location: admin_dashboard.php");
            }

            else if($row['role'] == 'client')
            {
                if (isset($_GET['ID'])) {
                    $id = $_GET['ID'];
                    // You can now use $id for database queries or other logic
                }
                //redirect the client to the dashboard
                header("Location: client_dashboard.php?ID={$row['ID']}");

            }

        }
        else
        {
            //if the password is incorrect show an error message and redirect to log in page
            header("Location: index.php?incorrect");

        }
    }
    else
    {
        //no username found.
        header("Location: index.php?incorrect_username");
    }
}

?>