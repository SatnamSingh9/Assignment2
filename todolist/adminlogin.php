<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="./taskstyles.css">
</head>
<body>
    <header>
        <h1>Welcome to Cafe Employees site Admin access</h1>
    </header>
    <main>

        <div class ="container">
            <section id ="login-form">
            <form action ="adminaccess.php" method="POST">
                <label for ="username">Admin Username:</label>           
                <input type = "text" name = "adminid" id = "adminid" placeholder="Enter Admin username" required><br>
                <label for ="adminpwd">Password:</label>   
                <input type = "password" name = "adminpwd" id = "adminpwd" placeholder="Enter Password" required><br>

                <!--<button type ="submit" onclick="login()">LOGIN</button>-->
                <button type ="submit">LOGIN</button>
                
                <br>
                <br>
                <h4>If you are regular employee, kindly <a href="http://localhost/Demo/todolist/index.php">login</a> here.</h4>
            </form>
        </section>
    </main>
    <script src="taskscripts.js"></script>
</body>
</html>