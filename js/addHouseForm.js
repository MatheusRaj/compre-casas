$(document).ready(function (e) {
  $("#form").on("submit", function (e) {
    e.preventDefault();
    const progress = $('.add-house-progress');
    progress.fadeIn();
    $(':input[type="submit"]').prop('disabled', true);

    $.ajax({
      url: "api/addHouseForm.php",
      type: "POST",
      data: new FormData(this),
      contentType: false,
      cache: false,
      processData: false,
      success: function (result) {
        console.log(result);
        const data = !!result.length ? result : JSON.parse(result);
        if (!!data.error) {
          progress.fadeOut();
          $(".error-add-house__msg").html(`<p>${data.error.msg}</p>`).fadeIn();
          setTimeout(function () {
            $(".error-add-house__msg").fadeOut();
          }, 5000);
          $(':input[type="submit"]').prop('disabled', false);

          return;
        }

        const message = $('.add-house__msg');
        message.fadeIn().removeClass('alert-danger').addClass('alert-success');
        setTimeout(function () {
          message.fadeOut();
        }, 5000);

        $("#form")[0].reset();
        $('.add-house-progress').fadeOut();
        $(':input[type="submit"]').prop('disabled', false);
      }
    });
  });
});
