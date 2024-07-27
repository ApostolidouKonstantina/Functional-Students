<html>
    <head>
        <meta charset="utf-8">
        <title> Επεξεργασία Εγγράφου </title>
        <link rel="stylesheet" href="extra_files/styling.css">
    </head>
    <body>
    <form method="POST" id="ln">
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
            
            $cn = $_GET['Counter'] ;
            $sql = "SELECT Title, Description, File_location FROM `file`  WHERE Counter='$cn'";
            $res = $con->query($sql);
            $row = $res->fetch_assoc();

            echo'<h2 style="text-align:center; margin-top:20%">Επεξεργασία Εγγράφου</h2>
                <div style="display:flex; align-items:center"><b>Τίτλος:</b><textarea cols=37 row=1 type="text" id="title" name="title">'.$row['Title'].'</textarea></div> <br>
                <div style="display:flex; align-items:center"><b>Περιγραφή:</b><textarea cols=32 rows=5 id="text" name="text" type="text">'.$row['Description'].'</textarea> </div> <br>
                <div style="display:flex; align-items:center"><b>Τοποθεσία Αρχείου:</b><textarea cols=25 rows=1 id="location" name="location" type="text">'.$row['File_location'].'</textarea> </div> <br>
                <input class="buttons3" name="save" id="save" value="Αποθήκευση" type="submit">';
    
            if (!isset($_POST['title'], $_POST['text'], $_POST['location']) ) {
                echo '<p style="color:red; text-align:center"> Please fill all fields. </p>';
            } else {
                $t = $_POST['title'];
                $txt = $_POST['text'];
                $l = $_POST['location'];

                // save in database
                $sql = "UPDATE `file` 
                        SET `Title`='$t',`Description`='$txt',`File_location`='$l' WHERE Counter='$cn'";
                
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