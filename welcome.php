<html>
<head>
<!-- this is where you put PHP functions -->
<?php

session_start();

// Create connection object
$user = "kurban";
$con = mysqli_connect("localhost",$user,$user,$user);

// Check connection
if (mysqli_connect_errno()) {
  echo "<b>Failed to connect to MySQL: " . mysqli_connect_error() . "</b>";
}


function lookupAccount($conn)
{
    $sql = "SELECT * FROM users WHERE email='" . $_POST['email'] ."';";
    $result = $conn->query($sql);
    if (!$result)
    {
	return;
    }
    if ($result->num_rows == 1)
    {
        $row = $result->fetch_assoc();
        $epassword = $row['password'];
        if ($epassword == crypt($_POST['password'], $epassword))
	{
	    $_SESSION['email'] = $_POST['email'];
	    $_SESSION['admingroup'] = $row['admingroup'];
	    header("Location: home.php");
	}
    }
    
}

if (isset($_POST['email']))
{
   lookupAccount($con);
}

?>
</head>
<body>
Welcome to the csc155 class project thing.

Here's a link to <a href='createAccount.php'>Create New Account</a>

Login here:
<form method="POST">
<table align='center'>
<tr>
<td align='right'>email:</td> 
<td> <input type='text' name='email'> </td>
</tr>
<tr>
<td align='right'>password: <br/>(NO NO NO DON'T REALLY DO IT)</td>
<td> <input type='password' name='password'> </td>
<tr>
<td colspan='2'>
<input type='submit' name='choice' value='Login'>
</td>
</tr>
</form>

</body>
</html>
