<html>
    <head>
        <meta charset="utf-8">
        <title> Νέα Ανακοίνωση </title>
        <link rel="stylesheet" href="extra_files/styling.css">
    </head>
    <body>
    <form method="POST" id="ln">
        <h2 style="text-align:center; margin-top:20%">Νέα Ανακοίνωση</h2>
        <div style="display:flex; align-items:center"><b>Θέμα:</b><textarea cols=37 row=1 type="text" id="subject" name="subject"></textarea></div> <br>
        <div style="display:flex; align-items:center"><b>Περιεχόμενο:</b><textarea cols=30 rows=5 id="text" name="text" type="text"></textarea> </div> <br>
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

            if ( !isset($_POST['subject'], $_POST['text']) ) {
                echo '<p style="color:red; text-align:center"> Please fill all fields. </p>';
            } else {
                // get number of rows
                $res = $con->query("SELECT * FROM `announcement` ORDER BY `Counter` DESC LIMIT 1");
                $row = $res->fetch_assoc();
                $rowcount = $row['Counter']+1;
                
                // get current date
                $date = date("Y-m-d");
                $s = $_POST['subject'];
                $t = $_POST['text'];

                // save in database
                $sql = "INSERT INTO `announcement`(`Counter`, `Date`, `Subject`, `Text`)
                        VALUES ('$rowcount', '$date', '$s', '$t')";
                
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