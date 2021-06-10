@extends('backend.layouts.app')


@section('content')
 <div>

     <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Answer Management               
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{ url('admin/answers')}}"><i class="fa fa-user-md"></i>Answer Management</a></li>
                <li class="active">Add Answer</li>
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
                  <form method="post" action="{{ route('answers.store') }}" enctype="multipart/form-data">
                      @csrf

                       <div class="form-group">
                          <label for="active">Select Survey Title:</label>
                            <select class="form-control" name="survey_name" style="width:400px">
                          <option value="">Select</option>
                                <?php foreach ($surveys as $survey) { ?>

                                    <option value="{{ $survey['id'] }}" {{($survey['id'] == old('survey_name')) ? 'selected' : ''}}>{{ $survey['survey_name'] }}</option>
                                <?php } ?>
                                
                            </select>
                        </div>

                     
                      <div class="form-group">
                          <label for="question_name">Select Question:</label>
                           <select name="question_name" class="form-control" style="width:400px" id="mySelect">
                           <option value="">select</option>
                           </select>
                      </div>

                      <div class="form-group">
                          <label for="answer_type">Answer Type:</label>
                           <select name="answer_type" class="form-control" style="width:400px" id="selectType" >
                           <option value="">select</option>

                            <option <?php if (old('answer_type')=="radio") echo "selected";?> value="radio">radio</option>                                
                                <option <?php if (old('answer_type')=="textarea") echo "selected";?> value="textarea">textarea</option>

                           
                          </select>
                      </div>

                     
                      <div class="form-group" id="radio_type" style="display: none;">

                      <div class="form-group">
                          <label for="option1">Option1:</label>
                          <input type="text" class="form-control" name="option1" value="" />
                        <div class="form-check">
                            <label for="active">Select Code: </label>
                              

                            @foreach($milestone_code as $value)
                              
                              @php
                                $codeId1 = $value['survey_m_code'];
                              @endphp 
                            <div class="main">
                              <input type="checkbox"  name="survey_code1[]" class="form-check-input"  value="{{ $value['id'] }}"> {{ $value['survey_m_code'] }}
                              <input type="number" name="survey_value1[{{$codeId1}}]" class="form-box-width" min="1">
                            <br>

                            </div>
                            @endforeach
                        </div>

                      </div>
                      <div class="form-group">
                          <label for="option2">Option2:</label>
                          <input type="text" class="form-control" name="option2" value="" />

                           <div class="form-check">
                            <label for="active">Select Code: </label>

                            @foreach($milestone_code as $value)
                            @php
                                $codeId2 = $value['survey_m_code'];
                              @endphp
                              <input type="checkbox"  name="survey_code2[]" class="form-check-input"  value="{{ $value['id'] }}"> {{ $value['survey_m_code'] }}
                              <input type="number" name="survey_value2[{{$codeId2}}]" class="form-box-width" min="1">

                            @endforeach
                        </div>

                      </div>
                      <div class="form-group">
                          <label for="option3">Option3:</label>
                          <input type="text" class="form-control" name="option3" value="" />
                           <div class="form-check">
                            <label for="active">Select Code: </label>

                            @foreach($milestone_code as $value)
                            @php
                                $codeId3 = $value['survey_m_code'];
                              @endphp
                               <input type="checkbox"  name="survey_code3[]" class="form-check-input"  value="{{ $value['id'] }}"> {{ $value['survey_m_code'] }}
                               <input type="number" name="survey_value3[{{$codeId3}}]" class="form-box-width" min="1">


                            @endforeach
                        </div>
                      </div>
                      <div class="form-group">
                          <label for="option4">Option4:</label>
                          <input type="text" class="form-control" name="option4" value="" />

                       <div class="form-check">
                          <label for="active">Select Code: </label>

                          @foreach($milestone_code as $value)
                           @php
                                $codeId4 = $value['survey_m_code'];
                              @endphp
                             <input type="checkbox"  name="survey_code4[]" class="form-check-input"  value="{{ $value['id'] }}"> {{ $value['survey_m_code'] }}
                             <input type="number" name="survey_value4[{{$codeId4}}]" class="form-box-width" min="1">

                          @endforeach
                        </div>
                      </div>
                      </div>

                      <div class="form-group" id="textarea_type" style="display: none;">
                      <div class="form-group">
                      <label for="ans_dec">Answer Desription:</label>
                      <textarea class="form-control" rows="4" cols="50" disabled></textarea>
                      </div>
                      </div>
                         
                                        
                      <button type="submit" class="btn btn-success">Add Answer</button>
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
@endsection
