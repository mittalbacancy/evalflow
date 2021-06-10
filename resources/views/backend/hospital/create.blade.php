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
                <li class="active">Add Hospital</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">

            <div class="row">
             <div class="col-md-12 offset-sm-2">
                <h1 class="display-3">Add Hospital</h1>
              <div>
                @if ($errors->any())
                  <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                  </div><br />
                @endif
                  <form method="post" action="{{ route('hospitals.store') }}" enctype="multipart/form-data" name="add_name" id="add_name">
                      @csrf
                        <div class="form-group">    
                            <label for="h_name">Name:</label>
                            <input type="text" class="form-control" name="h_name" value="{{old('h_name')}}" />
                        </div>

                        <div class="form-group">
                            <label for="h_city">City:</label>
                            <input type="text" class="form-control" name="h_city" value="{{old('h_city')}}"/>
                        </div>

                        <div class="form-group">
                          <label for="h_address">Address:</label>
                          <textarea  name="h_address" class="form-control">
                          {{ old('h_address') }}
                          </textarea>
                          <!-- <input type="text" name="h_address"/> -->
                        </div>

                        <div class="form-group">
                          <label for="h_email">Email:</label>
                          <input type="text" class="form-control" name="h_email" value="{{old('h_email')}}"/>
                          <!-- <input type="text" name="h_address"/> -->
                        </div>

        <div class="form-group">
          <label for="department">Select Department:</label>
             <div class="table-responsive">  
                <table class="table table-bordered" id="dynamic_field">  
                    <tr>  
                        <td><input type="text" name="dpt_name[]" placeholder="Enter your Name" class="form-control name_list"/></td>  
                        <td><button type="button" name="add" id="add" class="btn btn-success">Add Department</button></td>  
                    </tr>  
                </table>  
                
            </div>
         </div>


                        <div class="form-group">
                          <label for="active">Active:</label>
                          <select class="form-control" name="active">
                              <option value="1">Active</option>
                              <option value="0">Inactive</option>
                          </select>
                        </div>  

                        <div class="form-group">
                          <label for="active">Image:</label>                         
                          <input type="file" class="form-control-file" name="avatar" id="avatarFile" aria-describedby="fileHelp" value="{{old('avatar')}}"> 
                        </div>                       
                                        
                      <button type="submit" class="btn btn-success" name="submit" id="submit" value="Submit">Add Hospital</button>
                  </form>
              </div>
            </div>
            </div>
        </section>
        <!-- /.content -->

</div>


<!-- 
 <script>
    $(document).ready(function () {
    $('#create-user').validate({ // initialize the plugin
        rules: {
            name: {
                required: true
            },
            email: {
                required: true                
            },      
            mobile: {
                required: true,
                number: true,
                minlength:10,
                maxlength:10,

            },           
            avatar: {
                required: true,
            },
            username: {required:true,normalizer: function(value) { return $.trim(value); }},
        }
    });

});
    function showProfileImage(fileInput) {
        var files = fileInput.files;
        for (var i = 0; i < files.length; i++) {
            var file = files[i];
            var imageType = /image.*/;
            if (!file.type.match(imageType)) {
                continue;
            }
            var img = document.getElementById("show_profile_img");
            img.file = file;
            var reader = new FileReader();
            reader.onload = (function (aImg) {
                return function (e) {
                    aImg.src = e.target.result;
                };
            })(img);
            reader.readAsDataURL(file);
        }
    }

 </script> -->

@endsection
@section('page-js-script')
 <script type="text/javascript">

    $(document).ready(function(){      
      var postURL = "<?php echo url('addmore'); ?>";
      var i=1;  


      $('#add').click(function(){  
           i++;  
           $('#dynamic_field').append('<tr id="row'+i+'" class="dynamic-added"><td><input type="text" name="dpt_name[]" placeholder="Enter your Department Name" class="form-control name_list" /></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');  
      });  


      $(document).on('click', '.btn_remove', function(){  
           var button_id = $(this).attr("id");   
           $('#row'+button_id+'').remove();  
      });  


      $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });


      $('#submit').click(function(){            
           $.ajax({  
                url:postURL,  
                method:"POST",  
                data:$('#add_name').serialize(),
                type:'json',
                success:function(data)  
                {
                  
                    if(data.error){
                        printErrorMsg(data.error);
                    }else{
                        i=1;
                        $('.dynamic-added').remove();
                        $('#add_name')[0].reset();
                        $(".print-success-msg").find("ul").html('');
                        $(".print-success-msg").css('display','block');
                        $(".print-error-msg").css('display','none');
                        $(".print-success-msg").find("ul").append('<li>Record Inserted Successfully.</li>');
                    }
                }  
           });  
      });  


      function printErrorMsg (msg) {
         $(".print-error-msg").find("ul").html('');
         $(".print-error-msg").css('display','block');
         $(".print-success-msg").css('display','none');
         $.each( msg, function( key, value ) {
            $(".print-error-msg").find("ul").append('<li>'+value+'</li>');
         });
      }
    });  
</script>

@endsection