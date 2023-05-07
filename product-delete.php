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


if(isset($_GET["pid"])) {

    $delete_id = trim($_GET["pid"]);
    // sql to delete a record
    $sql = "DELETE FROM products WHERE id = $delete_id";

    if ($conn->query($sql) === TRUE) {

        $insert_success = "تم حذف المنتج بنجاح.";
        header("Location: control-panel.php?success=" . $insert_success);

    } else {

        $msg_err = "Error: " . $conn->error;
        header("Location: control-panel.php?error=" . $msg_err);
    }

    $conn->close();

}


?>