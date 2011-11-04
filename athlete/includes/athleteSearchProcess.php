<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>Athlete Search</title>
</head>
<body>
<?php

    $searchtype=$_REQUEST['searchtype'];
    $searchterm=$_REQUEST['searchterm'];
    $searchterm= trim($searchterm);

    if(!$searchtype ||!$searchterm)
      {
        
 	echo '<p>You have not entered search term.</p>';
	exit;
      }

     $searchtype = addslashes($searchtype);
     $searchterm = addslashes($searchterm);
	 
    include'includes/DBconnect.php';
	
  @ $sql="SELECT * FROM Athlete WHERE $searchtype LIKE '%".$searchterm."%'";

    // var_dump($sql); exit(1);
   @ $result=mysql_query($sql);
	$num_rows=mysql_num_rows($result);

    $num_results = mysql_num_rows($result);
	if(!$num_results)
	{
	 echo 'No such record in the Database!';
	 }
	 else
	 {    
   echo '<p>Number of records found: '.$num_results.'</p>';
     }
?>

</body>
</html>
