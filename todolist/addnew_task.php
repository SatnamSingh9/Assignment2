<?php
//$servername = "localhost";
//$username = "gagan";
//$password = "iamGagan@1980";
//$dbname = "task_management";

//Create connection
//$conn = new mysqli($servername, $username, $password, $dbname);
//Check connection
//if ($conn->connect_error) {
//    die("Connection failed: " . $conn->connect_error);
//};

include('dbconnection.php');

$v_heading = $_POST['heading'];
$v_sp_instr = $_POST['sp_instr'];
$v_priority = $_POST['priority'];
$v_requireddate = $_POST['requireddate'];

$sql = "INSERT INTO tasks VALUES (NULL,
                                    '$v_heading',
                                    '$v_sp_instr',
                                    NOW(),
                                    '$v_requireddate',
                                    '$v_priority', 
                                    'Open',
                                    '',
                                    '',
                                    '')";


if (mysqli_query ($conn, $sql)){
    echo '<script>alert("Task added successfully")</script>'; 
    include('dashboard.php');
} else{
    echo "Error: Sorry $sql.".mysqli_error($conn);
    
    include('addnewtask.html');
}

//$conn->close();
?>