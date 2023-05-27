<?php
 session_start();


 if (isset($_SESSION['username'])) {
 ?>
<?php

$user = $_SESSION['username'];

echo"welcome $user";
echo"<a href='logout.php'>سجل خروج</a>";

?>


   
 <?php

 } else {
  ?>
   Not logged in HTML and code here
   <?php
 }