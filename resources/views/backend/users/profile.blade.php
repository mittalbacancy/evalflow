@extends('backend.layouts.app')



@section('content')

<div>

     <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                User
                <small>User Profile</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
                <li class="active">Profile</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">

            <div class="row">
                <div class="col-md-12 offset-sm-2">
                    <h1 class="display-3">User profile</h1>

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
                    <form method="post" action="{{ route('profile', $user->id) }}" enctype="multipart/form-data">                        
                        @csrf
                        <div class="form-group">
                         @if (Auth::user()->hasRole("ROLE_ADMIN"))
                            <label for="first_name">First Name:</label>
                         @else
                            <label for="first_name">Hospital Name:</label>
                         @endif
                            <input type="text" class="form-control" name="first_name" value={{ $user->first_name }} />
                        </div>

                        @if (Auth::user()->hasRole("ROLE_ADMIN"))
                        <div class="form-group">
                            <label for="last_name">Last Name:</label>
                            <input type="text" class="form-control" name="last_name" value="{{ $user->last_name }}" />
                        </div>
                        @endif

                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="text" class="form-control" name="email" value={{ $user->email }} />
                        </div>
                        
                        <div class="form-group">
                          <label for="password">Password:</label>
                          <input type="password" class="form-control" name="password"/>
                        </div>

                       
                        <div class="form-group">
                          <label for="active">Image:</label>                         
                          <input type="file" class="form-control-file" name="avatar" id="avatarFile" aria-describedby="fileHelp"> 
                        </div> 

                        <p>
                            @if($user->image != '' && $user->image != NULL)
                            <img height="100" class="rounded-circle" src="/storage/avatars/{{ $user->image }}" /> 
                            @endif
                        </p>
                        
                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>

        </section>
        <!-- /.content -->

</div>

@endsection