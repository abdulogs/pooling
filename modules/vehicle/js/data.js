$(document).on("submit", "#vehicleCreate", function (e) {
  e.preventDefault();
    $.ajax({
      url: "modules/vehicle/create.php",
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


$(document).on("submit", "#vehicleUpdate", function (e) {
  e.preventDefault();
    $.ajax({
      url: "modules/vehicle/update.php",
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