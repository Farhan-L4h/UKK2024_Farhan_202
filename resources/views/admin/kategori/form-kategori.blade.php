<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - FORM KATEGORI</title>

    @include('layouts.link')
</head>

<body>
    <div class=" p-0 d-flex">
        @include('layouts.sidebar')
        <div class="flex-wrap p-0">
            @include('layouts.navbar')

            <div class="conten p-0">
                <div class="card m-5 shadow p-5">
                    <h5 class="text-center">FORM _ KATEGORI</h5>

                    <form action="{{route ('admin.kategori.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="">

                            <!-- name barang -->
                            <div class="input-group flex-wrap m-2">
                                <span class="input-group-text" id="addon-wrapping">Nama KATEGORI</span>
                                <input type="text" name="nama_kategori" value="{{old ('nama_kategori') }}" class=" form-control @error('a') is-invalid @enderror" placeholder="Masukan Nama" aria-label="Username" aria-describedby="addon-wrapping">
                            </div>

                            <!-- error notif -->
                            @error('a')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                            @enderror

                            <button class="btn btn-primary m-2" type="submit">Submit</button></a>
                            <button class="btn btn-danger m-2" type="cancel">Cancel</button></a>

                        </div>
                    </form>

                </div>



            </div>
        </div>

    </div>
    </div>
</body>

</html>