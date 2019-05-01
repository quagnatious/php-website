<?php
session_start();

if (!isset( $_SESSION['email']) )
   header("Location: welcome.php");

// Create connection object
$user = "kurban";
$con = mysqli_connect("localhost",$user,$user,$user);

// Check connection
if (mysqli_connect_errno()) {
  echo "<b>Failed to connect to MySQL: " . mysqli_connect_error() . "</b>";
}

loadClass();

function linkBar()
{
    echo "<form method='POST'>";
    echo "<center>";
    if ($_SESSION["admingroup"] == "admin")
    {
	echo "<a href='showaccounts.php'>Accounts</a>";
	echo "&nbsp;";
	echo "&nbsp;";
	echo "|";
    }
    echo "<a href='home.php'>Home</a>";
    echo "&nbsp;";
    echo "&nbsp;";
    echo "|";
    echo "&nbsp;";
    echo "&nbsp;";
    echo "<a href='logout.php'>Logout</a>";
    echo "&nbsp;";
    echo "&nbsp;";
    echo "|";
    echo "&nbsp;";
    echo "&nbsp;";
    printSearch();
    echo "</center>";
    echo "</form>";
}

function printClass()
{
  // isset is the php version of 'not None'
  if (isset ($_POST['class']) )
  {
    echo ("The class is:");
    echo ($_POST['class']);
  }
}

function loadClass()
{
  // force loading of the class selected
  if (isset ($_POST['class']) )
  {
    if ($_POST['class'] == 'csc123')
      header("Location: csc123.php");
    if ($_POST['class'] == 'csc155')
      header("Location: csc155.php");
    if ($_POST['class'] == 'csc220')
      header("Location: csc220.php");
  }
}

function printSearch()
{
    echo "
Enter Class:
<input type='text' name='class'>
<input type='submit' name='choice' value='Search' >
";
}

?>
