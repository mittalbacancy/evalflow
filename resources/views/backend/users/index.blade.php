@extends('backend.layouts.app')

@section('content')
<div>

     <!-- Content Header (Page header) -->
    
    <div class="col-sm-12">
        <section class="content-header">
            
            <ol class="breadcrumb">
                <li>
                @if (auth()->user()->roles->first()->name == 'ROLE_ADMIN')
                <a href="{{ url('admin/users')}}">
                @else
                <a href="{{ url('hospital/users')}}">
                @endif
                <i class="fa fa-users"></i>Resident Management</a></li>
                <li class="active">Resident List</li>
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

                        <a class="btn btn-info" href="{{ route('users.create') }}" title="Add User">
                            <i class="fa fa-plus" style="vertical-align:middle"></i> Add Resident
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
                                <th>Name</th>
                               <!--  <th>User Name</th> -->
                                <th>Email</th>
                                <th>Mobile Number</th>
                                <th>Created At</th>
                               
                                <th class='bool text-center'>Status</th>
                                {{--<th class='bool text-center'>Email Verified</th>--}}
                                <th class="no-sort">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td>{{ $user->name }}</td>
                                    <!-- <td>{{ $user->username }}</td> -->
                                    <td>{{ $user->email }}</td> 
                                    <td>{{ $user->mobilenumber }}</td>
                                    <td>{{ $user->created_at }}</td>    
                                    <td>
                                        @if($user->active == 1)
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
                                    {{--<td>{{ $user->email_verified_at }}</td>--}}
                                    <td class="actions">
                                        
                                            <ul class="list-inline" style="margin-bottom:0px;">
                                              @if (auth()->user()->roles->first()->name == 'ROLE_ADMIN')
                                                                                               
                                                <li>
                                                <a href="{{ URL::to('admin/users/' . $user->id . '/edit')  }}"
                                                       title="{{ "Edit User" }}" class="btn btn-primary btn-xs"><i
                                                                class="fa fa-pencil"></i></a>
                                                </li>
                                                @else
                                                <li>
                                                <a href="{{ URL::to('hospital/users/' . $user->id . '/edit')  }}"
                                                       title="{{ "Edit User" }}" class="btn btn-primary btn-xs"><i
                                                                class="fa fa-pencil"></i></a>
                                                </li>
                                                @endif



                                             @if ($user->hasRole('ROLE_ADMIN') != 1 )
                                                <li>
                                                    <form action="{{ route('users.destroy', $user->id)}}" method="post">
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