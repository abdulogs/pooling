
$(document).ready(function () {
  $(document).on("submit", "#recover", function (e) {
    e.preventDefault();
    var pass = $("#password").val();
    var cpass = $("#cpassword").val();

    if (pass == "") {
      alert("Password is required")
      return false;
    }  else if (cpass == "") {
      alert("Confirm password is required")
      return false;
    } else if (pass !== cpass) {
      alert("Password not matched yet!")
      return false;
    } else {
      $.ajax({
        url: "modules/account/recover/data.php",
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



