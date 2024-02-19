<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - PENJUALAN</title>

    @include('layouts.link')
</head>

<body>
    <div class=" p-0 d-flex">
        @include('layouts.sidebar')
        <div class="flex-wrap p-0">
            @include('layouts.navbar')

            <div class="conten p-0">
                <div class="card m-5 shadow p-5">
                    <h5 class="text-center my-3">TABEL HISTORI KEUANGAN</h5>

                    <table class="table table-striped table-hover">
                        <thead>
                            <tr class="text-center">
                                <th scope="col">#</th>
                                <th scope="col">NAMA PELANGGAN</th>
                                <th scope="col">NAMA OBAT</th>
                                <th scope="col">TANGGAL</th>
                                <th scope="col">JUMLAH</th>
                                <th scope="col">TOTAL</th>
                                <th scope="col">TOTAL BAYAR</th>
                                <th scope="col">TOTAL KEMBALI</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($penjualans as $penjualan)
                            <tr class="text-center">
                                <th>{{$penjualan -> id }}</th>
                                <th>{{$penjualan -> pelanggan -> username }}</th>

                                <td>{{$penjualan -> obat -> nama_obat}}</td>

                                <td>{{$penjualan -> tanggal }}</td>
                                <td>{{$penjualan -> jumlah }}</td>
                                <td>{{$penjualan -> total }}</td>
                                <td>{{$penjualan -> total_bayar }}</td>
                                <td>{{$penjualan -> kembali }}</td>

                            </tr>
                            @empty
                            <div class="alert alert-danger">
                                Data Belum Tersedia.
                            </div>
                            @endforelse
                        </tbody>
                        {{ $penjualans->links('pagination::bootstrap-4') }}
                    </table>
                    <hr>
                    <h5 class="">SubTotal Rp: {{$subtotal}}</h5>

                </div>

            </div>

        </div>
    </div>
</body>

</html>