<?php include ("include/db_connect.php");
session_start();?>
<!DOCTYPE html>
<html lang="ru" dir="ltr">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="css/style.css" type="text/css">
		<script src="http://code.jquery.com/jquery-latest.js"></script>
		<script type="text/javascript" src="../js/script.js"></script>
		<script type="text/javascript" src="../js/jquery.form.js"></script>
		<!-- <script type="text/javascript" src="../js/jquery.validate.js"></script> -->
		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.js"> </script>
	<title>Ислам</title>
	</head>
	<body>
		<div id="block-body">
			<?php include ("include/block-header.php"); ?>
			<div id="block-right">
				<?php include ("include/block-category.php"); ?>
				<?php include ("include/block-parameter.php"); ?>
			</div>
			<div id="block-content">
        <?php include ("include/slider.php"); ?>
          <center><h1>О нас</h1></center>
            <p class="info">В ассортименте нашего магазина представлены не только новинки, но и проверенные, зарекомендовавшие себя модели компьютерных комплектующих: процессоры и материнские платы, накопители SSD и HDD диски, видеокарты и системы охлаждения, корпуса и блоки питания – Вы можете найти подходящий вариант под любые потребности и бюджет . Если же необходима консультация специалиста, наши опытные менеджеры всегда помогут Вам сделать правильный выбор!</p>

			</div>
			<?php include ("include/block-footer.php"); ?>

		</div>

	</body>
</html>
