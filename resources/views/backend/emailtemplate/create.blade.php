@extends('backend.layouts.app')


@section('content')
 <div>

     <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Email Management                
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{ url('admin/emailtemplates')}}"><i class="fa fa-envelope"></i>Email Management </a></li>
                <li class="active">Add Email Template</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">

            <div class="row">
             <div class="col-md-12 offset-sm-2">
                <h1 class="display-3">Add Email Template</h1>
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
                  <form method="post" action="{{ route('emailtemplates.store') }}" enctype="multipart/form-data">
                      @csrf
                        <div class="form-group">    
                            <label for="title">Title:</label>
                            <input type="text" class="form-control" name="title"/>
                        </div>

                        <div class="form-group">
                            <label for="subject">Subject:</label>
                            <input type="text" class="form-control" name="subject"/>
                        </div>

                        <div class="form-group">
                          <label for="content">Content:</label>
                          <textarea  name="content" class="form-control" >
                              
                          </textarea>
                          <!-- <input type="text" name="h_address"/> -->
                        </div>

                                        
                      <button type="submit" class="btn btn-success">Add Template</button>
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