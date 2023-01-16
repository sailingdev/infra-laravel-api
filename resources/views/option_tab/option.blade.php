@extends('layouts.admin_layout')
@section('page_content')
    <!-- Page -->
    <div class="page animsition">
        <div class="page-header">
            <ol class="breadcrumb">
                <li>Management</li>
                <li class="active">Option</li>
            </ol>

            <h1 class="page-title">Option</h1>
        </div>

        <div class="page-content container-fluid">

            <!-- Panel -->
            <div class="panel">
                <div class="panel-body container-fluid">
                    <div class="row row-lg">
                        <div class="col-md-12">
                            <!-- Example Basic -->
                            <div class="example-wrap">
                                <h4 class="example-title inline">Options</h4>
                                <a href="{{url('add_project')}}" class="btn btn-primary pull-right hide"> Add</a>


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
                                            <th>Option Image</th>
                                            <th>Option Name</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                        @if(isset($options))
                                            @php($i = 0)
                                            @foreach($options as $item)
                                                <tr>
                                                    <td>{{++$i}}</td>
                                                    <td><img src="{{url('remark/custom/images').'/'.$item->option_img}}" height="35"></td>
                                                    <td>{{$item->option_name}}</td>
                                                    <td>
                                                        <div class="btn-group" role="group">
                                                            <button type="button" class="btn btn-danger dropdown-toggle" id="exampleIconDropdown1"
                                                                    data-toggle="dropdown" aria-expanded="false">
                                                                Action
                                                                <span class="caret"></span>
                                                            </button>
                                                            <ul class="dropdown-menu" aria-labelledby="exampleIconDropdown1" role="menu">
                                                                <li role="presentation"><a href="{{url('edit_option').'/'.$item->option_id}}" role="menuitem">Edit</a></li>
                                                                <li role="presentation" class="hide"><a href="{{url('delete_option').'/'.$item->option_id}}" role="menuitem">Remove</a></li>
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


