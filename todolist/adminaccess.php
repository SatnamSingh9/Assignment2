<?php
include('dbconnection.php');

$user_name =  $_POST['adminid'];
$pass =  $_POST['adminpwd']; 


//Check username
$r = $conn->query("SELECT * FROM logins WHERE username = '".$user_name."'");

if ($r->num_rows != 1) {
    echo '<script>alert("Usernme does not exist.")</script>'; 
    include('index.php');
}else{
    $r = $conn->query("SELECT * FROM logins WHERE username = '".$user_name."' AND password = '".$pass."'");
    if ($r->num_rows != 1) {
        echo '<script>alert("Invalid password. Try again.")</script>'; 
        include('adminlogin.php');
    }else{
        $r = $conn->query("SELECT * FROM logins WHERE username = '".$user_name."' AND password = '".$pass."' AND status = 'Active'");
        if ($r->num_rows != 1) {
            echo '<script>alert("Your login is not Active. Kindly contact your manager!")</script>'; 
            include('index.php');
            }
        else{
            $r = $conn->query("SELECT * FROM logins WHERE username = '".$user_name."' AND password = '".$pass."' AND super ='Yes'");
            if ($r->num_rows != 1) {
                echo '<script>alert("Your login does not have Admin privilage. Kindly use regular login page!")</script>'; 
                include('index.php');
                }
            else{
                include('admindashboard.php');
            };
        };    
    };
};

//session_start();
//$_SESSION['username'] = $user_name;

//$conn->close();
?>

