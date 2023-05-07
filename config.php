<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "store";
header ('Content-Type: text/html; charset=UTF-8'); 

  // Declare encoding META tag, it causes browser to load the UTF-8 charset 
  // before displaying the page. 
  echo '<meta http-equiv="Content-type" content="text/html; charset=UTF-8" />'; 

  // Right to Left issue 
 echo '<body dir="rtl">';
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);

}
