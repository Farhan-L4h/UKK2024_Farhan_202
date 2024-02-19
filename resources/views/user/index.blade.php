<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>

    @include ('layouts.link')
</head>

<body>
    <!-- Navbar -->

    @include('layouts.navbar-user')

    <!-- Banner -->
    <div id="banner" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active" data-bs-interval="10000">
                <img src="{{asset ('banner/banner1.jpg')}}" class="d-block w-100" alt="...">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#banner" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#banner" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>


    <!-- content -->
    <div class="container">
        <div class="row justify-content-center">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary col-sm-2 m-3" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Verivikasi
            </button>

            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Pengumuman</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            Verivikasi Anda ({{Auth::user()-> name}}) Sebagai Pelanggan
                        </div>
                        <div class="modal-footer">
                            <a href="{{route ('user.verti', $users)}}"><button type="button" class="btn btn-primary">OKE</button></a>
                        </div>
                    </div>
                </div>
            </div>


            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary col-sm-2 m-3" data-bs-toggle="modal" data-bs-target="#modal2">
                Penjualan Anda
            </button>

            <!-- Modal -->
            <div class="modal fade" id="modal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-xl modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Tabel Orderan Anda</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <table class="table table-striped table-hover">
                                <thead>
                                    <tr class="text-center">
                                        <th scope="col">#</th>
                                        <th scope="col">NAMA PELANGGAN</th>
                                        <th scope="col">TIPE PEMBAYARAN</th>
                                        <th scope="col">NAMA OBAT</th>
                                        <th scope="col">NAMA KASIR</th>
                                        <th scope="col">TANGGAL</th>
                                        <th scope="col">JUMLAH</th>
                                        <th scope="col">TOTAL</th>
                                        <th scope="col">AKSI</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($penjualans as $penjualan)
                                    <tr class="text-center">
                                        <th>{{$penjualan -> id }}</th>
                                        <th>{{$penjualan -> pelanggan -> username }}</th>
                                        <td>{{$penjualan -> pembayaran -> nama_pembayaran}}</td>
                                        <td>{{$penjualan -> obat -> nama_obat}}</td>
                                        <td>{{$penjualan -> user -> name}}</td>
                                        <td>{{$penjualan -> tanggal }}</td>
                                        <td>{{$penjualan -> jumlah }}</td>
                                        <td>{{$penjualan -> total }}</td>
                                        <td>
                                            <div>
                                                <a href="{{route ('admin.penjualan.delete', $penjualan -> id)}}" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                                                <a href="{{route ('admin.penjualan.struck', $penjualan -> id)}}" class="btn btn-success"><i class="fa fa-print"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                    @empty
                                    <div class="alert alert-danger">
                                        Data Belum Tersedia.
                                    </div>
                                    @endforelse
                                </tbody>
                                {{ $penjualans->links('pagination::bootstrap-4') }}
                            </table>
                        </div>
                        <div class="modal-footer">
                            <a href=""><button type="cancel" class="btn btn-primary">OKE</button></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>



        <div class="card p-3 my-5 d-flex justify-content-center shadow" style="border-style: none;">


            <div class="text">
                <h3 class="text-center">OBAT TERSEDIA</h3>
            </div>

            <!-- tabel -->
            <div class="d-flex justify-content-center flex-wrap">

                <!-- card -->

                @forelse($obats as $obat)
                <div class="kartu card m-2" style="width: 18rem;">
                    <img src="{{asset ('storage/obat/'. $obat-> image)}}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">{{$obat -> nama_obat}}</h5>
                        <hr>
                        <p class="card-text">{{$obat -> keterangan}}</p>
                        <hr>
                        <div class="d-flex justify-content-center">
                            <button class="btn btn-sm btn-success ms-1">STOCK : {{$obat -> stock}}</button>
                            <button class="btn btn-sm btn-primary ms-1">EXP : {{$obat -> exp}}</button>
                        </div>
                        <hr>
                        <div class="d-flex justify-content-center">
                            <!-- <a href="#" class="btn btn-success">BELI</a> -->
                        </div>
                    </div>
                </div>
                @empty
                <div class="alert alert-danger">
                    Data Belum Tersedia.
                </div>
                @endforelse

                <!-- style card -->
                <style>
                    .menu {
                        flex-direction: row;
                        flex-wrap: wrap;
                    }

                    .card {
                        box-shadow: lightgray;
                    }

                    .kartu {
                        transition: box-shadow 0.5s ease-in-out, transform 0.5s ease-in-out;
                        border-style: none;
                    }

                    .kartu:hover {
                        box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
                        transform: scale(1.05);
                        transition: box-shadow 0.3s ease, transform 0.3s ease;
                    }

                    * {
                        scroll-behavior: smooth;
                        font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
                    }
                </style>

            </div>

        </div>


    </div>
</body>

</html>