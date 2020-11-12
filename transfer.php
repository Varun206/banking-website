<!DOCTYPE html>
<!DOCTYPE html>
<html>
<head>
	<title>transfer</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

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
      <a class="navbar-brand" href="#">Banking Website</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class><a href="index.html">Home</a></li>
           </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="customer.php"> View Customers</a></li>
        <li><a href="transfer.php">Transfer history</a></li>
      </ul>
    </div>
  </div>
</nav>


<?php error_reporting (E_ALL ^ E_NOTICE); 
$From=$_POST['From'];

$To=$_POST['Name'];
;
$Amount=$_POST['Amount'];


$conn = mysqli_connect("localhost:3307", "root", "", "bank");
// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
$sql1 = "INSERT INTO transfer(from_customer, to_customer, amount) VALUES ('$From', '$To', $Amount) ";
$inserted =$conn->query($sql1);
//selecting current balance To wale ka
$sql4 = "select Current_Balance from customer where `Name` = '$To'";
$result = $conn->query($sql4);
$row = $result->fetch_assoc();
$CurrentMoneyTo = $row["Current_Balance"];
//selecting current balance From wale ka
$sql5 = "select Current_Balance from customer where `Name` = '$From'";
$result = $conn->query($sql5);
$row = $result->fetch_assoc();
$CurrentMoneyFrom = $row["Current_Balance"];
//Adding current money of to wala with transferred money
$sql2 = "UPDATE `customer` set `Current_Balance`='$CurrentMoneyTo'+'$Amount' where `Name`='$To'";
$result2 = $conn->query($sql2);
//Adding current money of from wala with transferred money
$sql3 = "UPDATE `customer` set `Current_Balance`='$CurrentMoneyFrom'-'$Amount' where `Name`='$From'";
// "UPDATE `students` SET `student_name` = '$name', `phone` = '$phn' WHERE `students`.`id` = $id"
$result3 = $conn->query($sql3);
$sql = "SELECT * FROM transfer";
$result = $conn->query($sql);

if($result){
  if($result->num_rows > 0) {
  	echo "<table><tr><th>From customer</th><th>To customer</th><th>AmountTransfered</th><tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["from_customer"]. "</td><td>" . $row["to_customer"]. "</td><td>" . $row["amount"]. "</td></tr>";
    }

}
 echo "</table>";
} else {
    echo "0 results";
}

?>

?>
<style type="text/css">
	body{background-color: #BDF3FC;
	}
	table{

			margin-right:auto;
			margin-left: auto;
			margin-top: 50px;
			width: 50%;


			
		}

		th {
           background-color: #16C7E5;
            border-style: solid;
			border-collapse: collapse;
			border-color: black;
			font-size: 20px;


              color: black;
}
tr{
	background-color:white;
	color: black;
	border-style: solid;
			border-collapse: collapse;
			border-color: black;

}
tr:nth-child(even) {background-color:#16C7E5;
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
			font-size: 20px;
}
li a
{
	font-size: 25px;
}
td,th
{
	text-align: center;
}

		@media only screen and (max-width: 600px)
		{
			td,th,tr{
				font-size: 20px;
			}
		}
</style>
</body>
</html>
