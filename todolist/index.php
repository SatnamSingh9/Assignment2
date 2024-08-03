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
        <h1>Welcome to Cafe Employees site</h1>
    </header>
    <main>

        <div class ="container">
            <section id ="login-form">
            <form action ="welcome_get.php" method="POST">
                <label for ="username">Username:</label>           
                <input type = "text" name = "loginname" id = "loginname" placeholder="Enter username" required><br>
                <label for ="password">Password:</label>   
                <input type = "password" name = "loginpassword" id = "loginpassword" placeholder="Enter Password" required><br>

                <!--<button type ="submit" onclick="login()">LOGIN</button>-->
                <button type ="submit">LOGIN</button>
                
                <br>
                <br>
                <h4>If you are a new user, <a href="http://localhost/Demo/todolist/register.html">Register here</a>.</h4>
                <h5>This site is for internal use of Cafe emloyees only. Kindly visit our main website <a href="google.com">here</a> for cafe related information</h5>
            </form>
        </section>
    </main>
    <script src="taskscripts.js"></script>




</body>
</html>