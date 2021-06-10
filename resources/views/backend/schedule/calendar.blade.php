@extends('backend.layouts.app')

@section('content')
<div>

     <!-- Content Header (Page header) -->
     <div class="col-sm-12">
        <section class="content-header">   
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-calendar"></i>Shift Schedule</a></li>
                <li class="active">Schedule  List</li>
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


        <iframe src="https://calendar.google.com/calendar/embed?src=haa682mpcv5k9a12f556034ukc%40group.calendar.google.com&ctz=Asia%2FKolkata" style="border: 0" width="800" height="600" frameborder="0" scrolling="no"></iframe>

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