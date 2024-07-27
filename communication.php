<html>
    <head>
        <meta charset="utf-8">
        <title> Επικοινωνία </title>
        <link rel="stylesheet" href="extra_files/styling.css">
    </head>

    <body>
        <h1> Επικοινωνία </h1>
        <div class="main">
            <div class="side"> 
                <div class="container">
                    <a class="buttons" href="index.php" role="button"> Αρχική σελίδα </a> 
                    <a class="buttons" href="announcement.php" role="button"> Ανακοινώσεις </a>
                    <a class="buttons" href="communication.php" role="button"> Επικοινωνία </a>
                    <a class="buttons" href="documents.php" role="button"> Έγραφα μαθήματος </a>
                    <a class="buttons" href="homework.php" role="button"> Εργασίες </a>
                </div>
            </div>
            <div id="main_page_content">
                <div class="forms"> <p>Η συγκεκριμένη ιστοσελίδα θα περιέχει δύο δυνατότητες για 
                    την αποστολή e-mail στον καθηγητή:</p>
                    <ul><li>Μέσω web φόρμας</li>
                    <li>Με χρήση e-mail διεύθυνσης</li></ul>
                </div>
                <h2> Αποστολή e-mail μέσω web φόρμας </h2>
                <form method="POST" style="margin-left: 3%";><div style="display:flex; align-items:center"> <b>Αποστολέας:</b> <textarea cols=37 row=1 type="text" id="sender" name="sender"></textarea></div><br>
                    <div style="display:flex; align-items:center"><b>Θέμα:</b> <textarea cols=43 row=1 type="text" id="subject" name="subject"></textarea> </div> <br>
                    <div style="display:flex; align-items:center"><b>Κείμενο:</b> <textarea cols=41 row=1 type="text" id="content" name="content"></textarea></div> <br>
                    <input class="buttons3" name="com" id="com" value="Αποστολή" type="submit">
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

                        if ( !isset($_POST['sender'], $_POST['subject'], $_POST['content']) )
                            echo '<p style="color:red;"> Please fill all fields. </p>';
                        else {
                            $subject = $_POST['subject'];
                            $txt = $_POST['content'];
                            $headers = $_POST['sender'];

                            $res = $con->query("SELECT Loginame FROM `user` WHERE Role='Tutor'");
                            if ($res->num_rows > 0){ 
                                while($row = $res->fetch_assoc())
                                    //mail(recriver, subject, text, additional_headers)
                                    mail($row['Loginame'],$subject,$txt,$headers);
                                echo '<p style="color:green;"> Send! </p>';
                            } else
                                echo '<p style="color:red;"> Error! </p>';
                        
                        }
                        // close connection
                        mysqli_close($con);


                    ?>
                </form>
                <hr>
                <h2> Αποστολή e-mail ε χρήση e-mail διεύθυνσης </h2>
                <div class="forms"> Εναλλακτικά μπορείτε να αποστείλετε e-mail στην 
                    παρακάτω διεύθυνση ηλεκτρονικού ταχυδρομείου: <br>
                    <a class="buttons2" href="mailto:tutor@csd.auth.test.gr" role="button"> tutor@csd.auth.test.gr </a>
                </div>
            </div>
            <div>
                <a class="logout" href="logout.php" role="button"> Logout </a>
            </div>
        </div>
    </body>

</html>