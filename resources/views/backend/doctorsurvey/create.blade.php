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
            <div class="form-group"> 
                <label for="active">Year : </label>
                @php 
                    if (date('m') <= 6 && date('d') <= 24) {
                        $financial_year = (date('Y')-1) . '-' . date('Y');
                        echo($financial_year);
                    } else {
                        $financial_year = date('Y') . '-' . (date('Y') + 1);
                        echo($financial_year);
                    }
                @endphp
            </div>

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
                            <select class="form-control" id="survey_type" name="survey_type" style="width:350px">
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
                            </select>
                    </div>
                           
                      <div class="form-group" id="doctor_section">
                          <label id="doctor_list" for="doctor_list">Doctor List:</label>
                           <select name="doctor_list" class="form-control" style="width:350px" id="mySelect">
                           <option value="select">Select</option>
                           </select>
                      </div>
                                     

                        <div class="form-group">
                          <label for="resident_list" id= "resident_list">Resident List:</label>
                          
                           <select name="resident_list" class="form-control" style="width:350px" id="myResident">
                           <option value="select">Select</option>
                           </select>
                        </div>

                        <div class="form-group" id="send_sms_section">
                          <label id="send_sms" for="send_sms">Send SMS:  </label>
                           <input type="radio" name="send_sms" value="1">Yes  
                           <input type="radio" name="send_sms" value="0">No
                      </div>
                                        
                      <button type="submit" class="btn btn-success" onclick="this.disabled=true;this.form.submit();">Submit Survey</button>
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

// $("select[name='survey_name']").on("change",function () {
//     var surveyID = $(this).val();
    
//     if(surveyID) {
    
//     $.ajaxSetup({
//           headers: {
//             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//           }
//       });

//         $.ajax({
//             url: "{{route('add_doctor')}}",
//             type: 'POST',
//             dataType: 'json',
//             data: {'id':surveyID},
//             success: function(data) {
//                $('select[name="doctor_list"]').empty();
//                  $('select[name="doctor_list"]').append('<option id="select_survey" value="">'+ "Select" +'</option>');
//                 for (var i = 0; i < data.data.length; i++) {
//                      $('select[name="doctor_list"]').append('<option value="'+ data.data[i].id +'">'+ data.data[i].first_name +' '+ data.data[i].last_name +'</option>');
//                 }
                                         
//             }
            
//         });


//     }else{
//         $('select[name="doctor_list"]').empty();
      
//     }
// });
// $("select[name='survey_name']").change();

//add resident on doctor list

// $("select[name='doctor_list']").on("change",function () {
//     var doctorID = $(this).val();
    

//     if(doctorID) {

//     $.ajaxSetup({
//           headers: {
//             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//           }
//       });

//         $.ajax({
//             url: "{{route('add_resident')}}",
//             type: 'POST',
//             dataType: 'json',
//             data: {'id':doctorID},
//             success: function(data) {
//               console.log(doctorID);

//                  $('select[name="resident_list"]').empty();
//                  $('select[name="resident_list"]').append('<option id="select_doctor" value="">'+ "Select" +'</option>');
//                 for (var i = 0; i < data.data.length; i++) {
//                      $('select[name="resident_list"]').append('<option value="'+ data.data[i].id +'">'+ data.data[i].first_name +' '+ data.data[i].last_name +'</option>');
//                 }
              
//             }
            
//         });


//     }else{
//         $('select[name="resident_list"]').empty();
      
//     }
// });
// $("select[name='doctor_list']").change();

//when survey type 2 then last resident list
 $("select[name='doctor_list']").on("change",function () {

if($("#survey_type").val() != 3){
    if($("#survey_type").val() == 2){
      
            var getdoctorId=$(this).val();
            $.ajax({
            url: "{{route('add_survey_name')}}",
            type: 'POST',
            dataType: 'json',
            data: {'doctor_id':getdoctorId},
            success: function(data) {

            // resident list
                $('select[name="resident_list"]').empty();
                 $('select[name="resident_list"]').append('<option id="resident_list" value="">'+ "Select" +'</option>');
                for (var i = 0; i < data.data.self_resident_list.length; i++) {
                     $('select[name="resident_list"]').append('<option value="'+ data.data.self_resident_list[i].id +'">'+ data.data.self_resident_list[i].first_name +' '+ data.data.self_resident_list[i].last_name +'</option>');
                }
                
             }
            
        });
        }

        else{


            var getdoctorId=$(this).val();
            $.ajax({
            url: "{{route('add_resident')}}",
            type: 'POST',
            dataType: 'json',
            data: {'id':getdoctorId},
            success: function(data) {
             
                 $('select[name="resident_list"]').empty();
                 $('select[name="resident_list"]').append('<option id="select_doctor" value="">'+ "Select" +'</option>');
                for (var i = 0; i < data.data.length; i++) {
                     $('select[name="resident_list"]').append('<option value="'+ data.data[i].id +'">'+ data.data[i].first_name +' '+ data.data[i].last_name +'</option>');
                }
              
            }
            
        });

        }
      }
                     
             
  });


//when survey type 3 then last resident list
 $("select[name='survey_name']").on("change",function () {

            var getSurveyTempId=$(this).val();

            if($("#survey_type").val() != 2){

            $.ajax({
            url: "{{route('add_survey_name')}}",
            type: 'POST',
            dataType: 'json',
            data: {'survey_temp_id':getSurveyTempId},
            success: function(data) {

            
            if($("#survey_type").val() == 3){

              // resident list

               $('select[name="resident_list"]').empty();
                 $('select[name="resident_list"]').append('<option id="resident_list" value="">'+ "Select" +'</option>');
                for (var i = 0; i < data.data.doctor_list.length; i++) {
                     $('select[name="resident_list"]').append('<option value="'+ data.data.doctor_list[i].id +'">'+ data.data.doctor_list[i].first_name +' '+ data.data.doctor_list[i].last_name +'</option>');
                }
             
            }
            else{

              //doctor list based on survey type = 4

               $('select[name="doctor_list"]').empty();
                 $('select[name="doctor_list"]').append('<option id="doctor_list" value="">'+ "Select" +'</option>');
                for (var i = 0; i < data.data.doctor_list.length; i++) {
                     $('select[name="doctor_list"]').append('<option value="'+ data.data.doctor_list[i].id +'">'+ data.data.doctor_list[i].first_name +' '+ data.data.doctor_list[i].last_name +'</option>');
                }
            }
               
                
          }
            
        });


            }

           
  });


//add survey type on survey title

$("select[name='survey_type']").on("change",function () {
    var surveyTypeID = $(this).val();
       
    $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });

    if(surveyTypeID == 1) {

      $("#doctor_section").hide();
      $("#send_sms_section").hide();
    
        $.ajax({
            url: "{{route('add_survey_name')}}",
            type: 'POST',
            dataType: 'json',
            data: {'id':surveyTypeID},
            success: function(data) {


            //survey name
                $('select[name="survey_name"]').empty();
                 $('select[name="survey_name"]').append('<option id="survey_name" value="">'+ "Select" +'</option>');
                for (var i = 0; i < data.data.survey_type.length; i++) {

                     $('select[name="survey_name"]').append('<option value="'+ data.data.survey_type[i].id +'">'+ data.data.survey_type[i].survey_name +'</option>');
                }

            // resident list
                $('select[name="resident_list"]').empty();
                 $('select[name="resident_list"]').append('<option id="resident_list" value="">'+ "Select" +'</option>');
                for (var i = 0; i < data.data.self_resident_list.length; i++) {
                     $('select[name="resident_list"]').append('<option value="'+ data.data.self_resident_list[i].id +'">'+ data.data.self_resident_list[i].first_name +' '+ data.data.self_resident_list[i].last_name +'</option>');
                }
                
             }
            
        });


    }else if (surveyTypeID == 2){
       $("#doctor_section").show();
       $("#send_sms_section").hide();
       $("#doctor_list").text('Resident List:');
       $("#resident_list").text('Resident List:');

            $.ajax({
            url: "{{route('add_survey_name')}}",
            type: 'POST',
            dataType: 'json',
            data: {'id':surveyTypeID},
            success: function(data) {

            //survey name
                $('select[name="survey_name"]').empty();
                 $('select[name="survey_name"]').append('<option id="survey_name" value="">'+ "Select" +'</option>');
                for (var i = 0; i < data.data.survey_type.length; i++) {

                     $('select[name="survey_name"]').append('<option value="'+ data.data.survey_type[i].id +'">'+ data.data.survey_type[i].survey_name +'</option>');
                }


            //Resident name
                $('select[name="doctor_list"]').empty();
                $('select[name="doctor_list"]').append('<option id="doctor_list" value="">'+ "Select" +'</option>');
                for (var i = 0; i < data.data.self_resident_list.length; i++) {

                     $('select[name="doctor_list"]').append('<option value="'+ data.data.self_resident_list[i].id +'">'+ data.data.self_resident_list[i].first_name +' '+ data.data.self_resident_list[i].last_name +'</option>');
                }

                         
             }
            
        });

    }else if (surveyTypeID == 3){
       $("#doctor_section").show();
       $("#send_sms_section").hide();
       $("#doctor_list").text('Resident List:');
       $("#resident_list").text('Doctor List:');

            $.ajax({
            url: "{{route('add_survey_name')}}",
            type: 'POST',
            dataType: 'json',
            data: {'id':surveyTypeID},
            success: function(data) {

              //survey name
                $('select[name="survey_name"]').empty();
                 $('select[name="survey_name"]').append('<option id="survey_name" value="">'+ "Select" +'</option>');
                for (var i = 0; i < data.data.survey_type.length; i++) {

                     $('select[name="survey_name"]').append('<option value="'+ data.data.survey_type[i].id +'">'+ data.data.survey_type[i].survey_name +'</option>');
                }


            //Resident name
                $('select[name="doctor_list"]').empty();
                 $('select[name="doctor_list"]').append('<option id="doctor_list" value="">'+ "Select" +'</option>');
                for (var i = 0; i < data.data.self_resident_list.length; i++) {

                     $('select[name="doctor_list"]').append('<option value="'+ data.data.self_resident_list[i].id +'">'+ data.data.self_resident_list[i].first_name +' '+ data.data.self_resident_list[i].last_name +'</option>');
                }
                
                        
             }
            
        });

    }else if (surveyTypeID == 4){
       $("#doctor_section").show();
       $("#send_sms_section").show();
       $("#doctor_list").text('Doctor List:');
       $("#resident_list").text('Resident List:');

            $.ajax({
            url: "{{route('add_survey_name')}}",
            type: 'POST',
            dataType: 'json',
            data: {'id':surveyTypeID},
            success: function(data) {

              //survey name
                $('select[name="survey_name"]').empty();
                 $('select[name="survey_name"]').append('<option id="survey_name" value="">'+ "Select" +'</option>');
                for (var i = 0; i < data.data.survey_type.length; i++) {

                     $('select[name="survey_name"]').append('<option value="'+ data.data.survey_type[i].id +'">'+ data.data.survey_type[i].survey_name +'</option>');
                }


            // //Doctor name
            //     $('select[name="doctor_list"]').empty();
            //      $('select[name="doctor_list"]').append('<option id="doctor_list" value="">'+ "Select" +'</option>');
            //     for (var i = 0; i < data.data.doctor_list.length; i++) {

            //          $('select[name="doctor_list"]').append('<option value="'+ data.data.doctor_list[i].id +'">'+ data.data.doctor_list[i].first_name +' '+ data.data.doctor_list[i].last_name +'</option>');
            //     }
            //     debugger;                        
             }
            
        });

    }
    else{
        $('select[name="survey_name"]').empty();
      
    }
});
// $("select[name='survey_type']").change();

//add resident list on surveytype

// $("select[name='survey_type']").on("change",function () {
//     var surveyTypeID = $(this).val();
//   debugger;
//     if(surveyTypeID) {
    
//     $.ajaxSetup({
//           headers: {
//             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//           }
//       });

//         $.ajax({
//             url: "{{route('add_self_resident')}}",
//             type: 'POST',
//             dataType: 'json',
//             data: {'id':surveyTypeID},
//             success: function(data) {

//                 $('select[name="resident_list"]').empty();
//                  $('select[name="resident_list"]').append('<option id="resident_list" value="">'+ "Select" +'</option>');
//                 for (var i = 0; i < data.data.length; i++) {
//                      $('select[name="resident_list"]').append('<option value="'+ data.data[i].id +'">'+ data.data[i].first_name +' '+ data.data[i].last_name +'</option>');
//                 }
                
//              }
            
//         });


//     }else{
//         $('select[name="resident_list"]').empty();
      
//     }
// });
// $("select[name='survey_type']").change();

</script>
@endsection
