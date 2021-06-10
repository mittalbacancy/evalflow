{{-- @extends('backend.layouts.app')

@section('content')
<div>

     <!-- Content Header (Page header) -->
     <div class="col-sm-12">
        <section class="content-header">
            <ol class="breadcrumb">
                <li><a href="{{ url('admin/doctors')}}"><i class="fa fa-user-md"></i>Questions Management</a></li>
                <li class="active">Question List</li>
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
            

        <div class="row">
            <div class="col-xs-12">
                <div class="box" style="border:1px solid #d2d6de;">
                    <div class="box-header" style="background-color:#f5f5f5;border-bottom:1px solid #d2d6de;">

                        <a class="btn btn-info" href="{{ route('questions.create') }}" title="Add User">
                            <i class="fa fa-plus" style="vertical-align:middle"></i> Add Question
                        </a>

                    </div>


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
                                <th style="width: 40%">Survey Title</th>
                                <th>Question Title</th>
                                <th>Status</th>
                                <th class="no-sort">Action</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach ($questions as $question)
                                <tr>
                                
                                    <td>{{ $question->survey_name }}</td>      
                                    <td>{!! $question->question_title !!}</td>
                                    <td>
                                        @if($question->active == 1)
                                        <div class="text-center text-success">
                                            <!-- <span class="fa fa-check-circle"></span> -->
                                            Active
                                        </div>
                                        @else
                                        <div class="text-center text-danger">
                                            Inactive
                                        </div>
                                        @endif
                                    </td>
                                    <td class="actions">
                                       
                                            <ul class="list-inline" style="margin-bottom:0px;">

                                               
                                                <li><a href="{{ URL::to('admin/questions/' . $question->question_id . '/edit')  }}"
                                                       title="{{ "Edit question" }}" class="btn btn-primary btn-xs"><i
                                                                class="fa fa-pencil"></i></a>
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
</script>
@stop --}}

@extends('backend.layouts.app')

@section('content')
<div>

     <!-- Content Header (Page header) -->
     <div class="col-sm-12">
        <section class="content-header">
            <ol class="breadcrumb">
                <li><a href="{{ url('admin/questions')}}"><i class="fa fa-user-md"></i>Questions & Answers</a></li>
                <li class="active">List</li>
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
                <select id="myRange" name="yearFilter"> </select>

        <div class="row">
            <div class="col-xs-12">
                <div class="box" style="border:1px solid #d2d6de;">
                    <div class="box-header" style="background-color:#f5f5f5;border-bottom:1px solid #d2d6de;">

                        <a class="btn btn-info" href="{{ route('questions.create') }}" title="Add User">
                            <i class="fa fa-plus" style="vertical-align:middle"></i> Add New
                        </a>

                    </div>


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
                                    {{-- <th style="width: 40%">Survey Title</th> --}}
                                    <th style="width: 30%">Question Title</th>
                                    <th>Answer Type</th>
                                    <th>Option 1</th>
                                    <th>Option 2</th>
                                    <th>Option 3</th>
                                    <th>Option 4</th>
                                    <th class="no-sort">Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                <tr>
                                @foreach ($answers as $row)
                                {{-- @foreach ($answers as $key => $row) --}}
                                    {{-- <td>{{ $questions[$key]->survey_name }}</td>    --}}
                                    <td>{{ $row->question_title }}</td>
                                    <td>{{ $row->answer_type }}</td>
                                    <td>{{ $row->option_1 }}</td>
                                    <td>{{ $row->option_2 }}</td>
                                    <td>{{ $row->option_3 }}</td>
                                    <td>{{ $row->option_4}}</td>
                                    <td class="actions">
                                        <ul class="list-inline" style="margin-bottom:0px;">
                                            <li><a href="{{ URL::to('admin/answers/' . $row->aid . '/edit')  }}"
                                                   title="{{ "Edit answer" }}" class="btn btn-primary btn-xs"><i
                                                            class="fa fa-pencil"></i></a>
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
            url: "{{route('filQue')}}",
            type: 'GET',
            dataType: 'json',
            data: {'created_at':rangeYr},
            success: function(data) {
                // console.log(data);
                $('.data-tables').DataTable().destroy();
                var res='';
                $.each (data, function (key, value) {
                    res +=
                    '<tr>'+
                        // '<td>'+value.survey_name+'</td>'+
                        '<td>'+value.question_title+'</td>'+
                        '<td>'+value.answer_type+'</td>'+
                        '<td>'+value.option_1+'</td>'+
                        '<td>'+value.option_2+'</td>'+
                        '<td>'+value.option_3+'</td>'+
                        '<td>'+value.option_4+'</td>'+
                        '<td class="last"><a href="{{ URL::to('admin/answers/' . $row->aid . '/edit')  }}" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></a></td>'+
                   '</tr>';
                });
                $('tbody').html(res);
                $('.data-tables').DataTable();
 
            },
        });
    });
    
</script>
@stop