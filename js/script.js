$(document).ready(function() {

  
  $("#bottone").click(function(){

    
    var username = $("#username").val();
    var email = $("#email").val();
      var pass1 = $("#pass1").val();
      var pass2 = $("#pass2").val();

  
    $.ajax({

     
      type: "POST",

     
      url: "registration.php",

      
      data: "username=" + username + "&email=" + email+ "&pass1=" + pass1+ "&pass2=" + pass2,
      dataType: "html",

     
      success: function(msg)
      {
        $("#message").html(msg); 
      },
      error: function()
      {
        alert("Chiamata fallita, si prega di riprovare..."); 
      }
    });
  });
});