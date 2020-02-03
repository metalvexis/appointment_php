<?php
session_start();

    $username = "";
    $email = "";
    $lastname = "";
    $midname = "";
    $firstname = "";
    $position = "";
    $gender = "";
    $faddress = "";
    $bmonth = "";
    $bday = "";
    $byear = "";
    $spec = "";
    $dept="";
    $errors = array();

    $db = mysqli_connect('localhost','root','','clientserver');

    //user registration
    if(isset($_POST['reg_user'])){
        $lastname = mysqli_real_escape_string($db, $_POST['lastname']);
        $midname = mysqli_real_escape_string($db, $_POST['midname']);
        $firstname = mysqli_real_escape_string($db, $_POST['firstname']);
        $position = mysqli_real_escape_string($db, $_POST['position']);
        $gender = mysqli_real_escape_string($db, $_POST['gender']);
        $faddress = mysqli_real_escape_string($db, $_POST['faddress']);
        $bmonth = mysqli_real_escape_string($db, $_POST['bmonth']);
        $bday = mysqli_real_escape_string($db, $_POST['bday']);
        $byear = mysqli_real_escape_string($db, $_POST['byear']);
        $spec = mysqli_real_escape_string($db, $_POST['spec']);
        $dept = mysqli_real_escape_string($db, $_POST['department']);

        if(empty($lastname)){array_push($errors,"lastname is required!");}
        if(empty($midname)){array_push($errors,"middle name is required!");}
        if(empty($firstname)){array_push($errors,"First is required!");}
        if(empty($faddress)){array_push($errors,"Address is required!");}
        if(empty($spec)){array_push($errors,"Specialty is required!");}

        $username = mysqli_real_escape_string($db, $_POST['username']);
        $email = mysqli_real_escape_string($db, $_POST['email']);
        $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
        $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

        if(empty($username)){array_push($errors,"Username is required!");}
        if(empty($email)){array_push($errors,"Email is Required!");}
        if(empty($password_1)){array_push($errors,"Password is Required!");}
        if($password_1 != $password_2){array_push($errors,"Password is not Match!");}

        $user_check_query1 = "SELECT * FROM faculty  WHERE firstName='$firstname' AND lastName='$lastname' LIMIT 1";
        $result1 = mysqli_query($db,$user_check_query1);
        $user1 = mysqli_fetch_assoc($result1);

        if($user1){
            if($user1['lastName']===$lastname && $user1['firstName']=== $firstname){
                array_push($errors, "User name Already exist");
            }
        }
       
        $user_check_query2 = "SELECT * FROM userlogin  WHERE username='$username' OR email='$email' LIMIT 1";
        $result2 = mysqli_query($db,$user_check_query2);
        $user2 = mysqli_fetch_assoc($result2);

        if($user2){
            if($user2['username']===$username){
                array_push($errors, "User name Already exist");
            }
            if($user2['email']===$email){
                array_push($errors, "Email Already exist");
            }
        }

        if(count($errors)==0)
        {
            $query1 = "INSERT INTO `faculty`(`lastName`, `firstName`, `middleName`, `position`, `gender`, `faddress`, `department`, `specialty`) 
            VALUES ('$lastname','$firstname','$midname','$position','$gender','$faddress','$dept','$spec')";
            mysqli_query($db,$query1);

            $password = md5($password_1);
            $query2="INSERT INTO userlogin (userName,email,password)
            VALUES ('$username','$email','$password')";
            mysqli_query($db,$query2);
            $_SESSION['username'] = $username;
            $_SESSION['success'] = "You are now Log in";
            header('location:index.php');
        }

    }
    //USER LOG IN
    if(isset($_POST['login_user'])){
        $username = mysqli_real_escape_string($db, $_POST['username']);
        $password = mysqli_real_escape_string($db, $_POST['password']); 

        if(empty($username)){array_push($errors,"Username is required!");}
        if(empty($password)){array_push($errors,"Password is Required!");}
        
        if(count($errors)==0){
            $password = md5($password);
            $query = "SELECT * FROM userlogin WHERE username='$username' AND password='$password'";
            $result = mysqli_query($db,$query);
            if(mysqli_num_rows($result)==1){
                $_SESSION['username'] = $username;
                $_SESSION['success'] = "You are now Logged in";
                header('location:index.php');
            }
            else{
                array_push($errors,"Wrong username/password combination");
            }
        }
    }
?>
