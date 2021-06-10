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
                <li><a href="{{ url('admin/surveylist')}}"><i class="fa fa-users"></i>Survey Management</a></li>
                <li class="active">Survey List</li>
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
                    <div class="box-header" style="background-color:#f5f5f5;border-bottom:1px solid #d2d6de;">

                        <a class="btn btn-info" href="{{ route('addsurvey') }}" title="Add Survey">
                            <i class="fa fa-plus" style="vertical-align:middle"></i> Add Survey
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
                                <th>Survey Name</th>
                                <th>Created At</th>
                                
                                                    
                                <th class="no-sort">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($surveys as $survey)
                                <tr>
                                    <td>{{ $survey->survey_name }}</td>
                                    <td>{{ $survey->created_at }}</td>   
                                   
                                    
                                   
                                    <td class="actions">
                                        
                                            <ul class="list-inline" style="margin-bottom:0px;">
                                            @if(Auth::user()->hasRole("ROLE_ADMIN"))
                                                                                               
                                                <li>
                                                <a href="{{ URL::to('admin/surveyedit/' . $survey->id)  }}"
                                                       title="{{ "Edit User" }}" class="btn btn-primary btn-xs"><i
                                                                class="fa fa-pencil"></i></a>
                                                </li>
                                                
                                                @endif



                                             @if(Auth::user()->hasRole("ROLE_ADMIN"))
                                                <li>
                                                    <form action="{{ route('destroysurvey', $survey->id)}}" method="post">
                                                      @csrf
                                                      @method('DELETE')
                                                      <button onclick="return confirm('Are you sure?')" class="btn btn-danger btn-xs" type="submit"><i class="fa fa-trash"></i></button>
                                                    </form>
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

    if ({{ date('m') }}<= 6 && {{ date('d') }}<= 25){
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
    }


    $("select[name='yearFilter']").on("change",function () {
        var rangeYr=$(this).val();
        // alert( rangeYr );
        $.ajax({
            url: "{{route('filSurList')}}",
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
                        '<td>'+value.survey_name+'</td>'+
                        '<td>'+value.created_at+'</td>'+
                        '<td><a href="{{ URL::to('admin/surveyedit/' . $survey->id)  }}" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></a><form class="btn" action="{{ route('destroysurvey', $survey->id)}}" method="post">@csrf @method('DELETE')<button class="btn btn-danger btn-xs" type="submit"><i class="fa fa-trash"></i></button></form></td>'+
                   '</tr>';
                });
                $('tbody').html(res);
                $('.data-tables').DataTable();
 
            },
        });
    });
</script>
@endsection