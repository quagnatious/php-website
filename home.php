<html>
<head>
<!-- this is where you put PHP functions -->
<?php

require 'secure.php';


?>
</head>
<body>
<!-- jump to another page if we need to -->
<?php loadClass();?>
<?php linkBar();?>


<table align='center'>
<tr>
<td><b><?php printClass();?></b></td>
</tr>
</table>

</body>
</html>
