function showAlert(message) {
    $("#alert_bar").html(message);
    $("#alert_bar").fadeIn();
    
//    setTimeout(hideAlert, 2000);
}

function hideAlert() {
    $("#alert_bar").hide();
}

function register() {
    hideAlert();
    
    App.showLoading(Message.SIGN_UP);
    
    $.ajax({
        type: "POST",
        url: $("#basePath").val() + 'user/sign_up',
        data: {
            full_name: $("#full_name").val(),
            email: $("#email_address").val(),
            phone_number: $("#phone_number").intlTelInput("getNumber"),
            password: $("#new_password").val(),
            address: $("#address").val(),
            company: $("#company").val(),
            notes: $("#notes").val(),
        },
        dataType: 'json',
        success: function (data) {
            App.hideLoading();
            
            if (data.code == 0) {
                $("#alert_bar").removeClass('alert-danger').addClass('alert-success');
                showAlert(data.message);
                
                setTimeout(go_login, 800);
            } else {
                $("#frm").data('formValidation').resetForm();
                
                showAlert(data.message);
            }
        },
        error: function () {
            $("#frm").data('formValidation').resetForm();

            App.hideLoading();
            showAlert(Message.ERROR__SERVER);
        }
    });            
}

function go_login() {
    location.href = $("#basePath").val() + "user/login";
}

jQuery(document).ready(function () {
    
    $("#phone_number").intlTelInput({
        utilsScript: $("#globalResourcePath").val() + 'vendor/formvalidation/intl-tel-input/js/utils.js',
        autoPlaceholder: true,
        preferredCountries: ['us', 'fr', 'gb']
    });    
    
    $('#frm').formValidation({
        framework: "bootstrap",
        button: {
            selector: '.btn-submit',
            disabled: 'disabled'
        },
        icon: null,
        fields: {
            full_name: {
                validators: {
                    notEmpty: {
                        message: 'Please enter full name'
                    },
                    stringLength: {
                        min: 3,
                        max: 100,
                    },
                }
            },
            email_address: {
                validators: {
                    notEmpty: {
                        message: 'Please enter email address'
                    },
                    emailAddress : {
                        message: 'Please enter valid email address'
                    },
                }
            },
            
            new_password: {
                validators: {
                    notEmpty: {
                        message: 'Please enter password'
                    },
                    stringLength: {
                        min: 6,
                    },
                }
            },
            confirm_password: {
                validators: {
                    notEmpty: {
                        message: 'Please enter password'
                    },
                    stringLength: {
                        min: 6,
                    },
                    identical : {
                        field: 'new_password',
                        message: 'Confirm new password'
                    }
                }
            },
            
            phone_number: {
                validators: {
                    callback: {
                        message: 'The phone number is not valid',
                        callback: function(value, validator, $field) {
                            return value === '' || $field.intlTelInput('isValidNumber');
                        }
                    }
                }
            },
            
        }
    })
    .on('click', '.country-list', function() {
        $('#frm').formValidation('revalidateField', 'phone_number');
    })
    .on('success.form.fv', function(e) {
        e.preventDefault();
        
        register();
    });
    
});
