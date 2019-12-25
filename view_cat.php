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
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="crossorigin="anonymous"></script>
		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.js"></script>
		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.2.2/jquery.form.js"></script>
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
          if (!empty($cat) && !empty($type))
          {
            $querycat = "brand='$cat' AND type_tovara='$type'";
          }else
            {
              if(!empty($type))
                {
                  $querycat = "type_tovara='$type'";
                }else
                  {
                    $querycat = "";
                  }
            }

            $num = 2; // сколько товаров выводить
            $page=(int)$_GET['page'];

            $count=mysqli_query($link, "SELECT COUNT(*) FROM  table_products Where $querycat");
            $temp = mysqli_fetch_array($count);
            if ($temp[0]>0) {
              $tempcout = $temp[0];
              $total = (($tempcout-1)/$num)+1;
              $total = intval($total);
              $page = intval($page);
              if (empty($page) or $page<0) $page=1;
                if ($page>$total) $page=$total;
                //Вычесление с какого номера начинать выводить товары
              $start= $page*$num - $num;

            }
                $result =  mysqli_query($link, "SELECT * FROM table_products Where $querycat LIMIT $start, $num");
                if(mysqli_num_rows($result) > 0) {
                    $row = mysqli_fetch_array($result);
                    do {
											 echo('
                        <li>
													<div class="block-image-tovara">
														<img src="/upload-images/'.$row["image"].'" class="img-tovara"/>
													</div>
													<p class="style-title-grid"><a href="">'.$row["title"].'</a></p>
													<a class="add-cart-style-grid" tid="'.$row["products_id"].'" ></a>
													<p class="style-price-grid"><strong>'.$row["price"].'</strong> руб.</p>
													<div class="mini-features">'.$row["mini_features"].'</div>
												</li>
                        ');
                    }
                    while ($row = mysqli_fetch_array($result));
                }else
                  echo '<h3>Категория не доступна или не создана!</h3>';
                  echo '</ul>';
                  if ($page != 1){ $pstr_prev = '<li><a class="pstr-prev" href="view_cat.php?cat='.$cat.'&type='.$type.'&page='.($page - 1).'">&lt;</a></li>';}
                  if ($page != $total) $pstr_next = '<li><a class="pstr-next" href="view_cat.php?cat='.$cat.'&type='.$type.'&page='.($page + 1).'">&gt;</a></li>';


                  // Формируем ссылки со страницами
                  if($page - 5 > 0) $page5left = '<li><a href="view_cat.php?cat='.$cat.'&type='.$type.'&page='.($page - 5).'">'.($page - 5).'</a></li>';
                  if($page - 4 > 0) $page4left = '<li><a href="view_cat.php?cat='.$cat.'&type='.$type.'&page='.($page - 4).'">'.($page - 4).'</a></li>';
                  if($page - 3 > 0) $page3left = '<li><a href="view_cat.php?cat='.$cat.'&type='.$type.'&page='.($page - 3).'">'.($page - 3).'</a></li>';
                  if($page - 2 > 0) $page2left = '<li><a href="view_cat.php?cat='.$cat.'&type='.$type.'&page='.($page - 2).'">'.($page - 2).'</a></li>';
                  if($page - 1 > 0) $page1left = '<li><a href="view_cat.php?cat='.$cat.'&type='.$type.'&page='.($page - 1).'">'.($page - 1).'</a></li>';

                  if($page + 5 <= $total) $page5right = '<li><a href="view_cat.php?cat='.$cat.'&type='.$type.'&page='.($page + 5).'">'.($page + 5).'</a></li>';
                  if($page + 4 <= $total) $page4right = '<li><a href="view_cat.php?cat='.$cat.'&type='.$type.'&page='.($page + 4).'">'.($page + 4).'</a></li>';
                  if($page + 3 <= $total) $page3right = '<li><a href="view_cat.php?cat='.$cat.'&type='.$type.'&page='.($page + 3).'">'.($page + 3).'</a></li>';
                  if($page + 2 <= $total) $page2right = '<li><a href="view_cat.php?cat='.$cat.'&type='.$type.'&page='.($page + 2).'">'.($page + 2).'</a></li>';
                  if($page + 1 <= $total) $page1right = '<li><a href="view_cat.php?cat='.$cat.'&type='.$type.'&page='.($page + 1).'">'.($page + 1).'</a></li>';


                  if ($page+5 < $total)
                  {
                    $strtotal = '<li><p class="nav-point">...</p></li><li><a href="view_cat.php?cat='.$cat.'&type='.$type.'&page='.$total.'">'.$total.'</a></li>';
                  }else
                  {
                  $strtotal = "";
                  }

                  if ($total > 1)
                  {
                  echo '
                  <div class="pstrnav">
                  <ul>
                    ';
                  echo $pstr_prev.$page5left.$page4left.$page3left.$page2left.$page1left."<li><a class='pstr-active' href='view_cat.php?cat='.$cat.'&type='.$type.'&page=".$page."'>".$page."</a></li>".$page1right.$page2right.$page3right.$page4right.$page5right.$strtotal.$pstr_next;
                  echo '
                  </ul>
                    </div>
                    ';
                    }
            ?>
			</div>
			<?php include ("include/block-footer.php"); ?>
		</div>

	</body>
</html>
