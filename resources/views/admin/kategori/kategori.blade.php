<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - KATEGORI</title>

    @include('layouts.link')
</head>

<body>
    <div class=" p-0 d-flex">
        @include('layouts.sidebar')
        <div class="flex-wrap p-0">
            @include('layouts.navbar')

            <div class="conten p-0">
                <div class="card m-5 shadow p-5">
                    <h5 class="text-center">TABEL KATEGORI</h5>

                    <div>
                        <a href="{{route ('admin.kategori.create')}}" class="btn btn-primary my-2">Create</a>
                    </div>

                    <table class="table table-striped table-hover">
                        <thead>
                            <tr class="text-center">
                                <th scope="col">#</th>
                                <th scope="col">Nama Kategori</th>
                                <th scope="col">AKSI</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($kategoris as $kategori)
                            <tr class="text-center">
                                <th>{{$kategori -> id }}</th>
                                <td>{{$kategori -> nama_kategori}}</td>
                                <td>
                                    <div>
                                        <a href="{{route ('admin.kategori.edit', $kategori -> id)}}" class="btn btn-primary"><i class="fa fa-pencil"></i></a>
                                        <a href="{{route ('admin.kategori.delete', $kategori -> id)}}" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <div class="alert alert-danger">
                                Data Belum Tersedia.
                            </div>
                            @endforelse
                        </tbody>
                        {{ $kategoris->links('pagination::bootstrap-4') }}
                    </table>


                </div>
            </div>

        </div>
    </div>
</body>

</html>