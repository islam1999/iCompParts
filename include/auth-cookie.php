<?php
  include ("../include/db_connect.php");
 if ($_SESSION['auth'] != 'true' && $_COOKIE["rememberme"])
  {

  $str = $_COOKIE["rememberme"];

  // Вся длина строки
  $all_len = strlen($str);
  // Длина логина
  $login_len = strpos($str,'+');
  // Обрезаем строку до Плюса и получаем Логин
  $login = substr($str,0,$login_len);

  // Получаем пароль
  $pass = substr($str,$login_len+1,$all_len);


     $result = mysqli_query($link,"SELECT * FROM reguser WHERE (login = '$login' or email = '$login') AND pass = '$pass'");
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

}
  }
?>
