<?php
    include('dbconnection.php');

    session_start();

    if(!isset($_SESSION['username']))
    {
        $localuserid = $_SESSION['username'];
    }

    $id = $_POST['selectedtaskid'];
    $remarks = $_POST['closing_remarks'];
    
    //if (isset($_POST['submit'])){
        
       

        //$sql = ("SELECT * FROM logins WHERE username = '".$user_name."' AND password = '".$pass."'");
        $sql = ("UPDATE tasks set closing_remarks = '".$remarks."', status = 'Closed', completed_by ='".$localuserid."' WHERE task_id ='".$id."'");

        if (mysqli_query ($conn, $sql)){
            echo "Completed";
            
            echo '<script>alert("Task set to completed")</script>'; 
            
            include('dashboard.php');
        } else{
            echo "Error: Sorry $sql.".mysqli_error($conn);
            
            include('completetask.php');
        }
   // }
    //$conn->close();
    ?>