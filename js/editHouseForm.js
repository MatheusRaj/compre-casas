$(document).ready(function () {
    $("#edit_form").on("submit", function (e) {
      e.preventDefault();
      const progress = $('.edit-house-progress');
      progress.fadeIn();
      $(':input[type="submit"]').prop('disabled', true);
  
      $.ajax({
        url: "api/editHouseForm.php",
        type: "POST",
        data: new FormData(this),
        contentType: false,
        cache: false,
        processData: false,
        success: function (result) {
          const data = !!result.length ? result : JSON.parse(result);
          if (!!data.error) {
            progress.fadeOut();
            $(".error-edit-house__msg").html(`<p>${data.error.msg}</p>`).fadeIn();
            setTimeout(function () {
              $(".error-edit-house__msg").fadeOut();
            }, 5000);
            $(':input[type="submit"]').prop('disabled', false);
  
            return;
          }

          const message = $('.edit-house__msg');
          message.fadeIn().removeClass('alert-danger').addClass('alert-success');
          setTimeout(function () {
            message.fadeOut();
          }, 5000);

          $('.edit-house-progress').fadeOut();
          $(':input[type="submit"]').prop('disabled', false);
        },
        error: function (e) {
          progress.fadeOut();
          $(".error-edit-house__msg").html(e).fadeIn();
          setTimeout(function () {
            $(".error-edit-house__msg").fadeOut();
          }, 5000);
          $(':input[type="submit"]').prop('disabled', false);
        },
      });
    });
  });
  