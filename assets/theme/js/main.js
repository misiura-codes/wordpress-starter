jQuery(document).ready(function ($) {


  // Send Ajax form
  $(document).on('submit', '.ajax-form', function (event) {
    event.preventDefault();

    var current_form = $(this);

    $.ajax({
        url: wp.ajax,
        type: 'POST',
        data: current_form.serialize(),
        beforeSend: function () {
          current_form.find('button[type="submit"]').prop('disabled', true);
        }
      })
      .done(function (response) {
        if (response.status == 'success') {
          current_form[0].reset();
        }
        Swal.fire({
          text: response.message,
          type: response.status,
        });
      })
      .fail(function () {})
      .always(function () {
        current_form.find('button[type="submit"]').prop('disabled', false);
      });
  });
});