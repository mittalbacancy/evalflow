@extends('backend.layouts.app')

@section('content')
<div>

     <!-- Content Header (Page header) -->
     <div class="col-sm-12">
        <section class="content-header">   
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-calendar"></i>Calendar Management</a></li>
                <li class="active">Survey Request List</li>
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
                    <!-- <div class="box-header" style="background-color:#f5f5f5;border-bottom:1px solid #d2d6de;">                        

                    </div>
 -->

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
                    <div class="box-body table-responsive no-padding" id="filterData">
                        <table id="tbl" class="table data-tables table-striped table-hover" cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                <th>SurveyTitle</th>
                                <!-- <th>Doctor Name</th>  -->
                                <th>SurveyId</th>
                                <th>Request By</th>
                                <th>Created At</th>
                                <th class="no-sort">Action</th>
                            </tr>
                            </thead>
                            <tbody id="tBody">
                            @foreach ($surveys as $survey)
                                <tr>
                                    <td>{{ $survey->survey_title }}</td>        
                                    <!-- <td>{{ $survey->first_name }} {{ $survey->last_name }}</td>    -->     
                                    <td>{{ $survey->survey_id }}</td>
                                    <td>{{ $survey->first_name }} {{ $survey->last_name }}</td>
                                    <td>{{ $survey->created_at }}</td>
                                    <td class="actions">

                                        <ul class="list-inline" style="margin-bottom:0px;">
                                           
                                            <li><a href="{{ route('surveyrequest.edit', $survey->surveyid) }}"
                                                       title="{{ "Schedule Survey" }}" class="btn btn-primary btn-xs"><i
                                                                class="fa fa-calendar"></i></a>
                                            </li>
                                                                                       
                                               <!--  <li>
                                                   <a href="{{ url('admin/google')}}">Add Schedule</a>

                                                </li> -->
                                           

                                        </ul>

                                        
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
<script type="text/javascript">

    (function ($) {
          var table = $('.data-tables').DataTable({
                "columnDefs": [{
                  "targets": 'no-sort',
                }],
            "order": []
          });
          //replace bool column to checkbox
          //renderBoolColumn('#tbl', 'bool');
    })(jQuery);


    var mySelect = $('#myRange');
    if ({{ date('m') }}<= 6 && {{ date('d') }}<= 25){
        var startYear = {{(date('Y'))}};
    } else{
        var startYear = {{(date('Y'))+1}};
    }
    var endYear = 2019;

    for(var i = startYear; i > endYear;i--) {
 
        mySelect.append(
            $('<option></option>').val((i-1) + "-" + i).html((i-1) + "-" + i)
        );
    }


    $("select[name='yearFilter']").on("change",function () {
        var rangeYr=$(this).val();
        // alert( rangeYr );
        $.ajax({
            url: "{{route('filSurv')}}",
            type: 'GET',
            dataType: 'json',
            data: {'created_at':rangeYr},
            success: function(data) {
                console.log(data);
                $('.data-tables').DataTable().destroy();
                var res='';
                $.each (data, function (key, value) {
                    var url = '{{ route('surveyrequest.edit', ":surveyid") }}';
                    url = url.replace(':surveyid', value.id);
                    res +=
                    '<tr>'+
                        '<td>'+value.survey_title+'</td>'+
                        '<td>'+value.survey_id+'</td>'+
                        '<td>'+value.first_name+" "+value.last_name+'</td>'+
                        '<td>'+value.created_at+'</td>'+
                        '<td class="last"><a href="'+url+'" class="btn btn-primary btn-xs"><i class="fa fa-calendar"></i></a></td>'+
                   '</tr>';
                });
                $('tbody').html(res);
                $('.data-tables').DataTable().draw();
 
            },
        });
    });
</script>
@stop