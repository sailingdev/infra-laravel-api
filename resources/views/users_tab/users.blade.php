@extends('layouts.admin_layout')
@section('page_content')
    <!-- Page -->
    <div class="page animsition">
        <div class="page-header">
            <ol class="breadcrumb">
                <li>Management</li>
                <li class="active">Users</li>
            </ol>

            <h1 class="page-title">Users Management</h1>
        </div>

        <div class="page-content container-fluid">

            <div class="panel">
                <header class="panel-heading">
                    <div class="panel-actions"></div>
                    <h3 class="panel-title">Users Table</h3>
                </header>
                <div class="panel-body">
                    <table class="table table-hover dataTable table-striped width-full"  id="table_content">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>UserName</th>
                            <th>Email</th>
                            <th>Company</th>
                            <th>Status</th>
                            <th>Time</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>Name</th>
                            <th>UserName</th>
                            <th>Email</th>
                            <th>Company</th>
                            <th>Status</th>
                            <th>Time</th>
                            <th>Action</th>
                        </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('custom_scripts')
<script>


    function isActive(id) {
        App.showLoading(Message.LOADING);

        $.ajax({
            type: "POST",
            url: '{{url('user/isActive')}}',
            data: {
                id: id,
                _token: '{{csrf_token()}}'
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
    }




    function remove(id) {
        App.showConfirmDialog("Are you sure?", function(){
            App.showLoading(Message.LOADING);

            $.ajax({
                type: "POST",
                url: '{{url('user/remove')}}',
                data: {
                    id: id,
                    _token : '{{csrf_token()}}'
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
                "url": "{{url('getusers')}}",
                "type": "POST",
                "data": function(d) {
                   d._token = "{{csrf_token()}}"
                }
            },
            "pageLength": 50,
//        'searching' : false,
            "order": [[3, "desc"]],
            "columnDefs": [
                {
                    "targets": [-1],
                    "orderable": false
                },
                {
                    "targets": "_all",
                    "searchable": false
                }
            ],
            "columns": [
                {
                    "data": "name",
                },
                {
                    "data": "username",
                },
                {
                    "data": "email",
                },
                {
                    "data": "company",
                },
                {
                    "data": "isActived",
                    "render": function (data, type, row, meta) {
                        var d = "";
                        if (data > 0){
                            d += '<span class="label label-sm label-primary"><i class="icon md-favorite"></i>&nbsp; Active</span>';
                        } else {
                            d += '<span class="label label-sm label-danger"><i class="icon md-favorite"></i>&nbsp; Pending</span>';
                        }

                        return d;
                    }
                },
                {
                    "data": "time",
                },

                {
                    "data": "user_id",
                    "render": function (data, type, row, meta) {
                        var act = "";
                        var url = '{{url("user/project_permission")}}' + '/' + row.user_id;

                        act += '<div class="btn-group dropdown inside-table">' +
                            '<button type="button" class="btn btn-success dropdown-toggle waves-effect waves-light" id="exampleBulletDropdown'+row.user_id+'" data-toggle="dropdown" aria-expanded="false">Action</button>'+
                            '<ul class="dropdown-menu bullet dropdown-menu-right" aria-labelledby="exampleBulletDropdown'+row.user_id+'" role="menu">'+
                            '';

                        act += '<li class="divider" role="presentation"></li>';

                        act += '<li role="presentation"><a href="javascript:isActive(\''+row.user_id+'\')" role="menuitem" class="waves-effect waves-classic"><i class="icon md-search"></i> IsActive</a></li>';
                        act += '<li role="presentation"><a href="javascript:remove(\''+row.user_id+'\')" role="menuitem" class="waves-effect waves-classic"><i class="icon md-delete"></i> Delete</a></li>';
                        act += '<li role="presentation"><a href="'+ url +'" role="menuitem" class="waves-effect waves-classic"><i class="icon md-book"></i> Project Permission</a></li>';
                        act += '<li class="divider" role="presentation"></li>';
                        act += '' +
                            '</ul>'+
                            '</div';

                        return act;
                    }
                }
            ]
        });




    });

</script>
@endsection


