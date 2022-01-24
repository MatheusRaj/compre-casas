$(document).ready(function (e) {
  $("#form").on("submit", function (e) {
    e.preventDefault();
    console.log(new FormData(this));

    $.ajax({
      url: "api/addHouseForm.php",
      type: "POST",
      data: new FormData(this),
      contentType: false,
      cache: false,
      processData: false,
      success: function (data) {
        if (data == "invalid") {
          $(".add-house__msg").html("Invalid File !").fadeIn();
          return;
        }

        $("#preview").html(data).fadeIn();
        $("#form")[0].reset();
      },
      error: function (e) {
        $("#err").html(e).fadeIn();
      },
    });
  });
});
