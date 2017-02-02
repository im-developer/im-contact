var inputs = document.querySelectorAll('input[type="text"], input[type="datepicker"], input[type="file"], textarea, input[type="textarea"], input[type="password"], input[type="email"], input[type="number"]');
infoTooltip = document.querySelectorAll('.info-tooltip'), body = document.querySelector('body');

//Inputs underline animation
if (inputs) {
    for (var i = 0; i < inputs.length; i++) {
        inputs[i].previousElementSibling.classList.add('floating-label');
        inputs[i].addEventListener('focusin', function () {
            this.previousElementSibling.classList.add('label-active');
        })
        inputs[i].addEventListener('focusout', function () {
            if (!(this.value == '')) {
                this.classList.add('input-active');
            }
            else if (this.value == '') {
                this.classList.remove('input-active');
                this.previousElementSibling.classList.remove('label-active');
            }
            else {
                this.previousElementSibling.classList.remove('label-active');
            }
        })
    }
}

//Required inputs
if (inputs) {
    for (var m = 0; m < inputs.length; m++) {
        if (inputs[m].hasAttribute('required')) {
            inputs[m].previousElementSibling.classList.add('label-required');
        }
    }
}

// override jquery validate plugin defaults
$.validator.setDefaults({
    highlight: function(element) {
        $(element).addClass('has-error');
    },
    unhighlight: function(element) {
        $(element).removeClass('has-error');
    },
    errorElement: 'span',
    errorClass: 'help-block',
    errorPlacement: function(error, element) {
        // if(element.parent('.input-group').length) {
        //     error.insertAfter(element.parent());
        // } else {
        //     error.insertAfter(element);
        // }
    }
});

$('#contact-form').validate();

$('#contact-form').submit(function () {

    if( !$('#contact-form').valid() ) return false;

    $('.send-btn').addClass("ripple-loading").prop('disabled', true);
    $('#message').html("")
    $.ajax({
        url: "send.php",
        type: "POST",
        dataType: "JSON",
        data: $(this).serialize(),
        success: function (response) {
            if( response.success ) {
                $('#message').html('<div class="alert alert-success">'+response.message+'</div>')
                $('input, textarea').val("")
                $('.label-active').removeClass("label-active")
            } else {
                $('#message').html('<div class="alert alert-danger">'+response.message+'</div>')
            }
            $('.send-btn').removeClass("ripple-loading").prop('disabled', false);
        },
        error: function (xhr) {
            $('.send-btn').removeClass("ripple-loading").prop('disabled', false);
            $('#message').html('<div class="alert alert-danger">حدث خطأ من فضلك حاول في وقت ﻻحق</div>')
        }
    })
    return false;
})

$('.contact-btn').click(function () {
    $('.contact-popup').addClass('active');
    $('body').addClass('active');
    $('#message').html("")
    return false;
});

$('.close-popup').click(function () {
    $('.contact-popup').removeClass('active');
    $('body').removeClass('active');
    $('#message').html("")
    return false;
});