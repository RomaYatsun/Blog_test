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
          var error = 0;
        }
        else if(res == "yes") {
          $("#login").removeClass().addClass("error");
          $("#login").next().text("Не подходит");
          var error = 1;
        }
      },
      error: function() {
        $("#login").next().text("Ошибка");
        var error = 1;
      }
    });

  }

    else {
      $("#login").removeClass().addClass('error');
      $("#login").next().text('Заполните поле!');
      var error = 1;
    }
  });
}
function checkRepassword() {
  $("#re-password").blur(function(){
  if ($("#password").val() != $("#re-password").val()) {
    $("#re-password").next().text("No qual");
    var error = 1;
  }
  else
    $("#re-password").next().text("Ok");
  var error = 0;
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
          var error = 0;
        }
        else if(res == "yes") {
          $("#email").removeClass().addClass("error");
          $("#email").next().text("Не подходит");
          var error = 1;
        }
      },
      error: function() {
        $("#email").next().text("Ошибка");
        var error = 1;
      }
    });

  }

    else {
      $("#email").removeClass().addClass('error');
      $("#email").next().text('Email is not correct!');
      var error = 1;
    }
});
}
$(document).ready(function() {

check();
checkRepassword();
checkEmail();
$("#submit").bind('click', function(){
if (error = 0) {
  alert('true');
}
else if (error = 1) {alert('false'); return false;};
return false;
});
});