<html>
<head>
<!-- this is where you put PHP functions -->
<?php
require 'secure.php';

if ( !isset( $_SESSION['admingroup'] )
          || $_SESSION['admingroup'] != "admin" )
   header("Location: home.php");

if ( isset( $_POST['choice'] ) 
          && $_POST['choice'] == "DELETE" )
{
    $sql = "DELETE FROM users WHERE id='" . $_POST['id'] . "';";
    $result = $con->query($sql);
}
 


function printUserTable($conn)
{
    $sql = "SELECT * FROM users;";
    $result = $conn->query($sql);
    $color1='antiquewhite';
    $color2='white';
    echo "<table align='center' border='0'>";
    $count = 1;
    while ( $row = $result->fetch_assoc() )
    {
	if ($count % 2 == 0)
	    echo "<tr bgcolor='" . $color1 ."'>";
	else
	    echo "<tr bgcolor='" . $color2 ."'>";
	$count ++;
	echo "<form method='POST' ";
	echo "onsubmit='return confirm(\"Delete the account:";
	echo $row['email'];
	echo "\");'>";
	echo "<td>" . $row['id'] . "</td>";
	echo "<td>" . $row['email'] . "</td>";
	echo "<td>" . $row['admingroup'] . "</td>";
	echo "<td>";
	echo "<input type='text' name='id' value='" . $row['id'] ."'>";
	echo "<input type='submit' name='choice' value='DELETE'>";
	echo "</td>";
	echo "</form>";
	echo "</tr>";
    }
    echo "</table>";
}


?>
</head>
<body>
<!-- this is where you put html & embedded PHP -->
<?php linkBar();?>
Welcome administrator = <?php echo($_SESSION['email']); ?> to the administrative zone.
<?php printUserTable($con); ?>



</body>
</html>
