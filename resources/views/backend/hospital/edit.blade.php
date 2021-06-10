@extends('backend.layouts.app')



@section('content')

<div>

     <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Hospitals Management
            </h1>
            <ol class="breadcrumb">
               <li><a href="{{ url('admin/hospitals')}}"><i class="fa fa-h-square"></i>Hospitals Management</a></li>
                <li class="active">Edit Hospital</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">

            <div class="row">
                <div class="col-md-12 offset-sm-2">
                   
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
                    <form method="post" action="{{ route('hospitals.update', $hospital->id) }}" enctype="multipart/form-data" name="add_name" id="add_name">
                        @method('PATCH') 
                        @csrf
                        <div class="form-group">
                            <label for="h_name">Name:</label>
                            <input type="text" class="form-control" name="h_name" value="{{ $hospital->h_name }}" />
                        </div>

                        <div class="form-group">
                            <label for="h_city">City:</label>
                            <input type="text" class="form-control" name="h_city" value="{{ $hospital->h_city }}" />
                        </div>

                        <div class="form-group">
                          <label for="h_address">Address:</label>
                          <textarea  name="h_address" class="form-control" >{{ trim($hospital->h_address) }}</textarea>                         
                        </div>

                        
          <div class="form-group">
          <label for="department">Department List:</label>
             <div class="table-responsive">
             @foreach($departments as $department)  
             <input type="text" class="form-control" name="dpt_name_edit[{{$department->id}}]" value="{{ $department->dpt_name }}" />
             <br>
             @endforeach 

             <table class="table edit_department" id="dynamic_field">  
                    <tr>  
                       <!--  <td><input type="text" name="dpt_name_add[]" placeholder="Enter your Name" class="form-control name_list" /></td>   -->
                        <td><button type="button" name="add" id="add" class="btn btn-success"><i class="fa fa-plus"></i>Add Department</button></td>  
                    </tr>  
                </table> 
                
            </div>
         </div>
        

                        <div class="form-group">
                          <label for="active">Active:</label>                         
                          <select class="form-control" name="active">
                                <option <?php if ($hospital->active=="1") echo "selected";?> value="1">Active</option>                                
                                <option <?php if ($hospital->active=="0") echo "selected";?> value="0">Inactive</option>     
                          </select>
                        </div>  
                      
                        <div class="form-group">
                          <label for="active">Image:</label>                         
                          <input type="file" class="form-control-file" name="avatar" id="avatarFile" aria-describedby="fileHelp"> 
                        </div> 

                        <p>
                            @if($hospital->h_image != '' && $hospital->h_image != NULL)
                            <img height="100" class="rounded-circle" src="/storage/hospital/{{ $hospital->h_image }}" /> 
                            @endif
                        </p>

                        <button type="submit" class="btn btn-primary" name="submit" id="submit" value="Submit">Update</button>
                    </form>
                </div>
            </div>

        </section>
        <!-- /.content -->

</div>

@endsection

@section('page-js-script')
 <script type="text/javascript">

    $(document).ready(function(){      
      var postURL = "<?php echo url('addmore'); ?>";
      var i=1;  


      $('#add').click(function(){  
           i++;  
           $('#dynamic_field').append('<tr id="row'+i+'" class="dynamic-added"><td><input type="text" name="dpt_name_add[]" placeholder="Enter your Department Name" class="form-control name_list" /></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');  
      });  


      $(document).on('click', '.btn_remove', function(){  
           var button_id = $(this).attr("id");   
           $('#row'+button_id+'').remove();  
      });  


      // $.ajaxSetup({
      //     headers: {
      //       'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      //     }
      // });


      // $('#submit').click(function(){            
      //      $.ajax({  
      //           url:postURL,  
      //           method:"POST",  
      //           data:$('#add_name').serialize(),
      //           type:'json',
      //           success:function(data)  
      //           {
                  
      //               if(data.error){
      //                   printErrorMsg(data.error);
      //               }else{
      //                   i=1;
      //                   $('.dynamic-added').remove();
      //                   $('#add_name')[0].reset();
      //                   $(".print-success-msg").find("ul").html('');
      //                   $(".print-success-msg").css('display','block');
      //                   $(".print-error-msg").css('display','none');
      //                   $(".print-success-msg").find("ul").append('<li>Record Inserted Successfully.</li>');
      //               }
      //           }  
      //      });  
      // });  

      //  function printErrorMsg (msg) {
      //    $(".print-error-msg").find("ul").html('');
      //    $(".print-error-msg").css('display','block');
      //    $(".print-success-msg").css('display','none');
      //    $.each( msg, function( key, value ) {
      //       $(".print-error-msg").find("ul").append('<li>'+value+'</li>');
      //    });
      // }
    }); 

 </script>

@endsection