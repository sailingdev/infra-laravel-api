function update_information() {
    App.showLoading(Message.UPDATE);
    
    $.ajax({
        type: "POST",
        url: $("#basePath").val() + 'user/update_information',
        data: {
            full_name: $("#full_name").val(),
            phone_number: $("#phone_number").intlTelInput("getNumber"),
            address: $("#address").val(),
            company: $("#company").val(),
            notes: $("#notes").val(),
        },
        dataType: 'json',
        success: function (data) {
            $("#frm_information").data('formValidation').resetForm();
            App.hideLoading();

            if (data.code == 0) {
                App.showSuccessMessage("Successfully Updated!");
            } else {
                App.showFailedMessage(data.message);
            }
        },
        error: function () {
            $("#frm_information").data('formValidation').resetForm();
            
            App.hideLoading();
            App.showFailedMessage(Message.ERROR__SERVER);
        }
    });
}

function update_password() {
    App.showLoading(Message.UPDATE);
    
    $.ajax({
        type: "POST",
        url: $("#basePath").val() + 'user/update_password',
        data: {
            email: $("#email_address").val(),
            old_password: $("#old_password").val(),
            new_password: $("#new_password").val(),
        },
        dataType: 'json',
        success: function (data) {
            $("input[type=password]").val('');
            $("#frm_password").data('formValidation').resetForm();
            
            App.hideLoading();
            if (data.code == 0) {
                App.showSuccessMessage("Successfully Updated!");
            } else {
                App.showFailedMessage(data.message);
            }
        },
        error: function () {
            $("input[type=password]").val('');
            $("#frm_password").data('formValidation').resetForm();
            
            App.hideLoading();
            App.showFailedMessage(Message.ERROR__SERVER);
        }
    });
}

function update_twilio() {
    App.showLoading(Message.UPDATE);
    
    $.ajax({
        type: "POST",
        url: $("#basePath").val() + 'user/update_twilio',
        data: {
            account: $("#twilio_account").val(),
            token: $("#twilio_token").val(),
            message: $("#twilio_message").val(),
            sender: $("#twilio_sender").val(),
        },
        dataType: 'json',
        success: function (data) {
            $("#frm_twilio").data('formValidation').resetForm();
            
            App.hideLoading();
            if (data.code == 0) {
                App.showSuccessMessage("Successfully Updated!");
            } else {
                App.showFailedMessage(data.message);
            }
        },
        error: function () {
            $("#frm_twilio").data('formValidation').resetForm();
            
            App.hideLoading();
            App.showFailedMessage(Message.ERROR__SERVER);
        }
    });
}

jQuery(document).ready(function () {
    $("#phone_number").intlTelInput({
        utilsScript: $("#globalResourcePath").val() + 'vendor/formvalidation/intl-tel-input/js/utils.js',
        autoPlaceholder: true,
        preferredCountries: ['us', 'fr', 'gb']
    });    
    
    $('#frm_information').formValidation({
        framework: "bootstrap",
        button: {
            selector: '#btn_information',
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
        
        update_information();
    });
    

    $('#frm_password').formValidation({
        framework: "bootstrap",
        button: {
            selector: '#btn_password',
            disabled: 'disabled'
        },
        icon: null,
        fields: {
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
            old_password: {
                validators: {
                    notEmpty: {
                        message: 'Please enter password'
                    },
                    stringLength: {
                        min: 6,
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
        }
    }).on('success.form.fv', function(e) {
        e.preventDefault();
        
        update_password();
    });
    
    $('#frm_twilio').formValidation({
        framework: "bootstrap",
        button: {
            selector: '#btn_twilio',
            disabled: 'disabled'
        },
        icon: null,
        fields: {
            twilio_account: {
                validators: {
                    notEmpty: {
                        message: 'Please enter twilio account service id'
                    },
                }
            },
            twilio_token: {
                validators: {
                    notEmpty: {
                        message: 'Please enter twilio authorization token'
                    },
                }
            },
            twilio_message: {
                validators: {
                    notEmpty: {
                        message: 'Please enter twilio phone number'
                    },
                }
            },
        }
    }).on('success.form.fv', function(e) {
        e.preventDefault();
        
        update_twilio();
    });

});
