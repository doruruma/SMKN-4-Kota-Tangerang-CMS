$(document).ready(function () {

  let title = $('.swal').data('title')
  let message = $('.swal').data('message')
  if (title) {
    Swal.fire({
      title: title.toUpperCase(),
      text: message,
      icon: title
    })
  }
})