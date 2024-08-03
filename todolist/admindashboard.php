<?php
 $useractions = ["Activate", "Terminate", "Grant Admin", "Revoke Admin"];

 function generateOptions($array) {
     $options = "";
     foreach ($array as $value) {
         $options .= "<option>$value</option>";
     }
     return $options;
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
</head>
<body>

<main>
      <div class="divider"></div>
      <h2> Specify user and Action: </h2>

        <form action="updateuser.php" method="POST">

            <div class="textfield">
                <label for="heading">Select User Name:</label><br>
                <input type="text" name="selecteduser" id="selecteduser" placeholder="User ID" size = 10 required><br>
            </div>

            <label> Select Action:</label>
            <select name="user-action" >
                <option>Select Action</option>
                <?php echo generateOptions($useractions); ?>
            </select>

            <div class = "buttonfield">
                <button type="submit" id="submit">Update User</button>
                
            </div>


        </form>

        <?php
            echo "<table style='border: solid 1px black;'>";
            echo "<tr>
                    <th>User Name</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Phone</th>
                    <th>Status</th>
                    <th>Admin Access Flag</th>
                  </tr>";
           
           class TableRows extends RecursiveIteratorIterator {
               function __construct($it) {
                   parent::__construct($it, self::LEAVES_ONLY);
               }
           
               function current() {
                   return "<td style='width: auto; border: 1px solid black;'>" . parent::current(). "</td>";
               }
           
               function beginChildren() {
                   echo "<tr>";
               }
           
               function endChildren() {
                   echo "</tr>" . "\n";
               }
           }
           
          include('dbconnection.php');
           
           try {
               $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
               $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
               $stmt = $conn->prepare("SELECT username, firstname, lastname, phone, status, super FROM logins order by username");
               $stmt->execute();
           
               // set the resulting array to associative
               $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
           
               foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) {
                   echo $v;
               }
           }
           catch(PDOException $e) {
               echo "Error: " . $e->getMessage();
           }
           $conn = null;
           echo "</table>";
          ?>

</body>
</html>        