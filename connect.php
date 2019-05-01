<html>
<head>
<?php

// Create connection object
$user = "kurban";
$con = mysqli_connect("localhost",$user,$user,$user);

// Check connection
if (mysqli_connect_errno()) {
  echo "<b>Failed to connect to MySQL: " . mysqli_connect_error() . "</b>";
}
else {
  echo "Connect established";
}

?>

</head>
<body>
<br/>
This page jst tested the connection to the database.
</body>
</html>
