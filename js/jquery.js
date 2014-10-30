function check() {
  $("#login").focus(function(){
    $("#login").removeClass().next().empty();
  });
  $("#login").blur(function(){
    var data = $("#login").val();
    var name = $("#login").attr('name');
    if (data != '') {
    $.ajax ({

      url: 'check.php',
      type: 'POST',
      data: {name: data, check:name},

      success: function(res) {
        if (res == "no") {
          $("#login").removeClass().addClass('ok');
          $("#login").next().text("Все ок!");
        }
        else if(res == "yes") {
          $("#login").removeClass().addClass("error");
          $("#login").next().text("Не подходит");
        }
      },
      error: function() {
        $("#login").next().text("Ошибка");
      }
    });

  }

    else {
      $("#login").removeClass().addClass('error');
      $("#login").next().text('Заполните поле!');
    }
  });
}
function checkRepassword() {
  $("#re-password").blur(function(){
  if ($("#password").val() != $("#re-password").val()) {
    $("#re-password").next().text("No qual");
  }
  else
    $("#re-password").next().text("Ok");
  });
}
function checkEmail () {
  $("#email").blur(function(){
       var data = $("#email").val();
    var name = $("#email").attr('name');
    var patt = /^.+@.+[.].{2,}$/i;
    if (data != '' && patt.test(data)) {
    $.ajax ({

      url: 'check.php',
      type: 'POST',
      data: {name: data, check:name},

      success: function(res) {
        if (res == "no") {
          $("#email").removeClass().addClass('ok');
          $("#email").next().text("Все ок!");
        }
        else if(res == "yes") {
          $("#email").removeClass().addClass("error");
          $("#email").next().text("Не подходит");
        }
      },
      error: function() {
        $("#email").next().text("Ошибка");
      }
    });

  }

    else {
      $("#email").removeClass().addClass('error');
      $("#email").next().text('Email is not correct!');
    }
});
}
$(document).ready(function() {
check();
checkRepassword();
checkEmail();
$("form").submit(function(){
if (check() && checkRepassword() && checkEmail()) {
  alert("OK");
}
else
alert("NOt ok");
});
});