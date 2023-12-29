<html lang='en'>
    <head>
        <meta charset="UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <link rel="stylesheet" href="login.css"/>
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
                padding-top: 20px;
            }
        </style>
    </head>
    <body>
        <?php
            //connect to the database

            $db = new SQLite3("/home/rickcodes/projects/chatwebsite/chatwebsite.sqlite");

            $username = (isset($_POST["username"])) ? $_POST["username"] : "";
            $password = (isset($_POST["password"])) ? $_POST["password"] : "";
            $message = false;

            if (strlen($username) > 0 && strlen($password) > 0){
                $query = "SELECT Password FROM Users WHERE Name LIKE = :username";
                $stmnt = $db->prepare($query);
                echo "$username";
                $stmnt->bindParam(':username', $username, SQLITE3_TEXT);
                $result = $stmnt->execute();

                while ($row=$result->fetchArray(SQLITE3_ASSOC)) {
                    $passwd = $row["Password"];
                }
                if ($passwd === $password) {
                    $message = "Login successful <a href='profile.php'> Enter</a>";
                }
            }
        ?>
        <div class="top">
            <h1>EMBUNI CONNECT</h1>
        </div>
        <div class="login">
            <div class="hah"></div>
            <div class="person">
                <form method="post" action="profile.php" _blank>
                    <input type="text" name="username" placeholder="Username" required><br>
                    <input type="password" name="password" placeholder="Password 8 to 10 characters long" required><br>
                    <?php
                        echo "<p>$message</p>";
                    ?>
                    <button type="submit" class="sublog">Login</button>
                </form>
                <hr>
                <p class="create">Don't have an account? <a href="create.php">Create One</a></p>
            </div>
        </div>
    </body>
</html>