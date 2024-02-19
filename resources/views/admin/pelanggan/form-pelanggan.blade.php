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

                    <form action="{{route ('admin.pelanggan.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="">

                            <div class="input-group mb-3 m-2">
                                <label class="input-group-text" for="inputGroupSelect01">PILIH USER</label>
                                <select name="id_user" class="form-select" id="inputGroupSelect01">
                                    @foreach ($users as $user)
                                    <option value="{{$user->id}}">{{$user->name}}</option>
                                    @endforeach
                                </select>
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