<html>
    <head>
        <meta charset="utf-8">
        <title> Επεξεργασία Ανακοίνωσης </title>
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
            $sql = "SELECT Subject, Text FROM `announcement`  WHERE Counter='$cn'";
            $res = $con->query($sql);
            $row = $res->fetch_assoc();

            echo'<h2 style="text-align:center; margin-top:20%">Επεξεργασία Ανακοίνωσης</h2>
                <div style="display:flex; align-items:center"><b>Θέμα:</b><textarea cols=37 row=1 type="text" id="subject" name="subject">'.$row['Subject'].'</textarea></div> <br>
                <div style="display:flex; align-items:center"><b>Περιεχόμενο:</b><textarea cols=30 rows=5 id="text" name="text" type="text">'.$row['Text'].'</textarea> </div> <br>
                <input class="buttons3" name="save" id="save" value="Αποθήκευση" type="submit">';
    
            if ( !isset($_POST['subject'], $_POST['text']) ) {
                echo '<p style="color:red; text-align:center"> Please fill all fields. </p>';
            } else {
                $s = $_POST['subject'];
                $t = $_POST['text'];

                // save in database
                $sql = "UPDATE `announcement` 
                        SET `Subject`='$s',`Text`='$t' WHERE Counter='$cn'";
                
                if ($con->query($sql) === TRUE)
                    header("Location: announcement.php");
                else
                    echo '<p style="color:red; text-align:center"> Error! </p>';
            }
            mysqli_close($con);
            ?>

        </form>
    </body>
</html>