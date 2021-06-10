@extends('backend.layouts.app')



@section('content')

<div>

     <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Answer Management               
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{ url('admin/questions')}}"><i class="fa fa-user-md"></i>Questions & Answers</a></li>
                <li class="active">Edit Answer</li>
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
                    <form method="post" action="{{ route('answers.update', $answers->id) }}" enctype="multipart/form-data">
                        @method('PATCH') 
                        @csrf


                        <div class="form-group">
                          <label for="active">Select Survey Title:</label>
                            <select class="form-control" name="survey_name">

                                @foreach ($surveys as $survey)                                                                    
                                    @if($survey['id'] == $email_template_id->survey_template_id)
                                        @php $select = "selected"; @endphp
                                    @else
                                        @php $select = ""; @endphp
                                   
                                    @endif

                                    <option {{$select}} value="{{ $survey['id'] }}" >{{$survey['survey_name'] }}</option>
                              @endforeach
                               
                                
                            </select>
                        </div>

                        <div class="form-group">
                          <label for="active">Select Question Title:</label>
                            <select class="form-control" name="question_name">

                              @foreach ($questions as $question) 

                              @if($question['id'] == $email_template_id->question_id)
                                        @php $select = "selected"; @endphp
                                    @else
                                        @php $select = ""; @endphp
                                   
                                    @endif

                                    <option {{$select}} value="{{ $question['id'] }}" >{{$question['question_title'] }}</option>
                              @endforeach
                               
                                
                            </select>
                        </div>

                      <!--   <div class="form-group">
                          <label for="question_name">Question List:</label>
                           <select name="question_name" class="form-control" style="width:400px" id="mySelect">
                           <option value="">select</option>
                           </select>
                      </div> -->
                     

                        <div class="form-group">
                          <label for="active">Answer Type:</label>
                         
                          <select class="form-control" name="answer_type" id="selectType">
                                <option <?php if ($answers['answer_type']=="radio") echo "selected";?> value="radio" >radio</option>                                
                                <option <?php if ($answers['answer_type']=="textarea") echo "selected";?> value="textarea" >textarea</option>     
                          </select>
                        </div>  


                        <div class="form-group" id="radio_type">
                        @if($answers['answer_type'] == "radio")
                        <div class="form-group">
                            <label for="option_1">Option1:</label>
                            <input type="text" class="form-control" name="option_1" value="{{ $answers['option_1'] }}" />
                        </div>

                        
                        <div class="form-check">
                          <label for="active">Code1: </label>
                            <div class="miValue">

                          @if(!empty($milestone_code))
                            
                          @foreach($milestone_code as $mile_code)
                          @if($mile_code['survey_m_code'] == 'MK1' || $mile_code['survey_m_code'] == 'PC1' || $mile_code['survey_m_code'] == 'SBP1' || $mile_code['survey_m_code'] == 'PBLI1' || $mile_code['survey_m_code'] == 'PROF1' || $mile_code['survey_m_code'] == 'ICS1')
                              <div class="mr-10">
                              @endif
                                <div class="mb-10">
                          @php
                                $codeId1 = $mile_code['survey_m_code'];

                              @endphp
                                <input type="checkbox"  name="survey_code1[]" class="form-check-input"  value="{{ $mile_code['id'] }}" @if($mile_code['survey_m_code'] == array_key_exists($codeId1,$code1_key))checked="checked" @endif> {{ $mile_code['survey_m_code'] }}
                                <input type="number" name="survey_value1[{{$codeId1}}]" class="form-box-width" @if($mile_code['survey_m_code'] == array_key_exists($codeId1,$code1_key)) value="{{$code1_key[$codeId1]}}" @endif min="1">
                                </div>
                              @if($mile_code['survey_m_code'] == 'MK3' || $mile_code['survey_m_code'] == 'PC5' || $mile_code['survey_m_code'] == 'SBP3' || $mile_code['survey_m_code'] == 'PBLI2' || $mile_code['survey_m_code'] == 'PROF4' || $mile_code['survey_m_code'] == 'ICS3')
                              </div>
                              @endif
                              @endforeach
                        
                          @endif
                         
                        </div>
                         @endif

                         @if($answers['answer_type'] == "radio")

                        <div class="form-group">
                            <label for="option_2">Option2:</label>
                            <input type="text" class="form-control" name="option_2" value="{{ $answers['option_2'] }}" />
                        </div>


                        <div class="form-check">
                          <label for="active">Code2: </label>
                            <div class="miValue">

                          
                          @if(!empty($milestone_code))
                         
                           @foreach($milestone_code as $mile_code)
                            @if($mile_code['survey_m_code'] == 'MK1' || $mile_code['survey_m_code'] == 'PC1' || $mile_code['survey_m_code'] == 'SBP1' || $mile_code['survey_m_code'] == 'PBLI1' || $mile_code['survey_m_code'] == 'PROF1' || $mile_code['survey_m_code'] == 'ICS1')
                              <div class="mr-10">
                              @endif
                                <div class="mb-10">

                          @php
                            $codeId2 = $mile_code['survey_m_code'];
                          @endphp
                                <input type="checkbox"  name="survey_code2[]" class="form-check-input"  value="{{ $mile_code['id'] }}" @if($mile_code['survey_m_code'] == array_key_exists($codeId2,$code2_key))checked="checked" @endif> {{ $mile_code['survey_m_code'] }}
                                <input type="number" name="survey_value2[{{$codeId2}}]" class="form-box-width" @if($mile_code['survey_m_code'] == array_key_exists($codeId2,$code2_key)) value="{{$code2_key[$codeId2]}}" @endif min="1">
                                </div>
                              @if($mile_code['survey_m_code'] == 'MK3' || $mile_code['survey_m_code'] == 'PC5' || $mile_code['survey_m_code'] == 'SBP3' || $mile_code['survey_m_code'] == 'PBLI2' || $mile_code['survey_m_code'] == 'PROF4' || $mile_code['survey_m_code'] == 'ICS3')
                              </div>
                              @endif

                              @endforeach
                      
                          @endif
                          
                        </div>

                        @endif

                        @if($answers['answer_type'] == "radio")

                        <div class="form-group">
                            <label for="option_3">Option3:</label>
                            <input type="text" class="form-control" name="option_3" value="{{ $answers['option_3'] }}" />
                        </div>

                        <div class="form-check">
                          <label for="active">Code3: </label>
                            <div class="miValue">

                          
                          @if(!empty($milestone_code))
                          
                              @foreach($milestone_code as $mile_code)
                              @if($mile_code['survey_m_code'] == 'MK1' || $mile_code['survey_m_code'] == 'PC1' || $mile_code['survey_m_code'] == 'SBP1' || $mile_code['survey_m_code'] == 'PBLI1' || $mile_code['survey_m_code'] == 'PROF1' || $mile_code['survey_m_code'] == 'ICS1')
                              <div class="mr-10">
                              @endif
                                <div class="mb-10">
                              @php
                                $codeId3 = $mile_code['survey_m_code'];
                              @endphp
                                <input type="checkbox"  name="survey_code3[]" class="form-check-input"  value="{{ $mile_code['id'] }}" @if($mile_code['survey_m_code'] == array_key_exists($codeId3,$code3_key))checked="checked" @endif> {{ $mile_code['survey_m_code'] }}
                                <input type="number" name="survey_value3[{{$codeId3}}]" class="form-box-width" @if($mile_code['survey_m_code'] == array_key_exists($codeId3,$code3_key)) value="{{$code3_key[$codeId3]}}" @endif min="1">
                                </div>
                              @if($mile_code['survey_m_code'] == 'MK3' || $mile_code['survey_m_code'] == 'PC5' || $mile_code['survey_m_code'] == 'SBP3' || $mile_code['survey_m_code'] == 'PBLI2' || $mile_code['survey_m_code'] == 'PROF4' || $mile_code['survey_m_code'] == 'ICS3')
                              </div>
                              @endif
                              @endforeach
                        
                          @endif
                        
                        </div>
                         @endif

                         @if($answers['answer_type'] == "radio")

                        <div class="form-group">
                            <label for="option_4">Option4:</label>
                            <input type="text" class="form-control" name="option_4" value="{{ $answers['option_4'] }}" />
                        </div>

                        <div class="form-check">
                          <label for="active">Code4: </label>

                            <div class="miValue">
                         
                        @if(!empty($milestone_code))
                           
                            @foreach($milestone_code as $mile_code)
                            @if($mile_code['survey_m_code'] == 'MK1' || $mile_code['survey_m_code'] == 'PC1' || $mile_code['survey_m_code'] == 'SBP1' || $mile_code['survey_m_code'] == 'PBLI1' || $mile_code['survey_m_code'] == 'PROF1' || $mile_code['survey_m_code'] == 'ICS1')
                              <div class="mr-10">
                              @endif
                                <div class="mb-10">
                              @php
                                $codeId4 = $mile_code['survey_m_code'];
                              @endphp
                                <input type="checkbox"  name="survey_code4[]" class="form-check-input"  value="{{ $mile_code['id'] }}" @if($mile_code['survey_m_code'] == array_key_exists($codeId4,$code4_key))checked="checked") checked="checked" @endif> {{ $mile_code['survey_m_code'] }}
                                <input type="number" name="survey_value4[{{$codeId4}}]" class="form-box-width" @if($mile_code['survey_m_code'] == array_key_exists($codeId4,$code4_key)) value="{{$code4_key[$codeId4]}}" @endif min="1">
                                </div>
                              @if($mile_code['survey_m_code'] == 'MK3' || $mile_code['survey_m_code'] == 'PC5' || $mile_code['survey_m_code'] == 'SBP3' || $mile_code['survey_m_code'] == 'PBLI2' || $mile_code['survey_m_code'] == 'PROF4' || $mile_code['survey_m_code'] == 'ICS3')
                              </div>
                              @endif
                              @endforeach
                          
                          @endif
                          
                        </div>
                        @endif
                        </div>
 

                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>

        </section>
        <!-- /.content -->

</div>


@endsection
{{-- @section('page-js-script')
<script>

$("select[name='survey_name']").on("change",function () {
    var sid = $(this).val();
    if(sid !== ''){
        $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });
        $.ajax({
            url: "{{route('add_question')}}",
            type: 'POST',
            dataType: 'json',
            data: {'id':sid},
            success: function(data) {
               $('select[name="question_name"]').empty();
                 $('select[name="question_name"]').append('<option id="select_survey" value="question_id">'+ "Select" +'</option>');
                for (var i = 0; i < data.data.length; i++) {
                     $('select[name="question_name"]').append('<option value="'+ data.data[i].question_id +'">'+ data.data[i].question_title +'</option>');
                }        
            }
        });

       }
  });



</script>
@endsection --}}
{{-- @section('page-js-script') --}}
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
            url: "{{route('add_question')}}",
            type: 'POST',
            dataType: 'json',
            data: {'id':surveyID},
            success: function(data) {
               $('select[name="question_name"]').empty();
                 $('select[name="question_name"]').append('<option id="select_survey" value="question_id">'+ "Select" +'</option>');
                for (var i = 0; i < data.data.length; i++) {
                     $('select[name="question_name"]').append('<option value="'+ data.data[i].question_id +'">'+ data.data[i].question_title +'</option>');
                }
                           
            }
            
        });


    }else{
        $('select[name="question_name"]').empty();
      
    }
});

$(document).ready(function() {

    var sid = '{{ old('survey_name') }}';
    if(sid !== ''){
        $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });
        $.ajax({
            url: "{{route('add_question')}}",
            type: 'POST',
            dataType: 'json',
            data: {'id':sid},
            success: function(data) {
               $('select[name="question_name"]').empty();
                 $('select[name="question_name"]').append('<option id="select_survey" value="question_id">'+ "Select" +'</option>');
                for (var i = 0; i < data.data.length; i++) {
                     $('select[name="question_name"]').append('<option value="'+ data.data[i].question_id +'">'+ data.data[i].question_title +'</option>');
                }        
            }
        });

    }
  });


$(window).on("load", function () {

          $('#radio_type').hide();

          setTimeout(function(){ 
              var qid = '{{ old('question_name') }}';
              if(qid !== '') {
                $('select[name="question_name"] option[value="'+qid+'"]').prop('selected', 'selected'); 
              }
          }, 100);
         
         
});

$("select[name='answer_type']").change(function(){
   var ansOptionValue = $("#selectType").val();
    // alert(ansOptionValue);

   if(ansOptionValue == "radio"){
         document.getElementById("radio_type").style.display = "";
         document.getElementById("textarea_type").style.display = "none";
        
    }
    else if(ansOptionValue == "textarea"){
         document.getElementById("radio_type").style.display = "none";
         document.getElementById("textarea_type").style.display = "";
        
     }
    else{
         document.getElementById("radio_type").style.display = "none";
         document.getElementById("textarea_type").style.display = "none";
      
     }  

});

        

</script>
{{-- @endsection --}}
