@extends('backend.layouts.app')

@section('content')
<div>

     <!-- Content Header (Page header) -->
     <div class="col-sm-12">
        <section class="content-header">   
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-calendar"></i>Shift Schedule</a></li>
                <li class="active">Schedule  List</li>
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
                    <div class="box-body table-responsive no-padding">
                        <table id="tbl" class="table data-tables table-striped table-hover" cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                <th>Survey Title</th>
                                <th>Start Date</th>
                                <th>End Date</th>
                                <th>Created At</th>
                                <th class="no-sort">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($schedule as $scheduleval)
                                <tr>
                                    <td>{{ $scheduleval->title }}</td>
                                    <td>{{ $scheduleval->start_date }}</td>
                                    <td>{{ $scheduleval->end_date }}</td>
                                    <td>{{ $scheduleval->created_at }}</td>
                                    <td class="actions">

                                        <ul class="list-inline" style="margin-bottom:0px;">
                                           
                                            <li><a target="_blank" href="{{ url('admin/calendarview')}}"
                                                       title="{{ "View Schedule" }}" class="btn btn-primary btn-xs"><i
                                                                class="fa fa-eye    "></i></a>
                                            </li>

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
            url: "{{route('filShiftSche')}}",
            type: 'GET',
            dataType: 'json',
            data: {'created_at':rangeYr},
            success: function(data) {
                console.log(data);
                $('.data-tables').DataTable().destroy();
                var res='';
                $.each (data, function (key, value) {
                    res +=
                    '<tr>'+
                        '<td>'+value.title+'</td>'+
                        '<td>'+value.start_date+'</td>'+
                        '<td>'+value.end_date+'</td>'+
                        '<td>'+value.created_at+'</td>'+
                        '<td class="last"><a target="_blank" href="{{ url('admin/calendarview')}}" class="btn btn-primary btn-xs"><i class="fa fa-eye"></i></a></a></td>'+
                   '</tr>';
                });
                $('tbody').html(res);
                $('.data-tables').DataTable();
 
            },
        });
    });
</script>
@stop