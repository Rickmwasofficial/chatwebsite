<html lang='en'>
    <head>
        <meta charset="UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <link rel="stylesheet" href="profile.css"/>
        <style>
            body {
                display: inline-block;
                width: 100vw;
                height: 100%;
                overflow-x: hidden;
            }
            .profile {
                width: 100%;
                height: auto;
                margin-top: 10%;
            }
            .info {
                display: inline-flex;
                width: 100%;
                height: 40%;
            }
            .pic {
                display: inline;
                width: 40%;
                height: 100%;
                align-self: flex-start;
                text-align: center;
                justify-content: center;
            }
            .details {
                display: block;
                width: 40%;
                height: 100%;
                align-self: center;
                padding-bottom: 20px;
            }
            .username {
                font-size: 25px;
            }
            .profilepic {
                width: 50%;
                height: 210px;
                margin-left: 30%;
                margin-top: -3%;
                background-image: url('pexels-erik-mclean-19410408.jpg');
                background-size: cover;
                background-position: center;
                border-radius: 48%;
            }
            .followers, .following {
                display: inline;
                text-align: center;
                margin-right: 60px;
            }
            .more {
                display: inline-flex;
            }
            a {
                text-decoration: none;
                color: black;
            }
            a:visited {
                color: black;
            }
            .updateprofile {
                width: 50vw;
                height: 40vh;
                background: blue;
            }
        </style>
    </head>
    <body>
        <?php
            //connect to the database
            $db = new SQLite3("/home/rickcodes/projects/chatwebsite/chatwebsite.sqlite");
        
            $username = (isset($username)) ? $username : htmlspecialchars((string)$_POST["username"]);
            $picture = (isset($picture)) ? $picture : htmlspecialchars((string)$_POST["profilepicture"]);
            $description = (isset($description)) ? $description : htmlspecialchars((string)$_POST["town"]);
            $school = (isset($school)) ? $school : htmlspecialchars((string)$_POST["school"]);
            $message = false;

            if ((strlen($username) > 0)){
                $query = $db->prepare("INSERT INTO Profile(Name, Picture, Description, School) VALUES (:username, :picture, :town, :school)");
                $query->bindParam(':username', $username, SQLITE3_TEXT);
                $query->bindParam(':picture', $picture, SQLITE3_TEXT);
                $query->bindParam(':town', $description, SQLITE3_TEXT);
                $query->bindParam(':school', $school, SQLITE3_TEXT);
                $query->execute();
            }

            $username = isset($_POST["username"]) ? $_POST["username"] : "deafult";

            if (isset($_POST["username"])) {
                $query = "SELECT Picture, Description, School FROM Profile WHERE Name LIKE :username";
                $stmnt = $db->prepare($query);
                $stmnt->bindParam(':username', $username, SQLITE3_TEXT);
                $result = $stmnt->execute();

                if ($result) {
                    //fetch from database
                    while ($row=$result->fetchArray(SQLITE3_ASSOC)) {
                        $piclink = $row["Picture"];
                        $desc = $row['Description'];
                        $Sch = $row['School'];
                    }
                }
            } else {
                
            }
        ?>
        <div class="full">
            <div class="top">
                <h1>EMBUNI CONNECT</h1>
            </div>
            <div class="page">
                <div class="left">
                    <a href="profile.php"><h3>Profile</h3></a>
                    <hr>
                    <h3>Messages</h3>
                    <hr>
                    <h3>Find Friends</h3>
                    <hr>
                    <a href="login.php"><h3>Log out</h3></a>
                </div>
                <br>
                <div class="right">
                    <div class="profile">
                        <div class="info">
                            <div class="pic">
                                <div class="profilepic">

                                </div>
                            </div>
                            <div class="details">
                                <b class="username">
                                    <?php
                                        echo "$username";
                                    ?>
                                </b><br>
                                <div class="more" style="padding-top: 20px;">
                                    <div class="followers">
                                        <b>Followers</b><br>
                                        <b>0</b><br>
                                    </div>
                                    <div class="following">
                                        <b>Following</b><br>
                                        <b>0</b>
                                    </div>
                                </div>
                                <div class="description">
                                    <?php
                                        echo "<p>$desc</p><p>$Sch</p>";
                                    ?>

                                </div>
                                <form method="GET">
                                    <input type="submit" name="submit" value="Update Profile">
                                </form>
                                
                            </div>
                        </div>
                        <hr style="width: 80%;">
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>