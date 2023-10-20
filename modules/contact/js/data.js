
$(document).ready(function () {
  $(document).on("submit", "#contactform", function (e) {
    e.preventDefault();
    var fullname = $("#fullname").val();
    var phone = $("#phone").val();
    var email = $("#email").val();
    var message = $("#message").val();
    var emailreg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;

    if (fullname == "") {
      alert("Fullname is required")
      return false;
    } else if (email == "") {
      alert("Email is required")
      return false;
    } else if (!emailreg.test(email)) {
      alert("Invalid email address");
      return false;
    } else if (phone == "") {
      alert("Phone is required")
      return false;
    } else if (message == "") {
      alert("Message is required")
      return false;
    } else {
      $.ajax({
        url: "modules/contact/data.php",
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



