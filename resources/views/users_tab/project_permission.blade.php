@extends('layouts.admin_layout')
@section('page_content')
    <!-- Page -->
    <div class="page animsition">
        <div class="page-header">
            <ol class="breadcrumb">
                <li>Management</li>
                <li class="active">User Project Permission</li>
            </ol>

            <h1 class="page-title">Project Permission</h1>
        </div>

        <div class="page-content container-fluid">

            <div class="panel">
                <header class="panel-heading">
                    <div class="panel-actions"></div>
                    @if(isset($user_name))
                    <h3 class="panel-title red-900">{{$user_name}}</h3>
                    @endif
                </header>
                <div class="panel-body">
                    <table class="table table-hover dataTable table-striped width-full"  id="table_content">
                        <thead>
                        <tr>
                            <th>ProjectName</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>

                        @if(isset($projects))
                            @foreach($projects as $project)
                                <tr>
                                    <td>  {{$project->project_name}}</td>
                                    <td>
                                        @if($project['status'] == 0)
                                            <span class="label label-sm label-danger"><i class="icon md-favorite"></i>&nbsp; false</span>
                                        @else
                                            <span class="label label-sm label-primary"><i class="icon md-favorite"></i>&nbsp; true</span>
                                        @endif
                                    </td>
                                    <td><a class="btn btn-success" href="javascript:isSeted({{$project->project_id.' , '. $project->user_id}})">IsSeted</a></td>
                                </tr>
                            @endforeach
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('custom_scripts')
    <script>
        function isSeted(project_id, user_id) {
            App.showLoading(Message.LOADING);
            $.ajax({
                type: "POST",
                url: '{{url('user/project_permission')}}',
                data: {
                    user_id: user_id,
                    project_id : project_id,
                    _token: '{{csrf_token()}}'
                },
                dataType: 'json',
                success: function (data) {
                    App.hideLoading();
                    var url = "{{url('user/project_permission').'/'}}" + user_id;
                    if (data.code == 0) {
                        window.location.href =  url;
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
    </script>
@endsection


