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

                    <form action="{{route ('admin.penjualan.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="">

                            <!-- id_pelanggan -->
                            <div class="input-group mb-3 m-2">
                                <label class="input-group-text" for="inputGroupSelect01">PELANGGAN</label>
                                <select name="id_pelanggan" class="form-select" id="inputGroupSelect01">
                                    @foreach ($pelanggans as $pelanggan)
                                    <option value="{{$pelanggan->id}}">{{$pelanggan->username}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <!-- pembayaran -->
                            <div class="input-group mb-3 m-2">
                                <label class="input-group-text" for="inputGroupSelect01">PEMBAYARAN</label>
                                <select name="id_pembayaran" class="form-select" id="inputGroupSelect01">
                                    @foreach ($pembayarans as $pembayaran)
                                    <option value="{{$pembayaran -> id}}">{{$pembayaran->nama_pembayaran}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <!-- obat -->
                            <div class="input-group mb-3 m-2">
                                <label class="input-group-text" for="inputGroupSelect01">OBAT</label>
                                <select name="id_obat" class="form-select" id="inputGroupSelect01">
                                    @foreach ($obats as $obat)
                                    <option value="{{$obat->id}}">{{$obat->nama_obat}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <!-- user -->
                            <div class="input-group mb-3 m-2">
                                <label class="input-group-text" for="inputGroupSelect01">NAMA KASIR</label>
                                <select name="id_user" class="form-select" id="inputGroupSelect01">
                                    @foreach ($users as $user)
                                    <option value="{{$user->id}}">{{$user->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            
                            <!-- tanggal -->
                            <div class="input-group flex-wrap m-2">
                                <span class="input-group-text" id="addon-wrapping">TANGGAL</span>
                                <input type="date" name="tanggal" value="{{old ('tanggal')}}" class="form-control @error('tanggal') is-invalid @enderror" placeholder="Masukan tanggal" aria-label="Username" aria-describedby="addon-wrapping">
                            </div>
                            @error('tanggal')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                            @enderror
                            <!-- JUMLAH -->
                            <div class="input-group flex-wrap m-2">
                                <span class="input-group-text" id="addon-wrapping">TOTAL SEMUA</span>
                                
                                <span class="input-group-text" id="addon-wrapping">JUMLAH</span>
                                <input type="number" name="jumlah" value="{{old ('jumlah')}}" class="form-control @error('jumlah') is-invalid @enderror" placeholder="Masukan jumlah" aria-label="Username" aria-describedby="addon-wrapping">
                                
                                <span class="input-group-text" id="addon-wrapping">X</span>
                                
                                <span class="input-group-text" id="addon-wrapping">HARGA OBAT</span>
                                <select name="harga_obat" class="form-select" id="inputGroupSelect01">
                                    <option value="{{$obat->harga}}">{{$obat->nama_obat}} Rp: {{$obat->harga}}</option>
                                </select>
                            
                            </div>
                            @error('harga')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                            @enderror

                            <!-- bayar -->
                            <div class="input-group flex-wrap m-2">
                                <span class="input-group-text" id="addon-wrapping">TOTAL BAYAR</span>
                                <span class="input-group-text" id="addon-wrapping">Rp</span>
                                <input type="number" name="total_bayar" value="{{old ('total_bayar')}}" class="form-control @error('tanggal') is-invalid @enderror" placeholder="Masukan Nominal" aria-label="Username" aria-describedby="addon-wrapping">
                            </div>
                

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