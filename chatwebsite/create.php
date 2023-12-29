<html lang='en'>
    <head>
        <meta charset="UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <link rel="stylesheet" href="create.css"/>
        <style>
            body {
                width: 100vw;
                height: 100vh;
                overflow-x: hidden;
                background: url("loginbackgd.jpg");
                background-size: cover;
                background-blend-mode: darken;
                text-align: center;
            }
            a {
                text-decoration: none;
            }
            hr {
                width: 90%;
                height: 2px;
            }
            p {
                padding-top: 10px;
            }
        </style>
    </head>
    <body>
        <?php
            //connect to the database
            $db = new SQLite3("/home/rickcodes/projects/chatwebsite/chatwebsite.sqlite");
        
            $username = (isset($username)) ? $username : htmlspecialchars((string)$_POST["username"]);
            $password = (isset($password)) ? $password : htmlspecialchars((string)$_POST["password"]);
            $message = false;

            if ((strlen($username) > 0 && strlen($password) > 0)){
                $query = $db->prepare("INSERT INTO Users(Name, Password) VALUES (:username, :password)");
                $follows = $db->prepare("INSERT INTO Follows(Name, Followers) VALUES (:username, 'none')");
                $query->bindParam(':username', $username, SQLITE3_TEXT);
                $query->bindParam(':password', $password, SQLITE3_TEXT);
                $follows->bindParam(':username', $username, SQLITE3_TEXT);
                $follows->execute();
                $query->execute();
                if ($follows && $query){
                    $message = "Account created successfully! <a href='updatedetails.php'>Login</a>";
                } else {
                    $message = "Something went wrong! Try again.";
                }
            }
        ?>
        <div class="top">
            <h1>EMBUNI CONNECT</h1>
        </div>
        <div class="login">
            <div class="hah"></div>
            <div class="person">
                <form method="post">
                    <input type="text" name="username" placeholder="Username" required><br>
                    <input type="password" name="password" placeholder="Password 8 to 10 characters long" required><br>
                    <?php
                        echo "<p style='color: red; padding: 0px;'>$message</p>";
                    ?>
                    <button type="submit" class="sublog">Create Account</button>
                </form>
                <hr>
                <p class="create">Already have an account? <a href="login.php">Login</a></p>
            </div>
        </div>
    </body>
</html>