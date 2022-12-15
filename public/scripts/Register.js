$(document).ready(function () {
  $("input.submit").on('click', function (event) {
    event.preventDefault();
    $.ajax({
      type: "POST",
      url: "/register",
      data: {
        email: $("input[name='email']").val(),
        password: $("input[name='password']").val(),
        username: $("input[name='username']").val(),
        name: $("input[name='name']").val(),
      },
      dataType: "json",
      beforeSend: function () {
        $("#loading-wrap").show();
        $("#loading-wrap").fadeOut("slow");
      },
      success: function (response) {
        $("#loading-wrap").fadeOut("slow");
        if (!response.success)
        {
          $("#alert-content").text(response.message);
          $("#alert-wrap").show();
        }
        else setTimeout(function() {
            window.location.replace("/login");
        }, 1500)
      },
    });
  });
});
