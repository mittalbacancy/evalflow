@extends('backend.layouts.app')


@section('content')
 <div>

     <!-- Content Header (Page header) -->
        <section class="content-header">
            
            <ol class="breadcrumb">
                <li><a href="{{ url('admin/surveylist')}}"><i class="fa fa-dashboard"></i>Survey List</a></li>
                <li class="active">Survey</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">

            <div class="row">
             <div class="col-md-12 offset-sm-2">
                
              <div>
                @if ($errors->any())
                  <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                  </div><br />
                @endif
                  <form method="post" action="{{ route('submitsurvey') }}" enctype="multipart/form-data">
                      @csrf

                        <div class="form-group">
                          <label for="active">Select Survey Type:</label>
                            <select class="form-control" name="survey_type">
                            <option value="select">Select</option>
                                <?php foreach ($survey_types as $survey_type) {?>
                                    <option value="{{ $survey_type['id'] }}">{{ $survey_type['survey_type'] }}</option>
                                <?php } ?>
                                
                            </select>
                        </div>

                        <div class="form-group">    
                            <label for="survey_name">Survey Name:</label>
                            <input type="text" class="form-control" name="survey_name"/>
                        </div>
                  
                                        
                      <button type="submit" class="btn btn-success">Add Survey</button>
                  </form>
              </div>
            </div>
            </div>
        </section>
        <!-- /.content -->

</div>

@endsection