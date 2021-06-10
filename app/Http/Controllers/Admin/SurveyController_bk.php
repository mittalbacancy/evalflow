@extends('backend.layouts.app')


@section('content')
 <div>

     <!-- Content Header (Page header) -->
        <section class="content-header">
                <ol class="breadcrumb">
                <li>
               

                @if (Auth::user()->hasRole("ROLE_ADMIN"))
                <a href="{!! url('admin/doctors') !!}">
                 @else
                <a href="{!! url('hospital/doctors') !!}">
                 @endif
                <i class="fa fa-user-md"></i>Survey Management</a></li>
               </li>
               

                <li class="active">Add Survey</li>
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
                  <form method="post" action="{{ route('surveystore') }}" enctype="multipart/form-data">
                      @csrf
                      
                 

                    <div class="form-group">
                          <label for="active">Select Survey Type:</label>
                            <select class="form-control" name="survey_type" style="width:350px">
                            <option value="select">Select</option>
                                <?php foreach ($survey_types as $survey_type) {?>
                                    <option value="{{ $survey_type->id }}">
                                    {{ $survey_type->survey_type }}</option>
                                <?php } ?>
                                
                            </select>
                        </div>


                    <div class="form-group">
                          <label for="active">Select Survey Title:</label>
                            <select class="form-control" name="survey_name" style="width:350px">
                                <option value="select">Select</option>
                                <?php foreach ($survey_track as $survey) {?>
                                    <option value="{{ $survey->id }}">{{ $survey->survey_name }}</option>
                                <?php } ?>
                                
                            </select>
                    </div>
    
                                          
                                        
                        <div class="form-group">
                          <label for="doctor_list">Doctor List:</label>
                           <select name="doctor_list" class="form-control" style="width:350px" id="mySelect">
                            @foreach($doctors as $doctor)
                              <option value="{{ $doctor->id }}">{{ $doctor->first_name }}{{ $doctor->last_name }}</option>
                                                    
                            @endforeach
                            </select>
                      </div>
                                     

                        <div class="form-group">
                          <label for="resident_list">Resident List:</label>
                          
                           <select name="resident_list" class="form-control" style="width:350px" id="myResident">
                            @foreach($residents as $resident)

                              <option value="{{ $doctor->id }}">{{ $resident->first_name }}{{ $resident->last_name }}</option>
                                                    
                            @endforeach
                            </select>
                        </div>
                                               
                                        
                      <button type="submit" class="btn btn-primary-outline">Submit Survey</button>
                  </form>
              </div>
            </div>
            </div>
        </section>
        <!-- /.content -->

</div>
@endsection
@section('page-js-script')
<script>


// var department_id = '<?php //echo $user->department_id  ?>';

$("select[name='survey_name']").on("change",function () {
    var surveyID = $(this).val();
    
    if(surveyID) {
    
    $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });

        $.ajax({
            url: "{{route('add_doctor')}}",
            type: 'POST',
            dataType: 'json',
            data: {'id':surveyID},
            success: function(data) {
               $('select[name="doctor_list"]').empty();
                 $('select[name="doctor_list"]').append('<option id="select_survey" value="">'+ "Select" +'</option>');
                for (var i = 0; i < data.data.length; i++) {
                     $('select[name="doctor_list"]').append('<option value="'+ data.data[i].id +'">'+ data.data[i].first_name +' '+ data.data[i].last_name +'</option>');
                }
                                         
            }
            
        });


    }else{
        $('select[name="doctor_list"]').empty();
      
    }
});
$("select[name='survey_name']").change();

//add resident on doctor list

$("select[name='doctor_list']").on("change",function () {
    var doctorID = $(this).val();
    

    if(doctorID) {

    $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });

        $.ajax({
            url: "{{route('add_resident')}}",
            type: 'POST',
            dataType: 'json',
            data: {'id':doctorID},
            success: function(data) {
              console.log(doctorID);

                 $('select[name="resident_list"]').empty();
                 $('select[name="resident_list"]').append('<option id="select_doctor" value="">'+ "Select" +'</option>');
                for (var i = 0; i < data.data.length; i++) {
                     $('select[name="resident_list"]').append('<option value="'+ data.data[i].id +'">'+ data.data[i].first_name +' '+ data.data[i].last_name +'</option>');
                }
              
            }
            
        });


    }else{
        $('select[name="resident_list"]').empty();
      
    }
});
$("select[name='doctor_list']").change();


//add survey type on survey title

$("select[name='survey_type']").on("change",function () {
    var surveyTypeID = $(this).val();
       

    if(surveyTypeID) {
    
    $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });

        $.ajax({
            url: "{{route('add_survey_name')}}",
            type: 'POST',
            dataType: 'json',
            data: {'id':surveyTypeID},
            success: function(data) {

                $('select[name="survey_name"]').empty();
                 $('select[name="survey_name"]').append('<option id="survey_name" value="">'+ "Select" +'</option>');
                for (var i = 0; i < data.data.length; i++) {
                     $('select[name="survey_name"]').append('<option value="'+ data.data[i].id +'">'+ data.data[i].survey_name +'</option>');
                }
                
             }
            
        });


    }else{
        $('select[name="survey_name"]').empty();
      
    }
});
$("select[name='survey_type']").change();

</script>
@endsection

