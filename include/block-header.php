     <div id="block-header">
       <div id="header-top-block">
       <ul id="header-top-menu">
         <a href="index.php"><img src="/image/icon-comp.png" alt=""></a>
         <li><a href="index.php">Главная</a></li>
         <li><a href="">Гарантия</a></li>
         <li><a href="o-nas.php">О нас</a></li>
         <li><a href="contacti.php">Контакты</a></li>
       </ul>
     <p id="left-border">
       <a href=""><img id="basket" src="/image/shopping-basket.png" alt=""></a>
       <a class="shopping-name" href="cart.php?action=oneclick">Корзина пуста</a>
     </p>
      <?php
      if ($_SESSION ['auth'] == 'true') {
          $content = '<p id="auth-user-info" aligt="right">Здравствуйте, '.$_SESSION['name3'].'! </p>';
          echo $content;
      } else {
          $content1="<p id=\"right-border\">
             <button onclick=\"showe('block')\" class=\"top-auth\">Вход</button>
             <button onclick=\"show('block')\" class=\"top-reg\">Регистрация</button>
             </p>";
          echo $content1;
      }
      ?>

       </div>
       <div id="block-user" >
        <div class="corner2"></div>
            <ul>
              <li><img src="/image/user_info.png" /><a href="profile.php">Профиль</a></li>
              <li><img src="/image/logout.png" /><a id="logout" >Выход</a></li>
            </ul>
        </div>
       <div id="login">
           <a href="index.php"><img id="comp-logo"src="/image/comp-logo.png"><img src="/image/icon-logo1.png"></a>
           <div id=login-info>
               <p align="right">Режим работы:</p>
               <p align="right">Будние дни: с 9:00 до 20:00</p>
               <p align="right">Выходные и праздничные дни: с 9:00 до 15:00</p>
               <p id="tel">8 (999) 675-51-90</p>
               <img src="/image/icon-time.png" >
           </div>
           <div id="block-search">
             <form method="get" action="search.php?q=">
               <span></span>
               <input type="text" id="input-search" name="q" placeholder="Поиск среди товаров....." value="<?php echo $search; ?>">
               <input type="submit" id="button-search" value="Поиск">
             </form>
           </div>
       </div>
     </div>
     <!--форма регистрации -->
 <div onclick="show('none')" id="gray"></div>
 <div id="window">
 <!-- Картинка крестика -->
 <img class="close" src="image/close.png" alt="" onclick="show('none')">
 <div class="form">
     <h2>Регистрация</h2>
     <form action="/reg/hundler_reg.php" method="POST" name="form1" id="form1">
         <input type="text" placeholder="Имя" name="name1" class="input" id="name1">
         <input type="text" placeholder="Фамилия" name="name2" class="input" id="name2">
         <input type="text" placeholder="Логин" name="reg_login" class="input" id="reg_login">
         <input type="email" placeholder="e-mail" name="email" class="input" id="email">
         <input type="password" placeholder="Пароль" name="pass1" class="input" id="pass1">
         <input type="tel" placeholder="Мобильный телефон" name="telefon" class="input" id="telefon">
         <input type="submit" value="Регистрация" name="sab" class="input" id="sab">
     </form>
 </div>
 </div>
 <!--форма входа -->
 <div onclick="showe('none')" id="gray1"></div>
 <div id="window1">
 <!-- Картинка крестика -->
 <img class="close" src="image/close.png" alt=""  onclick="showe('none')">
 <div class="form">
     <h2>Вход</h2>
     <form method="post" id="form2">
         <input type="text" placeholder="Логин" name="vhod_login" class="input" id="vhod_login"/>
         <input type="password" placeholder="Пароль" name="pass2" class="input" id="pass2" />
         <label id=rememberme><input type="checkbox" name="remember_me_input" id="remember_me_input">Запомнить меня</label>
         <input type="submit" value="Вход" name="sab1" class="input" id="sab1" >
         <a id="remindpass" href="#">Забыли пароль?</a>
         <p id = "message-auth">Введен неверный логин или пароль!</p>

     </form>
   </div>
 </div>
 <div onclick="showe1('none')" id="gray2"></div>
 <div id="window2">
 <!-- Картинка крестика -->
  <img class="close" src="image/close.png" alt=""  onclick="showe1('none')">
    <div id="form-ok">
     <center><h2>Поздравляем</h2><p> Вы успешно зарегистрировались!</p><center>
     </div>
 </div>
 <div onclick="showe3('none')" id="gray3"></div>
 <div id="window3">
 <!-- Картинка крестика -->
 <img class="close" src="image/close.png" alt=""  onclick="showe3('none')">
 <div class="form">
     <h2>Восстановление пароля</h2>
     <form method="post" id="form3">
         <input type="email" placeholder="E-mail" name="remind-email" class="input" id="remind-email"/>
         <input type="submit" value="Отправить" name="sab3" class="input" id="sab3" >
         <span><a id="prev-auth" href="#"><< Назад</a><span>
         <p id = "message-remind">Введен не существующий E-mail!</p>
     </form>
   </div>
 </div>
 <div onclick="showe4('none')" id="gray4"></div>
 <div id="window4">
 <!-- Картинка крестика -->
  <img class="close" src="image/close.png" alt=""  onclick="showe4('none')">
    <div id="form-ok">
     <center><h2>Успешно!</h2><p>На ваш E-mail был отправлен ваш пароль!</p><center>
     </div>
 </div>
