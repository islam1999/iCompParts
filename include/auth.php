<?php
	  include ("../include/db_connect.php");

    $login = $_POST["login"];

    $pass   = md5($_POST["pass"]);
    $pass   = strrev($pass);
    $pass   = strtolower("9nm2rv8q".$pass."2yo6z");



    if ($_POST["rememberme"] == "yes")
    {

            setcookie ("rememberme",$login.'+'.$pass,time()+600, "/");

    }


   $result = mysqli_query($link,"SELECT * FROM reguser WHERE (login = '$login' OR email = '$login') AND pass = '$pass' ");
If (mysqli_num_rows($result) > 0)
{
    $row = mysqli_fetch_array($result);
    session_start();
    $_SESSION['auth'] = 'true';
    $_SESSION['pass3'] = $row["pass"];
    $_SESSION['login3'] = $row["login"];
    $_SESSION['name_3'] = $row["first_name"];
    $_SESSION['name3'] = $row["last_name"];
    $_SESSION['telefon3'] = $row["telefon"];
    $_SESSION['email3'] = $row["email"];
    echo "true";

}else
{
    echo "false";
}


?>
