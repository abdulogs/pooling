
$(document).ready(function () {
  $(document).on("submit", "#forgot", function (e) {
    e.preventDefault();
    var email = $("#email").val();
    var emailreg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;

    if (email == "") {
      alert("Email is required")
      return false;
    } else if (!emailreg.test(email)) {
      alert("Invalid email address");
      return false;
    } else {
      $.ajax({
        url: "modules/account/forgot/data.php",
        type: 'post',
        data: new FormData(this),
        contentType: false,
        processData: false,
        cache: false,
        success: function (data) {
          $("#response").html(data);
        },
      });
    }
  });
});



