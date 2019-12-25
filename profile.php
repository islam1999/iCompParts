<?php
session_start();
if ($_SESSION ['auth'] == 'true'){
include ("include/db_connect.php");
include ("functions.php");
// ini_set('display_errors',1);
// error_reporting(E_ALL);
if ($_POST["save_submit"])
  {

 // $_POST["info_surname"] = clear_string($_POST["info_surname"]);
 // $_POST["info_name"] = clear_string($_POST["info_name"]);
 // $_POST["info_phone"] = clear_string($_POST["info_phone"]);
 // $_POST["info_email"] = clear_string($_POST["info_email"]);

 $error = array();

 $pass   = md5($_POST["info_pass"]);
 $pass   = strrev($pass);
 $pass   = "9nm2rv8q".$pass."2yo6z";

if($_SESSION['pass3'] != $pass)
{
 $error[]='Неверный текущий пароль!';
}else
 {

   if($_POST["info_new_pass"] != "")
{
         if(strlen($_POST["info_new_pass"]) < 7 || strlen($_POST["info_new_pass"]) > 15)
           {
            $error[]='Укажите новый пароль от 7 до 15 символов!';
           }else
             {
                  $newpass   = md5($_POST["info_new_pass"]);
                  $newpass   = strrev($newpass);
                  $newpass   = "9nm2rv8q".$newpass."2yo6z";
                  $newpassquery = "pass='".$newpass."',";
             }
}



     if(strlen($_POST["info_surname"]) < 3 || strlen($_POST["info_surname"]) > 15)
{
 $error[]='Укажите Фамилию от 3 до 15 символов!';
}


     if(strlen($_POST["info_name"]) < 3 || strlen($_POST["info_name"]) > 15)
{
 $error[]='Укажите Имя от 3 до 15 символов!';
}

     if(!preg_match("/^(?:[a-z0-9]+(?:[-_.]?[a-z0-9]+)?@[a-z0-9_.-]+(?:\.?[a-z0-9]+)?\.[a-z]{2,5})$/i",trim($_POST["info_email"])))
{
 $error[]='Укажите корректный email!';
}

   if(strlen($_POST["info_phone"]) == "")
{
 $error[]='Укажите номер телефона!';
}

 }

if(count($error))
{
 $_SESSION['msg'] = "<p align='left' id='form-error'>".implode('<br />',$error)."</p>";
}else
 {
     $_SESSION['msg'] = "<p align='left' id='form-success'>Данные успешно сохранены!</p>";

  $dataquery = $newpassquery."first_name='".$_POST["info_surname"]."',last_name='".$_POST["info_name"]."',email='".$_POST["info_email"]."',telefon='".$_POST["info_phone"]."'";
  $update = mysqli_query($link,"UPDATE reguser SET $dataquery WHERE login = '{$_SESSION['login3']}'");

 if ($newpass){ $_SESSION['pass3'] = $newpass; }


 $_SESSION['name_3'] = $_POST["info_surname"];
 $_SESSION['name3'] = $_POST["info_name"];
 $_SESSION['telefon3'] = $_POST["info_phone"];
 $_SESSION['email3'] = $_POST["info_email"];

 }

  }

?>
<!DOCTYPE html>
<html lang="ru" dir="ltr">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="css/style.css" type="text/css">
		<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="crossorigin="anonymous"></script>
		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.js"></script>
		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.2.2/jquery.form.js"></script>
		<script type="text/javascript" src="../js/script.js"></script>
		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.js"></script>

	<title>Профиль</title>
	</head>
	<body>
		<div id="block-body">
			<?php include ("include/block-header.php"); ?>
			<div id="block-right">
				<?php include ("include/block-category.php"); ?>
				<?php include ("include/block-parameter.php"); ?>
			</div>
			<div id="block-content">
					<center><h2 class ="title-h3">Изменение профиля</h2></center>
          <form method="post">
            <?php
              if($_SESSION['msg'])
          		{
          		echo $_SESSION['msg'];
          		unset($_SESSION['msg']);
          		}
            ?>
            <ul id="info-profile">
              <li>
                <label for="info_pass">Текущий пароль</label>
                <span class="star">*</span>
                <input type="password" name="info_pass" id="info_pass" value="" />
              </li>

              <li>
                <label for="info_new_pass">Новый пароль</label>
                <span class="star">*</span>
                <input type="password" name="info_new_pass" id="info_new_pass" value="" />
              </li>

              <li>
                <label for="info_surname">Фамилия</label>
                <span class="star">*</span>
                <input type="text" name="info_surname" id="info_surname" value="<?php echo $_SESSION['name_3']; ?>"  />
              </li>

              <li>
                <label for="info_name">Имя</label>
                <span class="star">*</span>
                <input type="text" name="info_name" id="info_name" value="<?php echo $_SESSION['name3']; ?>"  />
              </li>
              <li>
                <label for="info_email">E-mail</label>
                <span class="star">*</span>
                <input type="text" name="info_email" id="info_email" value="<?php echo $_SESSION['email3']; ?>" />
              </li>

              <li>
                <label for="info_phone">Телефон</label>
                <span class="star">*</span>
                <input type="text" name="info_phone" id="info_phone" value="<?php echo $_SESSION['telefon3']; ?>" />
              </li>
            </ul>
            <p align="right"><input type="submit" id="form_submit" name="save_submit" value="Сохранить" /></p>
          </form>
			</div>
			<?php include ("include/block-footer.php"); ?>
		</div>
	</body>
</html>
<?php
    }else{
        header("Location: index.php");
    }
?>
