function readURL(input) {
  if (input.files && input.files[0]) {
    if (input.files[0].type.indexOf("image") > -1){
      $('.modal-preview').show();
      $('.add-image-form button[type="submit"]').prop('disabled', false);
      $('.add-image-form-warning').html("");
      var reader = new FileReader();
      reader.onload = function (e) {
          $('#preview-img').attr('src', e.target.result);
      }
      reader.readAsDataURL(input.files[0]);
      
    } else {
      $('.modal-preview').hide();
      $('.add-image-form-warning').html("The file is not an image");
      $('.add-image-form button[type="submit"]').prop('disabled', true);
    }
  }
}

$(document).on('change', '.btn-file :file', function() {
  var input = $(this),
      numFiles = input.get(0).files ? input.get(0).files.length : 1,
      label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
  input.trigger('fileselect', [numFiles, label]);
});

$(document).ready( function() {
    $('.btn-file :file').on('fileselect', function(event, numFiles, label) {
        
        var input = $(this).parents('.input-group').find(':text'),
            log = numFiles > 1 ? numFiles + ' files selected' : label;
        
        if( input.length ) {
            input.val(log);
        } else {
            if( log ) alert(log);
        }
        
    });

    $(".thumbnail").hover(function(){
      $(this).css('border-color', '6699FF');
    }, function(){
      $(this).css('border-color', '#DDDDDD');
    });

    $("#modal-image-input").change(function(){
      readURL(this);
    });

    $('.modal-preview').hide();

    $('.thumbnail-thumbs-up').hide();
    $('.thumbnail-thumbs-down').hide();
    $('.text-thumbs-up').hide();

    $('.thumbnail').hover(function(){
      $(this).find("img").css('opacity', 0.4);
      $(this).find(".thumbnail-thumbs-up").css('opacity', '0.6');
      $(this).find(".thumbnail-thumbs-up").show();
      $(this).find(".thumbnail-thumbs-down").css('opacity', '0.6');
      $(this).find(".thumbnail-thumbs-down").show();
      $(this).find(".text-thumbs-up").show();
    }, function(){
      $(this).css('border-color', '#DDDDDD');
      $(this).find("img").css('opacity', 1);
      $(this).find(".thumbnail-thumbs-up").hide();
      $(this).find(".thumbnail-thumbs-down").hide();
      $(this).find(".text-thumbs-up").hide();
    });

    $('.thumbnail-thumbs-up, .thumbnail-thumbs-down').hover(function(){
      $(this).css('opacity', 1);
    }, function(){
      $(this).css('opacity', 0.6);
    });

    $('#login-form').submit(function(){
      var check = true;
      var username = $('#modal-login-username').val();
      var pwd = $('#modal-login-pwd').val();   

      if (username === ''){
        $('.login-form-username-warning').html('Please fill in the field');
        check = false;
      } else if (username.length < 6 || username.length > 32){
        $('.login-form-username-warning').html('Username length must be between 6 characters and 32 characters');
        check = false;
      } else {
        $('.login-form-username-warning').html('');
      }
      if (pwd === ''){
        $('.login-form-pwd-warning').html('Please fill in the field');
        check = false;
      } else if (pwd.length < 8 || pwd.length > 128){
        $('.login-form-pwd-warning').html('Incorrect password format');
        check = false;
      } else {
        $('.login-form-pwd-warning').html('');
      }
      return check;
    });

    $('#register-form').submit(function(){
      var check = true;
      var username = $('#modal-register-username').val();
      var email = $('#modal-register-email').val();
      var pwd = $('#modal-register-pwd').val();
      var pwd_again = $('#modal-register-pwd-again').val();

      if (username === ''){
        $('.register-form-username-warning').html('Please fill in the field');
        check = false;
      } else if (username.length < 6 || username.length > 32){
        $('.register-form-username-warning').html('Username length must be between 6 characters and 32 characters');
        check = false;
      } else {
        var letters = username.match(/[a-z]|[A-Z]/g);
        if (!letters){
          $('.register-form-username-warning').html('Username must has at least 1 character');
          check = false;
        } else {
          $('.register-form-username-warning').html('');
        }
      }

      if (email === ''){
        $('.register-form-email-warning').html('Please fill in the field');
        check = false;
      } else {
        $('.register-form-email-warning').html('');
      }

      if (pwd === ''){
        $('.register-form-pwd-warning').html('Please fill in the field');
        check = false;
      } else if (pwd.length < 8 || pwd.length > 128){
        $('.register-form-pwd-warning').html('Password length must be between 8 characters and 128 characters');
        check = false;
      } else {
        $('.register-form-pwd-warning').html('');
      }

      if (pwd_again === ''){
        $('.register-form-pwd-again-warning').html('Please fill in the field');
        check = false;
      } else if (pwd_again != pwd){
        $('.register-form-pwd-again-warning').html('Passwords are not the same');
        check = false;
      } else {
        $('.register-form-pwd-again-warning').html('');
      }
      return check;
    });
});