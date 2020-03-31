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

  $('.btnLogout').click(function () {
    Swal.fire({
      title: "Confirm Log Out",
      text: "Are you sure to log out?",
      icon: "question",
      showCancelButton: true
    }).then((res) => {
      res.value ? $('.formLogout').submit() : false
    })
  })

})