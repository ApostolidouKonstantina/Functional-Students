<?php
	//sessions to keep variables from login
	session_start();
	// Go back to the login page if the user is not signed in
	if (!isset($_SESSION['loggedin'])) {
		header('Location: login.php');
		exit;
    }
?>

<html>
    <head>
        <meta charset="utf-8">
        <title> Αρχική σελίδα </title>
        <link rel="stylesheet" href="extra_files/styling.css">
    </head>

    <body>
        <h1> Αρχική σελίδα </h1>
        <div class="main">
            <div class="side"> 
                <div class="container">
                    <a class="buttons" href="index.php"> Αρχική σελίδα </a> 
                    <a class="buttons" href="announcement.php" role="button"> Ανακοινώσεις </a>
                    <a class="buttons" href="communication.php" role="button"> Επικοινωνία </a>
                    <a class="buttons" href="documents.php" role="button"> Έγραφα μαθήματος </a>
                    <a class="buttons" href="homework.php" role="button"> Εργασίες </a>
                </div>
            </div>
            <div id="main_page_content"> <div id="container2">
                <p>Καλώς ήρθατε στο μάθημα Εκπαιδευτικά Περιβάλλοντα Διαδικτύου! <br> <br>
                    Σκοπός του μαθήματος είναι η κατανόηση προτύπων που αφορούν εκπαιδευτικά περιβάλλοντα Διαδικτύου,
                    η δημιουργία παιδαγωγικών σχεδιάσεων με περιπτώσεις χρήσης (use cases), και η διαδικασία επιλογής ολοκληρωμένων 
                    περιβαλλόντων Διαδικτύου για την υποστήριξη διαδικτυακής μάθησης και εκπαίδευσης.
                </p> <br>
                <div><p> Στις ενότητες αριστερά μπορείται να βρείτε αντίστοιχα: </p>
                    <ul> <li> <a class="buttons2" href="announcement.html" role="button"> Ανακοινώσεις</a> σχετικά με το μάθημα </li>
                    <li> <a class="buttons2" href="communication.html" role="button"> Επικοινωνία</a> με τον διδάσκοντα μέσω web φόρμας  και με χρήση e-mail διεύθυνσης</li>
                    <li> <a class="buttons2" href="documents.html" role="button"> Έγραφα του μαθήματος</a> για download</li>
                    <li> <a class="buttons2" href="homework.html" role="button"> Εκφωνήσεις εργασιών</a> για download</li></ul> </div>
            </div>
            <img src="extra_files/image1.png">
        </div>
            <div>
                <a class="logout" href="logout.php" role="button"> Logout </a>
            </div>
        </div>
    </body>

</html>
