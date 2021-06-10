@extends('backend.layouts.app')



@section('content')

<div>

     <!-- Content Header (Page header) -->
        <section class="content-header">
            <ol class="breadcrumb">
                <li><a href="{{ url('admin/surveylist')}}"><i class="fa fa-users"></i>Survey Management</a></li>
                <li class="active">Edit Survey</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">

            <div class="row">
                <div class="col-md-12 offset-sm-2">
                    
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    <br /> 
                    @endif
                    <form method="post" action="{{ route('surveyupdate',$survey->id) }}"  enctype="multipart/form-data" name="form">

                        @method('PATCH') 
                        @csrf
                        <div class="form-group">
                            <label for="survey_name">Survey Name:</label>
                            <input type="text" class="form-control" name="survey_name" value="{{ $survey->survey_name }}" />
                        </div>


                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>

        </section>
        <!-- /.content -->

</div>

@endsection