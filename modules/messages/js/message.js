
$(document).on('click', '.loadMessageBtn', function (e) {
  var id = $(this).data('id');
  $.ajax({
    url: "modules/messages/form.php",
    type: "POST",
    data: {
      id: id
    },
    cache: false,
    beforeSend: function () {
    },
    success: function (data) {
      $("#modalForm").modal("show");
      $("#form").html(data);
      scrollDown("messages");
    },
    complete: function () {
    },
  });
});



$(document).on("submit", "#sendMessage", function (e) {
  e.preventDefault();
  let message = $("#message").val();
  let receiver_id = $("#receiver_id").val();
  if (message == "") {
  } else {
    $.ajax({
      url: "modules/messages/create.php",
      type: 'post',
      data: {
        message: message,
        receiver_id: receiver_id,
      },
      cache: false,
      beforeSend: function () {
        $("#btn-submit").attr("disabled", true);
      },
      success: function (feedback) {
        $("#messages").append(`
        <div class="d-flex align-self-end">
          <p class="bg-dark text-white p-2 rounded shadow-sm d-inline-block">${message}</p>
        </div>
        `);
        $("#sendMessage").trigger("reset");
      },
      complete: function () {
        $("#btn-submit").attr("disabled", false);
      },
    });
  }
});