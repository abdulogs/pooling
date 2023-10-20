function loadData(page) {
  $.ajax({
    url: "modules/vehicles/data.php",
    method: "POST",
    data: {
      page: page
    },
    cache: false,
    beforeSend: function () {
      $('#loader').html(`<div class="text-center col-sm-12">Loadind...</div>`);
    },
    success: function (data) {
      if (data) {
        $('#loader').remove();
        $("#pagination").remove();
        $('#data').append('<tr id="loader"></tr>');
        $('#data').append(data);
      } else {
        $("#loadmore").append(`<div class="text-center col-sm-12">No more results</div>`);
        $("#loadmore").prop("disabled", true);
      }
    },
    complete: function () {
      $('#loader').remove()
    },
  });
}
loadData();

function loadFiltered(page) {
  var search = $("#search").val();
  var sort = $("#sort").val();
  var limit = $("#limit").val();
  var location = $("#location").val();
  var departure = $("#departure").val();
  var arrival = $("#arrival").val();
  $.ajax({
    url: "modules/vehicles/data.php",
    method: "POST",
    data: {
      search: search,
      sort: sort,
      limit: limit,
      page: page,
      location: location,
      arrival: arrival,
      departure: departure,
    },
    cache: false,
    beforeSend: function () {
      $('#loader').html(`<div class="text-center col-sm-12">Loadind...</div>`);
      $(".filter-btn").attr("disabled", true);
    },
    success: function (data) {
      if (data) {
        var replace = "";
        replace += data;
        $('#loader').remove();
        $("#pagination").remove();
        $('#data').append('');
        $('#data').append(replace);
      } else {
        $("#loadmore").append(`<div class="text-center col-sm-12">No more results</div>`);
        $("#loadmore").prop("disabled", true);
      }
    },
    complete: function () {
      $('#loader').remove()
      $(".filter-btn").attr("disabled", false);

    },
  });
}

$(document).on("submit", "#filter", function (e) {
  e.preventDefault();
  loadFiltered();
  $("#data").html("");
});

$(document).on("click", "#loadFiltered", function () {
  var pageId = $(this).data("paging");
  loadFiltered(pageId);
});

$(document).on("click", "#loadmore", function () {
  var pageId = $(this).data("paging");
  loadData(pageId);
});

$(document).on('click', '.sendRequest', function (e) {
  let id = $(this).data('id');
  $(this).html('Cancel request');
  $(this).addClass('unsendRequest');
  $(this).removeClass('sendRequest');

  $.ajax({
    url: "modules/vehicles/send.php",
    type: 'post',
    data: {
      id: id,
    },
    cache: false,
    success: function (data) {
      $('#response').html(data);
    },
  });
});

$(document).on('click', '.unsendRequest', function (e) {
  let id = $(this).data('id');
  $(this).removeClass('unsendRequest');
  $(this).addClass('sendRequest');
  $(this).html('Send request');
  $.ajax({
    url: "modules/vehicles/delete.php",
    type: 'post',
    data: {
      id: id,
    },
    cache: false,
    success: function (data) {
      $('#response').html(data);
    },
  });
});

