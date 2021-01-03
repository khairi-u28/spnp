@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12 mb-3">
            <a href="{{ url('nilai')}}" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Kembali</a>
        </div>
        <div class="col-md-12">
            @if ($message = Session::get('fail'))
            <div class="alert alert-danger alert-dismissible fade show">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{{ $message }}</strong>
            </div>
            @endif
            <div class="card">
                <div class="card-header">Tambah Data Nilai</div>

                <div class="card-body">
                    <form method="POST" action="{{ url('nilai') }}" enctype="multipart/form-data">
                        @csrf                        
                        <div class="form-group row">
                            <label for="nim" class="col-md-2 col-form-label text-md-right">NIM</label>
                            <div class="col-md-6">
                                <input id="nim" type="text" class="form-control" required autocomplete="nim" name="nim" autofocus minlength="15">
                                
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="nama" class="col-md-2 col-form-label text-md-right">Nama</label>
                            <div class="col-md-6">
                                <input id="nama" type="text" class="form-control" required autocomplete="nama" name="nama" autofocus>                                
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="prodi" class="col-md-2 col-form-label text-md-right">Program Studi</label>
                            <div class="col-md-6">
                                <select id="prodi" name="prodi" class="form-select" required autocomplete="prodi" aria-label="Default select example" autofocus>
                                    <option selected>-</option>
                                    <option value="Teknik Informatika">Teknik Informatika</option>
                                    <option value="Teknik Komputer">Teknik Komputer</option>
                                    <option value="Sistem Informasi">Sistem Informasi</option>
                                    <option value="Pendidikan Teknologi Informasi">Pendidikan Teknologi Informasi</option>
                                    <option value="Teknologi Informasi">Teknologi Informasi</option>
                                </select>
                            </div>                            
                        </div>
                        <div class="form-group row">
                            <label for="nama" class="col-md-2 col-form-label text-md-right">Angkatan</label>
                            <div class="col-md-6">
                                <input id="angkatan" type="number" class="form-control" required autocomplete="angkatan" name="angkatan" autofocus>                                
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="nilai_pk2maba" class="col-md-2 col-form-label text-md-right">Nilai PK2MABA</label>
                            <div class="col-md-6">
                                <input id="nilai_pk2maba" type="number" class="form-control" required autocomplete="nilai_pk2maba" name="nilai_pk2maba" autofocus>                                
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="kkm_pk2maba" class="col-md-2 col-form-label text-md-right">KKM PK2MABA</label>
                            <div class="col-md-6">
                                <input id="kkm_pk2maba" type="number" class="form-control" required autocomplete="kkm_pk2maba" name="kkm_pk2maba" autofocus>                                
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="status_kelulusan" class="col-md-2 col-form-label text-md-right">Status Kelulusan</label>
                            <div class="col-md-6">
                                <select id="status_kelulusan" name="status_kelulusan" class="form-select" required autocomplete="status_kelulusan" aria-label="Default select example" autofocus accept="application/pdf">
                                    <option selected>-</option>
                                    <option value="Lulus">Lulus</option>
                                    <option value="Tidak Lulus">Tidak Lulus</option>
                                </select>
                            </div>                            
                        </div>
                        <div class="form-group row">
                            <label for="sertifikat" class="col-md-2 col-form-label text-md-right">Sertifikat</label>
                            <div class="col-md-5">
                                <input type="file" class="form-control-file" id="sertifikat" name="sertifikat" accept="application/pdf" autofocus>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-2">
                                <button type="submit" onclick="return VerifyUploadSizeIsOK()" class="btn btn-primary">
                                    Simpan
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    function VerifyUploadSizeIsOK() {
        /* Attached file size check. Will Bontrager Software LLC, https://www.willmaster.com */
        // Notes : 1048576 = 1 MB
        var UploadFieldID = "sertifikat";
        var MaxSizeInBytes = 2097152;
        var fld = document.getElementById(UploadFieldID);
        if (fld.files && fld.files.length == 1 && fld.files[0].size > MaxSizeInBytes) {
            alert("Ukuran File Maksimal " + parseInt(MaxSizeInBytes / 1024 / 1024) + "MB");
            return false;
        }
        return true;
    }
</script>
@endsection