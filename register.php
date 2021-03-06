<?php

session_start();

include( 'includes/user.class.php' );

$user = new User();

if( $user->isLoggedIn() ){
  $user->redirectTo( 'members' );
}

if( isset( $_POST['username'] ) ){
  // If register is successful.
	if( $user->register( $_POST['username'] , $_POST['password'] ) ){
		$message = 'Registration successful. Please login <a href="login.php">here</a>';
		$registered = TRUE;
	} else {
		$message = 'Sorry that username is already taken. Please try again.';
	}
}

?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>User.class - Login</title>
<link rel="stylesheet" type="text/css" href="css/reset.css" />
<link rel="stylesheet" type="text/css" href="css/main.css" />
<!--WEB FONTS -->
<link href="http://fonts.googleapis.com/css?family=Lato:100&v2" rel="stylesheet" type="text/css" />
<!--&&&&&&&&&-->
</head>
<body>
<div id="container">
  <h1>Register</h1>
  <div class="Sendtext">
    <form method="post">
<?php
if( isset( $message ) ){
  echo '<p>'.$message.'</p>';
}
if( !isset( $registered ) ){
?>
      <p><b>Username:</b></p>
      <input type="text" name="username" style=" margin-bottom: 10px;"/>
      <p><b>Password:</b></p>
      <input type="password" name="password" />
      </div>
      <input type="submit" value="register" class="button" />
<?php
}
?>
    </form>
  </div>
</div>
</body>
</html>