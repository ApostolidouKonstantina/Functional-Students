<html>
    <head>
        <meta charset="utf-8">
        <title> Νέα Εργασία </title>
        <link rel="stylesheet" href="extra_files/styling.css">
    </head>
    <body>
    <form method="POST" id="ln">
        <h2 style="text-align:center; margin-top:20%">Νέα Εργασία</h2>
        <div style="display:flex; align-items:center"><b>Στόχοι:</b><textarea cols=43 row=2 type="text" id="goals" name="goals"></textarea></div> 
        <p style="color:red; text-align:center">Πατήστε "Enter" μετά από κάθε Στόχο</p> <br>
        <div style="display:flex; align-items:center"><b>Αρχείο Εκφώνησης:</b><textarea cols=31 rows=2 id="desc" name="desc" type="text"></textarea> </div> <br>
        <div style="display:flex; align-items:center"><b>Παραδοτέα:</b><textarea cols=39 rows=2 id="back" name="back" type="text"></textarea> </div>
        <p style="color:red; text-align:center">Πατήστε "Enter" μετά από κάθε Στοιχείο</p> <br>
        <div style="display:flex; align-items:center"><b>Ημερομηνία παράδοσης:</b><textarea cols=27 rows=2 id="date" name="date" type="text"></textarea> </div> <br>
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

            if ( !isset($_POST['goals'], $_POST['desc'], $_POST['back'], $_POST['date']) ) {
                echo '<p style="color:red; text-align:center"> Please fill all fields. </p>';
            } else {
                // get number of rows
                $res = $con->query("SELECT * FROM `assignment` ORDER BY `Counter` DESC LIMIT 1");
                $row = $res->fetch_assoc();
                $rowcount = $row['Counter']+1;
                
                // get current date
                $g = $_POST['goals'];
                $d = $_POST['desc'];
                $b = $_POST['back'];
                $date = $_POST['date'];

                //process "goals" and "receiving" lists
                $g_arr = explode("\n", $g);
                $goals = "<ol>";
                for ($i = 0; $i < sizeof($g_arr); $i++)
                    $goals.="<li>".$g_arr[$i]."</li>";
                $goals.="</ol>";
                
                $b_arr = explode("\n", $b);
                $receiving = "<ol>";
                for ($i = 0; $i < sizeof($b_arr); $i++)
                    $receiving.="<li>".$b_arr[$i]."</li>";
                $receiving.="</ol>";

                // save in database
                $sql = "INSERT INTO `assignment`(`Counter`, `Goals`, `Description`, `Requirements`, `Date`)
                        VALUES ('$rowcount', '$goals', '$d', '$receiving', '$date')";

                
                
                if (($con->query($sql) === TRUE)){//update announcement as well
                    $res = $con->query("SELECT * FROM `announcement` ORDER BY `Counter` DESC LIMIT 1");
                    $row = $res->fetch_assoc();
                    $rowcount = $row['Counter']+1;
                    $s="Ανάρτηση εργασίας ".$rowcount;
                    $t='Η εργασία '.$rowcount.' έχει ανακοινωθεί στην ιστοσελίδα <a class="buttons2" href="homework.php" role="button">«Εργασίες»</a>. Η ημερομηνία παράδοσης της εργασίας είναι '.$date;
                    $today = date("Y-m-d");
                    $sql2 = "INSERT INTO `announcement`(`Counter`, `Date`, `Subject`, `Text`)
                    VALUES ('$rowcount2', '$today', '$s', '$t')";
                    if (($con->query($sql2) === TRUE))
                        header("Location: homework.php");
                    else
                        echo '<p style="color:red; text-align:center"> Error! </p>';
                }
                else
                    echo '<p style="color:red; text-align:center"> Error! </p>';
            }
            mysqli_close($con);
            ?>

        </form>
    </body>
</html>