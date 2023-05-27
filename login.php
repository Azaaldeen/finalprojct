<?php
session_start();
require_once('connect.php');
if(isset($_POST) & !empty($_POST)){
 $username = mysqli_real_escape_string($connection, $_POST['username']);
 $password = md5($_POST['password']);

 $sql = "SELECT * FROM `login` WHERE username='$username' AND password='$password'";
 $result = mysqli_query($connection, $sql);
 $count = mysqli_num_rows($result);
 if($count == 1){
  $_SESSION['username'] = $username;
 }else{

  $fmsg = "<div class='fmsg fmg'>تم ضبط محاولة دخول فاشلة وغير مصرح بها </div>";

  
 }
}
if(isset($_SESSION['username'])){
 $smsg = "<div class='smsg'>دخول ناجح</div>";
 echo "
 <meta HTTP-EQUIV='REFRESH' content='0; url=login/welcome.php'/>";
}
?>
<!DOCTYPE html>
<html>
<head>
 <title>User Login in PHP & MySQL</title>
 <!-- Latest compiled and minified CSS -->
 <link rel="stylesheet" href="styles.css" >

 <!-- Latest compiled and minified JavaScript -->
 <script src="" ></script>

 <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
<div class="container">
      <?php if(isset($smsg)){ ?><div class="alert alert-success" role="alert"> <?php echo $smsg; ?> </div><?php } ?>
      <?php if(isset($fmsg)){ ?><div class="alert alert-danger" role="alert"> <?php echo $fmsg; ?> </div><?php } ?>
      <form class="form-signin" method="POST">
        <h2 class="form-signin-heading">منطقة الادارة - تسجيل الدخول</h2>
        <div class="input-group">
    <span class="input-group-addon" id="basic-addon1">@</span>
    <input type="text" name="username" class="form-control" placeholder="Username" required>
  </div>
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>
        <button class="btn btn-lg btn-primary btn-block" type="submit">دخول</button>
      
      </form>
</div>
</body>
</html>