@extends('backend.layouts.app')

@section('content')
<div>

     <!-- Content Header (Page header) -->
     <div class="col-sm-12">
        <section class="content-header">
            <ol class="breadcrumb">
                <li><a href="{{ url('admin/viewsurvey')}}"><i class="fa fa-user-md"></i>View Survey</a></li>
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
                               <th>Resident Name</th>
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
                            </tr>
                            </thead>
                            <tbody>
                                  @foreach($avr_count as $count)
                               
                                    <tr>
                                       <td>{{$count['first_name']}} {{$count['last_name']}}</td>
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
            var table = $('.data-tables').DataTable({   
                "columnDefs": [{
                    "targets": 'no-sort',
                }],
                 "order": []
            });
            
    })(jQuery);

    var mySelect = $('#myRange');
    /*if ({{ date('m') }}<= 6 && {{ date('d') }}<= 25){
        var startYear = {{(date('Y'))}};
    } else{
        var startYear = {{(date('Y'))+1}};
    }
    var endYear = 2019;

    for(var i = startYear; i > endYear;i--) {
 
        mySelect.append(
            $('<option></option>').val((i-1) + "-" + i).html((i-1) + "-" + i)
        );
    }*/
    mySelect.html(jsGetYearList());


    $("select[name='yearFilter']").on("change",function () {
        var rangeYr=$(this).val();
        // alert( rangeYr );
        $.ajax({
            url: "{{route('filEvalCal')}}",
            type: 'GET',
            dataType: 'json',
            data: {'created_at':rangeYr},
            success: function(data) {
                console.log(data.avr_count);
                $('.data-tables').DataTable().destroy();
                var res='';
                $.each (data.avr_count, function (key, value) {
                    res +=
                    '<tr>'+
                        '<td>'+value.first_name+" "+value.last_name+'</td>'+
                        '<td>'+value.PC1+'</td>'+
                        '<td>'+value.PC2+'</td>'+
                        '<td>'+value.PC3+'</td>'+
                        '<td>'+value.PC4+'</td>'+
                        '<td>'+value.PC5+'</td>'+
                        '<td>'+value.MK1+'</td>'+
                        '<td>'+value.MK2+'</td>'+
                        '<td>'+value.MK3+'</td>'+
                        '<td>'+value.SBP1+'</td>'+
                        '<td>'+value.SBP2+'</td>'+
                        '<td>'+value.SBP3+'</td>'+
                        '<td>'+value.PBLI1+'</td>'+
                        '<td>'+value.PBLI2+'</td>'+
                        '<td>'+value.PROF1+'</td>'+
                        '<td>'+value.PROF2+'</td>'+
                        '<td>'+value.PROF3+'</td>'+
                        '<td>'+value.PROF4+'</td>'+
                        '<td>'+value.ICS1+'</td>'+
                        '<td>'+value.ICS2+'</td>'+
                        '<td>'+value.ICS3+'</td>'+
                   '</tr>';
                });
                $('tbody').html(res);
                $('.data-tables').DataTable().draw();
 
            },
        });
    });

</script>
@stop