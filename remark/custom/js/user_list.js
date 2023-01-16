var user_id = "";

function is_active(id) {
    App.showLoading(Message.LOADING);

    $.ajax({
        type: "POST",
        url: 'update_active',
        data: {
            id: id,
        },
        dataType: 'json',
        success: function (data) {
            App.hideLoading();

            if (data.code == 0) {
                App.showSuccessMessage(data.message);

                $('#table_content').dataTable().api().ajax.reload(null, false);
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

function remove(id) {
    App.showConfirmDialog("Are you sure?", function(){
        App.showLoading(Message.LOADING);

        $.ajax({
            type: "POST",
            url: 'remove',
            data: {
                id: id,
            },
            dataType: 'json',
            success: function (data) {
                App.hideLoading();

                if (data.code == 0) {
                    $('#table_content').dataTable().api().ajax.reload(null, false);
                } else {
                    App.showFailedMessage(data.message);
                }
            },
            error: function () {
                App.hideLoading();
                App.showFailedMessage(Message.ERROR__SERVER);
            }
        });
    }, function(){});
}

function view(id) {
    App.showLoading(Message.LOADING);

    $.ajax({
        type: "POST",
        url: 'get',
        data: {
            id: id,
        },
        dataType: 'json',
        success: function (data) {
            App.hideLoading();

            if (data.code == 0) {
                $("#detail_dialog .modal-title").html(data.user.name + "'s Welcome Message");
                
                $("#detail_content").html(data.user.note_text);
                if (data.user.note_voice!=null && data.user.note_voice!="") {
                    $("#detail_voice").attr('src', data.user.note_voice);
                    $("#detail_voice").show();
                } else {
                    $("#detail_voice").attr('src', "");
                    $("#detail_voice").hide();
                }

                $("#detail_dialog").modal('show');
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

function question(id) {
    $("#q_user_id").val(id);
    $("#frm_question").submit();
}

function answer(id) {
    $("#a_user_id").val(id);
    $("#frm_answer").submit();
}

function comment(id) {
    $("#c_user_id").val(id);
    $("#frm_comment").submit();
}

jQuery(document).ready(function () {
    
    $('#table_content').dataTable({
        "processing": true,
        "serverSide": true,
        
        "responsive": true,
        
        language: {
            "sSearchPlaceholder": "Search..",
            "lengthMenu": "_MENU_",
            "search": "_INPUT_",
            "paginate": {
                "previous": '<i class="icon md-chevron-left"></i>',
                "next": '<i class="icon md-chevron-right"></i>'
            }
        },
        "ajax": {
            "url": "load",
            "type": "POST"
        },
        "pageLength": 50,
//        'searching' : false,
        "order": [[5, "desc"]],
        "columnDefs": [
            {
                "targets": [0, -1],
                "orderable": false
            },
            {
                "targets": "_all",
                "searchable": false
            }
        ],
        "columns": [
            {
                "data": "photo",
                "render": function (data, type, row, meta) {
                    var d = "";
                    
                    if (data!=null && data!="") {
                        d += '<img class="img-thumb img-bordered img-responsive img-circle" src="'+data+'" style="max-width: 56px;">';
                    }
                    
                    return d;
                }
            },
            {
                "data": "name",
            },
            {
                "data": "email",
            },
            {
                "data": "note_text",
                "render": function (data, type, row, meta) {
                    var d = data;
                    
                    if (data!=null && data!="" && data.length>50) {
                        d = data.substring(0, 50) + "...";
                    }
                    
                    return d;
                }
            },
            {
                "data": "status",
                "render": function (data, type, row, meta) {
                    var d = "";
                    
                    if (data==1) {
                        d += '<span class="label label-sm label-success">Activated</span>';
                    } else {
                        d += '<span class="label label-sm label-default">Deactivated</span>';
                    }
                    
                    return d;
                }
            },
            {
                "data": "updated_at",
                "render": function (data, type, row, meta) {
                    var d = "";
                    if (data != null)
                        d = data.substring(0, 4) + "-" + data.substring(4, 6) + "-" + data.substring(6, 8) + " " + data.substring(8, 10) + ":" + data.substring(10, 12) + ":" + data.substring(12, 14);
                    return d;
                }
            },
            {
                "data": "additional",
                "render": function (data, type, row, meta) {
                    var act = "";
                    
                    act += '<div class="btn-group dropdown inside-table">' +
                            '<button type="button" class="btn btn-default dropdown-toggle waves-effect waves-light" id="exampleBulletDropdown'+row.f_id+'" data-toggle="dropdown" aria-expanded="false">Action</button>'+
                            '<ul class="dropdown-menu bullet dropdown-menu-right" aria-labelledby="exampleBulletDropdown'+row.f_id+'" role="menu">'+
                            '';
                    
                    act += '<li class="divider" role="presentation"></li>';

                    act += '<li role="presentation"><a href="javascript:question(\''+row.id+'\')" role="menuitem" class="waves-effect waves-classic"><i class="icon md-help"></i> Questions</a></li>';
                    act += '<li role="presentation"><a href="javascript:answer(\''+row.id+'\')" role="menuitem" class="waves-effect waves-classic"><i class="icon md-info"></i> Answers</a></li>';
                    act += '<li role="presentation"><a href="javascript:comment(\''+row.id+'\')" role="menuitem" class="waves-effect waves-classic"><i class="icon md-comment"></i> Comments</a></li>';

                    act += '<li class="divider" role="presentation"></li>';
                    if (row.status==1) {
                        act += '<li role="presentation"><a href="javascript:is_active(\''+row.id+'\')" role="menuitem" class="waves-effect waves-classic"><i class="icon md-eye-off"></i> Deactivate</a></li>';
                    } else {
                        act += '<li role="presentation"><a href="javascript:is_active(\''+row.id+'\')" role="menuitem" class="waves-effect waves-classic"><i class="icon md-eye"></i> Activate</a></li>';
                    }
                    
                    act += '<li class="divider" role="presentation"></li>';
                    act += '<li role="presentation"><a href="javascript:view(\''+row.id+'\')" role="menuitem" class="waves-effect waves-classic"><i class="icon md-search"></i> View</a></li>';
                    act += '<li role="presentation"><a href="javascript:remove(\''+row.id+'\')" role="menuitem" class="waves-effect waves-classic"><i class="icon md-delete"></i> Delete</a></li>';

                    act += '<li class="divider" role="presentation"></li>';
                    act += '' +
                            '</ul>'+
                             '</div';
                    
                    return act;
                }
            }
        ]
    });

    $("#btn_refresh").on('click', function (e) {
        e.preventDefault();

        $('#table_content').dataTable().api().ajax.reload();
    });
    
});
