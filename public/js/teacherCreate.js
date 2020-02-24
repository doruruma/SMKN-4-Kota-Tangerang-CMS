$(document).ready(function () {

  $('.teacher').addClass('active')
  $('.custom-file-input').on('change', function () {
    let fileName = $(this).val().split('\\').pop()
    $(this).next('.custom-file-label').addClass('selected').html(fileName)
    $('.img-thumbnail').attr('src', window.URL.createObjectURL(this.files[0]))
  })

})