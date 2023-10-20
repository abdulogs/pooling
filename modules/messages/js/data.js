$(document).ready(function () {
  function loadData(page) {
    $.ajax({
      url: "modules/messages/data.php",
      method: "POST",
      data: {
        page: page
      },
      cache: false,
      beforeSend: function () {
        $('#loader').html(`<td colspan="5" class="text-center">Loadind...</td>`);
      },
      success: function (data) {
        if (data) {
          $('#loader').remove();
          $("#pagination").remove();
          $('#data').append('<tr id="loader"></tr>');
          $('#data').append(data);
        } else {
          $("#loadmore").append("No more results");
          $("#loadmore").prop("disabled", true);
        }
      },
      complete: function () {
        $('#loader').remove()
      },
    });
  }
  loadData();

  function scrollDown(id) {
    const where = document.getElementById(id);
    where.scrollTop = where.scrollHeight;
  }

  function loadFiltered(page) {
    var search = $("#search").val();
    var sort = $("#sort").val();
    var limit = $("#limit").val();
    $.ajax({
      url: "modules/messages/data.php",
      method: "POST",
      data: {
        search: search,
        sort: sort,
        limit: limit,
        page: page
      },
      cache: false,
      beforeSend: function () {
        $('#loader').html(`<td colspan="5" class="text-center">Loadind...</td>`);
        $(".filter-btn").attr("disabled", true);
      },
      success: function (data) {
        if (data) {
          var replace = "";
          replace += data;
          $('#loader').remove();
          $("#pagination").remove();
          $('#data').append('<tr id="loader"></tr>');
          $('#data').append(replace);
        } else {
          $("#loadmore").append("No more results");
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
});
