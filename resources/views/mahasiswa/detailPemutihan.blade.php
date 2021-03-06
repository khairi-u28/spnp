<!doctype html>
<html lang="en">

<head>
    @include('includes.mhsHead')
    <title>SPNP | Seputar PK2MABA</title>
</head>

<body class="bg-khairi">
    <!-- Navbar -->
    @include('includes.mhsHeader')

    <main>
        <div class="row mt-3">
            <div class="col-md-8 mx-auto">
                <div class="card">
                    <div class="card-header">
                        <a class="btn btn-primary mr-3" href="{{ url('infopemutihan')}}">Kembali</a>
                        Info Pemutihan
                    </div>
                    <div class="card-body">
                        <h3 class="card-title text-biru mx-5">{{$pemutihan->judul_pemutihan}}</h3>
                        <h6 class="card-subtitle mx-5 mb-2 text-muted">Posted on {{$pemutihan->created_at}}</h6>
                        <img class="card-img-top gambar mx-auto d-block" src="{{ asset('images_pemutihan/'. $pemutihan->foto_pemutihan) }}" alt="" width="80%">
                        <div class="row">
                            <div class="col mx-5 mb-8">
                                <p class="card-text">{!!$pemutihan->konten_pemutihan!!}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </main>

    @include('includes.mhsFooter')
    
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>

</body>

</html>