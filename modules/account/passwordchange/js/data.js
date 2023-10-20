
$(document).ready(function () {
  $(document).on("submit", "#passwordchange", function (e) {
    e.preventDefault();
    var opassword = $("#opassword").val();
    var password = $("#password").val();
    var cpassword = $("#cpassword").val();

    if (opassword == "") {
      alert("Old password is required")
      return false;
    } else if (password == "") {
      alert("password is required")
      return false;
    }  else if (cpassword == "") {
      alert("Confirm password is required")
      return false;
    } else if (password !== cpassword) {
      alert("password not matched yet!")
      return false;
    } else {
      $.ajax({
        url: "modules/account/passwordchange/data.php",
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



