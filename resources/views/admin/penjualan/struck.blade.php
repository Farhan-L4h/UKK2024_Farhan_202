<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @include ('layouts.link')
    <title>NOTA TRANSAKSI</title>
</head>

<body style="">
    <div class="container">

        <div class="card p-3" style="">

            <div class="text-center">
                <h3>FARHAN APOTEK</h3>
            </div>
            <hr>

            <div class="d-flex justify-content-between">

                <!-- judul -->
                <div class="row">
                    <div class="d-flex justify-content-start">
                        <p><strong>NO :</strong></p>
                    </div>

                    <div class="d-flex justify-content-start">
                        <p><strong>TGL :</strong></p>
                    </div>
                    <div class="d-flex justify-content-start">
                        <p><strong>Atas Nama :</strong></p>
                    </div>
                </div>

                <!-- isi -->
                <div class="row">
                    <div class="d-flex justify-content-end">
                        <p><strong>{{$penjualans -> id}}</strong></p>
                    </div>
                    
                    <div class="d-flex justify-content-end">
                        <p><strong>{{$penjualans -> tanggal}}</strong></p>
                    </div>
                    <div class="d-flex justify-content-end">
                        <p><strong>{{$penjualans -> user -> name}}</strong></p>
                    </div>
                </div>

            </div>

            <hr>

            <!-- transaksi -->
            <div class="d-flex justify-content-between">

                <!-- judul -->
                <div class="row">
                    <div class="d-flex justify-content-start">
                        <p><strong>Pesanan :</strong></p>
                    </div>

                    <div class="d-flex justify-content-start">
                        <p><strong>Harga :</strong></p>
                    </div>
                    <div class="d-flex justify-content-start">
                        <p><strong>jumlah Pesanan :</strong></p>
                    </div>
                </div>

                <div class="row">
                    <div class="d-flex justify-content-end">
                        <p><strong>{{$penjualans -> obat -> nama_obat}}</strong></p>
                    </div>

                    <div class="d-flex justify-content-end">
                        <p><strong>{{$penjualans -> obat -> harga}}</strong></p>
                    </div>
                    <div class="d-flex justify-content-end">
                        <p><strong>{{$penjualans -> jumlah}}</strong></p>
                    </div>
                </div>

            </div>
            <hr>

            <!-- isi -->

            <div class="d-flex justify-content-between ">

                <div class="row">
                    <div class="justify-content-start">
                        <p><strong>Sub Total :</strong></p>
                    </div>
                    <div class="justify-content-start">
                        <p><strong>Total Bayar :</strong></p>
                    </div>
                    <div class="justify-content-start">
                        <p><strong>Total Kembalian :</strong></p>
                    </div>
                </div>

                <div class="row">
                    <div class="d-flex justify-content-end">
                        <p><strong>{{$penjualans -> total}}</strong></p>
                    </div>
                    <div class="d-flex justify-content-end">
                        <p><strong>{{$penjualans -> total_bayar}}</strong></p>
                    </div>
                    <div class="d-flex justify-content-end">
                        <p><strong>{{$penjualans -> kembali}}</strong></p>
                    </div>
                </div>

            </div>
            <hr>

            <div class="d-flex justify-content-center row text-center">
                <strong>
                    <h5>Terimakasih Telah Berlanja</h5>
                </strong>
            </div>

        </div>


    </div>
    <script>
        window.onload = function() {
            window.print();

        };
        
        </script>
</body>

</html>