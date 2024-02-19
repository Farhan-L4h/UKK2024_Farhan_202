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
                    <h5 class="text-center">TABEL USER</h5>

                    <div>
                        <a href="{{route ('admin.penjualan.create')}}" class="btn btn-primary my-2">Create</a>
                    </div>

                    <table class="table table-striped table-hover">
                        <thead>
                            <tr class="text-center">
                                <th scope="col">#</th>
                                <th scope="col">NAME</th>
                                <th scope="col">USERNAME</th>
                                <th scope="col">EMAIL</th>
                                <th scope="col">ROLE</th>
                                <th scope="col">ALAMAt</th>
                                <th scope="col">AKSI</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($users as $user)
                            <tr class="text-center">
                                <th>{{$user -> id }}</th>
                                <td>{{$user -> name}}</td>
                                <td>{{$user -> username}}</td>
                                <td>{{$user -> email}}</td>
                                <td>{{$user -> role}}</td>
                                <td>{{$user -> alamat}}</td>
                                <td>
                                    <div>
                                        <a href="{{route ('admin.user.edit', $user -> id)}}" class="btn btn-primary"><i class="fa fa-pencil"></i></a>
                                        <a href="{{route ('admin.user.delete', $user -> id)}}" class="btn btn-danger"><i class="fa fa-trash"></i></a>
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
                    {{ $users->links('pagination::bootstrap-4') }}


                </div>
            </div>

        </div>
    </div>

    @include('layouts.toast')
</body>

</html>