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
                    <h5 class="text-center">TABEL PENJUALAN</h5>

                    <div>
                        <a href="{{route ('admin.penjualan.create')}}" class="btn btn-primary my-2">Create</a>
                    </div>

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
                                        <a href="{{route ('admin.penjualan.edit', $penjualan -> id)}}" class="btn btn-primary"><i class="fa fa-pencil"></i></a>
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
                        {{ $obats->links('pagination::bootstrap-4') }}
                    </table>


                </div>
            </div>

        </div>
    </div>
</body>

</html>