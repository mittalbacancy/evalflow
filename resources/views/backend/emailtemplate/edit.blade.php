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
                <li class="active">Edit Email Template</li>
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
                    <form method="post" action="{{ route('emailtemplates.update', $emailtemp->id) }}" enctype="multipart/form-data">
                        @method('PATCH') 
                        @csrf
                        <div class="form-group">
                            <label for="h_name">Title:</label>
                            <input type="text" class="form-control" name="title" value={{ $emailtemp->title }} />
                        </div>

                        <div class="form-group">
                            <label for="h_city">Subject:</label>
                            <input type="text" class="form-control" name="subject" value={{ $emailtemp->subject }} />
                        </div>

                        <div class="form-group">
                          <label for="h_address">Content:</label>
                          <textarea  id="summary-ckeditor" name="content" class="form-control" >{{ trim($emailtemp->content) }}</textarea>
                        </div>

                        

                       
                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>

        </section>
        <!-- /.content -->

</div>

@endsection