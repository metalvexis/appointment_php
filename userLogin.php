<?php 
// Include config file
require_once "config.php";
session_start();

$username = $password = "";
$username_err = $password_err = "";

if($_SERVER["REQUEST_METHOD"] == "POST")
{
    //validate username
    $input_username = trim($_POST["username"]);
    if(empty($input_username))
    {
        $username_err = "Please enter a username.";     
    } else
    {
        $username = $input_username;
    }

     //validate password
     $input_password = trim($_POST["password"]);
     if(empty($input_password))
     {
         $password_err = "Please enter a password.";     
     } else
     {
         $password = $input_password;
     }
    
    if(empty($username_err) && empty($password_err))
    {
        //$password = md5($password);
        $query = "SELECT * FROM faculty WHERE username='$username' AND password='$password'";
        $result = mysqli_query($mysqli,$query);
        if(mysqli_num_rows($result)==1)
        {
            if($mysqli->query($query)=== TRUE)
                {
                    $last_id = $db->insert_id;
                }
                $_SESSION['username'] = $username;
                $_SESSION['facultyID'] = $last_id;
                $_SESSION['success'] = "You are now Logged in";
                header('location:index.php');
        }
        else
        {
            $username_err = "Wrong username.";
            $password_err = "Wrong Password.";
        }
           /* if($query = $mysqli->prepare($query))
            {
                // Bind variables to the prepared statement as parameters
                $query->bind_param("sss", $param_username, $param_password);
                
                // Set parameters
                $param_username = $username;
                $param_password = $password;
                
                // Attempt to execute the prepared statement
                if($stmt->execute())
                {
                    // Records created successfully. Redirect to landing page
                    header("location: index.php");
                    exit();
                } 
                else
                {
                    echo "Wrong username/password combination";
                }
                $stmt->close();
            }
        }
        else
        {
            $username_err = "Wrong username.";
            $password_err = "Wrong Password.";
        } */  
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Record</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        .wrapper{
            width: 500px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h2>Log In Form</h2>
                    </div>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                            <label>User Name</label>
                            <input type="text" name="username" class="form-control" value="<?php echo $username; ?>">
                            <span class="help-block"><?php echo $username_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                            <label>Password</label>
                            <input type="password" name="password" class="form-control" value="<?php echo $password; ?>">
                            <span class="help-block"><?php echo $password_err;?></span>
                        </div>
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="index.php" class="btn btn-default">Cancel</a>
                        <p>
                            Not yet a member?<a href="insertFaculty.php">Sign up</a>
                        </p>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>