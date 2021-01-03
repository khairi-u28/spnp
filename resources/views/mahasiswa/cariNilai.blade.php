<!doctype html>
<html lang="en">

<head>
    @include('includes.mhsHead')

    <title>SPNP | Cek Nilai</title>
</head>

<body>
    <!-- Navbar -->
    @include('includes.mhsHeader')

    <main>
        <!-- Content -->
        <div id="SectionName" class="album py-5 bg-white">
            <div class="container">
                <h2 class="text-biru">Rekap Nilai PK2MABA</h2>
                <div class="row">
                    <div class="col-md-12 mt-3">
                        <table class="table" style="font-size: 15px">
                            <thead class="text-muted">
                                <tr>
                                    <th scope="col" width="130px">NIM</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col" width="200px">Program Studi</th>
                                    <th scope="col" width="20px">Angkatan</th>
                                    <th scope="col" width="20px">Nilai PK2MABA</th>
                                    <th scope="col" width="20px">KKM PK2MABA</th>
                                    <th scope="col" width="20px">Status Kelulusan</th>
                                    <th scope="col" width="20px">Sertifikat</th>
                                </tr>
                            </thead>
                            <tbody>
                                <td>{{$nilai->nim}}</td>
                                <td>{{$nilai->nama}}</td>
                                <td>{{$nilai->prodi}}</td>
                                <td>{{$nilai->angkatan}}</td>
                                <td>{{$nilai->nilai_pk2maba}}</td>
                                <td>{{$nilai->kkm_pk2maba}}</td>
                                <td>{{$nilai->status_kelulusan}}</td>
                                @if($nilai->sertifikat===null || $nilai->status_kelulusan==="Tidak Lulus")
                                <td>
                                    <a>Belum Tersedia</a>
                                </td>
                                @else
                                <td>
                                    <!-- <a href="{{ asset('images_nilai/'. $nilai->sertifikat) }}" target="_blank" rel="noopener noreferrer">Lihat Sertifikat</a> -->
                                    <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">Lihat Sertifikat</button>
                                </td>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </main>

    <!-- MODAL -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Verifikasi Akun SIAM</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ url('ceksiam')}}" class="col my-2 mb-2">
                        @csrf
                        <div class="form-group row mb-3">
                            <div class="col-md-12">
                                <p class="text-muted">Silahkan masukkan NIM & Password sesuai dengan akun SIAM</p>
                                <label for="nim" class="col-md-4 col-form-label text-md-left">NIM</label>
                                <input id="nim" type="text" class="form-control @error('nim') is-invalid @enderror" required autocomplete="nim" name="nim" autofocus value="{{$nilai->nim}}" readonly>
                                @error('nim')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12">
                                <label for="password" class="col-md-4 col-form-label text-left">Password</label>
                                <input id="password" type="password" class="form-control" required name="password" autofocus>
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Login</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @include('includes.mhsFooter')

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>


</body>

</html>