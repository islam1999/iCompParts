<?php
   include ("include/db_connect.php");
   session_start();
   include ("include/auth-cookie.php");
   $cat = $_GET["cat"];
   $type =$_GET["type"];
?>
<!DOCTYPE html>
<html lang="ru" dir="ltr">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="css/style.css" type="text/css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
		<script type="text/javascript" src="/js/script.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.js"></script>
	<title>Поиск по параметрам</title>
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

				<ul class="block-tovara-grid">
				<?php

                if($_GET["brand"])
                {
                  $check_brand = implode(',',$_GET["brand"]);
                }
                $start_price = (int)$_GET["start_price"];
                $end_price = (int)$_GET["end_price"];
                if (!empty($check_brand) OR !empty($end_price))
                {
                  if (!empty($check_brand))  $querry_brand = "brand_id IN ($check_brand) AND ";
                  if (!empty($end_price)) $querry_price = " price BETWEEN $start_price AND $end_price";
                }

              $result =  mysqli_query($link, "SELECT * FROM table_products Where $querry_brand $querry_price ORDER by products_id DESC");
                if(mysqli_num_rows($result) > 0) {
                    $row = mysqli_fetch_array($result);
                    do {
											 echo('
                        <li>
													<div class="block-image-tovara">
														<img src="/upload-images/'.$row["image"].'" class="img-tovara"/>
													</div>
													<p class="style-title-grid"><a href="">'.$row["title"].'</a></p>
													<a class="add-cart-style-grid" tid="'.$row["products_id"].'"></a>
													<p class="style-price-grid"><strong>'.$row["price"].'</strong> руб.</p>
													<div class="mini-features">'.$row["mini_features"].'</div>
												</li>
                        ');
                    }
                    while ($row = mysqli_fetch_array($result));
                }
                else {
                  echo '<h3>Категория не доступна или не создана!</h3>';
                }
              ?>
            </ul>;
			</div>
			<?php include ("include/block-footer.php"); ?>

		</div>

	</body>
</html>
