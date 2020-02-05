<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.js"></script>
    <style type="text/css">
        .wrapper{
            <!-- width: 650px; -->
            margin: 0 auto;
        }
        .page-header h2{
            margin-top: 0;
        }
        table tr td:last-child a{
            margin-right: 15px;
        }
    </style>
    <script type="text/javascript">
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();   
        });
    </script>
    

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="bootstrap/ccs/calendar.css">
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header clearfix">
                            <h2 class="pull-left">Details</h2>
                            <a href="insertFaculty.php" class="btn btn-success pull-right">Add New Event/Schedule</a>
                            <a href="userlogin.php" class="btn btn-success pull-right">Logout</a>
                    </div>
                    <?php
                    // Include config file
                    require_once "config.php";
                    // Attempt select query execution
                    //$pos=$_SESSION['position'];
                    $id= $_SESSION['facultyID'];
                    $sname= $_SESSION['username'];
                    $sql = "SELECT * FROM faculty WHERE facultyID='$id' OR username='$sname'";
                    if($result = $mysqli->query($sql))
                    {
                        if($result->num_rows > 0)
                        {
                            echo "<table class='table table-bordered table-striped'>";
                                echo "<thead>";
                                    echo "<tr>";
                                        echo "<th>ID</th>";
                                        echo "<th>lastName</th>";
                                        echo "<th>firstName</th>";
                                        echo "<th>middleName</th>";
                                        echo "<th>position</th>";
                                        echo "<th>gender</th>";
                                        echo "<th>birthday</th>";
                                        echo "<th>address</th>";
                                        echo "<th>email</th>";
                                        echo "<th>department</th>";
                                        echo "<th>especialty</th>";
                                        echo "<th>username</th>";
                                        echo "<th>password</th>";
                                        echo "<th>Action</th>";
                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                while($row = $result->fetch_array()){
                                        echo "<tr>";
                                        echo "<td>" . $row['facultyID'] . "</td>";
                                        echo "<td>" . $row['lastName'] . "</td>";
                                        echo "<td>" . $row['firstName'] . "</td>";
                                        echo "<td>" . $row['middleName'] . "</td>";
                                        echo "<td>" . $row['position'] . "</td>";
                                        echo "<td>" . $row['gender'] . "</td>";
                                        echo "<td>" . $row['birthday'] . "</td>";
                                        echo "<td>" . $row['faddress'] . "</td>";
                                        echo "<td>" . $row['email'] . "</td>";
                                        echo "<td>" . $row['deparment'] . "</td>";
                                        echo "<td>" . $row['specialty'] . "</td>";
                                        echo "<td>" . $row['userName'] . "</td>";
                                        echo "<td>" . $row['password'] . "</td>";
                                        echo "<td>";
                                            echo "<a href='readFaculty.php?id=". $row['facultyID'] ."' title='View Record' data-toggle='tooltip'><span class='glyphicon glyphicon-eye-open'></span></a>";
                                            echo "<a href='updateFaculty.php?id=". $row['facultyID'] ."' title='Update Record' data-toggle='tooltip'><span class='glyphicon glyphicon-pencil'></span></a>";
                                            echo "<a href='deleteFaculty.php?id=". $row['facultyID'] ."' title='Delete Record' data-toggle='tooltip'><span class='glyphicon glyphicon-trash'></span></a>";
                                        echo "</td>";
                                    echo "</tr>";
                                }
                                echo "</tbody>";                            
                            echo "</table>";
                            // Free result set
                            $result->free();
                        } 
                        else
                        {
                            echo "<p class='lead'><em>No records were found.</em></p>";
                        }
                    }
                    else
                    {
                        echo "ERROR: Could not able to execute $sql. " . $mysqli->error;
                    }
                    
                    // Close connection
                    $mysqli->close();
                    ?>
                </div>
            </div>        
        </div>
    </div>


    <div class="container">
<div class="page-header">
<div class="pull-right form-inline">
<div class="btn-group">
<button class="btn btn-primary" data-calendar-nav="prev"><< Prev</button>
<button class="btn btn-default" data-calendar-nav="today">Today</button>
<button class="btn btn-primary" data-calendar-nav="next">Next >></button>
</div>
<div class="btn-group">
<button class="btn btn-warning" data-calendar-view="year">Year</button>
<button class="btn btn-warning active" data-calendar-view="month">Month</button>
<button class="btn btn-warning" data-calendar-view="week">Week</button>
<button class="btn btn-warning" data-calendar-view="day">Day</button>
</div>
</div>
<h3></h3>
<small>To see example with events navigate to Februray 2020</small>
</div>
<div class="row">
<div class="col-md-9">
<div id="showEventCalendar"></div>
</div>
<div class="col-md-3">
<h4>All Events List</h4>
<ul id="eventlist" class="nav nav-list"></ul>
</div>
</div>
</div>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.8.3/underscore-min.js"></script>
<script type="text/javascript" src="bootstrap/js/calendar.js"></script>
<script type="text/javascript" src="events.js"></script>
</body>
</html>