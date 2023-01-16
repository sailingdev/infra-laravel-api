
function update() {
    var info = [];
    $("#faq_list li").each(function(index, row) {
        info[index] = {
            id: $(row).attr('data-id'),
            order: index+1
        };
    });

    App.showLoading(Message.LOADING);

    $.ajax({
        type: "POST",
        url: 'sort',
        data: {
            info: JSON.stringify(info),
        },
        dataType: 'json',
        success: function (data) {
            App.hideLoading();

            if (data.code == 0) {
                App.showSuccessMessage(data.message);
                
                setTimeout(go_list, 800);
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

function go_list() {
    history.back();
}

jQuery(document).ready(function () {

    $('#faq_list').sortable();

    $("#btn_save").on('click', function (e) {
        e.preventDefault();
        
        update();
    });

});
