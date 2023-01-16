@extends('layouts.admin_layout')
@section('page_content')
    <!-- Page -->
    <div class="page animsition">
        <div class="page-header">
            <ol class="breadcrumb">
                <li>Management</li>
                <li class="active">Project</li>
            </ol>

            <h1 class="page-title">Project</h1>
        </div>

        <div class="page-content container-fluid">

            <!-- Panel -->
            <div class="panel">
                <div class="panel-body container-fluid">
                    <div class="row row-lg">
                        <div class="col-md-12">
                            <!-- Example Basic -->
                            <div class="example-wrap">
                                <h4 class="example-title inline">Projects</h4>
                                <a href="{{url('add_project')}}" class="btn btn-primary pull-right"> Add</a>


                                <div class="example table-responsive padding-bottom-80">


                                    @if(session('success'))
                                        <div class="alert alert-success alert-dismissible" role="alert">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                            SUCCESS : {{session('success')}}!
                                        </div>
                                    @endif
                                    @if(session('failed'))
                                            <div class="alert alert-danger alert-dismissible" role="alert">
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                                FAILED : {{session('failed')}}!
                                            </div>

                                        @endif
                                    @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif



                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Project Name</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                        @if(isset($projects))
                                            @php($i = 0)
                                            @foreach($projects as $item)
                                                <tr>
                                                    <td>{{++$i}}</td>
                                                    <td>{{$item->project_name}}</td>
                                                    <td>
                                                        <div class="btn-group" role="group">
                                                            <button type="button" class="btn btn-danger dropdown-toggle" id="exampleIconDropdown1"
                                                                    data-toggle="dropdown" aria-expanded="false">
                                                                Action
                                                                <span class="caret"></span>
                                                            </button>
                                                            <ul class="dropdown-menu" aria-labelledby="exampleIconDropdown1" role="menu">
                                                                <li role="presentation"><a href="{{url('edit_project').'/'.$item->project_id}}" role="menuitem">Edit</a></li>
                                                                <li role="presentation"><a href="{{url('delete_project').'/'.$item->project_id}}" role="menuitem">Remove</a></li>
                                                            </ul>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @endif

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- End Example Basic -->
                        </div>


                    </div>
                </div>
            </div>
            <!-- End Panel -->




        </div>
    </div>
    <!-- End Page
@endsection


