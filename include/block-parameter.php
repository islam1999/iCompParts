<div id="block-parameter">
  <p class="header-title">Поиск по параметрам&nbsp;</p>
  <p class="title-filter">Стоимость</p>
  <form action="search_filter.php" method="get">
    <div id="block-input-price">
      <ul>
        <li><p>от</p></li>
        <li><input type="number" id="start-price" name="start_price" value="1000"/></li>
        <li><p>до</p></li>
        <li><input type="number" id="end-price" name="end_price" value="40000"/></li>
        <li><p>руб</p></li>
      </ul>
    </div>
    <div id="blocktrackbar"></div>
    <p class="title-filter">Производители</p>
    <ul id="checkboxbrand">
      <?php   $result =  mysqli_query($link, "SELECT * FROM category  ");
        if(mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_array($result);
            do {
                $checked_brand = "";
                if ($_GET["brand"]) {
                  if (in_array($row["id"],$_GET["brand"])) {
                    $checked_brand = "checked";
                  }
                }
               echo('
                    <li><input '.$checked_brand.' type="checkbox" name="brand[]" value="'.$row["id"].'" id="checkbrand'.$row["id"].'"/><label for="checkbrand'.$row["id"].'">'.$row["brand"].'</label><li>
                ');
            }
            while ($row = mysqli_fetch_array($result));
        } ?>
    </ul>
    <input type="submit" name="submit" id="button-parametr-search" value="Поиск">
  </form>

</div>
