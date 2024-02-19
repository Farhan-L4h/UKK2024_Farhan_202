<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - FORM OBAT</title>

    @include('layouts.link')
</head>

<body>
    <div class=" p-0 d-flex">
        @include('layouts.sidebar')
        <div class="flex-wrap p-0">
            @include('layouts.navbar')

            <div class="conten p-0">
                <div class="card m-5 shadow p-5">
                    <h5 class="text-center">FORM OBAT</h5>

                    <form action="{{route ('admin.obat.update', $obats -> id)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="">

                            <!-- gambar -->
                            <div class="input-group mb-3 m-2">
                                <label class="input-group-text" for="inputGroupFile01">Upload</label>
                                <input name="image" value="{{old ('image') }}" type="file" class="form-control @error('image') is-invalid @enderror" id="inputGroupFile01">
                            </div>
                            @error('image')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                            @enderror


                            <!-- name obat -->
                            <div class="input-group flex-wrap m-2">
                                <span class="input-group-text" id="addon-wrapping">NAMA OBAT</span>
                                <input type="text" name="nama_obat" value="{{old ('nama_obat', $obats-> nama_obat )}}" class="form-control @error('obat') is-invalid @enderror" placeholder="Masukan Nama Obat" aria-label="Username" aria-describedby="addon-wrapping">
                            </div>
                            @error('obat')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                            @enderror

                            <!-- kategori -->
                            <div class="input-group mb-3 m-2">
                                <label class="input-group-text" for="inputGroupSelect01">KATEGORI</label>
                                <select name="id_kategori" class="form-select" id="inputGroupSelect01">
                                    @foreach ($kategoris as $kategori)
                                    <option value="{{$kategori->id}}">{{$kategori->nama_kategori}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- harga -->
                            <div class="input-group flex-wrap m-2">
                                <span class="input-group-text" id="addon-wrapping">HARGA</span>
                                <span class="input-group-text" id="addon-wrapping">Rp</span>
                                <input type="number" name="harga" value="{{old ('harga', $obats-> harga)}}" class="form-control @error('harga') is-invalid @enderror" placeholder="Masukan harga" aria-label="Username" aria-describedby="addon-wrapping">
                            </div>
                            @error('harga')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                            @enderror


                            <!-- stock -->
                            <div class="input-group flex-wrap m-2">
                                <span class="input-group-text" id="addon-wrapping">STOCK</span>
                                <input type="number" name="stock" value="{{old ('stock', $obats-> stock)}}" class="form-control @error('stock') is-invalid @enderror" placeholder="Masukan stock" aria-label="Username" aria-describedby="addon-wrapping">
                            </div>
                            @error('stock')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                            @enderror


                            <!-- EXP -->
                            <div class="input-group flex-wrap m-2">
                                <span class="input-group-text" id="addon-wrapping">EXPIRED</span>
                                <input type="date" name="exp" value="{{old ('exp', $obats-> exp)}}" class="form-control @error('exp') is-invalid @enderror" placeholder="Masukan exp" aria-label="Username" aria-describedby="addon-wrapping">
                            </div>
                            @error('exp')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                            @enderror

                            <!-- KETERANGAN -->
                            <div class="input-group flex-wrap m-2">
                                <span class="input-group-text" id="addon-wrapping">KETERANGAN</span>
                                <textarea name="keterangan" value="" class="form-control @error('keterangan') is-invalid @enderror" placeholder="Masukan keterangan" aria-label="Username" aria-describedby="addon-wrapping">{{old ('keterangan', $obats-> keterangan)}}</textarea>
                            </div>
                            @error('keterangan')
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