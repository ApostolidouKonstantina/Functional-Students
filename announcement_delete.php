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

    $sql = "DELETE FROM `announcement` WHERE Counter=$cn";

    if ($con->query($sql) === TRUE) 
        header("Location: announcement.php");
    else
        echo '<p style="color:red; text-align:center"> Error! </p>';

    mysqli_close($con);
            
?>
