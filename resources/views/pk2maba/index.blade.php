<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Admin SPNP | Kelola Info Seputar PK2MABA</title>
    <link href="{{ asset('style/dist/css/styles.css') }}" rel="stylesheet" />
    <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
    <style>
        .setWidth {
            max-width: 15px;
        }

        .concat div {
            overflow: hidden;
            -ms-text-overflow: ellipsis;
            -o-text-overflow: ellipsis;
            text-overflow: ellipsis;
            white-space: nowrap;
            width: inherit;
        }
    </style>
</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <a class="navbar-brand" href="{{ asset('style/index.html') }}">SPNP</a>
        <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>
        <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
        </form>

        <!-- Navbar-->
        <ul class="navbar-nav ml-auto ml-md-0">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </li>
        </ul>
    </nav>

    <div id="layoutSidenav">
        <!-- Sidebar -->
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading">Dashboard Admin</div>
                        <a class="nav-link" href="{{ url('nilai')}}">
                            <div class="sb-nav-link-icon"><i class="fa fa-book"></i></div>
                            Nilai
                        </a>
                        <a class="nav-link" href="{{ url('pemutihan')}}">
                            <div class="sb-nav-link-icon"><i class="fas fa-lightbulb"></i></div>
                            Info Pemutihan
                        </a>
                        <a class="nav-link" href="{{ url('pk2maba') }}">
                            <div class="sb-nav-link-icon"><i class="fas fa-globe"></i></div>
                            Seputar PK2MABA
                        </a>
                    </div>
                </div>
            </nav>
        </div>

        <!-- Content -->
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid">
                    <h1 class="mt-4">Kelola Info PK2MABA</h1>
                    <div class="col-md-12 mb-3">
                        <a href="{{ url('pk2maba/create')}}" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah Data Info Seputar PK2MABA</a>
                    </div>

                    <!-- Notifikasi -->
                    <div class="col-md-12 mb-3">
                        @if ($message = Session::get('success'))
                        <div class="alert alert-success alert-block">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            <strong>{{ $message }}</strong>
                        </div>
                        @endif
                    </div>
                    
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-globe mr-1"></i>
                            Tabel Data Info Seputar PK2MABA
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-sm" id="dataTable" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th scope="col" width="15px" text-align="center">#</th>
                                            <th scope="col">Judul Konten</th>
                                            <th scope="col" width="350px">Isi Konten</th>
                                            <th scope="col">Gambar</th>
                                            <th scope="col">Timestamp</th>
                                            <th scope="col" width="80px">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $nomor = 1;
                                        ?>
                                        @foreach($pk2mabas as $pk2maba)
                                        <tr>
                                            <th scope="row" text-align="center">{{$nomor++}}</th>
                                            <td>{{$pk2maba->judul_pk2maba}}</td>
                                            <td class="setWidth concat">
                                                <div>
                                                    {{$pk2maba->konten_pk2maba}}
                                                </div>
                                            </td>
                                            <td>
                                                <a href="{{ asset('images_pk2maba/'. $pk2maba->foto_pk2maba) }}" target="_blank" rel="noopener noreferrer">Lihat Gambar</a>
                                            </td>
                                            <td>{{$pk2maba->created_at}}</td>
                                            <td>
                                                <form method="POST" action="{{ url('pk2maba')}}/{{$pk2maba->id_pk2maba}}" enctype="multipart/form-data">
                                                    <a href="{{ url('pk2maba')}}/{{$pk2maba->id_pk2maba}}/edit" class="btn btn-warning"><i class="fa fa-edit"></i></a>
                                                    {{ csrf_field() }}          
                                                    {{ method_field('DELETE') }}                                          
                                                    <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </main>

            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; Sistem Pencatatan Nilai PK2MABA 2020</div>
                    </div>
                </div>
            </footer>

        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="{{ asset('style/dist/js/scripts.js') }}"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
    <script src="{{ asset('style/dist/assets/demo/datatables-demo.js') }}"></script>
</body>

</html>