// jquery toggle function for switching menus
$(document).ready(function(){
$('.toggle').on('click', function() {
  $('.container').stop().addClass('active');
});

$('.close').on('click', function() {
  $('.container').stop().removeClass('active');
});
});

// Sign up function

$(document).ready(function(){
$("#start").click(function(){

  var username = $("#username-su").val();
  var password = $("#password-su").val();
  var repassword = $("#repassword-su").val();

  var credit = 'username=' + username + '&password=' + password;

  if ( (username && password && repassword) != "" ) {

    if ( password === repassword) {

      if (username.length < 20) {

        if (password.length >= 8) {

          // AJAX code
          $.ajax({
            type: "POST",
            url: "signup.php",
            data: credit,
            cache: false,
            success: function(result) {

              if (result == "success") {
                window.location.href = "http://localhost/xplora";
              } else {
                msg(result);
              }

            }
          });

        } else {
          msg("pwd needs to be greater than 8 xters");
        }

      } else {
        msg("username needs to be less than 20 xters");
      }

    } else {
      msg("password should be equal to repassword");
    }

  } else {
    msg("Fill all forms")
  }

});
});


// Sign in function

$(document).ready(function(){
$("#go").click(function(){

  var username = $("#username-si").val();
  var password = $("#password-si").val();

  var credit = 'username=' + username + '&password=' + password;

  if ( (username && password) != "" ) {

    if (username.length < 20) {

      if (password.length >= 8) {

        // AJAX code
        $.ajax({
          type: "POST",
          url: "signin.php",
          data: credit,
          cache: false,
          success: function(result) {

            if (result == "success") {
              window.location.href = "http://localhost/xplora";
            } else {
              msg(result);
            }

          }
        });

      } else {
        msg("pwd needs to be greater than 8 xters");
      }

    } else {
      msg("username needs to be less than 20 xters");
    }

  } else {
    msg("Fill all forms")
  }

});
});


// display error message

function msg(error){

  $(document).ready(function() {

   $(".result").html("<p>" + error + "</p>");

 });
}
