
$(document).ready(function () {
  $("form div input.submit").on("click", function (event) {
    event.preventDefault();
    $.ajax({
      type: "POST",
      url: "/login",
      data: {
        email: $("input[name='email']").val(),
        password: $("input[name='password']").val(),
        remember_me: $("input[name='rememberMe']").val()
      },
      dataType: "json",
      beforeSend: function () {
        $("#loading-wrap").show();
      },
      success: function (response) {
        $("#loading-wrap").fadeOut("slow");
        if (!response.success)
        {
          $("#alert-content").text(response.message);
          $("#alert-wrap").show();
        }
        else setTimeout(function() {
            window.location.replace("/account");
        }, 1500)
      }
    });
  });
});

// $(document).ajaxStart(function() {
//   $("#loading-wrap").show();
// })

// $(document).ajaxStop(function() {
//   $("#loading-wrap").hide();
// })
