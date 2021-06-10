@extends('backend.layouts.app')

@section('content')
<div>

     <!-- Content Header (Page header) -->
     <div class="col-sm-12">
        <section class="content-header">
            <ol class="breadcrumb">
                <li><a href="{{ url('admin/emailtemplates')}}"><i class="fa fa-envelope"></i>Email Management </a></li>
                <li class="active">Email Template List</li>
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
                   <!--  <div class="box-header" style="background-color:#f5f5f5;border-bottom:1px solid #d2d6de;">

                        <a class="btn btn-info" href="{{ route('emailtemplates.create') }}" title="Add User">
                            <i class="fa fa-plus" style="vertical-align:middle"></i> Add Email Template
                        </a>

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
                                <th>title</th>
                                <th>subject</th>                                
                                <th class="no-sort">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(!empty($emailtemps))
                            @foreach ($emailtemps as $emailtemp)
                                <tr>
                                    <td>{{ $emailtemp['title'] }}</td>        
                                    <td>{{ $emailtemp['subject'] }}</td>
                                                                      
                                    <td class="actions">
                                        @if (Auth::user()->hasRole("ROLE_ADMIN"))
                                            <ul class="list-inline" style="margin-bottom:0px;">

                                               
                                                <li><a href="{{ route('emailtemplates.edit', $emailtemp['id']) }}"
                                                       title="{{ "Edit doctor" }}" class="btn btn-primary btn-xs"><i
                                                                class="fa fa-pencil"></i></a>
                                                </li>

                                            
                                                <li>
                                                    <form action="{{ route('emailtemplates.destroy', $emailtemp['id'])}}" method="post">
                                                      @csrf
                                                      @method('DELETE')
                                                      <button onclick="return confirm('Are you sure?')" class="btn btn-danger btn-xs" type="submit"><i class="fa fa-trash"></i></button>
                                                    </form>
                                                </li>
                                           

                                            </ul>
                                        
                                        @else
                                            <i class="fa fa-ban" title="Forbidden" style="color:red;"></i>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach

                            @else
                                <tr>
                                    <td colspan="5" align="center">No record found</td>
                                </tr>
                            @endif

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