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

$v_username = $_POST['username'];
$v_password = $_POST['pass'];
$v_firstname = $_POST['firstname'];
$v_lastname = $_POST['lastname'];
$v_phone = $_POST['phone'];
$v_email = $_POST['email'];


$sql = "INSERT INTO LOGINS VALUES ('$v_username',
                                    '$v_password',
                                    'PENDING',
                                    '$v_firstname',
                                    '$v_lastname',
                                    '$v_phone',
                                    '$v_email',
                                    '$v_username', NOW())";


if (mysqli_query ($conn, $sql)){
    echo "<h3> User information stored successfully.
    You will be able to use system once approved by your manager. </h3>";

    echo '<script>alert("User information stored successfully.
    You will be able to use system once approved by your manager.")</script>'; 
    include('index.php');
} else{
    echo "Error: Sorry $sql.".mysqli_error($conn);
    
    include('index.php');
}

$conn->close();
?>

