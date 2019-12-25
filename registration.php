<?php
   include ("include/db_connect.php");
?>
<!DOCTYPE html>
<html lang="ru" dir="ltr">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="css/style.css" type="text/css">
		<script type="text/javascript" src="../js/script.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="crossorigin="anonymous"></script>
		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.js"></script>
		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.2.2/jquery.form.js"></script>
    <!-- <script type="text/javascript" src="/js/jquery-1.8.2.min.js"></script> -->

    <!-- <script type="text/javascript" src="/js/jquery.form.js"></script>
    <script type="text/javascript" src="/js/jquery.validate.js"></script> -->


    <script type="text/javascript">
$(document).ready(function() {
      $("#form_reg").submit(function(event){
        event.preventDefault();
      }).validate(
				{
					// правила для проверки
					rules:{
						"reg_login":{
							required:true,
							minlength:5,
                            maxlength:15,
                            remote: {
                            type: "post",
		                    url: "/reg/check_login.php"
		                            }
						},
						"pass1":{
							required:true,
							minlength:7,
                            maxlength:15
						},
						"name1":{
							required:true,
                            minlength:3,
                            maxlength:15
						},
						"name2":{
							required:true,
                            minlength:3,
                            maxlength:15
						},
						"email":{
						    required:true,
							email:true
						},
						"telefon":{
							required:true
						}
          },


					// выводимые сообщения при нарушении соответствующих правил
					messages:{
						"reg_login":{
							required:"Укажите Логин!",
                            minlength:"От 5 до 15 символов!",
                            maxlength:"От 5 до 15 символов!",
                            remote: "Логин занят!"
						},
						"pass1":{
							required:"Укажите Пароль!",
                            minlength:"От 7 до 15 символов!",
                            maxlength:"От 7 до 15 символов!"
						},
						"name2":{
							required:"Укажите вашу Фамилию!",
                            minlength:"От 3 до 20 символов!",
                            maxlength:"От 3 до 20 символов!"
						},
						"name1":{
							required:"Укажите ваше Имя!",
                            minlength:"От 3 до 15 символов!",
                            maxlength:"От 3 до 15 символов!"
						},
						"email":{
						    required:"Укажите свой E-mail",
							email:"Не корректный E-mail"
						},
						"telefon":{
							required:"Укажите номер телефона!"
						}
					},

	submitHandler: function(form){
	$(form).ajaxSubmit({
	success: function(data) {

        if (data == 'true')
    {
       $("#block-form-registration").fadeOut(300,function() {

        $("#reg_message").addClass("reg_message_good").fadeIn(400).html("Вы успешно зарегистрированы!");
        $("#form_submit").hide();

       });

    }
    else
    {
       $("#reg_message").addClass("reg_message_error").fadeIn(400).html(data);
    }
		}
			});
			}
			});
    	});

</script>



	<title>Регистрация</title>
	</head>
	<body>
		<div id="block-body">
			<?php include ("include/block-header.php"); ?>
			<div id="block-right">
				<?php include ("include/block-category.php"); ?>
				<?php include ("include/block-parameter.php"); ?>
			</div>
			<div id="block-content">
          <h2 class="h2-title">Регистрация</h2>
          <form id="form_reg" action="/reg/hundler_reg.php" method="post">
            <p id="reg_message"></p>
            <div id="block-from-registration">
              <ul id="form-registration">
                <li><label>Логин</label><span class="star">*</span><input type="login" name="reg_login" id="reg_login"></input></li>
                <li><label>Пароль</label><span class="star">*</span><input type="password" name="pass1" id="pass1"></input></li>
                <li><label>Имя</label><span class="star">*</span><input type="text" name="name1" id="name1"></input></li>
                <li><label>Фамилия</label ><span class="star">*</span><input type="text" name="name2" id="name2"></input></li>
                <li><label>E-mail</label><span class="star">*</span><input type="email" name="email" id="email"></input></li>
                <li><label>Телефон</label><span class="star">*</span><input type="tel" name="telefon" id="telefon"></input></li>
              </ul>
            </div>
            <p align="right"><input type="submit" name ="reg_submit" id="form_sumbit" value = "Регистрация"></input></p>
          </form>
			</div>
			<?php include ("include/block-footer.php"); ?>
		</div>

	</body>
</html>
