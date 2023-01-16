var faq_id = "";


function add() {
    faq_id = "";
    
    $("#faq_dialog .modal-header .modal-title").html("Add Help Item");
    
    $("#faq_title").val("");
    $("#faq_content").val("");
    
    $("#faq_dialog .modal-footer").show();
    $("#faq_dialog").modal('show');
}

function edit(id) {
    faq_id = id;
    
    App.showLoading(Message.LOADING);

    $.ajax({
        type: "POST",
        url: 'get',
        data: {
            id: faq_id,
        },
        dataType: 'json',
        success: function (data) {
            App.hideLoading();

            if (data.code == 0) {
                $("#faq_dialog .modal-header .modal-title").html("Edit Help Item");

                $("#faq_title").val(data.faq.title);
                $("#faq_content").val(data.faq.description);

                $("#faq_dialog .modal-footer").show();
                $("#faq_dialog").modal('show');
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

function view(id) {
    faq_id = id;
    
    App.showLoading(Message.LOADING);

    $.ajax({
        type: "POST",
        url: 'get',
        data: {
            id: faq_id,
        },
        dataType: 'json',
        success: function (data) {
            App.hideLoading();

            if (data.code == 0) {
                $("#faq_dialog .modal-header .modal-title").html("View Help Item");

                $("#faq_title").val(data.faq.title);
                $("#faq_content").val(data.faq.description);

                $("#faq_dialog .modal-footer").hide();
                $("#faq_dialog").modal('show');
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

function update() {
    App.showLoading(Message.LOADING);

    $.ajax({
        type: "POST",
        url: 'update',
        data: {
            id: faq_id,
            type: 1,
            title: $("#faq_title").val(),
            description: $("#faq_content").val(),
        },
        dataType: 'json',
        success: function (data) {
            App.hideLoading();

            if (data.code == 0) {
                App.showSuccessMessage(data.message);
                $('#table_content').dataTable().api().ajax.reload(null, false);
                
                $("#faq_dialog").modal('hide');
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
            "type": "POST", 
            data: function(d) {
                d.type=1;
            }
        },
        "pageLength": 50,
//        'searching' : false,
        "order": [[4, "asc"]],
//        "columnDefs": [
//            {
//                "targets": [],
//                "orderable": false
//            },
//            {
//                "targets": "_all",
//                "searchable": false
//            }
//        ],
        "columns": [
            {
                "data": "title",
            },
            {
                "data": "description",
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
                        d += '<span class="label label-sm label-success">Published</span>';
                    } else {
                        d += '<span class="label label-sm label-default">Preparing</span>';
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

                    if (row.status==1) {
                        act += '<li role="presentation"><a href="javascript:is_active(\''+row.id+'\')" role="menuitem" class="waves-effect waves-classic"><i class="icon md-eye-off"></i> Prepare</a></li>';
                    } else {
                        act += '<li role="presentation"><a href="javascript:is_active(\''+row.id+'\')" role="menuitem" class="waves-effect waves-classic"><i class="icon md-eye"></i> Publish</a></li>';
                    }
                    
                    act += '<li class="divider" role="presentation"></li>';
                    act += '<li role="presentation"><a href="javascript:view(\''+row.id+'\')" role="menuitem" class="waves-effect waves-classic"><i class="icon md-search"></i> View</a></li>';
                    act += '<li role="presentation"><a href="javascript:edit(\''+row.id+'\')" role="menuitem" class="waves-effect waves-classic"><i class="icon md-edit"></i> Edit</a></li>';
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



    $('#frm_faq').formValidation({
        framework: "bootstrap",
        button: {
            selector: '#faq_dialog .modal-footer .btn-submit',
            disabled: 'disabled'
        },
        icon: null,
        fields: {
            faq_title: {
                validators: {
                    notEmpty: {
                        message: 'Please enter title'
                    },
                    stringLength: {
                        max: 255,
                    },
                }
            },
            faq_content: {
                validators: {
                    notEmpty: {
                        message: 'Please enter content'
                    },
                }
            },
        }
    })
    .on('click', '.country-list', function() {
        $('#frm_contact').formValidation('revalidateField', 'phone_number');
    })
    .on('success.form.fv', function(e) {
        e.preventDefault();

        update();
    });


    $('#faq_dialog').on('shown.bs.modal', function() {
        $("#frm_faq").data('formValidation').resetForm();
    });    
    
    $('#faq_dialog').on('hidden.bs.modal', function() {
    });

    $("#btn_add").on('click', function (e) {
        e.preventDefault();
        
        add();
    });
    
    $("#btn_order").on('click', function (e) {
        e.preventDefault();
        
        $("#frm_order").submit();
    });

});
