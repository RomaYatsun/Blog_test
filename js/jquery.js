$(document).ready(function() {

  $("#submit").click(function(event){
    var login = $("#login").val();
    var password = $("#password").val();
    var repassword = $("#re-password").val();
    var email = $("#email").val();
    var nameLogin = $("#login").attr('name');
    var nameEmail = $("#email").attr('name');
    $("#form input").each(function(){
      $(this).focus(function(){$(this).next().text('');
    });

      if ($(this).val().length == "") {
        $(this).next().addClass('error');
        $(this).next().text("NOT empty");
        event.preventDefault();
      }
    });
    if (!isValidEmailAddress(email)) {
      event.preventDefault();
    }
else if (!validPassword(password, repassword)) {
   $("#re-password").next().addClass('error');
        $("#re-password").next().text("Re-password is not equal");
  event.preventDefault();
}

   else if (login != '') {
      var msg   = $('#login, #email').serialize();
          $.ajax ({

      url: 'check.php',
      type: 'POST',
      async: false,
      data: msg,

      success: function(login) {
        if (login == "") {

          $("#login").removeClass().addClass('ok');

        }
        else {
           
          $("#login").removeClass().addClass("error");
          $("#form").next().text("Maybe login or email is used");
          setTimeout(function() {  $("#form").next().hide('slow'); }, 3000);
          $("#form").next().text("Maybe login or email is used").show('slow');
        event.preventDefault();
       
        }
      },
      error: function() {
        $("#login").next().text("Ошибка");
        event.preventDefault();
      }

    });
          
    }
    
 
  });

 $("#email").keyup(function(){
    
    var email = $("#email").val();
 
 
    if(isValidEmailAddress(email))
    {
      $(this).next().addClass('ok');
    $("#email").next().text('OK');
 
    } else {
    $("#email").next().text('Email is not correct')
    }

    });
$("#re-password").keyup(function(){
  var password = $("#password").val();
    var repassword = $("#re-password").val();
     if(validPassword(password, repassword))
    {
      $(this).next().addClass('ok');
    $("#re-password").next().text('OK');
 
    } else {
    $("#re-password").next().text('Re-password in equal')
    }
});
   });
    function isValidEmailAddress(emailAddress) {
    var pattern  = /^.+@.+[.].{2,}$/i;
    if (pattern.test(emailAddress))
      return true;
    else
      return false;
    }
    function validPassword(password, repassword) {
      if (password == repassword) {
        return true;
      }
      else
        return false;
    }