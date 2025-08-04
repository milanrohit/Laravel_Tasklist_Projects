$(document).ready(function () {
  // Fade out success alert and redirect
  $('#success_alert').fadeOut(3000, function () {
    $(this).remove();
    window.location.href = "{{ route('tasks.index') }}";
  });

  // Fade out title, description, and long description sequentially
  setTimeout(function () {
    $('#div_title').fadeOut();
  }, 3000);

  setTimeout(function () {
    $('#div_description').fadeOut();
  }, 4000);

  setTimeout(function () {
    $('#div_long_description').fadeOut();
  }, 5000);
});

// Toggle task status via fetch API
function toggleStatus(taskId) {
  fetch(`/tasks/${taskId}/toggle-status`, {
    method: 'POST',
    headers: {
      'X-CSRF-TOKEN': '{{ csrf_token() }}',
      'Content-Type': 'application/json'
    }
  })
    .then(response => {
      if (response.ok) {
        location.reload();
      } else {
        alert('Failed to toggle task status.');
      }
    })
    .catch(error => {
      console.error('Error:', error);
      alert('An error occurred while toggling status.');
    });
}
