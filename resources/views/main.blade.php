<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>SPNP | Data Siswa</title>
    <link href="{{ asset('style/dist/css/styles.css') }}" rel="stylesheet" />
    <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
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
                        <a class="nav-link" href="{{ url('main')}}">
                            <div class="sb-nav-link-icon"><i class="fa fa-book"></i></div>
                            Nilai
                        </a>
                        <a class="nav-link" href="{{ asset('style/dist/index.html') }}">
                            <div class="sb-nav-link-icon"><i class="fas fa-lightbulb"></i></div>
                            Info Pemutihan
                        </a>
                        <a class="nav-link" href="{{ asset('style/dist/index.html') }}">
                            <div class="sb-nav-link-icon"><i class="fas fa-group"></i></div>
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
                    <h1 class="mt-4">Kelola Data Siswa</h1>
                    <div class="col-md-12 mb-3">
                        <a href="{{ url('siswa/create')}}" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah Data Siswa</a>
                    </div>
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-book mr-1"></i>
                            Tabel Data Siswa
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-sm" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th scope="col" width="15px" text-align="center">#</th>
                                            <th scope="col">Nama</th>
                                            <th scope="col" width="150px">NIM</th>
                                            <th scope="col" width="160px">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $nomor = 1;
                                        ?>
                                        @foreach($siswas as $siswa)
                                        <tr>
                                            <th scope="row" text-align="center">{{$nomor++}}</th>
                                            <td>{{$siswa->nama}}</td>
                                            <td>{{$siswa->nim}}</td>
                                            <td>
                                                <form method="POST" action="{{ url('siswa')}}/{{$siswa->id}}">
                                                    <a href="{{ url('siswa')}}/{{$siswa->id}}/edit" class="btn btn-warning"><i class="fa fa-edit"></i> Edit</a>
                                                    {{ csrf_field() }}
                                                    {{ method_field('DELETE') }}
                                                    <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i> Delete</button>
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