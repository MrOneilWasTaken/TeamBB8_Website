$(document).ready(function () {
  // Send Search Text to the server
  $("#search").keyup(function () {
    let searchText = $(this).val();
    if (searchText != "") {
      $.ajax({
        url: "search.php",
        method: "post",
        data: {
          query: searchText,
        },
        success: function (response) {
          $("#show-list").html(response);
        },
      });
    } else {
      $("#show-list").html("");
    }
  });
  // Set searched text in input field on click of search button
  $(document).on("click", "a#show", function () {
    $("#search").val($(this).text());
    $("#show-list").html("");
  });
});


$(document).ready(function () {

  $(document).on('click', '#getShow', function (e) {

    e.preventDefault();

    var sid = $(this).data('id'); // get id of clicked row

    $('#dynamic-content').hide(); // hide dive for loader
    $('#modal-loader').show(); // load ajax loader

    $.ajax({
      url: 'getshow.php',
      type: 'POST',
      data: 'id=' + sid,
      dataType: 'json'
    })
      .done(function (data) {
        console.log(data);
        $('#dynamic-content').hide(); // hide dynamic div
        $('#dynamic-content').show(); // show dynamic div
        $('#showName').html(data.showName);
        $('#showDesc').html(data.showDesc);
        $('#showCat').html(data.catDesc);
        $('#showEp').html(data.showEp);
        $('#startDate').html(data.startDate);

        if (data.hasOwnProperty('endDate')) {
          $('#endDate').html('Present');
        } else {
          $('#endDate').html(data.endDate);
        }
        
        $('#showStu').html(data.stuName);
        $('#showImage').html('<img src="img/' + data.showImage + '" class="img-thumbnail" >');

        $('#watchlistBtn').html(`<form method="GET" action="addWatchList.php?showID=${data.showID}"><input type="hidden" name="showID" value="${data.showID}" /> <input type="submit" class="btn btn-primary" value="Add to Watchlist">`); //watchlist button

        $('#modal-loader').hide(); // hide ajax loader
      })
      .fail(function () {
        $('.modal-body').html('<i class="glyphicon glyphicon-info-sign"></i> Something went wrong, Please try again...');
      });

  });

});