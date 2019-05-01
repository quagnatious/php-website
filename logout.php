<html>
<head>
<!-- this is where you put PHP functions -->
<?php
require 'secure.php';
unset( $_SESSION['email'] );
header("Location: welcome.php");

?>
</head>
<body>
<!-- this is where you put html & embedded PHP -->
<?php linkBar();?>

This is a page for CSC123, I hope you enjoy it alot!

Welcome <?php echo($_SESSION['user']); ?> to the class.

</body>
</html>
