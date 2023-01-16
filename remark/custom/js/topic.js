function update_data() {
    App.showLoading(Message.UPDATE);
    
    $.ajax({
        type: "POST",
        url: $("#basePath").val() + 'topic/update_favourite',
        data: {
            english_name: $("#english_name").val(),
            german_name: $("#german_name").val(),
            keyword: $("#keywords").val(),
        },
        dataType: 'json',
        success: function (data) {
            $("#frm").data('formValidation').resetForm();
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

jQuery(document).ready(function () {
    
    var autocomplete = new Bloodhound({
        datumTokenizer: function (d) {
            return Bloodhound.tokenizers.whitespace(d.value)
        },
        queryTokenizer: Bloodhound.tokenizers.whitespace,
        remote: {
            url: "get_autocomplete",    
            replace: function(url, query) {
                return url + "?input=" + query;
            },
            ajax : {
                beforeSend: function(jqXhr, settings){
                   settings.data = $.param({
                       input: queryInput.val()
                   });
                },
                type: "POST"
            },
            transform: function(data) {
                if (data.code==0) {
                    return data.result;
                } else {
                    return [];
                }
            },
        }
    });

    $('#keywords').tokenfield({
        minLength: 1,
        typeahead: [ null, { 
            minLength: 1,
            autoSelect: false,
            source: autocomplete.ttAdapter() 
        }],
        showAutocompleteOnFocus: true,
    });
    
    $('#keywords').on('tokenfield:createtoken', function (event) {
        var existingTokens = $(this).tokenfield('getTokens');
        $.each(existingTokens, function (index, token) {
            if (token.value === event.attrs.value) {
                event.preventDefault();
            }
        });
    });

    $('#frm').formValidation({
        framework: "bootstrap",
        button: {
            selector: '#btn_submit',
            disabled: 'disabled'
        },
        icon: null,
        fields: {
            english_name: {
                validators: {
                    notEmpty: {
                        message: 'Please enter first name'
                    },
                }
            },
            german_name: {
                validators: {
                    notEmpty: {
                        message: 'Please enter last name'
                    },
                }
            },
        }
    }).on('success.form.fv', function(e) {
        e.preventDefault();
        
        var keywords = $("#keywords").val();
        if (keywords=="") {
            App.showMessage("Please Enter at least one tag/keyword!");
        } else {
            update_data();
        }
    });
    
});
