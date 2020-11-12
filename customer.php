<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<title>Customer</title>
<style>
body
{
	background-color: #BDF3FC;
}
table {
border-collapse: collapse;
width: 50%;
color: white;
font-family: monospace;
font-size: 25px;
text-align: left;
margin-right: auto;
margin-left: auto;



}
table a{
	color:black;
}
th {
background-color: #16C7E5;
border-style: solid;
			border-collapse: collapse;
			border-color: black;


color: black;
}
tr{
	background-color:#16C7E5;
	color: black;
	border-style: solid;
			border-collapse: collapse;
			border-color: black;

}
tr:nth-child(even) {background-color:white;
color: black;
border-style: solid;
			border-collapse: collapse;
			border-color: black;
}
td
{
	border-style: solid;
			border-collapse: collapse;
			border-color: black;
}
li a
{
	font-size: 25px;
}
th,td{
	text-align: center;
}


@media only screen and (max-width: 600px){
	body
	{
		
	 background-color: #BDF3FC;
	}
	table{

	margin-top: 60px;
	
	margin-right: auto;
    margin-left: auto;
    margin-bottom: auto;
    border-collapse: collapse;
    width: 50%;
    color: #111989 ;
    font-family: monospace;
    font-size: 20px;
    text-align: center;


	}
	
}
</style>
</head>
<body>
	
	<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="home.html">Banking Website</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li ><a href="index.html">Home</a></li>
           </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="customer.php"> View Customers</a></li>
        <li><a href="transfer.php">Transfer history</a></li>
      </ul>
    </div>
  </div>
</nav>
<h1 style="color: black"><center>CUSTOMERS</center></h1>

<table>


<?php error_reporting (E_ALL ^ E_NOTICE);


$conn = mysqli_connect("localhost", "root", "root", "bank");
// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT * FROM customer";
$result = $conn->query($sql);
  if($result->num_rows > 0) {

    echo "<table><tr><th>ID</th><th>Name</th><th>Email_id</th><th>Balance </th> <th>Operation</tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
    	$id=$row['id'];
        echo "<tr><td>" . $row["id"]. "</td><td>" . $row["Name"]. "</td><td>" . $row["Email"]. "</td><td>" . $row["Current_Balance"];
        echo "<td> <a href ='view.php?id=$id'>   View </a></tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
 
}

?>
</table>
</body>
</html>