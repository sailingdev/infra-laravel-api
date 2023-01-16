function update_information() {
    App.showLoading(Message.UPDATE);
    
    $.ajax({
        type: "POST",
        url: $("#basePath").val() + 'user/update_information',
        data: {
            first_name: $("#first_name").val(),
            last_name: $("#last_name").val(),
            address: $("#address").val(),
            phone_number: $("#phone_number").val(),
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

jQuery(document).ready(function () {
    $('#frm_information').formValidation({
        framework: "bootstrap",
        button: {
            selector: '#btn_information',
            disabled: 'disabled'
        },
        icon: null,
        fields: {
            first_name: {
                validators: {
                    notEmpty: {
                        message: 'Please enter first name'
                    },
                    stringLength: {
                        min: 3,
                        max: 50
                    },
                }
            },
            last_name: {
                validators: {
                    notEmpty: {
                        message: 'Please enter last name'
                    },
                    stringLength: {
                        min: 3,
                        max: 50
                    },
                }
            },
        }
    }).on('success.form.fv', function(e) {
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
    
});
