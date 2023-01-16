@extends('layouts.admin_layout')
@section('page_content')
    <!-- Page -->
    <div class="page animsition">
        <div class="page-header">
            <ol class="breadcrumb">
                <li>Management</li>
                <li class="active">File</li>
            </ol>

            <h1 class="page-title">FileUpload</h1>
        </div>

        <div class="page-content container-fluid">

            <!-- Panel -->
            <div class="panel">
                <div class="panel-body container-fluid">

                    <div class="col-sm-6">
                        <!-- Panel Static Lables -->
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



                        <div class="panel">
                            <div class="panel-heading">
                                <h3 class="panel-title">FileUpload</h3>
                            </div>
                            <div class="panel-body container-fluid">
                                <form autocomplete="off" action="{{url('file_upload')}}" method="POST" enctype="multipart/form-data">
                                    {{csrf_field()}}
                                    <div class="form-group form-material">
                                        <label class="control-label" for="select">Projects</label>
                                        <select class="form-control" id="select" name="project">
                                            <option></option>
                                            @foreach($projects as $item)
                                                <option value="{{$item->project_id}}">{{$item->project_name}}</option>
                                           @endforeach
                                        </select>
                                    </div>


                                    <div class="form-group form-material">
                                        <label class="control-label" for="select1">Options</label>
                                        <select class="form-control" id="select1" name="option">
                                            <option></option>
                                           @foreach($options as $item)
                                                <option value="{{$item->option_id}}">{{$item->option_name}}</option>
                                           @endforeach
                                        </select>
                                    </div>


                                    <div class="form-group form-material">
                                        <label class="control-label" for="inputFile">File</label>
                                        <input type="text" class="form-control" placeholder="Browse.." readonly="" />
                                        <input type="file" id="inputFile" name="file" multiple="" />
                                    </div>

                                    <div class="form-group form-material">
                                        <button type="submit" class="btn btn-success"> Submit</button>
                                        <button type="button" class="btn btn-primary pull-right" onclick="window.history.go(-1); return false;"> Back</button>

                                    </div>

                                </form>
                            </div>
                        </div>
                        <!-- End Panel Static Lables -->
                    </div>
                    <div class="col-sm-6">
                    </div>
                </div>
            </div>
            <!-- End Panel -->
        </div>
    </div>
    <!-- End Page
@endsection


