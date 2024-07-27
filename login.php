<html>
    <head>
        <meta charset="utf-8">
        <title> Log In </title>
        <link rel="stylesheet" href="extra_files/styling.css">
    </head>

    <body>
        <h1> Log In </h1>
        <div class="main">
            <div class="form" id="login"> 
                <form method="POST" id="ln">
                    <h2 style="text-align:center">Πιστοποίηση</h2>
                    <p><b>Username:</b><input type="text" id="email" name="email"></p> <br>
                    <p><b>Password:</b><input id="password" name="password" type="password"> </p> <br>
                    <input class="buttons3" name="log" id="log" value="Είσοδος" type="submit">
                    <?php
                        session_start();
                        //database details
                        $HOST = 'localhost';
                        $USERNAME = 'root';
                        $PASSWORD = '';
                        $db = 'student4005';
                        //connection
                        $con = mysqli_connect($HOST, $USERNAME, $PASSWORD, $db);

                        // ensuring that the connection is made
                        if (!$con)
                            exit("Connection failed!" . mysqli_connect_error());

                        if ( !isset($_POST['email'], $_POST['password']) ) {
                            echo '<p style="color:red; text-align:center"> Please fill all fields. </p>';
                        }
                        else {
                            $logname = $_POST['email'];
                            $res = $con->query("SELECT Loginame, Passwords, Role FROM `user` WHERE Loginame='$logname'");
                            if ($res->num_rows > 0){ 
                                $pw = $_POST['password'];
                                $row = $res->fetch_assoc();
                                    if ($pw ==  $row['Passwords']){
                                        // logged in and preserve role of user
                                        $_SESSION['loggedin'] = TRUE;
                                        $_SESSION['role'] = $row['Role'];
                                        header('Location: index.php');
                                    } else 
                                        echo '<p style="color:red; text-align:center"> Incorrect password! </p>';
                                } else 
                                    echo '<p style="color:red; text-align:center"> Incorrect username! </p>';
                            }
                        // close connection
                        mysqli_close($con);


                    ?>

                </form>
            </div>
        </div>
    </body>

</html>

