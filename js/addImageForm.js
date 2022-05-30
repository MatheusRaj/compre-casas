$(document).ready(function (e) {
    $(".add-image-form").on("submit", function (e) {
      e.preventDefault();
      $('.add-image-progress').fadeIn();
      $(':input[type="submit"]').prop('disabled', true);
  
      $.ajax({
        url: "api/addImageForm.php",
        type: "POST",
        data: new FormData(this),
        contentType: false,
        cache: false,
        processData: false,
        success: function (result) {
          const error = result.includes('"error":');
          
          const data = error && JSON.parse(result.split('\n')[1]);

          if (!!data.error) {
            progress.fadeOut();
            $(".error-add-image__msg").html(`<p>${data.error.msg}</p>`).fadeIn();
            setTimeout(function () {
              $(".error-add-image__msg").fadeOut();
            }, 5000);
            $(':input[type="submit"]').prop('disabled', false);
  
            return;
          }

          const message = $('.add-image__msg');
          message.fadeIn().removeClass('alert-danger').addClass('alert-success');
          setTimeout(function () {
            message.fadeOut();
          }, 5000);
  
          $(".add-image-form")[0].reset();
          $('.add-image-progress').fadeOut();
          $(':input[type="submit"]').prop('disabled', false);
        }
      });
    });
  });
  