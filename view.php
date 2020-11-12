<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

	<title>VIEW</title>
	<style type="text/css">
		body{
			background-color: #BDF3FC;
			
			
		}
		pre{
			font-size: 20px;
			text-align: center;

		}
		table{

			margin-right:auto;
			margin-left: auto;
			margin-top: 50px;

			
		}

		th{
			font-size: 35px;
			padding-right: 15px;
			text-align: center;
			border-width: 2px;
			border-style: solid;
			border-collapse: collapse;
			border-color: black;
			color: black;
			background-color:#16C7E5;
			
		}
		td{
			font-size: 30px;
			color: #111989;
			font-weight: bold;
			padding-right: 15px;
			text-align: center;
			border-width: 2px;
			border-style: solid;
			border-collapse: collapse;
			border-color: black;
			color: black;
			background-color: white;
		}
	form{
		
		position: absolute;
		padding-top: 10px;
		left: 600px;
	}
	label{
		font-size: 30px;
		margin-bottom: 10px;
		color: black;
		padding-top: 10px;
	}
	#Name{
		background-color: white ;
		color: black;
		font-size: 25px;
		margin-bottom: 15px;
		padding-top: 5px;
		padding-bottom: 5px;

	}
	#Amount{
		background-color: white  ;
		color: black;
		font-size: 25px;
		margin-bottom: 15px;
		padding-top: 5px;
		padding-bottom: 5px;
	}
	#From{
		background-color: white  ;
		color: black;
		font-size: 25px;
		margin-bottom: 15px;
		padding-top: 5px;
		padding-bottom: 5px;
	}
	#button{
		padding-top: 10px;
		padding-bottom: 10px;
		background-color: #2B3081;
		color: #CBC9F7;
		cursor: pointer;
		font-size: 25px;
		margin-bottom: 25px;
	}
	li a
{
	font-size: 25px;
}
td,th
{
	text-align: center;
	
}

	@media screen and (max-width: 600px){



		pre{
			font-size: 10px;
			text-align: center;

		}
		table{

			margin-right:auto;
			margin-left: auto;
			margin-top: 50px;

			
		}

		th{
			font-size: 25px;
			padding-right: 5px;
			text-align: center;
			border-width: 1px;
			border-style: solid;
			border-collapse: collapse;
			border-color: black;
			color: black;
			
		}
		td{
			font-size: 20px;
			
			font-weight: bold;
			padding-right: 5px;
			text-align: center;
			border-width: 1px;
			border-style: solid;
			border-collapse: collapse;
			border-color: black;
			color: black;
			background-color: white;
		}
	form{
		
		position: absolute;
		bottom: 150px;
		left: 130px;
	}
	label{
		font-size: 20px;
		margin-bottom: 15px;
		color: black;
	}
	#Name{
		background-color: white ;
		color: black;
		font-size: 20px;
		margin-bottom: 15px;
		padding-top: 4px;
		padding-bottom: 4px;
	}
	#Amount{
		background-color: white  ;
		color: black;
		font-size: 20px;
		margin-bottom: 15px;
		padding-top: 4px;
		padding-bottom: 4px;
	}
	#From{
		background-color: white  ;
		color: black;
		font-size: 20px;
		margin-bottom: 15px;
		padding-top: 4px;
		padding-bottom: 4px;
	}
	#button{
		padding-top: 5px;
		padding-bottom: 5px;
		background-color: #2B3081;
		color: #CBC9F7;
		cursor: pointer;
		font-size: 20px;
		margin-bottom: 0px;
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
      <a class="navbar-brand" href="index.html">Banking Website</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li ><a href="home.html">Home</a></li>
           </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="customer.php"> View Customers</a></li>
        <li><a href="transfer.php">Transfer history</a></li>
      </ul>
    </div>
  </div>
</nav>


<?php
$id = $_GET['id'];

$conn = mysqli_connect("localhost:3307", "root", "root", "bank");
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT * FROM customer WHERE id=$id";
$result = $conn->query($sql);
if($result){
  if($result->num_rows > 0) {
  	echo "<table><tr><th>ID</th><th>Name</th><th>Email_id</th><th>Balance</th></tr>";
    while($row = $result->fetch_assoc()) {
    	$Name =$row["Name"];
     echo "<tr><td>" . $row["id"]. "</td><td>" . $row["Name"]. "</td><td>" . $row["Email"]. "</td><td>" . $row["Current_Balance"];

    }

}
 echo "</table>";
} else {
    echo "0 results";
}

?>
<form action="transfer.php" method="POST" >
	<label for="From" >From:</label><br>
			<input type="text" placeholder="From" name="From" id="From" required><br>
	<label for="Name" >To:</label><br>
			<input type="text" placeholder="<?php echo($Name)?>" name="Name" id="Name" required><br>
	<label for="Amount" >Amount:</label><br>
			<input type="text" placeholder="Amount to transfer" name="Amount" id="Amount"  required><br>
	<input type="submit" value="Transfer Money" name="Submit" id="button">
	

	
</form>
</body>
</html>