<?php
  include ("../include/db_connect.php");

     $error = array();
     mysqli_set_charset("UTF-8");

        $login = $_POST['reg_login'];
        $pass = $_POST['pass1'];
        $surname = $_POST['name2'];

        $name = $_POST['name1'];
        $email = $_POST['email'];

        $phone = $_POST['telefon'];


    if (strlen($login) < 5 or strlen($login) > 15)
    {
       $error[] = "Логин  должен быть от 5 до 15 !";
    }
    else
    {
     $result = mysqli_query($link,"SELECT login FROM reguser WHERE login = '$login'");
        if(mysqli_num_rows($result) > 0)
            {
              $error[] = "Логин занят!";

            }
    }

    if (strlen($pass) < 7 or strlen($pass) > 15) $error[] = "Укажите пароль от 7 до 15 символов!";
    if (strlen($surname) < 3 or strlen($surname) > 20) $error[] = "Укажите Фамилию от 3 до 20 символов!";
    if (strlen($name) < 3 or strlen($name) > 15) $error[] = "Укажите Имя от 3 до 15 символов!";
    if (!preg_match("/^(?:[a-z0-9]+(?:[-_.]?[a-z0-9]+)?@[a-z0-9_.-]+(?:\.?[a-z0-9]+)?\.[a-z]{2,5})$/i",trim($email))) $error[] = "Укажите корректный email!";
    if (!$phone) $error[] = "Укажите номер телефона!";

   if (count($error))
   {

 echo implode('<br />',$error);

   }else
   {
        $pass   = md5($pass);
        $pass   = strrev($pass);
        $pass   = "9nm2rv8q".$pass."2yo6z";


		$result=mysqli_query($link,"INSERT INTO `reguser` (`login`, `pass`,`first_name`, `last_name`, `email`, `telefon`,`datetime`) VALUES ('$login','$pass','$surname','$name','$email','$phone',NOW())");

echo 'true';

 }



?>
