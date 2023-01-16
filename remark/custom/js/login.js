function showAlert(message) {
    $("#alert_bar").html(message);
    $("#alert_bar").fadeIn();
    
//    setTimeout(hideAlert, 2000);
}

function hideAlert() {
    $("#alert_bar").hide();
}

function login() {
    hideAlert();
    
    var email = $("input[name='email']").val();
    var password = $("input[name='password']").val();
    
    if (email=="") {
        showAlert(Message.ERROR__EMPTY_EMAIL);
        return false;
    }
    
//    var pattern = /^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/;
//    if (!pattern.test(email)) {
//        showAlert(Message.ERROR__INVALID_EMAIL);
//        return false;
//    }
    
    if (password=="") {
        showAlert(Message.ERROR__EMPTY_PASSWORD);
        return false;
    }
    
    App.showLoading(Message.SIGN_IN);
    $.ajax({
        type: "POST",
        url: $("#basePath").val() + 'user/sign_in',
        data: {
            email: email,
            password: password,
            remember_me: $("#remember_me").prop('checked') ? "1" : "",
            administrator_me: $("#administrator_me").prop('checked') ? "1" : "",
        },
        dataType: 'json',
        success: function (data) {
            App.hideLoading();
            
            console.log(data);
            if (data.code == 0) {
                $("#alert_bar").removeClass('alert-danger').addClass('alert-success');
                showAlert(data.message);
                
                setTimeout(go_dashboard, 800);
                
            } else {
                showAlert(data.message);
                $("input[name='password']").val('');
            }
        },
        error: function () {
            App.hideLoading();
            showAlert(Message.ERROR__SERVER);
        }
    });            
}

function send_activation(email) {
    App.showLoading(Message.LOADING);
    
    $.ajax({
        type: "POST",
        url: $("#basePath").val() + 'user/send_activation',
        data: {
            email: email,
        },
        dataType: 'json',
        success: function (data) {
            App.hideLoading();
            
            if (data.code == 0) {
                App.showSuccessMessage(data.message);
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

function forgot_password(email) {
    App.showLoading(Message.LOADING);
    
    $.ajax({
        type: "POST",
        url: $("#basePath").val() + 'user/send_password',
        data: {
            email: email,
        },
        dataType: 'json',
        success: function (data) {
            App.hideLoading();
            
            if (data.code == 0) {
                App.showSuccessMessage(data.message);
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

function go_dashboard() {
    location.href = $("#basePath").val() + "dashboard";
}

jQuery(document).ready(function () {
    
    $("input[name='password']").keypress(function(event){
        var keycode = (event.keyCode ? event.keyCode : event.which);
        if (keycode==13){
            login();
        }
    });   
    
    $("#btn_forgot").on('click', function(e) {
        e.preventDefault();
        
        App.showPromptDialog("Email Address", $("#email_address").val(), "Please Entere Email Address to reset password", function(email) {
           if (validate_email(email)) {
               forgot_password(email);
           } else {
               App.showFailedMessage("Please Enter vaild email address");
           }
        }, function(){});
    });
    
    $("#btn_activate").on('click', function(e) {
        e.preventDefault();
        
        App.showPromptDialog("Email Address", $("#email_address").val(), "Please Entere Email Address to activate", function(email) {
           if (validate_email(email)) {
               send_activation(email);
           } else {
               App.showFailedMessage("Please Enter vaild email address");
           }
        }, function(){});
    });

    $(".btn-submit").on('click', function(e) {
        e.preventDefault();
        
        login();
    });
    
});
