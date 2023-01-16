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
                $("#detail_title").html(data.question.title);
                $("#detail_content").html(data.question.voice_text);
                $("#detail_voice").attr('src', data.question.voice_audio);

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

function answer(id) {
    $("#a_question_id").val(id);
    $("#frm_answer").submit();
}

function comment(id) {
    $("#c_question_id").val(id);
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
            "type": "POST", 
            data: function(d) {
                d.user_id = $("#filter_user_id").val();
                
                d.is_spam = $("#chk_spam").prop('checked') ? "1" : "";
                d.keyword = $("#keywords").val();
            }
        },
        "pageLength": 50,
//        'searching' : false,
        "order": [[3, "desc"]],
        "columnDefs": [
            {
                "targets": [-1, -4],
                "orderable": false
            },
            {
                "targets": "_all",
                "searchable": false
            }
        ],
        "columns": [
            {
                "data": "title",
            },
            {
                "data": "keywords",
            },
            {
                "data": "voice_text",
                "render": function (data, type, row, meta) {
                    var d = data;
                    
                    if (data!=null && data!="" && data.length>50) {
                        d = data.substring(0, 50) + "...";
                    }
                    
                    return d;
                }
            },
            {
                "data": "votes",
                "render": function (data, type, row, meta) {
                    var d = "";
                    
                    d += '<span class="label label-sm label-info"><i class="icon md-thumb-up"></i>&nbsp; '+data+'</span>';
                    
                    return d;
                }
            },
            {
                "data": "likes",
                "render": function (data, type, row, meta) {
                    var d = "";
                    
                    d += '<span class="label label-sm label-danger"><i class="icon md-favorite"></i>&nbsp; '+data+'</span>';
                    
                    return d;
                }
            },
            {
                "data": "answers",
                "render": function (data, type, row, meta) {
                    var d = "";
                    
                    d += '<span class="label label-sm label-danger"><i class="icon md-info-outline"></i>&nbsp; '+data+'</span>';
                    
                    return d;
                }
            },
            {
                "data": "updated_by",
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

                    if (row.answers>0) {
                        act += '<li role="presentation"><a href="javascript:answer(\''+row.id+'\')" role="menuitem" class="waves-effect waves-classic"><i class="icon md-info"></i> Answers</a></li>';
                        act += '<li role="presentation"><a href="javascript:comment(\''+row.id+'\')" role="menuitem" class="waves-effect waves-classic"><i class="icon md-comment"></i> Comments</a></li>';
                        act += '<li class="divider" role="presentation"></li>';
                    }

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
    
    
    var autocomplete = new Bloodhound({
        datumTokenizer: function (d) {
            return Bloodhound.tokenizers.whitespace(d.value)
        },
        queryTokenizer: Bloodhound.tokenizers.whitespace,
        remote: {
            url: $("#basePath").val() + "topic/get_autocomplete",    
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
    
    
    $("#table_filter").on('change keypress', '.filter-item', function(e) {
         $('#table_content').dataTable().api().ajax.reload(null, false);
    });


});
