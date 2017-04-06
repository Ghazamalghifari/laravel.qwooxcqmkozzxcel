<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }}</title>

        <link rel="shortcut icon" href="{{ asset('save_picture/klinik-kosasih-logo.png') }}">

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


        <link rel="stylesheet" href="{{ asset('css/selectize.bootstrap3.css') }}">

        <link rel="stylesheet" href="{{ asset('css/selectize.css') }}">

        <script src="{{ asset('js/selectize.js') }}"></script>

        <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>

        <script>
            window.Laravel = <?php echo json_encode([
                'csrfToken' => csrf_token(),
            ]); ?>
        </script>    
</head>

<body class="hidden-sn blue-skin" style="padding-top: 7%">




    <div id="modal_logout" class="modal fade" role="dialog">
      <div class="modal-dialog">



        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title" style="color: black">Konfirmasi LogOut</h4>
          </div>

          <div class="modal-body">
              <h3 style="color: black">Apakah Anda Yakin Ingin Keluar ?</h3>
          </div>

          <div class="modal-footer">
            <a href="{{ url('/logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();" class="btn btn-warning"><i class="fa  fa-check "></i> Ya </a>

            <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
            </form>

            <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa  fa-close "></i>Batal</button>

          </div>
        </div>
      </div>
    </div>



  

    <!--Double navigation-->
    <header>

        <!-- Sidebar navigation -->
        <ul id="slide-out" class="side-nav custom-scrollbar">

            <!-- Logo -->
            <li>
                <div class="logo-wrapper waves-light">
                    <a href="http://www.andaglos.com"><img src="{{ asset('save_picture/andaglos_logo.png') }}" class="img-fluid flex-center"></a>
                </div>
            </li>
            <!--/. Logo -->

            <!--Social-->
            <li>
                <ul class="social">
                    <li><a class="icons-sm fb-ic" href="https://www.facebook.com/andaglos/?fref=ts"><i class="fa fa-facebook"> </i></a></li>
                    <li><a class="icons-sm gplus-ic" href="#"><i class="fa fa-google-plus"> </i></a></li>
                </ul>
            </li>
            <!--/Social-->

          
            <!-- Side navigation links -->
            <li>
                <ul class="collapsible collapsible-accordion">
                    @if (Auth::check()) 
                    <li><a href="{{ url('\home') }}" class="waves-effect"> <i class="fa fa-home"></i> Beranda </a></li>
                    <li>
                        <a class="collapsible-header waves-effect arrow-r">
                            <i class="fa fa-server"></i> Master Data <i class="fa fa-angle-down rotate-icon"></i>
                        </a>

                        <div class="collapsible-body">
                            <ul>
                                <li><a href="{{ route('biaya_admin.index') }}" class="waves-effect">Biaya Admin</a>
                                <li><a href="{{ route('poli.index') }}" class="waves-effect">Poli</a>
                                <li><a href="{{ route('kelas_kamar.index') }}" class="waves-effect">Kelas Kamar</a>
                                <li><a href="{{ route('jabatan.index') }}" class="waves-effect">Jabatan</a>
                                <li><a href="{{ route('kamar.index') }}" class="waves-effect">Kamar</a>
                                <li><a href="{{ route('kategori.index') }}" class="waves-effect">Kategori</a>
                                <li><a href="{{ route('satuan.index') }}" class="waves-effect">Satuan</a>
                                <li><a href="{{ route('gudang.index') }}" class="waves-effect">Gudang</a>
                                <li><a href="{{ route('cito.index') }}" class="waves-effect">Cito</a>
                                <li><a href="{{ route('jenis_obat.index') }}" class="waves-effect">Jenis Obat</a>
                                <li><a href="{{ route('perujuk.index') }}" class="waves-effect">Perujuk</a>
                            </ul>
                        </div>
                    </li> 
                    <li><a href="https://www.andaglos.com" class="waves-effect"> <i class="fa fa-envelope"></i> Contact Us </a></li>

                    @endif
                </ul>
            </li>
            <!--/. Side navigation links -->
        </ul>
        <!-- Sidebar navigation -->


        <!--Navbar-->
    <div id="app">
        <nav class="navbar navbar-fixed-top scrolling-navbar double-nav">

            <!-- SideNav slide-out button -->
            <div class="pull-left">
                <a href="#" data-activates="slide-out" class="button-collapse"><i class="fa fa-bars"></i></a>
            </div>

            <div class="breadcrumb-dn">
                <p style="font-size: 100%">{{ config('app.name') }}</p>
            </div>

            <ul class="nav navbar-nav pull-right">
        
                <li class="nav-item">
                    <a class="nav-link" href="form_ubah_password.php">Ubah Password</a>
                </li>

                <li class="nav-item ">
                    <a href="https://www.andaglos.com" class="nav-link"><i class="fa fa-envelope"></i> <span class="hidden-sm-down">Contact Us</span></a>
                </li>

                <li class="nav-item ">
                    <a class="nav-link">
                        <i class="fa fa-user"></i> 
                        <span class="hidden-sm-down">{{ Auth::user()->name }}</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" id="loguot">
                        <i class="fa  fa-sign-out" data-toggle="modal" ></i> <span class="hidden-sm-down">LogOut</span>
                    </a>
                </li>    
            </ul>
        </nav>
        @include('layouts._flash')
        @yield('content')
        </div>
        <!--/.Navbar-->
    </header>
    <!--/Double navigation--> 

    <!-- SCRIPTS -->
    <!-- Tooltips --> 
    <script type="text/javascript" src="{{ asset('js/tether.min.js') }}"></script>

    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="{{ asset('js/bootstrap4.min.js') }}"></script>

    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="{{ asset('js/mdb.min.js') }}"></script>

<script src="{{ asset('js/custom.js') }}"></script>
    <script>
         // SideNav init
        $(".button-collapse").sideNav();

        // Custom scrollbar init
        var el = document.querySelector('.custom-scrollbar');
        Ps.initialize(el);
    </script>


    <script type="text/javascript">

  
        $("#loguot").click(function(){

        $("#modal_logout").modal('show');
        

        
        });

    </script> 
    <script type="text/javascript">
        $(document).ready(function() {
    $('#example').DataTable( {
        "scrollX": true
    } );
} );
    </script>

@yield('scripts')
</body>
</html>