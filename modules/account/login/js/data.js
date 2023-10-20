
$(document).ready(function () {
  $(document).on("submit", "#login", function (e) {
    e.preventDefault();
    var email = $("#email").val();
    var pass = $("#password").val();
    var emailreg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;

    if (email == "") {
      alert("Email is required")
      return false;
    } else if (!emailreg.test(email)) {
      alert("Invalid email address");
      return false;
    } else if (pass == "") {
      alert("Password is required")
      return false;
    } else {
      $.ajax({
        url: "modules/account/login/data.php",
        type: 'post',
        data: new FormData(this),
        contentType: false,
        processData: false,
        cache: false,
        success: function (data) {
          $('#response').html(data);
        },
      });
    }
  });
});



