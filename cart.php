<?php
session_start();
include ("include/db_connect.php");
include ("include/auth-cookie.php");
//unset($_SESSION ['auth']);
// ini_set('display_errors',1);
// error_reporting(E_ALL);
		$id = $_GET["id"];
     $action = $_GET["action"];

   	switch ($action) {
	    	case 'clear':
        $clear = mysqli_query ($link,"DELETE FROM cart WHERE cart_ip = '{$_SERVER['REMOTE_ADDR']}'");
	    	break;
        case 'delete':
        $delete = mysqli_query($link,"DELETE FROM cart WHERE cart_id = '$id' AND cart_ip = '{$_SERVER['REMOTE_ADDR']}'");
        break;
				}
			if (isset($_POST["submitdata"]))
				{
						$_SESSION["order_delivery"] = $_POST["order_delivery"];
						$_SESSION["order_fio"] = $_POST["order_fio"];
						$_SESSION["order_email"] = $_POST["order_email"];
						$_SESSION["order_phone"] = $_POST["order_phone"];
						$_SESSION["order_note"] = $_POST["order_note"];
						header("Location: cart.php?action=completion");
				}
						$result = mysqli_query($link,"SELECT * FROM cart,table_products WHERE cart.cart_ip = '{$_SERVER['REMOTE_ADDR']}' and table_products.products_id = cart.cart_id_products");
						if (mysqli_num_rows($result) > 0 )
						{
						$row = mysqli_fetch_array($result);
						do
						{
						$int = $int + ($row["price"] * $row["cart_count"]);
						}
						 while ($row = mysqli_fetch_array($result));
						   $itogpricecart = $int;
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

	<title>Корзина</title>
	</head>
	<body>
		<div id="block-body">
			<?php include ("include/block-header.php"); ?>
			<div id="block-right">
				<?php include ("include/block-category.php"); ?>
				<?php include ("include/block-parameter.php"); ?>
			</div>
			<div id="block-content">
						<?php
						$action = $_GET["action"];
						switch ($action) {
							case 'oneclick':
							echo '
							<div id="block-step">
								<div id="name-step">
									<ul>
										<li><a class="active">1. Корзина товаров</a></li>
										<li><span>&#8594</span></li>
										<li><a>2. Контактные данные</a></li>
										<li><span>&#8594</span></li>
										<li><a>3. Подтверждение</a></li>
									</ul>
								</div>
								<p>Шаг 1 из 3</p>
								<a href="cart.php?action=clear">Очистить</a>
							</div>
							';
							$result = mysqli_query($link,"SELECT * FROM cart,table_products WHERE cart.cart_ip = '{$_SERVER['REMOTE_ADDR']}' and table_products.products_id = cart.cart_id_products");
							if (mysqli_num_rows($result) > 0 ) {
								$row = mysqli_fetch_array($result);
								echo '
								<div id="header-list-cart">
										<div id="head1">
											Изображение
										</div>
										<div id="head2">
											Наименование товара
										</div>
										<div id="head3">
											Кол-во
										</div>
										<div id="head4">
												Цена
										</div>
								</div>
								';
								do {
									$int = $row["cart_price"] * $row["cart_count"];
									$all_price = $all_price + $int;
									if (strlen($row["image"]) > 0 && file_exists("./upload-images/".$row["image"]))
									{
									$img_path = './upload-images/'.$row["image"];
									$max_width = 130;
									$max_height = 130;
									 list($width, $height) = getimagesize($img_path);
									$ratioh = $max_height/$height;
									$ratiow = $max_width/$width;
									$ratio = min($ratioh, $ratiow);

									$width = intval($ratio*$width);
									$height = intval($ratio*$height);
									}else
									{
									$img_path = "/upload_images/no-images.jpeg";
									$width = 120;
									$height = 105;
									}
									echo '

									<div class="block-list-cart">
										<div class="img-cart">
											<p align="center"><img src="'.$img_path.'" width="'.$width.'" height="'.$height.'" /></p>
										</div>
										<div class="title-cart">
											<p><a href="">'.$row["title"].'</a></p>
											<p class="cart-mini-features">'.$row["mini_features"].'</p>
										</div>
										<div class="count-cart">
											<ul class="input-count-style">
											<li>
												<p align="center" iid="'.$row["cart_id"].'" class="count-minus">-</p>
											</li>
											<li>
											<p align="center"><input id="input-id'.$row["cart_id"].'" iid="'.$row["cart_id"].'" class="count-input" maxlength="3" type="text" value="'.$row["cart_count"].'" /></p>

											</li>
											<li>
												<p align="center" iid="'.$row["cart_id"].'" class="count-plus">+</p>
											</li>
										</ul>
										</div>
										<div id="tovar'.$row["cart_id"].'" class="price-product"><h5><span class="span-count">'.$row["cart_count"].'&nbsp</span>x&nbsp<span>'.$row["cart_price"].'</span></h5><p price="'.$row["cart_price"].'">'.$int.'</p></div>
										<div class="delete-cart"><a  href="cart.php?id='.$row["cart_id"].'&action=delete" ><img src="/image/bsk_item_del.png" /></a></div>

									<div id="bottom-cart-line"></div>
									</div>
									';

								} while ($row = mysqli_fetch_array($result));
								echo '
								<h2 class="itog-price" align="right">Итого: <strong>'.$all_price.'</strong> руб</h2>
								<p align="right" class="button-next" ><a href="cart.php?action=confirm" >Далее</a></p>
								';

								}
								else
								{
								echo '<h3 id="clear-cart" align="center">Корзина пуста</h3>';
								}
								break;
							case 'confirm':
							echo '
							<div id="block-step">
								<div id="name-step">
									<ul>
										<li><a href="cart.php?action=oneclick">1. Корзина товаров</a></li>
										<li><span>&#8594</span></li>
										<li><a class="active">2. Контактные данные</a></li>
										<li><span>&#8594</span></li>
										<li><a>3. Подтверждение</a></li>
									</ul>
								</div>
								<p>Шаг 2 из 3</p>
							</div>
							';



							if ($_SESSION['order_delivery'] == "По почте") $chck1 = "checked";
							if ($_SESSION['order_delivery'] == "Курьером") $chck2 = "checked";
							if ($_SESSION['order_delivery'] == "Самовывоз") $chck3 = "checked";
							echo '

							<h3 class="title-h3" >Способы доставки:</h3>
							<form method="post">
							<ul id="info-radio">
							<li>
							<input type="radio" name="order_delivery" class="order_delivery" id="order_delivery1" value="По почте" '.$chck1.'  />
							<label class="label_delivery" for="order_delivery1">По почте</label>
							</li>
							<li>
							<input type="radio" name="order_delivery" class="order_delivery" id="order_delivery2" value="Курьером" '.$chck2.' />
							<label class="label_delivery" for="order_delivery2">Курьером</label>
							</li>
							<li>
							<input type="radio" name="order_delivery" class="order_delivery" id="order_delivery3" value="Самовывоз" '.$chck3.' />
							<label class="label_delivery" for="order_delivery3">Самовывоз</label>
							</li>
							</ul>
							<h3 class="title-h3" >Информация для доставки:</h3>
							<ul id="info-order">
							';
							if ( $_SESSION['auth'] != 'true' )
								{
								echo '
								<li><label for="order_fio"><span>*</span>ФИО</label><input type="text" name="order_fio" id="order_fio" value="'.$_SESSION["order_fio"].'" /><span class="order_span_style" >Пример: Иванов Иван Иванович</span></li>
								<li><label for="order_email"><span>*</span>E-mail</label><input type="email" name="order_email" id="order_email" value="'.$_SESSION["order_email"].'" /><span class="order_span_style" >Пример: ivanov@mail.ru</span></li>
								<li><label for="order_phone"><span>*</span>Телефон</label><input type="tel" name="order_phone" id="order_phone" value="'.$_SESSION["order_phone"].'" /><span class="order_span_style" >Пример: 8 999 675 51 90</span></li>
								';
								}
								echo '
								<li><label class="order_label_style" for="order_note">Примечание</label><textarea name="order_note"  >'.$_SESSION["order_note"].'</textarea><span>Уточните информацию о заказе.<br />  Например, удобное время для звонка<br />  нашего менеджера</span></li>
								</ul>
								<p align="right" class="button-next" ><input type="submit" name="submitdata" id="confirm-button-next" value="Далее" /></p>
								</form>
								 ';

								break;
							case 'completion':
							echo '
							<div id="block-step">
								<div id="name-step">
									<ul>
										<li><a href="cart.php?action=oneclick">1. Корзина товаров</a></li>
										<li><span>&#8594</span></li>
										<li><a href="cart.php?action=confirm">2. Контактные данные</a></li>
										<li><span>&#8594</span></li>
										<li><a class="active">3. Подтверждение</a></li>
									</ul>
								</div>
								<p>Шаг 3 из 3</p>
							</div>
							<center><h3>Конечная информация:</h3></center>
							';
							if ( $_SESSION['auth'] == 'true' )
							    {
							echo '
							<ul id="list-info" >
							<li><strong>Способ доставки:</strong>'.$_SESSION['order_delivery'].'</li>
							<li><strong>Email:</strong>'.$_SESSION['email3'].'</li>
							<li><strong>ФИО:</strong>'.$_SESSION['name_3'].' '.$_SESSION['name3'].' </li>
							<li><strong>Телефон:</strong>'.$_SESSION['telefon3'].'</li>
							<li><strong>Примечание: </strong>'.$_SESSION['order_note'].'</li>
							</ul>

							';
							   }else
							   {
							echo '
							<ul id="list-info" >
							<li><strong>Способ доставки:</strong>'.$_SESSION['order_delivery'].'</li>
							<li><strong>Email:</strong>'.$_SESSION['order_email'].'</li>
							<li><strong>ФИО:</strong>'.$_SESSION['order_fio'].'</li>
							<li><strong>Телефон:</strong>'.$_SESSION['order_phone'].'</li>
							<li><strong>Примечание: </strong>'.$_SESSION['order_note'].'</li>
							</ul>
							';
							}
							 echo '
							<h2 class="itog-price" align="right">Итого: <strong>'.$itogpricecart.'</strong> руб</h2>
							  <p align="right" class="button-next" ><a href="" >Оплатить</a></p>
							 ';
								break;
							default:
							echo '
							<div id="block-step">
								<div id="name-step">
									<ul>
										<li><a class="active">1. Корзина товаров</a></li>
										<li><span>&#8594</span></li>
										<li><a>2. Контактные данные</a></li>
										<li><span>&#8594</span></li>
										<li><a>3. Подтверждение</a></li>
									</ul>
								</div>
								<p>Шаг 1 из 3</p>
								<a href="cart.php?action=clear">Очистить</a>
							</div>
							';
							$result = mysqli_query($link,"SELECT * FROM cart,table_products WHERE cart.cart_ip = '{$_SERVER['REMOTE_ADDR']}' and table_products.products_id = cart.cart_id_products");
							if (mysqli_num_rows($result) > 0 ) {
								$row = mysqli_fetch_array($result);
								echo '
								<div id="header-list-cart">
										<div id="head1">
											Изображение
										</div>
										<div id="head2">
											Наименование товара
										</div>
										<div id="head3">
											Кол-во
										</div>
										<div id="head4">
												Цена
										</div>
								</div>
								';
								do {
									$int = $row["cart_price"] * $row["cart_count"];
									$all_price = $all_price + $int;
									if (strlen($row["image"]) > 0 && file_exists("./upload-images/".$row["image"]))
									{
									$img_path = './upload-images/'.$row["image"];
									$max_width = 130;
									$max_height = 130;
									 list($width, $height) = getimagesize($img_path);
									$ratioh = $max_height/$height;
									$ratiow = $max_width/$width;
									$ratio = min($ratioh, $ratiow);

									$width = intval($ratio*$width);
									$height = intval($ratio*$height);
									}else
									{
									$img_path = "/upload_images/no-images.jpeg";
									$width = 120;
									$height = 105;
									}
									echo '

									<div class="block-list-cart">
										<div class="img-cart">
											<p align="center"><img src="'.$img_path.'" width="'.$width.'" height="'.$height.'" /></p>
										</div>
										<div class="title-cart">
											<p><a href="">'.$row["title"].'</a></p>
											<p class="cart-mini-features">'.$row["mini_features"].'</p>
										</div>
										<div class="count-cart">
											<ul class="input-count-style">
											<li>
												<p align="center" iid="'.$row["cart_id"].'" class="count-minus">-</p>
											</li>
											<li>
											<p align="center"><input id="input-id'.$row["cart_id"].'" iid="'.$row["cart_id"].'" class="count-input" maxlength="3" type="text" value="'.$row["cart_count"].'" /></p>

											</li>
											<li>
												<p align="center" iid="'.$row["cart_id"].'" class="count-plus">+</p>
											</li>
										</ul>
										</div>
										<div id="tovar'.$row["cart_id"].'" class="price-product"><h5><span class="span-count">'.$row["cart_count"].'&nbsp</span>x&nbsp<span>'.$row["cart_price"].'</span></h5><p price="'.$row["cart_price"].'">'.$int.'</p></div>
										<div class="delete-cart"><a  href="cart.php?id='.$row["cart_id"].'&action=delete" ><img src="/image/bsk_item_del.png" /></a></div>

									<div id="bottom-cart-line"></div>
									</div>
									';

								} while ($row = mysqli_fetch_array($result));
								echo '
								<h2 class="itog-price" align="right">Итого: <strong>'.$all_price.'</strong> руб</h2>
								<p align="right" class="button-next" ><a href="cart.php?action=confirm" >Далее</a></p>
								';

								}
								else
								{
								echo '<h3 id="clear-cart" align="center">Корзина пуста</h3>';
								}
								break;
						}
						?>
			</div>
			<?php include ("include/block-footer.php"); ?>

		</div>

	</body>
</html>
