<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="cars.css" />
</head>
<body>
<h1>UHI Car Shop</h1>
<?php
  $email=$_POST['email'];
  $userpass=$_POST['userpass'];

  $db = mysql_connect('comp-server.uhi.ac.uk', 'pe19002984', 'jackfletcher');
  unset($db_user, $db_pass); 
  if (!$db)
  {
     echo 'Error: Could not connect to database.  Please try again later.';
     exit;
  }
  mysql_select_db('pe19002984');
  $query = "select * from CUSTOMER where email = '$email' and userpass = '$userpass'";

  $result = mysql_query($query);
  $num_results = mysql_num_rows($result);
  $row = mysql_fetch_array($result);
  extract($row);

   if ($num_results !=0)
  { 
  echo "<p>Hi there</p>"; 
  echo "<p>Please edit any details below that are incorrect before clicking to place an order</p>";
  
  echo "<form action='triporderentry.php' method='post'>
  <p>Customer No<br>
  <input type = 'text' name = 'username' value = '$username' readonly ></p>
  <p>Surname<br>
<input type='text' name='surname' value = '$surname' ></p>
<p>Forename<br>
<input type='text' name='forename' value = '$forename' ></p>
<p>Date of Birth<br>
<input type='date' name='dob' value = '$dob' ></p>
<p>Email<br>
<input type='text' name='email' value = '$email' readonly ></p>
<input name='submit' type='submit' value='Continue to place an order'>
</form>";
  }
 else
 	{
	echo "Incorrect try again!!";
	}
?>
</body>
</html>
