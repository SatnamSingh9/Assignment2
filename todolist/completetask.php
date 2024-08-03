<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="./taskstyles.css">
</head>
<body>

<main>
      <div class="divider"></div>

      <!-- Class to display links to all pages-->
      <div class="container_head">
        <a href="//localhost/Demo/todolist/dashboard.php" class="citem">Tasks</a>
        <a href="//localhost/Demo/todolist/addnewtask.html" class="citem">Add New Task</a>
        <a href="//localhost/Demo/todolist/completetask.php" class="citem">Complete Task</a>
       </div>

        <h2> Set a task as Completed</h2>

        <form action="completeaction.php" method="POST">

            <div class="textfield">
                <label for="heading">Select Task:</label><br>
                <input type="text" name="selectedtaskid" id="selectedtaskid" placeholder="Task Number" size = 10><br>
                <span id="selectedtaskiderror" class="error"></span>
            </div>

            <label> Closing remarks:</label>
            <input type="text" name="closing_remarks" id="closing_remarks" placeholder="Enter your closing remarks" required><br>
                     
            <div class = "buttonfield">
                <button type="submit" id="submit">Complete Task</button>
            </div>


        </form>

        <?php
            echo "<table style='border: solid 1px black;'>";
            echo "<tr>
                    <th>Task ID</th>
                    <th>Heading</th>
                    <th>Sp. Instructions</th>
                    <th>Priority</th>
                    <th>Required By</th>
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
               $stmt = $conn->prepare("SELECT task_id,heading,instructions,priority,required_date FROM tasks where status != 'Closed'");
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