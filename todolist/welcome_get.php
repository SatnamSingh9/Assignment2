<?php
include('dbconnection.php');

$user_name =  $_POST['loginname'];
$pass =  $_POST['loginpassword']; 


//Check username
$r = $conn->query("SELECT * FROM logins WHERE username = '".$user_name."'");

if ($r->num_rows != 1) {
    echo '<script>alert("Usernme does not exist.")</script>'; 
    include('index.php');
}else{
    $r = $conn->query("SELECT * FROM logins WHERE username = '".$user_name."' AND password = '".$pass."'");
    if ($r->num_rows != 1) {
        echo '<script>alert("Invalid password. Try again.")</script>'; 
        include('index.php');
    }else{
        $r = $conn->query("SELECT * FROM logins WHERE username = '".$user_name."' AND password = '".$pass."' AND status ='Active'");
        if ($r->num_rows != 1) {
            echo '<script>alert("Your login is not yet approved. Kindly contact your manager!")</script>'; 
            include('index.php');
            }
        else{
            include('dashboard.php');
            }
    };
};

//session_start();
//$_SESSION['username'] = $user_name;

//$conn->close();
?>

