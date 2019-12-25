  $(document).ready(function() {
  $("#block-category > ul > li > a").click(function() {
    if ($(this).attr('class') != 'active') {
      $('#block-category > ul > li > ul').slideUp(400);
      $(this).next().slideToggle(400);
      $('#block-category > ul > li > a').removeClass('active');
      $(this).addClass('active');
      $.cookie('select_cat', $(this).attr('id'));
    } else {
      $('#block-category > ul > li > a').removeClass('active');
      $('#block-category > ul > li > ul').slideUp(400);
      $.cookie('select_cat', '');
    }
});
  if ($.cookie('select_cat') != '') {
    $('#block-category > ul > li > #' + $.cookie('select_cat')).addClass('active').next().show();
      loadcart();
  }
});
  //Функция показа
  function show(state) {
    document.getElementById('window').style.display = state;
    document.getElementById('gray').style.display = state;
  }

  function showe1(state) {
    document.getElementById('window2').style.display = state;
    document.getElementById('gray2').style.display = state;
  }
  //Функция показа
  function showe(state) {
    document.getElementById('window1').style.display = state;
    document.getElementById('gray1').style.display = state;
  }

  function showe3(state) {
    document.getElementById('window3').style.display = state;
    document.getElementById('gray3').style.display = state;
  }

  function showe4(state) {
    document.getElementById('window4').style.display = state;
    document.getElementById('gray4').style.display = state;
  }
$(document).ready(function() {
  $("#form1").submit(function(event) {
    event.preventDefault();
  }).validate({
    // правила для проверки
    rules: {
      "reg_login": {
        required: true,
        minlength: 5,
        maxlength: 15,
        remote: {
          type: "post",
          url: "/reg/check_login.php"
        }
      },
      "pass1": {
        required: true,
        minlength: 7,
        maxlength: 15
      },
      "name1": {
        required: true,
        minlength: 3,
        maxlength: 15
      },
      "name2": {
        required: true,
        minlength: 3,
        maxlength: 15
      },
      "email": {
        required: true,
        email: true,
        remote: {
          type: "post",
          url: "/reg/check_login.php"
        }
      },
      "telefon": {
        required: true,
        number: true,
        digits: true
      }
    },
    // выводимые сообщения при нарушении соответствующих правил
    messages: {
      "reg_login": {
        required: "Укажите Логин!",
        minlength: "От 5 до 15 символов!",
        maxlength: "От 5 до 15 символов!",
        remote: "Логин занят!"
      },
      "pass1": {
        required: "Укажите Пароль!",
        minlength: "От 7 до 15 символов!",
        maxlength: "От 7 до 15 символов!"
      },
      "name2": {
        required: "Укажите вашу Фамилию!",
        minlength: "От 3 до 20 символов!",
        maxlength: "От 3 до 20 символов!"
      },
      "name1": {
        required: "Укажите ваше Имя!",
        minlength: "От 3 до 15 символов!",
        maxlength: "От 3 до 15 символов!"
      },
      "email": {
        required: "Укажите свой E-mail",
        email: "Не корректный E-mail",
        remote: "E-mail уже существует!"
      },
      "telefon": {
        required: "Укажите номер телефона!",
        number: "Укажите номер телефона!",
        digits: "Укажите номер телефона!"
      }
    },
    submitHandler: function(form) {
      $(form).ajaxSubmit({
        success: function(data) {
          if (data == 'true') {
            $("#gray").fadeOut(300);
            $("#window").fadeOut(300, function() {

              $("#window2").fadeIn(300);
              $("#gray2").fadeIn(300);
            });

          } else {
            $("gray2").fadeIn(400).html(data);
          }
        }
      });
    }
  });
});

 //Вход
 $(document).ready(function() {
   loadcart();
    $("#form2").submit(function() {
      event.preventDefault();
      var auth_login = $("#vhod_login").val();
      var auth_pass = $("#pass2").val();


      if (auth_login == "" || auth_login.length > 30) {
        $("#vhod_login").css("borderColor", "#FDB6B6");
        send_login = 'no';
      } else {

        $("#vhod_login").css("borderColor", "#DBDBDB");
        send_login = 'yes';
      }


      if (auth_pass == "" || auth_pass.length > 15) {
        $("#pass2").css("borderColor", "#FDB6B6");
        send_pass = 'no';
      } else {
        $("#pass2").css("borderColor", "#DBDBDB");
        send_pass = 'yes';
      }



      if ($("#remember_me_input").prop('checked')) {
        auth_rememberme = 'yes';

      } else {
        auth_rememberme = 'no';
      }


      if (send_login == 'yes' && send_pass == 'yes') {

        $.ajax({
          type: "POST",
          url: "/include/auth.php",
          data: "login=" + auth_login + "&pass=" + auth_pass + "&rememberme=" + auth_rememberme,
          dataType: "html",
          cache: false,
          success: function(data) {

            if (data == 'true') {
              location.reload();

              //$("#message-auth").slideDown(400);
            } else {
              $("#message-auth").slideDown(400);

            }

          }
        });
      }
    });

    $("#remindpass").click(function() {
      $("#gray1").fadeOut(200);
      $("#window1").fadeOut(200, function() {
        $("#gray3").fadeIn(300);
        $("#window3").fadeIn(300);
      });
    });
    $("#prev-auth").click(function() {
      $("#gray3").fadeOut(200);
      $("#window3").fadeOut(200, function() {
        $("#gray1").fadeIn(300);
        $("#window1").fadeIn(300);
      });
    });

    $("#form3").submit(function() {
      event.preventDefault();
      var remind_email = $("#remind-email").val();


      if (remind_email == "" || remind_email.length > 30) {
        $("#remind-email").css("borderColor", "#FDB6B6");
      } else {

        $("#remind-email").css("borderColor", "#DBDBDB");


        $.ajax({
          type: "POST",
          url: "/include/remind_email.php",
          data: "email=" + remind_email,
          dataType: "html",
          cache: false,
          success: function(data) {

            if (data == 'true') {
              $("#gray3").fadeOut(300);
              $("#window3").fadeOut(300, function() {

                $("#window4").fadeIn(300);
                $("#gray4").fadeIn(300);
              });

            } else {
              $("#message-remind").slideDown(400);
            }

          }
        });
      }
    });
    //Вывод окошка
    $("#auth-user-info").click(
      function() {
        $("#block-user").slideToggle(200);
      }
    );
    // функция выхода из профиля
    $('#logout').click(function() {
      $.ajax({
        type: "POST",
        url: "/include/logout.php",
        dataType: "html",
        cache: false,
        success: function(data) {

          if (data == 'logout') {
            location.reload();
          }
        }
      });
    });

  //Шаблон проверки email на правильность
  function isValidEmailAddress(emailAddress) {
    var pattern = new RegExp(/^(("[\w-\s]+")|([\w-]+(?:\.[\w-]+)*)|("[\w-\s]+")([\w-]+(?:\.[\w-]+)*))(@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][0-9]\.|1[0-9]{2}\.|[0-9]{1,2}\.))((25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\.){2}(25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\]?$)/i);
    return pattern.test(emailAddress);
  }
  //Контактные данные
  $('#confirm-button-next').click(function(e) {
    var order_fio = $("#order_fio").val();
    var order_email = $("#order_email").val();
    var order_phone = $("#order_phone").val();
    if (!$(".order_delivery").is(":checked")) {
      $(".label_delivery").css("color", "#E07B7B");
      send_order_delivery = '0';
    } else {
      $(".label_delivery").css("color", "black");
      send_order_delivery = '1';

      // Проверка ФИО
      if (order_fio == "" || order_fio.length > 50) {
        $("#order_fio").css("borderColor", "#FDB6B6");
        send_order_fio = '0';

      } else {
        $("#order_fio").css("borderColor", "#DBDBDB");
        send_order_fio = '1';
      }

      //проверка email
      if (isValidEmailAddress(order_email) == false) {
        $("#order_email").css("borderColor", "#FDB6B6");
        send_order_email = '0';
      } else {
        $("#order_email").css("borderColor", "#DBDBDB");
        send_order_email = '1';
      }

      // Проверка телефона
      if (order_phone == "" || order_phone.length > 50) {
        $("#order_phone").css("borderColor", "#FDB6B6");
        send_order_phone = '0';
      } else {
        $("#order_phone").css("borderColor", "#DBDBDB");
        send_order_phone = '1';
      }
    }
    // Глобальная проверка
    if (send_order_delivery == "1" && send_order_fio == "1" && send_order_email == "1" && send_order_phone == "1" && send_order_address == "1") {
      // Отправляем форму
      return true;
    }
    e.preventDefault();
  });

  $(".add-cart-style-grid").click(function() {

    var tid = $(this).attr("tid");

    $.ajax({
      type: "POST",
      url: "/include/addtocart.php",
      data: "id=" + tid,
      dataType: "html",
      cache: false,
      success: function(data) {
        loadcart();
      }
    });
  });

  function loadcart() {
    $.ajax({
      type: "POST",
      url: "/include/loadcart.php",
      dataType: "html",
      cache: false,
      success: function(data) {

        if (data == "0") {

          $("#left-border > a.shopping-name").html("Корзина пуста");

        } else {
          $("#left-border > a.shopping-name").html(data);
        }
      }
    });
  }

  $('.count-minus').click(function() {

    var iid = $(this).attr("iid");

    $.ajax({
      type: "POST",
      url: "/include/count-minus.php",
      data: "id=" + iid,
      dataType: "html",
      cache: false,
      success: function(data) {
        $("#input-id" + iid).val(data);
        loadcart();

        // переменная с ценной продукта
        var priceproduct = $("#tovar" + iid + " > p").attr("price");
        // Цену умножаем на колличество
        result_total = Number(priceproduct) * Number(data);

        $("#tovar" + iid + " > p").html(result_total);
        $("#tovar" + iid + " > h5 > .span-count").html(data);

        itog_price();
      }
    });

  });

  $('.count-plus').click(function() {

    var iid = $(this).attr("iid");

    $.ajax({
      type: "POST",
      url: "/include/count-plus.php",
      data: "id=" + iid,
      dataType: "html",
      cache: false,
      success: function(data) {
        $("#input-id" + iid).val(data);
        loadcart();

        // переменная с ценной продукта
        var priceproduct = $("#tovar" + iid + " > p").attr("price");
        // Цену умножаем на колличество
        result_total = Number(priceproduct) * Number(data);

        $("#tovar" + iid + " > p").html(result_total);
        $("#tovar" + iid + " > h5 > .span-count").html(data);


        itog_price();
      }
    });

  });

  $('.count-input').keypress(function(e) {

    if (e.keyCode == 13) {

      var iid = $(this).attr("iid");
      var incount = $("#input-id" + iid).val();

      $.ajax({
        type: "POST",
        url: "/include/count-input.php",
        data: "id=" + iid + "&count=" + incount,
        dataType: "html",
        cache: false,
        success: function(data) {
          $("#input-id" + iid).val(data);
          loadcart();

          // переменная с ценной продукта
          var priceproduct = $("#tovar" + iid + " > p").attr("price");
          // Цену умножаем на колличество
          result_total = Number(priceproduct) * Number(data);


          $("#tovar" + iid + " > p").html(result_total);
          $("#tovar" + iid + " > h5 > .span-count").html(data);
          itog_price();
        }
      });
    }
  });

  function itog_price() {
    $.ajax({
      type: "POST",
      url: "/include/itog_price.php",
      dataType: "html",
      cache: false,
      success: function(data) {
        $(".itog-price > strong").html(data);
      }
    });
  }

});
