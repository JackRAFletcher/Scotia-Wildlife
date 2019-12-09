<html>
<head>
<title>Untitled Document</title>
<link rel="stylesheet" type="text/css" href="cars.css" />
</head>
<body>
<?php
  $username=$_POST['username'];
  $surname=$_POST['surname'];
  $forename=$_POST['forename'];
  $dateofbirth=$_POST['dateofbirth'];
  $email=$_POST['email'];
  
  
      
echo "
<form name='form1' method='post' action='triporderform.php'>
  <p><h1></h1></p>
  <p>Username   
  <input type ='text' name='username' value='$username' readonly ></p>";

 $db = mysql_connect('comp-server.uhi.ac.uk', 'pe19002984', 'jackfletcher');
	  if (!$db)
  		{
     	echo "Error: Could not connect to database.  Please try again later.";
     	exit;
  		}
	  mysql_select_db('pe19002984');
	  
	  $query = "update CUSTOMER set surname= '$surname', forename='$forename',dob='$dob',email = '$email' where username = '$username'";

   $result = mysql_query($query);
   
  
  	  $query = "select * from TRIP";
  	  $result = mysql_query($query);
	  $num_results=mysql_num_rows($result);
	  	
 	 for ($i=0;$i<$num_results;$i++)
	 {
			
		$row=mysql_fetch_array($result);
		extract($row);
		echo "<p>Trip ID:",$tripid;
		echo "<br>";
		echo "Cost ",$cost;
		echo "<br>";
		echo "Destination: ",$destination;
		echo "<br>";
		}
echo "<p>Please select the ID of the trip you wish to order</p>";
$result = mysql_query($query);   //rerun the query return to top of table
echo"
       <select name=user id>";
		 for ($i=0; $i <$num_results; $i++)
		  {
			$row = mysql_fetch_array($result);
			extract($row); 
		    echo "<option value = ",$tripid,">",$tripid,"</option>";
		 }
echo"</select>

<p>To place order click Submit</p>
    <input type='submit' name='Submit' value='Submit'>
</form>";
?>
</body>
</html>
