<?php

include("../include/db_connect.php");
$login =$_POST['reg_login'];
$email =$_POST['email'];

$result = mysqli_query($link,"SELECT login FROM reguser WHERE login = '$login' OR email='$email'");
If (mysqli_num_rows($result) > 0)
{
   echo 'false';
}
else
{
   echo 'true';
}

?>
