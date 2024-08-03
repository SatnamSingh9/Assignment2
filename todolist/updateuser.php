
<?php
    include('dbconnection.php');

    $userid = $_POST['selecteduser'];
    $action = $_POST['user-action'];

     
    $r = $conn->query($sql = ("select status, super from logins where username='".$userid."'"));



    if ($r->num_rows != 1) {
        echo '<script>alert("Invalid user name entered!")</script>';
        include('admindashboard.php');
        } else{
            if ($action == 'Activate'){
                $r = $conn->query($sql = ("select status, super from logins where username='".$userid."' and status = 'PENDING'"));
                    if ($r->num_rows != 1) {
                        echo '<script>alert("Only users with PENDING status can be activated!")</script>';
                        include('admindashboard.php');
                    } else{
                        $sql = ("UPDATE logins set status = 'Active' where username='".$userid."'");
                        echo '<script>alert("User is now activated!")</script>';
                        include('admindashboard.php');
                    };
                };
           
            
            if ($action == 'Terminate'){
                $r = $conn->query($sql = ("select status, super from logins where username='".$userid."' and status = 'Active'"));
                    if ($r->num_rows != 1) {
                        echo '<script>alert("Only users with Active status can be terminated!")</script>';
                        include('admindashboard.php');
                    } else{
                        $sql = ("UPDATE logins set status = 'Terminated' where username='".$userid."'");
                        echo '<script>alert("User is now de-activated!")</script>';
                        include('admindashboard.php');
                    };
                };
                
            if ($action == 'Grant Admin'){
                $r = $conn->query($sql = ("select status, super from logins where username='".$userid."' and super = 'Yes'"));
                    if ($r->num_rows == 1) {
                        echo '<script>alert("User already has Admin access!")</script>';
                        include('admindashboard.php');
                    } else{
                        $sql = ("UPDATE logins set super = 'Yes' where username='".$userid."'");
                        echo '<script>alert("User granted Admin access!")</script>';
                        include('admindashboard.php');
                    };
                };


            if ($action == 'Revoke Admin'){
                $r = $conn->query($sql = ("select status, super from logins where username='".$userid."' and super = 'Yes'"));
                        if ($r->num_rows != 1) {
                            echo '<script>alert("User does not have Admin access.")</script>';
                            include('admindashboard.php');
                        } else{
                            $sql = ("UPDATE logins set super = 'No' where username='".$userid."'");
                            echo '<script>alert("Admin access revoked"")</script>';
                            include('admindashboard.php');
                        };
                    };
            };
    ?>