<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Admin SPNP | Kelola Nilai PK2MABA</title>
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
                    <h1 class="mt-4">Kelola Nilai PK2MABA</h1>
                    <a href="{{ url('nilai/create')}}" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah Data</a>
                    <a href="{{ url('nilai/export')}}" class="btn btn-info"><i class="fa fa-download"></i> Download Data</a>
                    <button class="btn btn-warning" data-toggle="modal" data-target="#exampleModalCenter"><i class="fa fa-file"></i> Import Data</button>
                    <div class="col-md-12 mb-3">
                        @if ($message = Session::get('success'))
                        <div class="alert alert-success alert-block mt-3">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            <strong>{{ $message }}</strong>
                        </div>
                        @endif
                        @if ($message = Session::get('fail'))
                        <div class="alert alert-danger alert-block mt-3">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            <strong>{{ $message }}</strong>
                        </div>
                        @endif
                    </div>
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-book mr-1"></i>
                            Tabel Data Nilai
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-sm" id="dataTable" cellspacing="0">
                                    <thead>                                        
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col" width="50px">NIM</th>
                                            <th scope="col">Nama</th>
                                            <th scope="col">Program Studi</th>
                                            <th scope="col" width="20px">Angkatan</th>
                                            <th scope="col" width="20px">Nilai PK2MABA</th>
                                            <th scope="col" width="20px">KKM PK2MABA</th>
                                            <th scope="col" width="20px">Status Kelulusan</th>
                                            <th scope="col" width="20px">Sertifikat</th>
                                            <th scope="col" width="80px">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $nomor = 1;
                                        ?>
                                        @foreach($nilais as $nilai)
                                        <tr>
                                            <td>{{$nomor++}}</td>
                                            <td>{{$nilai->nim}}</td>
                                            <td>{{$nilai->nama}}</td>
                                            <td>{{$nilai->prodi}}</td>
                                            <td>{{$nilai->angkatan}}</td>
                                            <td>{{$nilai->nilai_pk2maba}}</td>
                                            <td>{{$nilai->kkm_pk2maba}}</td>

                                            @if($nilai->status_kelulusan==="Lulus")
                                            <td class="text-success">{{$nilai->status_kelulusan}}</td>
                                            @else
                                            <td class="text-danger">{{$nilai->status_kelulusan}}</td>
                                            @endif

                                            @if($nilai->sertifikat===null || $nilai->status_kelulusan==="Tidak Lulus")
                                            <td>
                                                <a>Belum Tersedia</a>
                                            </td>
                                            @else
                                            <td>
                                                <a href="{{ asset('images_nilai/'. $nilai->sertifikat) }}" target="_blank" rel="noopener noreferrer">Lihat Sertifikat</a>
                                            </td>
                                            @endif
                                            <td>
                                                <form method="POST" action="{{ url('nilai')}}/{{$nilai->id_nilai}}" enctype="multipart/form-data">
                                                    <a href="{{ url('nilai')}}/{{$nilai->nim}}/edit" class="btn btn-warning"><i class="fa fa-edit"></i></a>
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

    <!-- Modal Import Excel -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Import Data Nilai</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="POST" action="{{ url('importExcel')}}" class="col my-2 mb-2" enctype="multipart/form-data">
                    <div class="modal-body">
                        @csrf
                        <div class="form-group row mb-3">
                            <div class="col-md-12">
                                <div class="alert alert-warning alert-block mt-3 text-center"><strong>⚠ IKUTI INSTRUKSI SEBELUM UPLOAD FILE ⚠</strong></div>
                                <table class="table table-borderless">
                                    <tr>
                                        <th class="align-top">1. </th>
                                        <td>Upload data dalam format .xlsx atau .xls</td>
                                    </tr>
                                    <tr>
                                        <th class="align-top">2. </th>
                                        <td>Data terdiri dari 4 baris dengan header yang berurutan (NIM, Nama, Program Studi, Angkatan, Nilai PK2MABA, KKM PK2MABA, Status Kelulusan)</td>
                                    </tr>
                                    <tr>
                                        <th class="align-top">3. </th>
                                        <td>Silahkan unduh File template excel data nilai dengan menekan tombol "Unduh Template" dibawah (Opsional)</td>
                                    </tr>
                                    <tr>
                                        <th class="align-top"></th>
                                        <td>
                                            <a href="{{ url('nilai/template')}}" class="btn btn-info"><i class="fa fa-file"></i> Unduh Template</a>
                                        </td>
                                    </tr>
                                </table>
                                <label for="nim" class="col-md-4 col-form-label text-md-left">Upload File</label>
                                <input id="excel" type="file" class="form-control" required autocomplete="excel" name="excel" autofocus accept="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" name="import" class="btn btn-primary">Upload</button>
                    </div>
                </form>
            </div>
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