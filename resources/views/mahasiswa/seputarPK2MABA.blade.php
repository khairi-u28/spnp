<!doctype html>
<html lang="en">

<head>
    @include('includes.mhsHead')    
    <title>SPNP | Seputar PK2MABA</title>

</head>

<body>
    <!-- Navbar -->
    @include('includes.mhsHeader')

    <main>

        <!-- jumbotron -->
        <section class="jumbotron py-5 text-center bg-khairi">
            <div class="row py-lg-5">
                <div class="col-lg-10 col-md-5 mx-auto">
                    <div class="row featurette">
                        <div class="col-md-7 order-md-2 text-left my-auto">
                            <h6 class="text-biru"><strong>SEPUTAR PK2MABA</strong></h6>
                            <h1 class="featurette-heading">Pengenalan Kehidupan Kampus Bagi Mahasiswa Baru</h2>
                                <h6 class="lead"><span class="text-muted">PK2MABA merupakan proses orientasi bagi mahasiswa baru Fakultas Ilmu Komputer Universitas Brawijaya.</span></h6>
                                <a class="btn btn-outline-secondary" href="">Selengkapnya</a>
                                <hr>
                                <p><span class="text-muted">Cek informasi-informasi mengenai PK2MABA lainnya dengan <i>scroll down</i> halaman ini.</span></p>
                        </div>
                        <div class="col-md-5 order-md-1 mb-3">
                            <svg class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" width="500" height="500" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 500x500" preserveAspectRatio="xMidYMid slice" focusable="false">
                                <title>Placeholder</title>
                                <rect width="100%" height="100%" fill="#eee" />
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Content -->
        <div class="album py-5 bg-white">
            <div class="container">
                <hr class="featurette-divider">
                <div class="row">
                    <div class="col-md-12 mt-3">
                        @foreach($pk2mabas as $pk2maba)
                        <div class="row featurette">
                            <div class="col-md-7 order-md-2">
                                <a class="featurette-heading h2 text-capitalize" href="{{ url('seputarpk2maba')}}/{{$pk2maba->id_pk2maba}}/detail">{{$pk2maba->judul_pk2maba}}</a>
                                <h6 class="lead"><span class="text-muted">Posted on {{$pk2maba->created_at}}</span></p>
                            </div>
                            <div class="col-md-5 order-md-1 mb-3">
                                <svg class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" width="500" height="250" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 500x500" preserveAspectRatio="xMidYMid slice" focusable="false">
                                    <title>Placeholder</title>
                                    <rect width="100%" height="100%" fill="#eee" />
                                </svg>

                            </div>
                        </div>
                        <hr class="featurette-divider">
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

    </main>

    @include('includes.mhsFooter')


    <!-- <script src="../assets/dist/js/bootstrap.bundle.min.js"></script> -->
    <!-- <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script> -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>


</body>

</html>