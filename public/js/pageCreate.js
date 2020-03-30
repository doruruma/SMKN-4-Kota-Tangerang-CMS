$(document).ready(() => {
  $("#title").on('input', function () {
    $("#slug_preview").val(slug($(this).val()))
  })

  let res = CKEDITOR.replace('editor', {
    removeButtons: 'Image'
  })

  $("#page_submit").on('submit', function (e) {
    e.preventDefault()

    $.ajax({
      url: "/admin/page",
      method: "POST",
      data: {
        user_id: $("#user_id").val(),
        title: $("#title").val(),
        content: res.getData(),
        published: $("#publish").is(':checked') ? 1 : 0,
        _token: $("input[name='_token']").val()
      },
      success: function (res) {
        Swal.fire({
          icon: 'success',
          title: 'Your work has been saved',
          showConfirmButton: false,
          timer: 1500
        })

        setTimeout(() => {
          window.location.href = "/admin/page"
        }, 2000)
      },
      error: function (res) {
        if (res.status == 422) {
          $('.title').html(res.responseJSON[0].title)
          $('.content').html(res.responseJSON[0].content)
        } else {
          Swal.fire({
            icon: 'error',
            title: 'Error',
            showConfirmButton: false,
            timer: 1500
          })
        }
      }
    })
  })

  function slug(text) {
    return text.toString().toLowerCase()
      .replace(/\s+/g, '-') // Replace spaces with -
      .replace(/[^\w\-]+/g, '') // Remove all non-word chars
      .replace(/\-\-+/g, '-') // Replace multiple - with single -
      .replace(/^-+/, '') // Trim - from start of text
      .replace(/-+$/, ''); // Trim - from end of text
  }
})
