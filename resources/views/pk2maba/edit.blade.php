@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12 mb-3">
            <a href="{{ url('pk2maba')}}" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Kembali</a>
        </div>
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Edit Data Info Seputar PK2MABA</div>

                <div class="card-body">
                    <form method="POST" action="{{ url('pk2maba') }}/{{ $pk2maba->id_pk2maba }}" enctype="multipart/form-data">
                        <!-- <form method="POST" action="{{ url('pk2maba')}}" enctype="multipart/form-data"> -->
                        @csrf
                        <!-- <input type="hidden" name="_method" value="PUT"> -->

                        <div class="form-group row">
                            <label for="judul_pk2maba" class="col-md-2 col-form-label text-md-right">Judul Konten</label>

                            <div class="col-md-6">
                                <input id="judul_pk2maba" type="text" class="form-control @error('judul_pk2maba') is-invalid @enderror" name="judul_pk2maba" value="{{ $pk2maba->judul_pk2maba }}" required autocomplete="judul_pk2maba" autofocus>

                                @error('judul_pk2maba')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="konten_pk2maba" class="col-md-2 col-form-label text-md-right">Isi Konten</label>
                            <div class="col-md-6">
                                <textarea class="form-control" id="konten_pk2maba" name="konten_pk2maba" rows="5" value="{{ $pk2maba->konten_pk2maba }}" required autocomplete="current-konten_pk2maba">{{ $pk2maba->konten_pk2maba }}</textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="foto_pk2maba" class="col-md-2 col-form-label text-md-right">Gambar</label>
                            <div class="col-md-5">
                                <input type="file" class="form-control-file" id="foto_pk2maba" name="foto_pk2maba">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="foto_pk2maba" class="col-md-2 col-form-label text-md-right"></label>
                            <div class="col-md-5">
                                <img src="{{ asset('images_pk2maba/'. $pk2maba->foto_pk2maba) }}" alt="" width="70%">
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