@extends('backend.layouts.app')



@section('content')

<div>

     <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Question Management               
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{ url('admin/questions')}}"><i class="fa fa-user-md"></i>Question Management</a></li>
                <li class="active">Edit Question</li>
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
                    <form method="post" action="{{ route('questions.update', $email_template_id->id) }}" enctype="multipart/form-data">
                        @method('PATCH') 
                        @csrf


                         <div class="form-group">
                            <label for="question_name">Question Name:</label>
                            <input type="text" class="form-control" name="question_name" value="{{ $email_template_id->question_title }}" />
                        </div>

                        <div class="form-group">
                          <label for="active">Select Survey Title:</label>
                            <select class="form-control" name="survey_name">

                                @foreach ($surveys as $survey)                                                                    
                                    @if($survey->id == $email_template_id->email_template_id)
                                        @php $select = "selected"; @endphp
                                    @else
                                        @php $select = ""; @endphp
                                   
                                    @endif

                                    <option {{$select}} value="{{ $survey->id }}">{{$survey->survey_name }}</option>
                              @endforeach
                               
                                
                            </select>
                        </div>
                     

                        <div class="form-group">
                          <label for="active">Active:</label>
                         
                          <select class="form-control" name="active">
                                <option <?php if ($email_template_id->active=="1") echo "selected";?> value="1">Active</option>                                
                                <option <?php if ($email_template_id->active=="0") echo "selected";?> value="0">Inactive</option>     
                          </select>
                        </div>  

                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>

        </section>
        <!-- /.content -->

</div>

@endsection
