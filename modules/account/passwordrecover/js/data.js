
$(document).ready(function () {
  $(document).on("submit", "#passwordrecover", function (e) {
    e.preventDefault();
    var password = $("#password").val();
    var cpassword = $("#cpassword").val();

    if (password == "") {
      alert("password is required")
      return false;
    }  else if (cpassword == "") {
      alert("Confirm password is required")
      return false;
    } else if (password !== cpassword) {
      alert("Password not matched yet!")
      return false;
    } else {
      $.ajax({
        url: "modules/account/passwordrecover/data.php",
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



