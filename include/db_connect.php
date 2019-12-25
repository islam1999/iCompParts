<?php

// $link = new mysqli('localhost', 'admin', 'admin', 'db_shop');
// if (mysqli_connect_error()) {
//  die('Ошибка подключения (' . mysqli_connect_errno() . ') '
//   . mysqli_connect_error());
// }
// mysqli_set_charset($link, "UTF-8");



$link = mysqli_connect(
            'localhost',  /* Хост, к которому мы подключаемся */
            'admin',       /* Имя пользователя */
            'admin',   /* Используемый пароль */
            'db_shop');     /* База данных для запросов по умолчанию */

if (!$link) {
   echo "Ошибка подключения к базе данных. Код ошибки: ".mysqli_connect_error();
   exit;
}
mysqli_set_charset($link, "UTF-8");
?>
