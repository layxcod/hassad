
<?php
// Initialize the session
session_start();

if (isset($_SESSION['CREATED'])) {
    if (time() - $_SESSION['CREATED'] > 1800) {
        // session started more than 30 minutes ago
        session_unset();     // unset $_SESSION variable for the run-time 
        session_destroy();   // destroy session data in storage
        //header("location: profile.php");
    } 
}


if(!isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] !== true){
    header("location: login.php");
    //echo $_SESSION["loggedin"];
    exit;
}

 
// Include config file
require_once "config.php";


if(isset($_GET["id"])) {

    $id = trim($_GET["id"]);
    // sql to delete a record
    $sql = "UPDATE orders SET order_status = 2 WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        header("Location: profile.php");
    } else {
        header("Location: profile.php");
    }

    $conn->close();

}


?>