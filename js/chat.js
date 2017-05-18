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
            $.getJSON( "contacts.php", function (result) {
              var contacts = [];
              $.each(result, function(value) {
                console.log(value[]);
                // contacts.push("<li>" + value + "</li>");
              });
              $( "<ul/>", {
                "class": "cont",
                html: contacts.join("")
              }).appendTo("#contacts");
            });
          },
          error: function(result) {
            $("#contacts").html(JSON.stringify(result));
      }
        });
});
