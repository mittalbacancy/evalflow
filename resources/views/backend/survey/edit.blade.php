@extends('backend.layouts.app')



@section('content')

<div>

     <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Schedule Survey
                <small>Schedule survey</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-calendar"></i>Calendar Management</a></li>
                <li class="active">Schedule Survey</li>
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
                    <?php //print_r($survey);die; ?>
                    <form method="post" action="{{ route('surveyrequest.update', $survey['id']) }}" enctype="multipart/form-data">
                        @method('PATCH') 
                        @csrf

                        <div class="form-group">
                            <label for="">Survey Title :  {{ $survey['survey_title'] }}</label>
                        </div>

                        <div class="form-group">
                            <label for="title">Title:</label>
                            <input type="text" class="form-control" name="title" value="{{ $survey['survey_title'] }}"/>
                        </div>

                        <div class="form-group">
                            <label for="start_date">Start Date:</label>
                            <input type="text" class="start-date form-control" name="start_date" id="start-date" value='' />
                        </div>

                        <div class="form-group">
                            <label for="end_date">End Date:</label>
                            <input type="text" class="end-date form-control" name="end_date" id="end-date" value='' />
                        </div>

                        <button type="submit" class="btn btn-primary">Add Schedule</button>
                    </form>
                </div>
            </div>

        </section>
        <!-- /.content -->

</div>

@endsection


@section('page-js-script')
<script type="text/javascript">
    $(document).ready(function() {
        //alert("Settings page was loaded");
    });

    // set default dates
var start = new Date();
// set end date to max one year period:
var end = new Date(new Date().setYear(start.getFullYear()+1));

    $('.start-date').datepicker({  

       format: 'mm-dd-yyyy',
       startDate : start,
       endDate   : end

// update "toDate" defaults whenever "fromDate" changes
}).on('changeDate', function(){
    // set the "toDate" start to not be later than "fromDate" ends:
    $('#end-date').datepicker('setStartDate', new Date($(this).val()));

    }); 

    $('.end-date').datepicker({  

       format: 'mm-dd-yyyy',
       startDate : start,
       endDate   : end

// update "fromDate" defaults whenever "toDate" changes
}).on('changeDate', function(){
    // set the "fromDate" end to not be later than "toDate" starts:
    $('#start-date').datepicker('setEndDate', new Date($(this).val()));

    });  
</script>
@stop