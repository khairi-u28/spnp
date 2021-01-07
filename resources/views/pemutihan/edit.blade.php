@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12 mb-3">
            <a href="{{ url('pemutihan')}}" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Kembali</a>
        </div>
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Edit Data Info Pemutihan</div>

                <div class="card-body">
                    <form method="POST" action="{{ url('pemutihan') }}/{{ $pemutihan->id_infoPemutihan }}" enctype="multipart/form-data">
                        <!-- <form method="POST" action="{{ url('pemutihan')}}" enctype="multipart/form-data"> -->
                        @csrf
                        <!-- <input type="hidden" name="_method" value="PUT"> -->

                        <div class="form-group row">
                            <label for="judul_pemutihan" class="col-md-2 col-form-label text-md-right">Judul Konten</label>

                            <div class="col-md-6">
                                <input id="judul_pemutihan" type="text" class="form-control @error('judul_pemutihan') is-invalid @enderror" name="judul_pemutihan" value="{{ $pemutihan->judul_pemutihan }}" required autocomplete="judul_pemutihan" autofocus>

                                @error('judul_pemutihan')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="konten_pemutihan" class="col-md-2 col-form-label text-md-right">Isi Konten</label>
                            <div class="col-md-6">
                                <textarea class="ckeditor form-control" id="konten_pemutihan" name="konten_pemutihan" rows="5" value="{{ $pemutihan->konten_pemutihan }}" required autocomplete="current-konten_pemutihan">{{ $pemutihan->konten_pemutihan }}</textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="foto_pemutihan" class="col-md-2 col-form-label text-md-right">Gambar</label>
                            <div class="col-md-5">
                                <input type="file" class="form-control-file" id="foto_pemutihan" name="foto_pemutihan">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="foto_pemutihan" class="col-md-2 col-form-label text-md-right"></label>
                            <div class="col-md-5">
                                <img src="{{ asset('images_pemutihan/'. $pemutihan->foto_pemutihan) }}" alt="" width="70%">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-2">
                                <button type="submit" class="btn btn-primary">
                                    Perbarui
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection