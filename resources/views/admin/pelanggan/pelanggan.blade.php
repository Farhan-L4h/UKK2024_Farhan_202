<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - TRANSAKSI</title>

    @include('layouts.link')
</head>

<body>
    <div class=" p-0 d-flex">
        @include('layouts.sidebar')
        <div class="flex-wrap p-0">
            @include('layouts.navbar')

            <div class="conten p-0">
                <div class="card m-5 shadow p-5">
                    <h5 class="text-center">TABEL PELANGGAN</h5>

                    <div>
                        <a href="{{route ('admin.pelanggan.create')}}" class="btn btn-primary my-2">Create</a>
                    </div>

                    <table class="table table-striped table-hover">
                        <thead>
                            <tr class="text-center">
                                <th scope="col">#</th>
                                <th scope="col">NAMA PELANGGAN</th>
                                <th scope="col">USERNAME</th>
                                <th scope="col">ID USER</th>
                                <th scope="col">ALAMAT</th>
                                <th scope="col">VERTIVIKASI</th>
                                <th scope="col">AKSI</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($pelanggans as $pelanggan)
                            <tr class="text-center">
                                <th>{{$pelanggan -> id }}</th>
                                <td>{{$pelanggan -> nama_pelanggan}}</td>
                                <td>{{$pelanggan -> username}}</td>
                                <td>{{$pelanggan -> id_user}}</td>
                                <td>{{$pelanggan -> alamat}}</td>
                                <td>
                                    @if($pelanggan -> user ->verti == 1)
                                    <button class="btn btn-secondary">Belum</button>
                                    @else($pelanggan -> user ->verti == 2)
                                    <button class="btn btn-success">Sudah</button>
                                    @endif
                                </td>
                                <td>
                                    <div>
                                        <!-- <a href="{{route ('admin.pelanggan.edit', $pelanggan -> id)}}" class="btn btn-primary"><i class="fa fa-pencil"></i></a> -->
                                        <a href="{{route ('admin.pelanggan.delete', $pelanggan -> id)}}" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <div class="alert alert-danger">
                                Data Belum Tersedia.
                            </div>
                            @endforelse
                        </tbody>
                        {{ $pelanggans->links('pagination::bootstrap-4') }}
                    </table>


                </div>
            </div>

        </div>
    </div>
</body>

</html>