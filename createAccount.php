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

function insertBaseAccount($connection)
{
    $sql = "INSERT INTO users SET email='admin', password='1234';";
    mysqli_query($connection, $sql);
}    

function insertAccount($conn)
{

/*    $password = $_POST['password'];
    $epassword = crypt($password); // random salt
    echo "<h1>";
    echo $epassword; // no salt
    echo "<br/>";
    echo crypt($password, $epassword ); // no salt
    echo "</h1>";
*/
    $stmt = $conn->prepare("INSERT INTO users (email, password) 
                                        VALUES (?, ?)");
    $stmt->bind_param("ss", $email, $password);

    // set parameters and execute
    $email = $_POST['email'];
    $password = crypt($_POST['password']);  // store the encrypted password
    $stmt->execute();    
}

// page specific stuff
if (isset($_POST['email']))
{
    if ($_POST['password'] == $_POST['password_confirm'])
    {
	insertAccount($con);
	header("Location: welcome.php");
    }
    else
    {
	echo "Passwords don't match";
    }
}
?>

</head>
<body>
<br/>

<form method="POST">
email: <input type='text' name='email'> <br/>
password (NO NO NO DON'T REALLY DO IT): <input type='password' name='password'> <br/>
confirm password (NO NO NO DON'T REALLY DO IT): <input type='password' name='password_confirm'> <br/>
<input type='submit' name='choice' value='Create Account'>
</form>

<a href='welcome.php'>Return To Welcome Page</a>



</body>
</html>
