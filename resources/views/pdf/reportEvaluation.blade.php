<!DOCTYPE html>
<html lang="en">
  <head>
    <link rel="stylesheet" type="text/css" href="{{asset('../../css/customPdf.css')}}">
    <script src="{{ asset('../../bower_components/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('../../bower_components/jquery-ui/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('../../bower_components/pdf_print/pdfmake.min.js') }}"></script>
    <script src="{{ asset('../../bower_components/pdf_print/vfs_fonts.js') }}"></script>    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.2/jspdf.min.js"></script>
    <link href="{{ asset('../../bower_components/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('../../bower_components/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">  
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i&display=swap" rel="stylesheet">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
     <link rel="shortcut icon" href="{{ url('dist/img/ct_fav.png') }}">
    <title>Evaluation Report</title>
    <!-- Bootstrap core CSS -->
  
    <link href="../../css/bootstrap.min.css" rel="stylesheet" media="all" type="text/css">
    <link href="../../css/style.css" rel="stylesheet" media="all" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i&display=swap" rel="stylesheet">
</head>
<body>
<div id="content clickbind">
  <div class="header vendorListHeading">
       <div class="row">
        <div class="col-sm-12 text-center">
          <img src="{{ url('dist/img/logo.svg') }}" class="logo">
        </div>
       </div>
  </div>
  <section class="">
    <div class="container">
        <section class="">
            <div class="container">
              <div class="row">
                  <div class="col-sm-12">      
                    <div class="col-md-12 connectthat-body">
                      <div class="connectthat-form ">                     
                        <div class="row">
                            <div class="col-md-11">
                                <h5 class="title">title</h5>
                            </div>
                            <div class="col-md-1">
                                <h5>
                                    <!-- <button class="btn btn-primary vendorListHeading click" onclick="Gen(); return false;">Generate PDF</button> -->
                                </h5>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <table id="tbl" class="table table-striped table-hover" cellspacing="0" width="100%">
                                    <thead>
                                    <tr>                               
                                       <th>PC1</th>
                                       <th>PC2</th>
                                       <th>PC3</th>
                                       <th>PC4</th>
                                       <th>PC5</th>
                                       <th>MK1</th>
                                       <th>MK2</th>
                                       <th>MK3</th>
                                       <th>SBP1</th>
                                       <th>SBP2</th>
                                       <th>SBP3</th>
                                       <th>PBLI1</th>
                                       <th>PBLI2</th>
                                       <th>PROF1</th>
                                       <th>PROF2</th>
                                       <th>PROF3</th>
                                       <th>PROF4</th>
                                       <th>ICS1</th>
                                       <th>ICS2</th>
                                       <th>ICS3</th>
                                       <th>Created On</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                          @foreach($avr_count as $count)
                                       
                                            <tr>                                       
                                                <td>{{$count['PC1']}}</td>
                                                <td>{{$count['PC2']}}</td>
                                                <td>{{$count['PC3']}}</td>
                                                <td>{{$count['PC4']}}</td>
                                                <td>{{$count['PC5']}}</td>
                                                <td>{{$count['MK1']}}</td>
                                                <td>{{$count['MK2']}}</td>
                                                <td>{{$count['MK3']}}</td>
                                                <td>{{$count['SBP1']}}</td>
                                                <td>{{$count['SBP2']}}</td>
                                                <td>{{$count['SBP3']}}</td>
                                                <td>{{$count['PBLI1']}}</td>
                                                <td>{{$count['PBLI2']}}</td>
                                                <td>{{$count['PROF1']}}</td>
                                                <td>{{$count['PROF2']}}</td>
                                                <td>{{$count['PROF3']}}</td>
                                                <td>{{$count['PROF4']}}</td>
                                                <td>{{$count['ICS1']}}</td>
                                                <td>{{$count['ICS2']}}</td>
                                                <td>{{$count['ICS3']}}</td>
                                                <td>{{$count['created_at']}}</td>
                                            </tr>
                                         @endforeach
                                       
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
  </section>  
</div>

</body>
 <script type="text/javascript">
      $( window ).on( "load", function() { Gen(); });
      function Gen() {
          var pdf = new jsPDF('p', 'mm', 'a4');
          pdf.canvas.height = 595.28;
          pdf.canvas.width = 841.89;

          // pdf.fromHTML(document.body);
          pdf.addHTML(document.body, function() {
            pdf.save('test.pdf');
        });
      }    
</script> 

</html>

