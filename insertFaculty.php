<?php
// Include config file
require_once "config.php";
session_start();
 
// Define variables and initialize with empty values
$lastName= $firstName = $middleName = $position = $gender = $bday = $faddress = $email = $department = $specialty = $username = $password= $password1 = $password2 = "";
$lastName_err = $firstName_err = $middleName_err = $position_err = $gender_err = $birthday_err = $faddress_err = $email_err = $department_err = $specialty_err = $username_err = $password1_err = $password2_err = "";
$errorcounter = 0;
$date = $month = $year = $newdate = "";
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST")
{

    // Validate last name
    $input_lastName = trim($_POST["lastName"]);
    if(empty($input_lastName)){
        $lastName_err = "Please enter Last Name.";
        $errorcounter++;
    } elseif(!filter_var($input_lastName, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $lastName_err = "Please enter a Last Name.";
        $errorcounter++;
    } else{
        $lastName = $input_lastName;
    }

    // Validate first name
    $input_firstName = trim($_POST["firstName"]);
    if(empty($input_firstName)){
        $firstName_err = "Please enter First Name.";
        $errorcounter++;
    } elseif(!filter_var($input_firstName, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $firstName_err = "Please enter First Name.";
        $errorcounter++;
    } else{
        $firstName = $input_firstName;
    }

    // Validate middle name
    $input_middleName = trim($_POST["middleName"]);
    if(empty($input_middleName)){
        $middleName_err = "Please enter Middle Name.";
        $errorcounter++;
    } elseif(!filter_var($input_middleName, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $middleName_err = "Please enter Middle Name.";
        $errorcounter++;
    } else{
        $middleName = $input_middleName;
    }
    
    // Validate position
    $input_position = trim($_POST["position"]);
    if(empty($input_position)){
        $position_err = "Please enter position.";
        $errorcounter++;
    } elseif(!filter_var($input_position, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $position_err = "Please enter position";
        $errorcounter++;
    } else{
        $position = $input_position;
    }

    // Validate gender
    $input_gender = trim($_POST["gender"]);
    if(empty($input_gender)){
        $gender_err = "Please enter gender";
        $errorcounter++;
    } elseif(!filter_var($input_gender, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $gender_err = "Please enter gender.";
        $errorcounter++;
    } else{
        $gender = $input_gender;
    }

    // Validate birthday
    $input_birthday = $_POST["bday"];
    if(empty($input_birthday))
    {
        $birthday_err = "Please enter Birthday";
        $errorcounter++;
    } 
    else
    {
        //echo $input_birthday;
        //$olddate= explode('/',$input_birthday);
        //$date=$olddate[0];
       // $month=$olddate[1];
        //$year=$olddate[2];
        //$newdate=$date.'-'.$month.'-'.$year;
        $birthday = $input_birthday;
       // echo $newdate;
    }
    
    // Validate address
    $input_address = trim($_POST["faddress"]);
    if(empty($input_address)){
        $faddress_err = "Please enter address.";
        $errorcounter++;
    }  else{
        $faddress = $input_address;
    }

    // Validate email
    $input_email = trim($_POST["email"]);
    if(empty($input_email)){
        $email_err = "Please enter email";
        $errorcounter++;
    } else{
        $email = $input_email;
    }

    // Validate department
    $input_department = trim($_POST["department"]);
    if(empty($input_department)){
        $department_err = "Please enter department";
        $errorcounter++;
    } elseif(!filter_var($input_department, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $department_err = "Please enter department.";
        $errorcounter++;
    } else{
        $department = $input_department;
    }

    // Validate specialty
    $input_specialty = trim($_POST["specialty"]);
    if(empty($input_specialty)){
        $specialty_err = "Please enter specialty";
        $errorcounter++;
    } else{
        $specialty = $input_specialty;
    }

    // Validate username
    $input_username = trim($_POST["username"]);
    if(empty($input_username)){
        $username_err = "Please enter Username";
        $errorcounter++;
    } else{
        $username = $input_username;
    }

    // Validate password
    $input_password1 = trim($_POST["password1"]);
    $input_password2 = trim($_POST["password2"]);
    if(empty($input_password1)&&empty($input_password2)){
        $password1_err = "Please enter Password";
        $password2_err = "Please enter Confirm Password";
        $errorcounter++;
    } elseif($input_password1!=$input_password2){
        $password1_err = "Password is not Match";
        $password2_err = "Password is not Match";
        $errorcounter++;
    } else{
        $password = $input_password1;
    }

    //check duplicate user
    $user_check_query = "SELECT * FROM faculty  WHERE firstName='$firstName' AND lastName='$lastName' LIMIT 1";
        $result = mysqli_query($mysqli,$user_check_query);
        $user = mysqli_fetch_assoc($result);

        if($user){
            if($user['lastName']===$lastName && $user['firstName']=== $firstName){
                $firstName_err = "Name Already Taken";
                $lastName_err = "Last name Already taken";
                $errorcounter++;
            }
        }
    //check duplicate email and username
    $user_check_query3 = "SELECT * FROM faculty  WHERE userName='$username' OR email='$email' LIMIT 1";
        $result3 = mysqli_query($mysqli,$user_check_query3);
        $user3 = mysqli_fetch_assoc($result3);

        if($user3)
        {
            if($user3['userName']===$username)
            {
                $username_err="Already existing";
                $errorcounter++;
            }
            if($user3['email']===$email)
            {
                $email_err="email already exist";
                $errorcounter++;
            }
        }
    
    //check duplicate email and username
    $user_check_query4 = "SELECT * FROM faculty  WHERE userName='$username' OR email='$email' LIMIT 1";
        $result4 = mysqli_query($mysqli,$user_check_query4);
        $user4 = mysqli_fetch_assoc($result4);

        if($user4){
            if($user4['userName']===$username){
                $username_err="Already existing";
                $errorcounter++;
            }
            if($user4['email']===$email){
                $email_err="email already exist";
                $errorcounter++;
            }
        }


    // Check input errors before inserting in database
    if($errorcounter==0)
    {
         //  insert statement
            $sql = "INSERT INTO `faculty`(`lastName`, `firstName`, `middleName`, `position`, `gender`, `birthday`, `faddress`, `email`, `deparment`, `specialty`, `userName`, `password`) 
            VALUES ('$lastName','$firstName','$middleName','$position','$gender','$birthday','$faddress','$email','$department','$specialty','$username','$password')";
            //mysqli_query($mysqli,$sql);
            if($mysqli->query($sql)=== TRUE)
            {
                $last_id = $mysqli->insert_id;
                $_SESSION['username'] = $username;
                $_SESSION['facultyID'] = $last_id;
                header("location: index.php");
                exit();
            }
        //Close statement
        $sql->close();
        //Close connection
        $mysqli -> close();
    }
        
        /*if($stmt = $mysqli->prepare($sql))
        {
            // Bind variables to the prepared statement as parameters
            $stmt->bind_param("sss", $param_lastName, $param_firstName, $param_middleName, $param_position, $param_gender, $param_birthday, $param_faddress,
            $param_email, $param_department, $param_specialty, $param_username, $param_password);
            
            // Set parameters
            $param_lastName=$lastName;
            $param_firstName=$firstName;
            $param_middleName=$middleName;
            $param_position = $position;
            $param_gender=$gender;
            $param_birthday=$birthday;
            $param_faddress=$faddress;
            $param_email=$email;
            $param_department=$department;
            $param_specialty=$specialty;
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
                echo "Something went wrong. Please try again later.";
            }
        }
         
        // Close statement
        //$stmt->close();
    }*/
   
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register Faculty</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <link rel="stylesheet" href="/resources/demos/style.css">
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <script type="text/javascript">
        $( function() {
            $( ".form_datetime" ).datepicker();
            } );
        </script>
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
                        <h2>REGISTRATION</h2>
                    </div>
                    <p>Please fill this form and submit to Register</p>

                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">

                        <div class="form-group <?php echo (!empty($lastName_err)) ? 'has-error' : ''; ?>">
                            <label>Last Name</label>
                            <input type="text" name="lastName" class="form-control" value="<?php echo $lastName; ?>">
                            <span class="help-block"><?php echo $lastName_err;?></span>
                        </div>

                        <div class="form-group <?php echo (!empty($Fistname_err)) ? 'has-error' : ''; ?>">
                            <label>First Name</label>
                            <input type="text" name="firstName" class="form-control" value="<?php echo $firstName; ?>">
                            <span class="help-block"><?php echo $firstName_err;?></span>
                        </div>

                        <div class="form-group <?php echo (!empty($middleName_err)) ? 'has-error' : ''; ?>">
                            <label>Middle Name</label>
                            <input type="text" name="middleName" class="form-control" value="<?php echo $middleName; ?>">
                            <span class="help-block"><?php echo $middleName_err;?></span>
                        </div>

                        <div class="form-group <?php echo (!empty($position_err)) ? 'has-error' : ''; ?>">
                            <label>Position</label>
                            <select name="position" id="position" value="<?php echo $position; ?>">
                            <option value="student">Student</option>
                            <option value="instructor">Instructor</option>
                            <option value="dean">Dean</option>
                            <option value="secretary">Secretary</option>
                            </select>
                            <span class="help-block"><?php echo $position_err;?></span>
                        </div>

                        <div class="form-group <?php echo (!empty($gender_err)) ? 'has-error' : ''; ?>">
                            <label>Gender</label>
                            <select name="gender" id="gender">
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                            </select>
                            <class="help-block"><?php echo $gender_err;?></span>
                        </div>

                        <div class="form-group <?php echo (!empty($birthday_err)) ? 'has-error' : ''; ?>">
                            <label>Birthday</label>
                            <input type="date" name="bday" id="bday" value="<?php echo $bday;?>" class="form_datetime">
                            <span class="help-block"><?php echo $birthday_err;?></span>
                        </div>

                        <div class="form-group <?php echo (!empty($faddress_err)) ? 'has-error' : ''; ?>">
                            <label>Address</label>
                            <textarea name="faddress" class="form-control"><?php echo $faddress; ?></textarea>
                            <span class="help-block"><?php echo $faddress_err;?></span>
                        </div>

                        <div class="form-group <?php echo (!empty($email_err)) ? 'has-error' : ''; ?>">
                            <label>Email</label>
                            <input type="text" name="email" class="form-control" value="<?php echo $email; ?>">
                            <span class="help-block"><?php echo $email_err;?></span>
                        </div>

                        <div class="form-group <?php echo (!empty($department_err)) ? 'has-error' : ''; ?>">
                            <label>Department</label>
                            <select name="department" id="department" value="<?php echo $department; ?>">
                            <option value="cs">College of Computer Studies</option>
                            <option value="cea">College of Engineering and Architecture</option>
                            <option value="cn">College of Nursing</option>
                            <option value="cl">College of Law</option>
                            <option value="cgs">College of Graduate Studies</option>
                            <option value="cba">College of Business and Accountancy</option>
                            <option value="ce">College of Education</option>
                            </select>
                            <span class="help-block"><?php echo $department_err;?></span>
                        </div>

                        <div class="form-group <?php echo (!empty($specialty_err)) ? 'has-error' : ''; ?>">
                            <label>Specialty</label>
                            <input type="text" name="specialty" class="form-control" value="<?php echo $specialty; ?>">
                            <span class="help-block"><?php echo $specialty_err;?></span>
                        </div>

                        <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                            <label>Username</label>
                            <input type="text" name="username" class="form-control" value="<?php echo $username; ?>">
                            <span class="help-block"><?php echo $username_err;?></span>
                        </div>

                        <div class="form-group <?php echo (!empty($password1_err)) ? 'has-error' : ''; ?>">
                            <label>Password</label>
                            <input type="password" name="password1" class="form-control" value="<?php echo $password1; ?>">
                            <span class="help-block"><?php echo $password1_err;?></span>
                        </div>

                        <div class="form-group <?php echo (!empty($password2_err)) ? 'has-error' : ''; ?>">
                            <label>Confirm Password</label>
                            <input type="password" name="password2" class="form-control" value="<?php echo $password2; ?>">
                            <span class="help-block"><?php echo $password2_err;?></span>
                        </div>

                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="index.php" class="btn btn-default">Cancel</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>