<html lang="in" >
<head><html lang="in" >
<head>
        <title>{{ config('app.name', 'Laravel') }}</title> 

        <link rel="shortcut icon" href="{{ asset('save_picture/klinik-kosasih-logo.png') }}">

        <meta charset="utf-8">

        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <meta http-equiv="x-ua-compatible" content="ie=edge">
 
        <link href="{{ asset('css/bootstrap4.min.css') }}" rel="stylesheet">
 
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.0/css/font-awesome.min.css">
 
        <link href="{{ asset('css/mdb.min.css') }}" rel="stylesheet">
        
        <link rel="stylesheet" href="{{ asset('datatables/dataTables.bootstrap.css') }}">

        <link rel="stylesheet" href="{{ asset('jquery-ui/jquery-ui.css') }}">

        <link rel="stylesheet" href="{{ asset('chosen/chosen.css') }}">

        <link rel="stylesheet" href="{{ asset('pos.css') }}">
        
        <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Quicksand" />

        <script type="text/javascript" src="{{ asset('js/jquery-2.2.3.min.js') }}"></script>   

        <script src="{{ asset('my.js') }}"></script>

        <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>

        <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap4.min.js"></script>

        <script type="text/javascript" src="{{ asset('jquery.ui.timepicker.js?v=0.3.3') }}"></script>
        
        <script src="{{ asset('chosen/chosen.jquery.js') }}"></script>

        <script src="{{ asset('jquery-ui/jquery-ui.js') }}"></script>

        <script src="{{ asset('bootstrap-master/dist/bootstrap-wysihtml5-0.0.2.js') }}"></script>

        <script src="{{ asset('bootstrap-master/lib/js/wysihtml5-0.3.0.js') }}"></script>

        <script src="{{ asset('bootstrap-master/src/bootstrap3-wysihtml5.js') }}"></script>

        <link rel="stylesheet" href="{{ asset('bootstrap-master/src/bootstrap-wysihtml5.css') }}" >

        <link rel="stylesheet" href="{{ asset('bootstrap-master/lib/css/bootstrap3-wysiwyg5.css') }}" >

        <link rel="stylesheet" href="{{ asset('bootstrap-master/dist/bootstrap-wysihtml5-0.0.2.css') }}" >

</head>
<body class="hidden-sn blue-skin" >
    <link rel="stylesheet" href="{{ asset('login.css') }}">
    <script src="{{ asset('login.js') }}"></script>
    <div class="container">
     <div class="row" id="pwd-container">
      <div class="col-md-4"></div>
       <div class="col-md-4">
        <section class="login-form"> 
                    <form class="form-horizontal" role="login" method="POST" action="{{ url('/login') }}">
                        {{ csrf_field() }}
          <img src="save_picture/Lowongan Kerja Lampung  Terbaru di PT. Andaglos Teknologi.png" style="height: 30%; width: 90%" class="img-responsive" alt="" />
           <h3><center> SILAKAN MASUK </center></h3>


             <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                 <input type="text" id="name" name="name" placeholder="Username" autocomplete="off" required class="form-control input-lg"  value="{{ old('name') }}" required autofocus > 
                 @if ($errors->has('name'))
                    <span class="help-block">
                        <strong style="color: red">{{ $errors->first('name') }}</strong>
                    </span>
                @endif
             </div>
              
             <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}"> 
                  <input type="password" name="password" class="form-control input-lg" id="password" placeholder="Password" required="" >
                  @if ($errors->has('password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                  @endif
             </div>
              
              
              
              <button type="submit" name="go" style="background-color: #0d47a1" class="btn btn-lg btn-block">Login</button>
                        
            </form>
            
            <div class="form-links">
              <a href="https://www.andaglos.com" target="blank"> ©Copyright 2016 |  PT.Andaglos Global Teknologi.</a>
            </div>
          </section>  
          </div>
          
          <div class="col-md-4"></div>
          

      </div>
       
      
      
    </div>
    <!-- Tooltips -->
    <script type="text/javascript" src="{{ asset('js/tether.min.js') }}"></script>

    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="{{ asset('js/bootstrap4.min.js') }}"></script>

    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="{{ asset('js/mdb.min.js') }}"></script>
</body>

</html>