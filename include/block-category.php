<div id="block-category">
  <p class="header-title">&nbsp;&nbsp;Категории товаров&nbsp;&nbsp;&nbsp;&nbsp;</p>
  <ul>
    <li><a><img class="gif_name"src="../image/ilmenu_plus.gif">Блоки питания</a>
      <ul class="category-section">
        <li><a href="view_cat.php?type=bp"><strong>Все модели</strong></a></li>
        <?php
                $result =  mysqli_query($link, "SELECT * FROM  category Where type='bp'");
                if(mysqli_num_rows($result) > 0) {
                    $row = mysqli_fetch_array($result);
                    do {
											 echo('
                        <li><a href="view_cat.php?cat='.strtolower($row["brand"]).'&type='.$row["type"].'">'.$row["brand"].'</a>
												</li>
                        ');
                    }
                    while ($row = mysqli_fetch_array($result));
                }
            ?>
      </ul>
    </li>
  </ul>
  <ul>
    <li><a><img class="gif_name"src="../image/ilmenu_plus.gif">Видеокарты</a>
      <ul class="category-section">
        <li><a href="view_cat.php?type=videocart"><strong>Все модели</strong></a></li>
        <?php
                $result =  mysqli_query($link, "SELECT * FROM  category Where type='videocart'");
                if(mysqli_num_rows($result) > 0) {
                    $row = mysqli_fetch_array($result);
                    do {
											 echo('
                        <li><a href="view_cat.php?cat='.strtolower($row["brand"]).'&type='.$row["type"].'">'.$row["brand"].'</a>
												</li>
                        ');
                    }
                    while ($row = mysqli_fetch_array($result));
                  }
              ?>
      </ul>
    </li>
  </ul>
  <ul>
    <li><a><img class="gif_name"src="../image/ilmenu_plus.gif">Жёсткие диски</a>
      <ul class="category-section">
        <li><a href="view_cat.php?type=hdd"><strong>Все модели</strong></a></li>
        <?php
                $result =  mysqli_query($link, "SELECT * FROM  category Where type='hdd'");
                if(mysqli_num_rows($result) > 0) {
                    $row = mysqli_fetch_array($result);
                    do {
											 echo('
                        <li><a href="view_cat.php?cat='.strtolower($row["brand"]).'&type='.$row["type"].'">'.$row["brand"].'</a>
												</li>
                        ');
                    }
                    while ($row = mysqli_fetch_array($result));
                  }
              ?>

      </ul>
    </li>
  </ul>
  <ul>
    <li><a><img class="gif_name"src="../image/ilmenu_plus.gif">Клавиатуры</a>
      <ul class="category-section">
        <li><a href="view_cat.php?type=keyboard"><strong>Все модели</strong></a></li>
        <?php
                $result =  mysqli_query($link, "SELECT * FROM  category Where type='keyboard'");
                if(mysqli_num_rows($result) > 0) {
                    $row = mysqli_fetch_array($result);
                    do {
											 echo('
                        <li><a href="view_cat.php?cat='.strtolower($row["brand"]).'&type='.$row["type"].'">'.$row["brand"].'</a>
												</li>
                        ');
                    }
                    while ($row = mysqli_fetch_array($result));
                  }
              ?>

      </ul>
    </li>
  </ul>
  <ul>
    <li><a><img class="gif_name"src="../image/ilmenu_plus.gif">Корпуса</a>
      <ul class="category-section">
        <li><a href="view_cat.php?type=corpus"><strong>Все модели</strong></a></li>
        <?php
                $result =  mysqli_query($link, "SELECT * FROM  category Where type='corpus'");
                if(mysqli_num_rows($result) > 0) {
                    $row = mysqli_fetch_array($result);
                    do {
											 echo('
                        <li><a href="view_cat.php?cat='.strtolower($row["brand"]).'&type='.$row["type"].'">'.$row["brand"].'</a>
												</li>
                        ');
                    }
                    while ($row = mysqli_fetch_array($result));
                  }
              ?>

      </ul>
    </li>
  </ul>
  <ul>
    <li><a><img class="gif_name"src="../image/ilmenu_plus.gif">Мат. платы</a>
      <ul class="category-section">
        <li><a href="view_cat.php?type=matplata"><strong>Все модели</strong></a></li>
        <?php
                $result =  mysqli_query($link, "SELECT * FROM  category Where type='matplata'");
                if(mysqli_num_rows($result) > 0) {
                    $row = mysqli_fetch_array($result);
                    do {
											 echo('
                        <li><a href="view_cat.php?cat='.strtolower($row["brand"]).'&type='.$row["type"].'">'.$row["brand"].'</a>
												</li>
                        ');
                    }
                    while ($row = mysqli_fetch_array($result));
                  }
              ?>
      </ul>
    </li>
  </ul>
  <ul>
    <li><a><img class="gif_name"src="../image/ilmenu_plus.gif">Мониторы</a>
      <ul class="category-section">
        <li><a href="view_cat.php?type=monitor"><strong>Все модели</strong></a></li>
        <?php
                $result =  mysqli_query($link, "SELECT * FROM  category Where type='monitor'");
                if(mysqli_num_rows($result) > 0) {
                    $row = mysqli_fetch_array($result);
                    do {
											 echo('
                        <li><a href="view_cat.php?cat='.strtolower($row["brand"]).'&type='.$row["type"].'">'.$row["brand"].'</a>
												</li>
                        ');
                    }
                    while ($row = mysqli_fetch_array($result));
                  }
              ?>
      </ul>
    </li>
  </ul>
  <ul>
    <li><a><img class="gif_name"src="../image/ilmenu_plus.gif">Мыши</a>
      <ul class="category-section">
        <li><a href="view_cat.php?type=mouse"><strong>Все модели</strong></a></li>
        <?php
                $result =  mysqli_query($link, "SELECT * FROM  category Where type='mouse'");
                if(mysqli_num_rows($result) > 0) {
                    $row = mysqli_fetch_array($result);
                    do {
											 echo('
                        <li><a href="view_cat.php?cat='.strtolower($row["brand"]).'&type='.$row["type"].'">'.$row["brand"].'</a>
												</li>
                        ');
                    }
                    while ($row = mysqli_fetch_array($result));
                  }
              ?>
      </ul>
    </li>
  </ul>
  <ul>
    <li><a><img class="gif_name"src="../image/ilmenu_plus.gif">Операт. памать</a>
      <ul class="category-section">
        <li><a href="view_cat.php?type=ddr"><strong>Все модели</strong></a></li>
        <?php
                $result =  mysqli_query($link, "SELECT * FROM  category Where type='ddr'");
                if(mysqli_num_rows($result) > 0) {
                    $row = mysqli_fetch_array($result);
                    do {
											 echo('
                        <li><a href="view_cat.php?cat='.strtolower($row["brand"]).'&type='.$row["type"].'">'.$row["brand"].'</a>
												</li>
                        ');
                    }
                    while ($row = mysqli_fetch_array($result));
                  }
              ?>
      </ul>
    </li>
  </ul>
  <ul>
    <li><a><img class="gif_name"src="../image/ilmenu_plus.gif">Процессоры</a>
      <ul class="category-section">
        <li><a href="view_cat.php?type=processor"><strong>Все модели</strong></a></li>
        <?php
                $result =  mysqli_query($link, "SELECT * FROM  category Where type='processor'");
                if(mysqli_num_rows($result) > 0) {
                    $row = mysqli_fetch_array($result);
                    do {
											 echo('
                        <li><a href="view_cat.php?cat='.strtolower($row["brand"]).'&type='.$row["type"].'">'.$row["brand"].'</a>
												</li>
                        ');
                    }
                    while ($row = mysqli_fetch_array($result));
                  }
              ?>
      </ul>
    </li>
  </ul>
</div>
<!-- <script type="text/javascript" src="../js/script.js"></script>  -->
