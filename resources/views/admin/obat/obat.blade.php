<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - OBAT</title>

    @include('layouts.link')
</head>

<body>
    <div class=" p-0 d-flex">
        @include('layouts.sidebar')
        <div class="flex-wrap p-0">
            @include('layouts.navbar')

            <div class="conten p-0">
                <div class="card m-5 shadow p-5">
                    <h5 class="text-center">TABEL OBAT</h5>

                    <div>
                        <a href="{{route ('admin.obat.create')}}" class="btn btn-primary my-2">Create</a>
                    </div>

                    <table class="table table-striped table-hover">
                        <thead>
                            <tr class="text-center">
                                <th scope="col">#</th>
                                <th scope="col">Image</th>
                                <th scope="col">Nama Obat</th>
                                <th scope="col">Kategori</th>
                                <th scope="col">Harga</th> 
                                <th scope="col">Keterangan</th> 
                                <th scope="col">Stock</th> 
                                <th scope="col">EXP</th> 
                                <th scope="col">AKSI</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($obats as $obat)
                            <tr class="text-center">
                                <th>{{$obat -> id }}</th>
                                <th>
                                    <img src="{{asset ('Storage/obat/'.$obat -> image)}}" alt="" srcset="" class="col-sm-6 p-0" style="max-width: 200px; object-fit: scale-down;">
                                </th>
                                <td>{{$obat -> nama_obat}}</td>
                                <td>{{$obat -> kategori -> nama_kategori}}</td>
                                <td>{{$obat -> harga}}</td>
                                <td>{{$obat -> keterangan}}</td>
                                <td>{{$obat -> stock}}</td>
                                <td>{{$obat -> exp}}</td>
                                <td>
                                    <div>
                                        <a href="{{route ('admin.obat.edit', $obat -> id)}}" class="btn btn-primary"><i class="fa fa-pencil"></i></a>
                                        <a href="{{route ('admin.obat.delete', $obat -> id)}}" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <div class="alert alert-danger">
                                Data Belum Tersedia.
                            </div>
                            @endforelse
                        </tbody>
                    </table>
                    {{ $obats->links('pagination::bootstrap-4') }}


                </div>
            </div>

        </div>
    </div>
</body>

</html>