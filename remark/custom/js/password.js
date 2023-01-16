function reset_password() {
    App.showLoading(Message.LOADING);
    
    $.ajax({
        type: "POST",
        url: $("#basePath").val() + 'user/reset_password',
        data: {
            user_id: $("#user_id").val(),
            password: $("#new_password").val(),
        },
        dataType: 'json',
        success: function (data) {
            App.hideLoading();
            
            if (data.code == 0) {
                App.showSuccessMessage(data.message);
                
                setTimeout(go_login, 800);
            } else {
                App.showFailedMessage(data.message);
            }
        },
        error: function () {
            App.hideLoading();
            App.showFailedMessage(Message.ERROR__SERVER);
        }
    });            
}

function go_login() {
    location.href = $("#basePath").val() + "user/login";
}

jQuery(document).ready(function () {

    $('#frm').formValidation({
        framework: "bootstrap",
        button: {
            selector: '.btn-submit',
            disabled: 'disabled'
        },
        icon: null,
        fields: {
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
    })
    .on('success.form.fv', function(e) {
        e.preventDefault();
        
        reset_password();
    });
    
});
