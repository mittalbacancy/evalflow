@extends('backend.layouts.app')

<style type="text/css">
.form-box-width {
    width: 43px !important;
}
</style>

@section('content')
 <div>

     <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
               New Question & Answer               
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{ url('admin/questions')}}"><i class="fa fa-user-md"></i>Questions & Answers</a></li>
                <li class="active">Add New</li>
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
                  <form method="post" action="{{ route('questions.store') }}" enctype="multipart/form-data">
                      @csrf

                       <div class="form-group">
                          <label for="active">Select Survey Title:</label>
                            <select class="form-control" name="survey_name">
                            <option value="select">Select</option>
                                <?php foreach ($surveys as $survey) {?>
                                    <option value="{{ $survey['id'] }}">{{ $survey['survey_name'] }}</option>
                                <?php } ?>
                                
                            </select>
                        </div>

                      <div class="form-group">    
                          <label for="question_name">Question:</label>
                          <input type="text" class="form-control" name="question_name" placeholder="Enter your Question Here" value="{{old('first_name')}}"/>
                      </div>

                      <div class="form-group">
                          <label for="answer_type">Answer Type:</label>
                           <select name="answer_type" class="form-control" style="width:400px" id="selectType" >
                           <option value="">Select</option>

                            <option <?php if (old('answer_type')=="radio") echo "selected";?> value="radio">Radio</option>                                
                            <option <?php if (old('answer_type')=="textarea") echo "selected";?> value="textarea">Textarea</option>
                            <option <?php if (old('answer_type')=="dropdown") echo "selected";?> value="dropdown">Dropdown</option>                           
                          </select>
                      </div>

                     
                      <div class="form-group" id="radio_type" style="display: none;">

                      <div class="form-group">
                          <label for="option1">Option1:</label>
                          <input type="text" class="form-control" name="option1" value="" />
                        <div class="form-check">
                            <label for="active">Select Code: </label>
                            <div class="miValue">
                            @foreach($milestone_code as $value)
                              @if($value['survey_m_code'] == 'MK1' || $value['survey_m_code'] == 'PC1' || $value['survey_m_code'] == 'SBP1' || $value['survey_m_code'] == 'PBLI1' || $value['survey_m_code'] == 'PROF1' || $value['survey_m_code'] == 'ICS1')
                              <div class="mr-10">
                              @endif
                                <div class="mb-10">
                                  @php
                                    $codeId1 = $value['survey_m_code'];
                                  @endphp 
                                  <input type="checkbox"  name="survey_code1[]" class="form-check-input"  value="{{ $value['id'] }}"> {{ $value['survey_m_code'] }}
                                  <input type="number" name="survey_value1[{{$codeId1}}]" class="form-box-width" min="1">
                                </div>
                              @if($value['survey_m_code'] == 'MK3' || $value['survey_m_code'] == 'PC5' || $value['survey_m_code'] == 'SBP3' || $value['survey_m_code'] == 'PBLI2' || $value['survey_m_code'] == 'PROF4' || $value['survey_m_code'] == 'ICS3')
                              </div>
                              @endif
                            @endforeach
                            </div>
                        </div>
                      </div>
                      
                      <div class="form-group">
                          <label for="option2">Option2:</label>
                          <input type="text" class="form-control" name="option2" value="" />

                           <div class="form-check">
                            <label for="active">Select Code: </label>
                            <div class="miValue">
                            @foreach($milestone_code as $value)
                            @if($value['survey_m_code'] == 'MK1' || $value['survey_m_code'] == 'PC1' || $value['survey_m_code'] == 'SBP1' || $value['survey_m_code'] == 'PBLI1' || $value['survey_m_code'] == 'PROF1' || $value['survey_m_code'] == 'ICS1')
                              <div class="mr-10">
                              @endif
                                <div class="mb-10">
                            @php
                                $codeId2 = $value['survey_m_code'];
                              @endphp
                              <input type="checkbox"  name="survey_code2[]" class="form-check-input"  value="{{ $value['id'] }}"> {{ $value['survey_m_code'] }}
                              <input type="number" name="survey_value2[{{$codeId2}}]" class="form-box-width" min="1">
                              </div>
                              @if($value['survey_m_code'] == 'MK3' || $value['survey_m_code'] == 'PC5' || $value['survey_m_code'] == 'SBP3' || $value['survey_m_code'] == 'PBLI2' || $value['survey_m_code'] == 'PROF4' || $value['survey_m_code'] == 'ICS3')
                              </div>
                              @endif
                            @endforeach
                        </div>

                      </div>
                    </div>
                    <div class="form-group">
                          <label for="option3">Option3:</label>
                          <input type="text" class="form-control" name="option3" value="" />
                           <div class="form-check">
                            <label for="active">Select Code: </label>
                            <div class="miValue">
                            @foreach($milestone_code as $value)
                            @if($value['survey_m_code'] == 'MK1' || $value['survey_m_code'] == 'PC1' || $value['survey_m_code'] == 'SBP1' || $value['survey_m_code'] == 'PBLI1' || $value['survey_m_code'] == 'PROF1' || $value['survey_m_code'] == 'ICS1')
                              <div class="mr-10">
                              @endif
                                <div class="mb-10">
                            @php
                                $codeId3 = $value['survey_m_code'];
                              @endphp
                               <input type="checkbox"  name="survey_code3[]" class="form-check-input"  value="{{ $value['id'] }}"> {{ $value['survey_m_code'] }}
                               <input type="number" name="survey_value3[{{$codeId3}}]" class="form-box-width" min="1">
                    </div>
                              @if($value['survey_m_code'] == 'MK3' || $value['survey_m_code'] == 'PC5' || $value['survey_m_code'] == 'SBP3' || $value['survey_m_code'] == 'PBLI2' || $value['survey_m_code'] == 'PROF4' || $value['survey_m_code'] == 'ICS3')
                              </div>
                              @endif

                            @endforeach
                        </div>
                      </div>
                    </div>
                      <div class="form-group">
                          <label for="option4">Option4:</label>
                          <input type="text" class="form-control" name="option4" value="" />

                       <div class="form-check">
                          <label for="active">Select Code: </label>
                            <div class="miValue">
                          @foreach($milestone_code as $value)
                          @if($value['survey_m_code'] == 'MK1' || $value['survey_m_code'] == 'PC1' || $value['survey_m_code'] == 'SBP1' || $value['survey_m_code'] == 'PBLI1' || $value['survey_m_code'] == 'PROF1' || $value['survey_m_code'] == 'ICS1')
                              <div class="mr-10">
                              @endif
                                <div class="mb-10">
                           @php
                                $codeId4 = $value['survey_m_code'];
                              @endphp
                             <input type="checkbox"  name="survey_code4[]" class="form-check-input"  value="{{ $value['id'] }}"> {{ $value['survey_m_code'] }}
                             <input type="number" name="survey_value4[{{$codeId4}}]" class="form-box-width" min="1">
                                </div>
                              @if($value['survey_m_code'] == 'MK3' || $value['survey_m_code'] == 'PC5' || $value['survey_m_code'] == 'SBP3' || $value['survey_m_code'] == 'PBLI2' || $value['survey_m_code'] == 'PROF4' || $value['survey_m_code'] == 'ICS3')
                              </div>
                              @endif
                          @endforeach
                        </div>
                      </div>
                      </div>
                    </div>

                      <div class="form-group" id="textarea_type" style="display: none;">
                        <div class="form-group">
                          <label for="ans_dec">Answer Desription:</label>
                          <textarea class="form-control" rows="4" cols="50" disabled></textarea>
                        </div>
                      </div>
                      <?php
                      $dd_options_cnt = 1;
                      ?>    
                      <div class="form-group" id="dropdown_type" style="display: none;">
                          <div class="form-group" id="option_div_{{$dd_options_cnt}}">
                            <label for="option_{{$dd_options_cnt}}">Option:</label> 
                            <input type="text" name="options[]" value="" class="form-control"> 
                            <div class="form-check">
                                <label for="active">Select Code: </label>
                                <div class="miValue">
                                @foreach($milestone_code as $value)
                                  @if($value['survey_m_code'] == 'MK1' || $value['survey_m_code'] == 'PC1' || $value['survey_m_code'] == 'SBP1' || $value['survey_m_code'] == 'PBLI1' || $value['survey_m_code'] == 'PROF1' || $value['survey_m_code'] == 'ICS1')
                                  <div class="mr-10">
                                  @endif
                                    <div class="mb-10">
                                      @php
                                        $codeId1 = $value['survey_m_code'];
                                      @endphp 
                                      <input type="checkbox"  name="survey_code_{{$dd_options_cnt}}[]" class="form-check-input"  value="{{ $value['id'] }}"> {{ $value['survey_m_code'] }}
                                      <input type="number" name="survey_value_{{$dd_options_cnt}}_[{{$codeId1}}]" class="form-box-width" min="1">
                                    </div>
                                  @if($value['survey_m_code'] == 'MK3' || $value['survey_m_code'] == 'PC5' || $value['survey_m_code'] == 'SBP3' || $value['survey_m_code'] == 'PBLI2' || $value['survey_m_code'] == 'PROF4' || $value['survey_m_code'] == 'ICS3')
                                  </div>
                                  @endif
                                @endforeach
                                </div>
                               </div>
                          </div>
                          <div class="dropdown_type_add">
                            
                          </div>                          
                          <input type="hidden" id="survey_val_arr" name="survey_val_arr" value="1">
                           <a class="btn btn-primary pull-right addMoreOption">Add More</a>
                           <br>
                      </div>                                        
                      <button type="submit" class="btn btn-success">Add</button>
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

   if(ansOptionValue == "radio"){
         document.getElementById("radio_type").style.display = "";
         document.getElementById("textarea_type").style.display = "none";
         document.getElementById("dropdown_type").style.display = "none";
        
    }
    else if(ansOptionValue == "textarea"){
    // alert(ansOptionValue);
         document.getElementById("radio_type").style.display = "none";
         document.getElementById("textarea_type").style.display = "";
         document.getElementById("dropdown_type").style.display = "none";
        
     }
     else if(ansOptionValue == "dropdown"){
    // alert(ansOptionValue);
         document.getElementById("radio_type").style.display = "none";
         document.getElementById("textarea_type").style.display = "none";
         document.getElementById("dropdown_type").style.display = "";
        
     }
    else{
    // alert(123);
         document.getElementById("radio_type").style.display = "none";
         document.getElementById("textarea_type").style.display = "none";
         document.getElementById("dropdown_type").style.display = "none";
      
     }  

}); 

var  dd_options_cnt = parseInt('{{$dd_options_cnt}}');
$(".addMoreOption").on('click',function(){
  dd_options_cnt++;
  if(($('#survey_val_arr').val()).length > 0){
    $('#survey_val_arr').val($('#survey_val_arr').val()+','+dd_options_cnt);
  }else{
    $('#survey_val_arr').val(dd_options_cnt);
  }

  //var div_count = $('.option_div_add_more').length; 
  //console.log(div_count);
  var text = '{{json_encode($milestone_code)}}';
  var milestone_code = text.replace(/&quot;/g, '\"');  
  //console.log(milestone_code);
  milestone_code = JSON.parse(milestone_code);
  //console.log(milestone_code);
  var addDiv = '';
   addDiv +=
    '<div class="form-group option_div_add_more" id="option_div_'+dd_options_cnt+'">'+
      '<a class="pull-right delete_optionDiv" style="color:red;"><i class="fa fa-trash fa-3x"></i></a>'+
      '<label for="option_'+dd_options_cnt+'">Option:</label>'+       
      '<input type="text" name="options[]" value="" class="form-control"> '+
        '<div class="form-check">'+
          '<label for="active">Select Code: </label>'+
          '<div class="miValue">';

            var i;            
            for (i = 0; i < milestone_code.length; i++) {             
              var value = milestone_code[i];              
              if(value['survey_m_code'] == 'MK1' || value['survey_m_code'] == 'PC1' || value['survey_m_code'] == 'SBP1' || value['survey_m_code'] == 'PBLI1' || value['survey_m_code'] == 'PROF1' || value['survey_m_code'] == 'ICS1')
              {
                addDiv += '<div class="mr-10">';
              }
              var codeId1 = value['survey_m_code'];
              addDiv +=
                '<div class="mb-10">'+                
                  '<input type="checkbox"  name="survey_code_'+dd_options_cnt+'[]" class="form-check-input"  value="'+value['id']+'"> '+value['survey_m_code']+
                  ' <input type="number" name="survey_value_'+dd_options_cnt+'_['+codeId1+']" class="form-box-width" min="1">'+
                '</div>';
              if(value['survey_m_code'] == 'MK3' || value['survey_m_code'] == 'PC5' || value['survey_m_code'] == 'SBP3' || value['survey_m_code'] == 'PBLI2' || value['survey_m_code'] == 'PROF4' || value['survey_m_code'] == 'ICS3'){
                addDiv +=
                '</div>';
              }
            }          
            addDiv +=
          '</div>'+
        '</div>'+
    '</div>';

    $('.dropdown_type_add').append(addDiv);
});
$('body').on('click','.delete_optionDiv',function(){
  confirm('Are you sure you want to remove this option?');
  var removeCnt = $(this).parent().attr('id').replace('option_div_','').trim();
  values = $('#survey_val_arr').val().split(',');
  var index = values.indexOf(removeCnt);
  if(index >= 0) {
      values.splice(index, 1);
  }
  $('#survey_val_arr').val(values.join(','));
  $(this).parent().remove();
})

</script>
@endsection
