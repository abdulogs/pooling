
$(document).ready(function () {
  $(document).on("submit", "#profile", function (e) {
    e.preventDefault();

      $.ajax({
        url: "modules/account/profile/data.php",
        type: 'post',
        data: new FormData(this),
        contentType: false,
        processData: false,
        cache: false,
        success: function (data) {
          $('#response').html(data);
        },
      });
  });
});



