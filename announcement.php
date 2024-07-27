<html>
    <head>
        <meta charset="utf-8">
        <title> Ανακοινώσεις </title>
        <link rel="stylesheet" href="extra_files/styling.css">
    </head>

    <body>
        <a id="top"></a>
        <h1> Ανακοινώσεις </h1>
        <div class="main">
            <div class="side"> 
                <div class="container">
                    <a class="buttons" href="index.php"  role="button"> Αρχική σελίδα </a> 
                    <a class="buttons" href="announcement.php" role="button"> Ανακοινώσεις </a>
                    <a class="buttons" href="communication.php" role="button"> Επικοινωνία </a>
                    <a class="buttons" href="documents.php" role="button"> Έγραφα μαθήματος </a>
                    <a class="buttons" href="homework.php" role="button"> Εργασίες </a>
                </div>
            </div>
            <div id="main_page_content">
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

                // check if the user is a Tutor and add more elements
                if ($_SESSION['role']=='Tutor'){
                    echo '<a class="buttons2" style="margin:1%" href="announcement_form.php" role="button"> Προσθήκη νέας ανακοίνωσης </a>';
                    echo '<hr>';
                }

                // show announcements
                $result = $con->query("SELECT * FROM announcement");
                // output data of each row    
                if ($result->num_rows > 0) 
                    while($row = $result->fetch_assoc()) {
                        if ($_SESSION['role']=='Tutor'){
                            echo '<div style="display:flex; align-items: center;"><h2> Ανακοίνωση '.$row['Counter'].'</h2>
                                <a class="buttons2" style="margin:1%" href="announcement_delete.php?Counter='.$row['Counter'].'" role="button">[Διαγραφή]</a>
                                <a class="buttons2" style="margin:1%" href="announcement_update.php?Counter='.$row['Counter'].'" role="button">[Επεξεργασία]</a></div>';
                        }
                        else
                            echo "<h2> Ανακοίνωση ".$row['Counter']."</h2>" ;
                        echo "<p class=\"forms\"><b>Ημερομηνία: </b>".$row['Date'].'<br>';
                        echo "<b>Θέμα: </b> ".$row['Subject'].'<br>';
                        echo $row['Text'];
                        echo '<hr>';
                    }
                else
                    echo "<h2>Καμία Ανακοίνωση</h2>";

                $con->close();
            ?>

            </div>
            <div>
                <a class="top_button" href="#top" role="button"> top </a>
            </div>
            <div>
                <a class="logout" href="logout.php" role="button"> Logout </a>
            </div>
        </div>
    </body>
</html>

