// creating the username variable

$(document).ready(function () {
  const USR = $("#username").html();
});

// contacts function

$(document).ready(function(){

  var contacts = $("#contacts");

        // AJAX code
        $.ajax({
          type: "GET",
          dataType: "JSON",
          url: "contacts.php",
          success: function(result) {
            // $("#contacts").html(JSON.stringify(result));
            $.getJSON( "chat.js", function (result) {
              $.each(result, function (i, value) {
                $("#contacts").html(value);
              })
            })
          },
          error: function(result) {
            $("#contacts").html(JSON.stringify(result));
      }
        });
});
