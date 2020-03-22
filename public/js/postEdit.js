$(document).ready(() => {

  $("#title").on('input', function () {
    $("#slug_preview").val(slug($(this).val()))
  })

  let res = CKEDITOR.replace('editor', {
    removeButtons: 'Image'
  })

  $("#post_submit").on('submit', function (e) {
    e.preventDefault()

    $.ajax({
      url: "/admin/post/" + $("#post_id").val(),
      method: "PUT",
      data: {
        title: $("#title").val(),
        content: res.getData(),
        category_id: $("#cat").val(),
        published: $("#publish").is(':checked') ? 1 : 0,
        user_id: $("#user_id").val(),
        _token: $("input[name='_token']").val()
      },
      success: function (res) {
        console.log(res)
        Swal.fire({
          title: "SUCCESS",
          text: "Data Updated Successfully",
          icon: "success"
        })
        document.location.href = '/admin/posts'
      },
      error: function (rej) {
        console.log(rej)
      }
    })
  })

  $.ajax({
    url: "/api/categories",
    type: "GET",
    success: function (res) {
      $("#cat").html("<option value='' selected disabled>Select Category</option>")
      res.map((value, index) => {
          if($("#category_id").val() == value.id) {
            $("#cat").append(`
                <option value="${value.id}" selected>${value.category}</option>
            `)
          } else {
            $("#cat").append(`
                <option value="${value.id}">${value.category}</option>
            `)
          }
      })
    }
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
