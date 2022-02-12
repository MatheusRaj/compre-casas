$(document).ready(function () {
    $("#edit_form").on("submit", function (e) {
      e.preventDefault();
      $('.pure-material-progress-circular').fadeIn();
      $(':input[type="submit"]').prop('disabled', true);
  
      $.ajax({
        url: "api/editHouseForm.php",
        type: "POST",
        data: new FormData(this),
        contentType: false,
        cache: false,
        processData: false,
        success: function (data) {
          const message = $('.edit-house__msg');
          message.fadeIn().removeClass('alert-danger').addClass('alert-success');
          setTimeout(function () {
            message.fadeOut();
          }, 5000);

          $('.pure-material-progress-circular').fadeOut();
          $(':input[type="submit"]').prop('disabled', false);
        },
        error: function (e) {
          progress.fadeOut();
          $("#err").html(e).fadeIn();
          $(':input[type="submit"]').prop('disabled', false);
        },
      });
    });
  });
  