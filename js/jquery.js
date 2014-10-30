function check(inputId) {
  $(inputId).focus(function(){
    $(inputId).removeClass().next().empty();
  });
  $(inputId).blur(function(){
    var data = $(inputId).val();
    var name = $(inputId).attr('name');
    if (data != '') {
    $.ajax ({
      url: 'check.php',
      type: 'POST',
      data: {login: data},
      success: function(res) {
        if (res == "no") {
          $(inputId).removeClass().addClass('ok');
          $(inputId).next().text("Все ок!");
        }
        else if(res == "yes") {
          $(inputId).removeClass().addClass("error");
          $(inputId).next().text("Не подходит");
        }
      },
      error: function() {
        $(inputId).next().text("Ошибка");
      }
    });
  }
    else {
      $(inputId).removeClass().addClass('error');
      $(inputId).next().text('Заполните поле!');
    }
  });
}
$(document).ready(function() {
check("#login");
});