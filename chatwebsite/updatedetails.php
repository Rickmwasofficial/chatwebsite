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
            textarea {
                width: 90%;
                margin: 10px;
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
        <div class="top">
            <h1>EMBUNI CONNECT</h1>
        </div>
        <div class="login">
            <div class="hah"></div>
            <div class="person">
                <form method="post" action="profile.php">
                    <input type="text" name="username" placeholder="Username" required><br>
                    <textarea type="textbox" name="town" placeholder="Briefly describe yourself" required></textarea><br>
                    <input type="text" name="school" placeholder="School" required><br>
                    <input type="text" name="profilepicture" placeholder="Add a link to your desired profile picture" required><br>
                    
                    <button type="submit" class="sublog">Update Profile</button>
                </form>
            </div>
        </div>
        
    </body>
</html>