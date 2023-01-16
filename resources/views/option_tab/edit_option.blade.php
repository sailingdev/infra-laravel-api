@extends('layouts.admin_layout')
@section('page_content')
    <!-- Page -->
    <div class="page animsition">
        <div class="page-header">
            <ol class="breadcrumb">
                <li>Management</li>
                <li class="active">Project</li>
            </ol>

            <h1 class="page-title">Add Project</h1>
        </div>

        <div class="page-content container-fluid">

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

             <form action="{{url('edit_option')}}" method="post">
                {{csrf_field()}}
                <div class="col-sm-6 col-md-4">
                    <!-- Example Placeholder -->
                    <div class="example-wrap">
                        <h4 class="example-title">Project Name</h4>
                        <input type="text" class="form-control" id="inputPlaceholder" placeholder="Project Name" name="option_name" value="{{$option->option_name}}">
                        <input type="hidden" value="{{$option->option_id}}" name="option_id">
                    </div>
                    <!-- End Example Placeholder -->
                </div>
                <div class="col-md-12">
                    <div class="col-sm-6 col-md-4">
                        <button type="submit" class="btn btn-primary"> Update</button>
                        <button type="button" class="btn btn-success pull-right" onclick="window.history.go(-1); return false;"> Back</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- End Page
@endsection


