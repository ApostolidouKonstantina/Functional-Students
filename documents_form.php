<html>
    <head>
        <meta charset="utf-8">
        <title> Νέo Έγγραφο </title>
        <link rel="stylesheet" href="extra_files/styling.css">
    </head>
    <body>
    <form method="POST" id="ln">
        <h2 style="text-align:center; margin-top:20%">Νέο Έγγραφο</h2>
        <div style="display:flex; align-items:center"><b>Τίτλος:</b><textarea cols=37 row=1 type="text" id="title" name="title"></textarea></div> <br>
        <div style="display:flex; align-items:center"><b>Περιγραφή:</b><textarea cols=32 rows=5 id="text" name="text" type="text"></textarea> </div> <br>
        <div style="display:flex; align-items:center"><b>Τοποθεσία Αρχείου:</b><textarea cols=25 rows=1 id="location" name="location" type="text"></textarea> </div> <br>
        <input class="buttons3" name="save" id="save" value="Αποθήκευση" type="submit">
        <?php
            session_start();
            //database details
            $HOST = 'webpagesdb.it.auth.gr:3306';
            $USERNAME = 'student4005';
            $PASSWORD = '4005student';
            $db = 'student4005';
            //connection
            $con = mysqli_connect($HOST, $USERNAME, $PASSWORD, $db);

            // ensuring that the connection is made
            if (!$con)
                exit("Connection failed!" . mysqli_connect_error());

            if ( !isset($_POST['title'], $_POST['text'], $_POST['location']) ) {
                echo '<p style="color:red; text-align:center"> Please fill all fields. </p>';
            } else {
                // get number of rows
                $res = $con->query("SELECT * FROM `file` ORDER BY `Counter` DESC LIMIT 1");
                $row = $res->fetch_assoc();
                $rowcount = $row['Counter']+1;
                
                // get current date
                $t = $_POST['title'];
                $txt = $_POST['text'];
                $l = $_POST['location'];

                // save in database
                $sql = "INSERT INTO `file`(`Counter`, `Title`, `Description`, `File_location`)
                        VALUES ('$rowcount', '$t', '$txt', '$l')";
                
                if ($con->query($sql) === TRUE)
                    header("Location: documents.php");
                else
                    echo '<p style="color:red; text-align:center"> Error! </p>';
            }
            mysqli_close($con);
            ?>

        </form>
    </body>
</html>