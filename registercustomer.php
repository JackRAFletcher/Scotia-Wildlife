<!DOCTYPE html>
<html>
<head>
  <title>User Registration</title>
  <link rel="stylesheet" type="text/css" href="style.css" />
</head>
<body>
<h1>Customer Registration</h1>

<?php
  $forename=$_POST['forename'];
  $surname=$_POST['surname'];
  $dateofbirth=$_POST['dateofbirth'];
  $email=$_POST['email'];
  $userpass=$_POST['userpass'];
  

  $db = mysql_connect('comp-server.uhi.ac.uk', 'pe19002984', 'jackfletcher');
  if (!$db)
  {
     echo 'Error: Could not connect to database.  Please try again later.';
     exit;
  }
  else
  {
	mysql_select_db('pe19002984');
    $query = "insert into CUSTOMER(forename,surname,dob,email,userpass) values ('$forename','$surname','$dateofbirth','$email','$userpass')";
   
   $result = mysql_query($query);
  if($result)
  	echo '<p>New Customer inserted</p>';
   else
   	echo '<p>Did not work</p>';
   }
?>
<p>Click <a href="user_login.html">here</a> to return to the login page</font></p>
</body>
</html>
