$(document).ready(function () {
  // Fade out success alert and redirect
  $('#success_alert').fadeOut(3000, function () {
    $(this).remove();
  });
});
