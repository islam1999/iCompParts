<?php
include ("../include/db_connect.php");
include ("../functions.php");

$email = $_POST["email"];

if ($email != "")
{

   $result = mysqli_query($link, "SELECT email FROM reguser WHERE email='$email'");
If (mysqli_num_rows($result) > 0)
{

// Генерация пароля.
//     $newpass = fungenpass();
//
// // Шифрование пароля.
//     $pass   = md5($newpass);
//     $pass   = strrev($pass);
//     $pass   = strtolower("9nm2rv8q".$pass."2yo6z");
//
// // Обновление пароля на новый.
// $update = mysqli_query ("UPDATE reguser SET pass='$pass' WHERE email='$email'",$link);
//
//
// // Отправка нового пароля.
//
// 	         send_mail( 'noreply@shop.ru',
// 			             $email,
// 						'Новый пароль для сайта MyShop.ru',
// 						'Ваш пароль: '.$newpass);

   echo 'true';

} else
  {
    echo 'false';
  }
}
  else
  {
    echo 'false';
  }
?>
