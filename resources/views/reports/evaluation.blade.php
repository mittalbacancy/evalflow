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
<!-- <link rel="stylesheet" type="text/css" href="{{asset('../../css/customPdf.css')}}"> -->
<style type="text/css">
    th {
        font-weight: bold !important;
    }
    .headerImg {
        background: #F65874;
        color: #fff;
        /*position: absolute;*/
        width: 100%;
        z-index: 999;
    }
    .h44 {
        font-weight: bold;
        font-size: 18px !important;

    }
    .title {
        margin: 40px 0px;
        font-weight: 700;
        font-size: 26px;
        font-style: normal;
        text-decoration: none;
        color: #0046da;
        line-height: normal;
    }    
    .title_name {
        margin: 9px 0px;
        font-weight: 700;
        font-size: 26px;
        font-style: normal;
        text-decoration: none;
        color: #e85b7b;
        line-height: normal;
    }
    @media print {
        .vendorListHeading {
            background-color: #F65874 !important;
            -webkit-print-color-adjust: exact; 
            position: fixed(header);
        }
    }
    @media print {
        .vendorListHeading {
            color: white !important;
        }
    }
    @media print {
        .btn.vendorListHeading {
            display: none;
        }
    }
    @media print {
        .h44{
          font-weight: bold;
          margin-top: 0 !important;
          margin-bottom: 0 !important;
        }
    }
    @media print {
        .title{
          color:#0046DA !important;
        }
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
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box" style="border:1px solid #d2d6de;">                    
                    <div class="box-header" style="background-color:#f5f5f5;border-bottom:1px solid #d2d6de;">
                        <form method="post" action="{{ route('EvaluationReportFilter') }}" enctype="multipart/form-data">
                        {!! csrf_field() !!}
                        <div class="form-group col-xs-3">
                            <label for="active">Resident Name:</label>
                            <select class="form-resident" name="resident_id">
                                <option value="">Select</option>

                                <?php foreach ($default_dropdown as $survey_list) {?>
                                    <option value="{{ $survey_list->resident_id }}" @if($resident_id == $survey_list->resident_id) selected= "selected" @endif>{{ $survey_list->resident_first_name }} {{ $survey_list->resident_last_name }}</option>
                                <?php } ?>
                                
                            </select>
                        </div>                            
                        <div class="col-xs-3">
                            <label for="active">Date:</label>
                            <input type="text" autocomplete="off" class="form-resident" name="daterange" @if($daterange != null && $daterange != '') value="{{$daterange}}" @else value="" @endif />
                        </div>
                        <div class="col-xs-1" style="margin-top:2%;">
                            <input type="submit" name="submit"  class="btn btn-primary">
                        </div>
                        </form>

                        
                        <div class="col-xs-1" style="margin-top:1%;">                            
                            <input type="button" name="PDF" value="PDF"  class="btn btn-primary" onclick="Gen()">
                        </div>                      
                        
                    </div><!-- /.box-header --> 
                    <div class="box-body table-responsive no-padding">
                        <table id="tbl" class="table table-striped table-hover" cellspacing="0" width="100%">
                            <thead>
                            <tr>                                                        
                                <th class='no-sort'>Dates</th>
                                <th class="no-sort">Evaluations</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($survey_lists as $survey_list)
                                <tr>                                    
                                    <td>{{ $survey_list->created_at }}</td>
                                    <td>{{ $survey_list->survey_title }}</td>
                                </tr> 
                                @endforeach  
                                @if(empty($survey_lists)) 
                                <tr>                                    
                                    <td colspan="2">                            
                                        <h7>No details found</h7>
                                    </td>
                                </tr> 
                                @endif
                            </tbody>
                        </table>
                    </div>                     
                </div>                
                <!-- /.box -->
            </div>
        </div>        
    </section>
    <section class="content" id="clickbind" style="@if(isset($survey_lists) && count($survey_lists) > 0) display: block; @else display: none; @endif background: #fff !important;"> 
    <div class="box" style="">       
        <div class="row">
            <div class="text-center">
                <div class="headerImg vendorListHeading">
                  <img src="{{ url('dist/img/logo.svg') }}" class="logo" style="height: 50px; padding: 6px;">
                </div>  
                <h6 class="title_name">{{isset($user) ? $user->first_name.' '.$user->last_name : ''}}</h65>                                        
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">         
                <div class="row">
                    <div class="col-md-11">                       

                    </div>
                    <div class="col-md-1">
                        <h5>
                            <!-- <button class="btn btn-primary vendorListHeading click" onclick="Gen(); return false;">Generate PDF</button> -->
                        </h5>
                    </div>
                </div> 
                @foreach($survey_lists as $survey_list)     
                @php
                    if($survey_list->sur_ty_id == 2 || $survey_list->sur_ty_id == 3){
                        $submit_name = $survey_list->doctor_first_name.' '.$survey_list->doctor_last_name;
                    }else {
                        $submit_name = $survey_list->resident_first_name.' '.$survey_list->resident_last_name;   
                    } 
                    $item = 1;
                @endphp      
                <div class="row" style="border:1px solid #d2d6de;margin-top:2%;">
                    <div class="col-md-12">
                        <h5 class="title">{{$survey_list->survey_title}}</h5>                        
                        <h5 class="h44"> {{($survey_list->survey_type != 'Resident of Attending') ? 'Person Being Evaluated' : 'Attending Name'  }} : {{$submit_name}}</h5>
                        <h5 class="h44">Survey Type: {{$survey_list->survey_type}}</h5>
                        @foreach($survey_answers as $survey)
                        @if($survey->survey_track_id == $survey_list->id)
                        <div class="row" style="margin-top:2%;">
                            <div class="col-md-12">                            
                                <label>{{$item}}. {!! $survey->questions->question_title !!}</label>
                                <p style="margin-left:3%;font-weight: normal;">
                                    @if(isset($survey->answers) && $survey->answers->answer_type == 'textarea' )
                                        {{$survey->answer_id}} 
                                    @elseif(isset($survey->answers) && $survey->answers->answer_type == 'dropdown' ) 
                                        @php
                                            $dd_options = json_decode($survey->answers->dd_options);
                                            $index = str_replace('option_','',$survey->answer_id);
                                        @endphp
                                        {{ $dd_options[$index - 1] }}
                                    @else
                                        @php $option = $survey->answer_id; @endphp
                                        {{$survey->answers->$option}}                                        
                                    @endif
                                </p>
                            </div> 
                        </div> 
                        @php $item++; @endphp 
                        @endif                      
                        @endforeach                        
                    </div>
                </div> 
                @endforeach                       
                <div class="row" style="@if(isset($avr_count) && count($avr_count) > 0) display: block; @else display: none; @endif border:1px solid #d2d6de;margin-top:2%;">
                    <div class="col-md-12">
                        <h5 class="title">Evaluations</h5>
                        <table id="tbl" class="table table-striped table-hover" cellspacing="0" width="100%">
                            <thead>
                            <tr>                               
                               <th>PC1</th>
                               <th>PC2</th>
                               <th>PC3</th>
                               <th>PC4</th>
                               <th>PC5</th>
                               <th>MK1</th>
                               <th>MK2</th>
                               <th>MK3</th>
                               <th>SBP1</th>
                               <th>SBP2</th>
                               <th>SBP3</th>
                               <th>PBLI1</th>
                               <th>PBLI2</th>
                               <th>PROF1</th>
                               <th>PROF2</th>
                               <th>PROF3</th>
                               <th>PROF4</th>
                               <th>ICS1</th>
                               <th>ICS2</th>
                               <th>ICS3</th>
                               <th>Created On</th>
                            </tr>
                            </thead>
                            <tbody>
                                  @foreach($avr_count as $count)
                               
                                    <tr>                                       
                                        <td>{{$count['PC1']}}</td>
                                        <td>{{$count['PC2']}}</td>
                                        <td>{{$count['PC3']}}</td>
                                        <td>{{$count['PC4']}}</td>
                                        <td>{{$count['PC5']}}</td>
                                        <td>{{$count['MK1']}}</td>
                                        <td>{{$count['MK2']}}</td>
                                        <td>{{$count['MK3']}}</td>
                                        <td>{{$count['SBP1']}}</td>
                                        <td>{{$count['SBP2']}}</td>
                                        <td>{{$count['SBP3']}}</td>
                                        <td>{{$count['PBLI1']}}</td>
                                        <td>{{$count['PBLI2']}}</td>
                                        <td>{{$count['PROF1']}}</td>
                                        <td>{{$count['PROF2']}}</td>
                                        <td>{{$count['PROF3']}}</td>
                                        <td>{{$count['PROF4']}}</td>
                                        <td>{{$count['ICS1']}}</td>
                                        <td>{{$count['ICS2']}}</td>
                                        <td>{{$count['ICS3']}}</td>
                                        <td>{{$count['created_at']}}</td>
                                    </tr>
                                 @endforeach
                               
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div> 
    </div>       
    </section>
</div>
@endsection

@section('page-js-script')
<script src="{{ asset('bower_components/pdf_print/dataTables.buttons.min.js') }}"></script>
<!-- <script src="https://cdn.datatables.net/buttons/1.6.0/js/buttons.flash.min.js"></script> -->
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script> -->
<script src="{{ asset('bower_components/pdf_print/pdfmake.min.js') }}"></script>
<script src="{{ asset('bower_components/pdf_print/vfs_fonts.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.2/jspdf.min.js"></script>
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
<script type="text/javascript">
      //$( window ).on( "load", function() { Gen(); });
      function Gen1() {
          //var pdf = new jsPDF('p', 'mm', 'a4');
          //pdf.canvas.height = 595.28;
          //pdf.canvas.width = 841.89;

          // pdf.fromHTML(document.body);
          /*pdf.addHTML(document.body, function() {
            pdf.save('test.pdf');
          });*/
          var pdf = new jsPDF('p', 'pt', 'a4');
             pdf.addHTML($('#clickbind')[0], function () {
                 pdf.save('Test.pdf');
          });

          /*pdf.addHTML($('#clickbind').html(), function() {
            pdf.save('test.pdf');
          });*/
      } 
      function Gen(){

        var HTML_Width = $("#clickbind").width();
        var HTML_Height = $("#clickbind").height();
        var top_left_margin = 15;
        var PDF_Width = HTML_Width+(top_left_margin*2);
        var PDF_Height = (PDF_Width*1.5)+(top_left_margin*2);
        var canvas_image_width = HTML_Width;
        var canvas_image_height = HTML_Height;
        
        var totalPDFPages = Math.ceil(HTML_Height/PDF_Height)-1;
        

        html2canvas($("#clickbind")[0],{allowTaint:true}).then(function(canvas) {
            canvas.getContext('2d');
            
            console.log(canvas.height+"  "+canvas.width);
            
            
            var imgData = canvas.toDataURL("image/jpeg", 1.0);
            var pdf = new jsPDF('p', 'pt',  [PDF_Width, PDF_Height]);
            pdf.addImage(imgData, 'JPG', top_left_margin, top_left_margin,canvas_image_width,canvas_image_height);
            
            
            for (var i = 1; i <= totalPDFPages; i++) { 
                pdf.addPage(PDF_Width, PDF_Height);
                pdf.addImage(imgData, 'JPG', top_left_margin, -(PDF_Height*i)+(top_left_margin*4),canvas_image_width,canvas_image_height);
            }
            
            pdf.save("evalflow.pdf");
        });
    };   
</script> 
@endsection