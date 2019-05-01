<html>
<head>
<!-- this is where you put PHP functions -->
<?php
require 'secure.php';

if ( !isset( $_SESSION['admingroup'] )
          || $_SESSION['admingroup'] != "admin" )
   header("Location: home.php");

?>
</head>
<body>
<!-- this is where you put html & embedded PHP -->
<?php linkBar();?>

This is a page for administrators only.

Welcome administrator = <?php echo($_SESSION['user']); ?> to the administratove zone.

</body>
</html>
