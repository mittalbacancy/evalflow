@extends('backend.layouts.app')


@section('content')
 <div>

     <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Doctor Management               
            </h1>
            <ol class="breadcrumb">
                <li>
                @if (auth()->user()->roles->first()->name == 'ROLE_ADMIN')
                <a href="{{ url('admin/doctors')}}">
                @else
                <a href="{{ url('hospital/doctors')}}">
                @endif
                <i class="fa fa-user-md"></i>Doctor Management</a></li>
                <li class="active">Add Doctor</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">

            <div class="row">
             <div class="col-md-12 offset-sm-2">
                
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
                  <form method="post" action="{{ route('doctors.store') }}" enctype="multipart/form-data">
                      @csrf
                      <div class="form-group">    
                          <label for="first_name">First Name:</label>
                          <input type="text" class="form-control" name="first_name" value="{{old('first_name')}}"/>
                      </div>

                      <div class="form-group">
                          <label for="last_name">Last Name:</label>
                          <input type="text" class="form-control" name="last_name" value="{{old('last_name')}}"/>
                      </div>

                      <div class="form-group">
                          <label for="email">Email:</label>
                          <input type="text" class="form-control" name="email" value="{{old('email')}}"/>
                      </div>

                      <div class="form-group">
                          <label for="mobilenumber">Mobile Number:</label><span style="color: red; font-size: 10px;"> mobile number must be enter with your country code</span style="color: red">
                          <input type="text" class="form-control" name="mobilenumber" value="{{old('mobilenumber')}}" required/>
                      </div>

                        <div class="form-group">
                          <label for="password">Password:</label>
                          <input type="password" class="form-control" name="password"/>
                        </div>

                        <div class="form-group">
                          <label for="qualification">Qualification:</label>
                          <input type="text" class="form-control" name="qualification" value="{{old('qualification')}}"/>
                        </div>

                        
                        <div class="form-group">
                          <label for="active">Select Hospital:</label>
                            <select class="form-control" name="hospital">
                                <?php foreach ($hospitals as $hospital) {?>
                                    <option value="{{ $hospital['id'] }}">{{ $hospital['h_name'] }}</option>
                                <?php } ?>
                                
                            </select>
                        </div>
                       
                        <div class="form-group">
                            <label for="title">Select Department:</label>
                            <select name="department" class="form-control" style="width:350px" id="mySelect">
                            @foreach($departments as $department)


                         @if (old('department') == $department)
                              <option value="{{ $department }}" selected>{{ $val }}</option>
                        @else
                              <option value="{{ $department['hospital_id'] }}">{{ $department['dpt_name'] }}</option>
                        @endif
                             
                            @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                          <label for="active">Active:</label>
                          <select class="form-control" name="active">
                              <option value="1">Active</option>
                              <option value="0">Inactive</option>
                          </select>
                        </div>  

                        <div class="form-check">
                            <label for="active">Select Survey: </label>
                            @foreach($survey as $value)
                               <!--  <input class="" type="checkbox" name="survey_chk" value="{{ $value['id'] }}"> -->
                               <input type="checkbox"  name="survey_chk[]" class="form-check-input"  value="{{ $value['id'] }}"> {{ $value['survey_name'] }}

                            @endforeach
                        </div> 

                        <div class="form-group">
                          <label for="active">Image:</label>                         
                          <input type="file" class="form-control-file" name="avatar" id="avatarFile" aria-describedby="fileHelp"> 
                        </div>                       
                                        
                      <button type="submit" class="btn btn-success">Add Doctor</button>
                  </form>
              </div>
            </div>
            </div>
        </section>
        <!-- /.content -->

</div>
@endsection
@section('page-js-script')
<script>


// var department_id = '<?php //echo $user->department_id  ?>';

$("select[name='hospital']").on("change",function () {
    var hospitalID = $(this).val();

    if(hospitalID) {
    
    $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });

        $.ajax({
            url: "{{route('add_department')}}",
            type: 'POST',
            dataType: 'json',
            data: {'id':hospitalID},
            success: function(data) {
                $('select[name="department"]').empty();
                 $('select[name="department"]').append('<option id="select_department" value="">'+ "Select" +'</option>');
                for (var i = 0; i < data.data.length; i++) {
                     $('select[name="department"]').append('<option value="'+ data.data[i].id +'">'+ data.data[i].dpt_name +'</option>');
                }
                
                // if(department_id!="" && department_id != "0") {
                //     $("select[name='department']").val(department_id);  
                // }else{
                //     document.getElementById("mySelect").options[0].selected=true;
                // }
                
            }
            
        });


    }else{
        $('select[name="department"]').empty();
      
    }
});
$("select[name='hospital']").change();
</script>
@endsection