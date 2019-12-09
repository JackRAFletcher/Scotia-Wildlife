<html>
<head>
  <h1>Alba Wildlife Cruisees</h1>
  <link rel="stylesheet" type="text/css" href="cars.css" />
</head>
<body>
 <?php
  $username=$_POST['username'];
  $tripid=$_POST['tripid'];
   
 $db = mysql_connect('comp-server.uhi.ac.uk', 'pe19002984', 'jackfletcher');
if (!$db)
  {
     echo 'Error: Could not connect to database.  Please try again later.';
     exit;
  }
  mysql_select_db('pe19002984');
  $query = "insert into TRIPORDER(username,tripid) values ('$username','$tripid')";
  $result = mysql_query($query);
  
  $query = "select * from CUSTOMER where username = '$username' ";
  $result = mysql_query($query);
  $row = mysql_fetch_array($result);
  extract($row);
  
  $query2 = "select * from TRIP where tripid = '$tripid' ";
  $result2 = mysql_query($query2);
  $row2 = mysql_fetch_array($result2);
  extract($row2);
 
    //if (strcmp($discount,"gold")==0)
	//	$price=$price*0.8; 
	//if (strcmp($discount,"silver")==0)
	//	$price=$price*0.9; 
	
echo "<form name='form1' method='post'>
<br>
<p>User Name:  $username </p> 
<p>Forename:  $forename</p>
<p>Surname:  $surname</p>
<p>Trip id:  $tripid</p>
<p>Destination:  $destination</p>
<p>Price:  $cost</p>

<input name='button' type='button' onClick='window.print()' value='Print Booking confirmation'>
</form>"
?>
</body>
</html>
