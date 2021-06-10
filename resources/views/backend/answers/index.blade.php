@extends('backend.layouts.app')

@section('content')
<div>

     <!-- Content Header (Page header) -->
     <div class="col-sm-12">
        <section class="content-header">
            <ol class="breadcrumb">
                <li><a href="{{ url('admin/doctors')}}"><i class="fa fa-user-md"></i>Answers Management</a></li>
                <li class="active">Answer List</li>
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

                        <a class="btn btn-info" href="{{ route('answers.create') }}" title="Add User">
                            <i class="fa fa-plus" style="vertical-align:middle"></i> Add Answer
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

                            @foreach ($answers as $answer)
                                
                                
                                    <td>{!! $answer->question_title !!}</td>
                                    <td>{{ $answer->answer_type }}</td>
                                    <td>{{ $answer->option_1 }}</td>
                                    <td>{{ $answer->option_2 }}</td>
                                    <td>{{ $answer->option_3 }}</td>
                                    <td>{{ $answer->option_4 }}</td>
                                    
                                    
                                    <td class="actions">
                                       
                                            <ul class="list-inline" style="margin-bottom:0px;">

                                               
                                                <li><a href="{{ URL::to('admin/answers/' . $answer->aid . '/edit')  }}"
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
</script>
@stop