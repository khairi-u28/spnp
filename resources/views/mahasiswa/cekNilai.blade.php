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
        <!-- jumbotron -->
        <section class="jumbotron py-5 text-center bg-khairi">
            <div class="row py-lg-5">
                <div class="col-lg-6 col-md-8 mx-auto">
                    <h1 class="fw-light">CEK NILAI DAN UNDUH SERTIFIKAT PK2MABA KAMU DISINI!</h1>
                    <p class="lead text-muted">Masukkan NIM kamu pada kolom pencarian lalu klik 'Cek Nilai'</p>
                    <p>
                        <div class="col-md-12">
                            @if ($message = Session::get('fail'))
                            <div class="alert alert-danger alert-dismissible fade show">
                                <button type="button" class="close" data-dismiss="alert">×</button>
                                <strong>{{ $message }}</strong>
                            </div>
                            @endif
                        </div>
                        <form method="POST" action="{{ url('cariNilai')}}" class="form-inline my-2 mb-2">
                            @csrf
                            <input type="number" class="col-md-6 form-control mb-2 mr-2 ml-auto  @error('cariNim') is-invalid @enderror" id="cariNim" name="cariNim" placeholder="NIM" required>
                            @error('cariNim')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                            <button type="submit" class="btn btn-primary mb-2 mr-auto">Cek Nilai</button>
                        </form>
                    </p>
                </div>
            </div>
        </section>        

    </main>

    @include('includes.mhsFooter')    

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>


</body>

</html>