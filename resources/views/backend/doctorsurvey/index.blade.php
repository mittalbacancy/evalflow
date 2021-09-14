@extends('backend.layouts.app')

<style type="text/css">
 /*Loader style starts */
    #loader-wrapper{
    /* display: show;*/
    }
    #loader-wrapper .backdrop{
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: #222222;
        z-index: 1049;
        opacity: 0.7;
    }
    #loader-wrapper .loader {
        position: fixed;
        left: 50%;
        top: 50%;
        z-index: 1050;
        margin: -75px 0 0 -75px;
        border: 16px solid #f3f3f3; / Light grey /
        border-top: 16px solid #3498db; / Blue /
        border-radius: 50%;
        width: 120px;
        height: 120px;
        -webkit-animation: spin 2s linear infinite;
        animation: spin 2s linear infinite;
    }

    #loader-wrapper .loader {
        border-top: 16px solid #57C8F2;
        /* border-right: 16px solid green;*/
        border-bottom: 16px solid #57C8F2;
        /*border-left: 16px solid pink; */
    }

    @-webkit-keyframes spin {
        0% { -webkit-transform: rotate(0deg); }
        100% { -webkit-transform: rotate(360deg); }
    }
    @keyframes spin {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
    }
</style>

@section('content')
<div id="loader-wrapper">
    <div class="backdrop"></div>
    <div class="loader"></div>
</div>
<div>

     <!-- Content Header (Page header) -->
     <div class="col-sm-12">
        <section class="content-header">
            <ol class="breadcrumb">
                <li>
                @if (auth()->user()->roles->first()->name == 'ROLE_ADMIN')
                <a href="{{ url('admin/viewsurvey')}}">
                @else
                <a href="{{ url('hospital/viewsurvey')}}">
                @endif
                <i class="fa fa-user-md"></i>View Survey</a></li>
                <li class="active">View Survey List</li>
            </ol>
        </section>
    </div>

    <div class="col-sm-12">
      @if(session()->get('success'))
        <div class="alert alert-success">
          {{ session()->get('success') }}  
        </div>
      @endif
    </div>

        <!-- Main content -->
        <section class="content">
        <label for="active">Year : </label>
                <select id="myRange" name="yearFilter"></select>

        <div class="row">
            <div class="col-xs-12">
                <div class="box" style="border:1px solid #d2d6de;">
                    <form method="post" action="{{ route('viewsurveyfilter') }}" enctype="multipart/form-data">
                    {!! csrf_field() !!}
                    <div class="box-header" style="background-color:#f5f5f5;border-bottom:1px solid #d2d6de;">
                            <div class="form-group col-xs-3">
                              <label for="active">Resident Name:</label>
                                <select class="form-resident" name="survey_name">
                                <option value="">Select</option>

                                <?php foreach ($default_dropdown as $survey_list) {?>
                                    <option value="{{ $survey_list->resident_id }}" @if($resident_id == $survey_list->resident_id) selected= "selected" @endif>{{ $survey_list->resident_first_name }} {{ $survey_list->resident_last_name }}</option>
                                <?php } ?>
                                
                            </select>
                            </div>
                            <div class="form-group col-xs-3">
                              <label for="active">Evaluation Type:</label>
                                <select class="form-resident" name="survey_title">
                                <option value="">Select</option>

                                <?php foreach ($survey_title_list as $survey_title_list) {?>
                                    <option value="{{ $survey_title_list->survey_name }}" @if($survey_title == $survey_title_list->survey_name) selected= "selected" @endif>{{ $survey_title_list->survey_name }}</option>
                                <?php } ?>
                                
                            </select>
                            </div>
                            <div class="col-xs-3">
                            <label for="active">Date:</label>
                            <input type="text" autocomplete="off" class="form-resident" name="daterange" @if($daterange != null && $daterange != '') value="{{$daterange}}" @else value="" @endif />
                            </div>
                            <div class="col-xs-2" style="margin-top:2%;">
                            <input type="submit" name="submit"  class="btn btn-primary">
                            </div>
                            </div>
                            </form>


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

                    <!-- /.box-header -->
                    <div class="box-body table-responsive no-padding">
                        <table id="tbl" class="table data-tables table-striped table-hover" cellspacing="0" width="100%">
                            <thead>
                            <tr>                                
                                <th>Evaluation Type</th>
                                <th>Evaluator</th> 
                                <th>Person being Evaluated</th>                               
                                <th class='bool text-center'>Status</th>
                                <th class="no-sort">Surveys</th>
                                <th class="no-sort">Manual Request</th>
                                <th class="no-sort">Deleted</th>
                                <th class="no-sort">Create Date</th>
                                <th class="no-sort">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                             @foreach ($survey_lists1 as $survey_list)
                             @php
                             $sur_ty_id = isset($survey_list->emailTemplate) ? $survey_list->emailTemplate->survey_type_id : 0;
                             @endphp
                                <tr>                                     
                                    <td>{{ $survey_list->survey_title }} </td>
                                    <td> @if($sur_ty_id  == 2 || $sur_ty_id  == 3 || $sur_ty_id == 5)
                                        Anonymous
                                        @else                                        
                                         {{ isset($survey_list->doctorUser) ? $survey_list->doctorUser->first_name ." ". $survey_list->doctorUser->last_name : '' }}
                                        @endif 
                                    </td>
                                    <td>  
                                        @if($survey_list->survey_title == 'Wards')
                                            wards
                                        @elseif($sur_ty_id  == 2 || $sur_ty_id  == 3)
                                            {{ isset($survey_list->doctorUser) ? $survey_list->doctorUser->first_name ." ". $survey_list->doctorUser->last_name : '' }}
                                        @elseif($sur_ty_id  == 5 && isset($survey_list->surveyAnswer))                                                           
                                            @php
                                                $surveyAnswer = $survey_list->surveyAnswer->first();
                                            @endphp 
                                            @if(isset($surveyAnswer->answers) && !empty($surveyAnswer->answers->dd_options))
                                             @php                                                
                                                $dd_options = json_decode($surveyAnswer->answers->dd_options);                    
                                            @endphp
                                            @foreach($dd_options as $key=> $dd_option) 
                                                @php
                                                $option_val = 'option_'.($key+1);
                                                if($surveyAnswer->answer_id == $option_val ){$option_val = $dd_option ;break;}
                                                @endphp
                                            @endforeach
                                            {{$option_val}}
                                            @else
                                            {{ isset($survey_list->residentUser) ? $survey_list->residentUser->first_name ." ". $survey_list->residentUser->last_name : '' }}
                                            @endif
                                        @else
                                        {{ isset($survey_list->residentUser) ? $survey_list->residentUser->first_name ." ". $survey_list->residentUser->last_name : '' }}
                                        @endif
                                    </td>
                                   

                                    <td>@if($survey_list->submitted == 1)
                                        <div class="text-center text-success">
                                            Submitted
                                        </div>
                                        @else
                                        <div class="text-center text-danger">
                                            Pending
                                        </div>
                                        @endif 
                                    </td>

                                    <td class="actions">

                                            @if (auth()->user()->roles->first()->name == 'ROLE_ADMIN')
                                            
                                                                                        
                                              <a href="{{$survey_list->preview_url}}"
                                                       title="{{ "Preview" }}" class="btn btn-primary" target="_blank">Preview URL</a>
                                               
                                                                                   
                                        @else

                                        @if($survey_list->submitted == 1)
                                            <ul class="list-inline" style="margin-bottom:0px;">

                                               
                                                <li><a href="{{$survey_list->preview_url}}"
                                                       title="{{ "Preview" }}" class="btn btn-primary" target="_blank">Preview URL</a>
                                                </li>

                                            
                                                <li>
                                                   <a href="{{ asset('QRcode') }}/{{$survey_list->survey_qrcode}}" class="btn btn-primary" target="_blank">Survey QR</a>
                                                </li>
                                           

                                            </ul>
                                        @else

                                            <ul class="list-inline" style="margin-bottom:0px;">

                                            <li>
                                                   <a href="{{ asset('QRcode') }}/{{$survey_list->survey_qrcode}}" class="btn btn-primary" target="_blank">Survey QR</a>
                                            </li>

                                            </ul>
                                           
                                        @endif
                                        @endif
                                    </td>
                                    <td>@if($survey_list->is_manual == 1)
                                        <div class="text-center text-success">
                                            
                                            Yes (Admin)
                                        </div>
                                        @else
                                        <div class="text-center text-danger">
                                            No
                                        </div>
                                        @endif </td>

                                    <td>@if($survey_list->is_deleted == 1)
                                        <div class="text-center text-success">
                                           <span class="label label-danger">Yes</span>
                                        </div>
                                        @else
                                        <div class="text-center text-danger">
                                           <span class="label label-success">No</span>
                                        </div>
                                        @endif </td>

                                    <td>{{ $survey_list->created_at }} </td>

                                   
                                                <td>
                                                @if($survey_list->is_deleted == 0)
                                                    <form action="{{ route('destroysurveylist', $survey_list->id)}}" method="post">
                                                      @csrf
                                                      @method('DELETE')
                                                      <button onclick="return confirm('Are you sure?')" class="btn btn-danger btn-xs" type="submit"><i class="fa fa-trash"></i></button>
                                                    </form>
                                                @endif
                                                </td>
                                           

                                </tr>

                             @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
        </div>

</section>
        <!-- /.content -->

</div>


@endsection

@section('page-js-script')
<script src="{{ asset('bower_components/pdf_print/dataTables.buttons.min.js') }}"></script>
<!-- <script src="https://cdn.datatables.net/buttons/1.6.0/js/buttons.flash.min.js"></script> -->
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script> -->
<script src="{{ asset('bower_components/pdf_print/pdfmake.min.js') }}"></script>
<script src="{{ asset('bower_components/pdf_print/vfs_fonts.js') }}"></script>
<script src="{{ asset('bower_components/pdf_print/buttons.html5.min.js') }}"></script>
<script src="{{ asset('bower_components/pdf_print/buttons.print.min.js') }}"></script>
<script type="text/javascript">


  (function ($) {
        $("#loader-wrapper").hide();
    
            var table = $('.data-tables').DataTable({   
                "columnDefs": [{
                    "targets": 'no-sort',
                }],
                dom: 'Bfrtip',
                buttons: [
              'pdf', 'print'
        ],
                "order": []
            });
            
    })(jQuery);


$(function() {
  $('input[name="daterange"]').daterangepicker({
       locale: {
            format: 'YYYY-MM-DD'
        }
  });

  $('body').on('click','.cancelBtn',function(){
    $('input[name="daterange"]').val('');
    });
});
</script>
{{-- @php 
    if (date('m') <= 6) {
        $financial_year = (date('Y')-1) . '-' . date('Y');
        echo($financial_year);
    } else {
        $financial_year = date('Y') . '-' . (date('Y') + 1);
        echo($financial_year);
    }
@endphp --}}

<script type="text/javascript">

var mySelect = $('#myRange');
    /*if ({{ date('m') }}<= 6 && {{ date('d') }}<= 25){
        var startYear = {{(date('Y'))}};
    } else{
        var startYear = {{(date('Y'))+1}};
    }
    var endYear = 2019;

    var first=0,selected='selected';
    for(var i = startYear; i > endYear;i--) {
        
        if(first == 0){
            first = 1;            
        }else{
            selected = '';
        }
        mySelect.append(
            $('<option '+selected+'></option>').val((i-1) + "-" + i).html((i-1) + "-" + i)
        );
    }*/
    mySelect.html(jsGetYearList());

    $("select[name='yearFilter']").on("change",function () {
        
        var rangeYr=$(this).val();
        // alert( rangeYr );
        $.ajax({
            url: "{{route('filViewSurvey')}}",
            type: 'GET',
            dataType: 'json',
            data: {'created_at':rangeYr},
            success: function(data) {
                console.log(data);
                $('.data-tables').DataTable().destroy();
                var res='';
                $.each (data.default_dropdown, function (key, value) {
                    var url = '{{ route('destroysurveylist', ":id")}}';
                    url = url.replace(':id', value.id);
                    res +=
                    '<tr>'+
                        '<td>'+value.survey_title+'</td>';

                        if(value.sur_ty_id == 2 || value.sur_ty_id == 3){
                           res += '<td> Anonymous </td>';
                        }
                        else {
                            res += '<td>'+value.doctor_first_name+" "+value.doctor_last_name+'</td>';
                        }

                        if(value.sur_ty_id == 2 || value.sur_ty_id == 3){
                           res += '<td>'+value.doctor_first_name+" "+value.doctor_last_name+'</td>';
                        }
                        else {
                            res += '<td>'+value.resident_first_name+" "+value.resident_last_name+'</td>';
                        }

                        if(value.submitted == 1){
                           res += '<td> <div class="text-center text-success"> Submitted </div> </td>';
                        }
                        else {
                            res += '<td> <div class="text-center text-danger"> Pending </div> </td>';
                        }
                            
                        @if(auth()->user()->roles->first()->name == 'ROLE_ADMIN') 
                            res += '<td> <a href="'+value.preview_url+'" title="{{ "Preview" }}" class="btn btn-primary" target="_blank">Preview URL</a> </td>';
                        @else 
                            @if("'+value.submitted+' == 1")
                               res += '<td> <ul class="list-inline" style="margin-bottom:0px;"> <li><a href="'+value.preview_url+'" title="{{ "Preview" }}" class="btn btn-primary" target="_blank">Preview URL</a> </li> <li> <a href="{{ asset('QRcode') }}/'+value.survey_qrcode+'" class="btn btn-primary" target="_blank">Survey QR</a> </li> </ul> </td>';
                            @else 
                               res += '<td> <ul class="list-inline" style="margin-bottom:0px;"> <li> <a href="{{ asset('QRcode') }}/'+value.survey_qrcode+'" class="btn btn-primary" target="_blank">Survey QR</a> </li> </ul> </td>';
                            @endif 
                        @endif

                        if(value.is_manual == 1){ 
                            res += '<td> <div class="text-center text-success"> Yes (Admin) </div> </td>';
                        }else {
                            res += '<td> <div class="text-center text-danger"> No </div> </td>';
                        }

                        if(value.is_deleted == 1){ 
                            res += '<td> <div class="text-center text-success"> <span class="label label-danger">Yes</span> </div></td>';
                        }else {
                            res += '<td> <div class="text-center text-danger"> <span class="label label-success">No</span> </div></td>';
                        }

                        res += '<td>'+value.created_at+'</td>';

                        if(value.is_deleted == 0){ 
                            res += '<td> <form action="'+url+'" method="post"> @csrf @method('DELETE') <button class="btn btn-danger btn-xs" type="submit"><i class="fa fa-trash"></i></button> </form> </td>';
                        }else {
                            res += '<td></td>';
                        }
                   '</tr>';
                });
                $('tbody').html(res);
                $('.data-tables').DataTable().draw();
            },
        });
    });

</script>
@endsection