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
                            @foreach ($answers as $row)
                                <tr>
                                    <td style="width: 30%">{{$row->question_title}}</td>
                                    <td>{{ $row->answer_type }}</td>
                                    <td>{{ $row->option_1 }}</td>
                                    <td>{{ $row->option_2 }}</td>
                                    <td>{{ $row->option_3 }}</td>
                                    <td>{{ $row->option_4 }}</td>
                                    <td class="action">
                                        <ul class="list-inline" style="margin-bottom:0px;">
                                            <li>
                                                <a href="{{ URL::to('admin/answers/' . $row->aid . '/edit')  }}"
                                                   title="Edit answer" class="btn btn-primary btn-xs"><i
                                                            class="fa fa-pencil"></i></a>
                                            </li>
                                            @if($row->answer_type == 'dropdown')
                                            <li>
                                                <a href="#"
                                                   title="view" class="btn btn-primary btn-xs ddOption" data-option="{{$row->dd_options}}" ><i
                                                            class="fa fa-eye"></i></a>
                                            </li>
                                            @endif
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

<div class="modal" tabindex="-1" role="dialog" id="optionModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"><b>Options</b></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
      </div>
      <div class="modal-footer">        
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
@endsection

@section('page-js-script')
<script type="text/javascript">
  (function ($) {
        $("#loader-wrapper").hide();
    
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

    /*if ({{ date('m') }}<= 6 && {{ date('d') }}<= 25){
        var startYear = {{(date('Y'))}};
    } else{
        var startYear = {{(date('Y'))+1}};
    }
    
    // var startYear = {{(date('Y'))}};
    var endYear = 2019;

    for(var i = startYear; i > endYear;i--) {
 
        mySelect.append(
            $('<option></option>').val((i-1) + "-" + i).html((i-1) + "-" + i)
        );
    } */    
    mySelect.html(jsGetYearList());
    


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
                    var url = "{{ URL::to('admin/answers/:id/edit')  }}";
                    url = url.replace(':id',value.aid);
                    res +=
                    '<tr>'+                        
                        '<td>'+value.question_title+'</td>'+
                        '<td>'+value.answer_type+'</td>'+
                        '<td>'+value.option_1+'</td>'+
                        '<td>'+value.option_2+'</td>'+
                        '<td>'+value.option_3+'</td>'+
                        '<td>'+value.option_4+'</td>'+
                        '<td class="action">'+
                        '<ul class="list-inline" style="margin-bottom:0px;">'+
                            '<li>'+
                            '<a href="'+url+'" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></a>'+
                            '</li>';
                            if(value.answer_type == 'dropdown'){
                                res += "<li><a href='#' class='btn btn-primary btn-xs ddOption' data-option='"+value.dd_options+"'><i class='fa fa-eye'></i></a></li>";
                            }
                         res += '</ul></td>';
                        {{--/*'<td class="last"><a href="{{ URL::to('admin/answers/' . $row->aid . '/edit')  }}" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></a></td>'+*/--}}
                   '</tr>';
                });
                $('tbody').html(res);
                $('.data-tables').DataTable();
 
            },
        });
    });

    $('body').on('click','.ddOption',function(){
        var str ='';
        var data = $(this).attr('data-option');
        data = data.replace(/&quot;/g, '\"');          
        data = JSON.parse(data);
        var i;            
        for (i = 0; i < data.length; i++) {                       
          str += '<p>'+(i+1)+'. '+data[i]+'</p>';
        }        

        $('.modal-body').html(str);
        $('#optionModal').modal('show');
    });
    
    function viewOptions(){
        var str ='';
        var data = $('.ddOption').attr('data-option');
        data = data.replace(/&quot;/g, '\"');          
        data = JSON.parse(data);
        var i;            
        for (i = 0; i < data.length; i++) {                       
          str += '<p>'+(i+1)+'. '+data[i]+'</p>';
        }        

        $('.modal-body').html(str);
        $('#optionModal').modal('show');
    }
</script>
@stop
