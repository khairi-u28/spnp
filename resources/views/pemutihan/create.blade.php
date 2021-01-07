
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12 mb-3">
            <a href="{{ url('pemutihan')}}" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Kembali</a>
        </div>
        <!-- Notifikasi -->
        <div class="col-md-12 mb-3">
            @if ($message = Session::get('fail'))
            <div class="alert alert-success alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{{ $message }}</strong>
            </div>
            @endif
        </div>
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Tambah Data Info Pemutihan</div>
                
                <div class="card-body">
                    <form method="POST" action="{{ url('pemutihan') }}" enctype="multipart/form-data">
                    @csrf
                    
                    <div class="form-group row">
                        <label for="judul_pemutihan" class="col-md-2 col-form-label text-md-right">Judul Konten</label>

                        <div class="col-md-6">
                                <input id="judul_pemutihan" type="text" class="form-control" name="judul_pemutihan" required autocomplete="judul_pemutihan" autofocus>                                
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="konten_pemutihan" class="col-md-2 col-form-label text-md-right">Isi Konten</label>
                            <div class="col-md-6">
                                <textarea class="form-control ckeditor" id="konten_pemutihan" name="konten_pemutihan" rows="5" required autocomplete="konten_pemutihan" autofocus></textarea>
                            </div>                            
                        </div>

                        <div class="form-group row">
                            <label for="foto_pemutihan" class="col-md-2 col-form-label text-md-right">Gambar</label>
                            <div class="col-md-5">
                                <input type="file" class="form-control-file" id="foto_pemutihan" name="foto_pemutihan" required autocomplete="foto_pemutihan" accept="image/png, image/jpeg, image/jpg">
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
        var UploadFieldID = "foto_pemutihan";
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