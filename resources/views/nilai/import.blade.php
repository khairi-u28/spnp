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
                <div class="card-header">Import Data Nilai</div>

                <div class="card-body">
                    <form method="POST" action="{{ url('nilai') }}" enctype="multipart/form-data">
                        @csrf                        
                        <div class="form-group row">
                            <label for="import" class="col-md-2 col-form-label text-md-right">Upload File (.xlsx)</label>
                            <div class="col-md-5">
                                <input type="file" class="form-control-file @error('status_kelulusan') is-invalid @enderror" id="import" name="import" accept="application/pdf" autofocus>
                            </div>
                        </div>
                        
                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-2">
                                <button type="submit" class="btn btn-primary">
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