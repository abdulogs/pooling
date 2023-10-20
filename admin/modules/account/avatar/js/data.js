$(document).on("submit","#avatar", function(e) {
  e.preventDefault();
  $.ajax({
    url: "modules/account/avatar/data.php",
    type: 'post',
    data: new FormData(this),
    contentType: false,
    processData: false,
    cache: false,
    beforeSend: function() {
      $("#profilesubmit").attr("disabled", true);
    },
    success: function(feedback) {
      $('#response').html(feedback);
    },
    complete: function() {
      $("#profilesubmit").attr("disabled", false);
    },
  });
});
