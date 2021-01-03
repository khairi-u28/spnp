    <div class="collapse bg-khairi" id="navbarHeader">
        <div class="container">
            <div class="row">
                <div class="col-sm-8 col-md-7 py-4">
                    <h4 class="text-biru"><strong>Tentang SPNP</strong></h4>
                    <p class="text-biru">SPNP merupakan kepanjangan dari Sistem Pencatatan Nilai PK2MABA. SPNP merupakan aplikasi berbasis <i>Web</i> yang menyediakan layanan untuk menyimpan data penilaian PK2MABA berikut dengan dokumen bukti kelulusannya.</p>
                </div>
                <!-- <div class="col-sm-4 offset-md-1 py-4 text-right">
                    <h4 class="text-biru"><i class="fa fa-book"></i><strong>Hi, Khairi Ubaidah</strong></h4>
                    <ul class="list-unstyled">
                        <li><a href="#" class="text-biru">Log Out</a></li>
                    </ul>
                </div> -->
            </div>
        </div>
    </div>
    <div class="navbar navbar-dark bg-white shadow-sm">
        <div class="container">
            <a href="{{ url('/')}}" class="navbar-brand d-flex align-items-center">
                <strong class="text-biru">SISTEM PENCATATAN NILAI PK2MABA</strong>
            </a>
            <div class="nav-scroller py-1 mb-2">
                <nav class="nav d-flex justify-content-between">
                    <a class="p-2 text-muted" href="{{ url('ceknilai')}}">Cek Nilai</a>
                    <a class="p-2 text-muted" href="{{ url('infopemutihan')}}">Info Pemutihan</a>
                    <a class="p-2 text-muted" href="{{ url('seputarpk2maba')}}">Seputar PK2MABA</a>
                </nav>
            </div>
            <button class="navbar-toggler bg-biru" type="button" data-toggle="collapse" data-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
    </div>