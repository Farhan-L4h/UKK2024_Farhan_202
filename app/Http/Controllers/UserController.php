<?php

namespace App\Http\Controllers;

// model
use App\Models\obat;
use App\Models\pelanggan;
use App\Models\User;
use App\Models\penjualan;
// import
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index(): View
    {

        $users = Auth::user()->id;
        $obats = obat::with('kategori')->paginate(5);
        $pelanggans = pelanggan::all();
        $penjualans = penjualan::with('pelanggan','pembayaran','user','obat')->whereHas('pelanggan',function($di){
            $di -> where ('id_user', Auth::id());
        })->paginate(10);


        
        return view('user.index', compact('obats','users','pelanggans','penjualans'));
    }


    // create data pelanggan 

    public function vertipelanggan($id): RedirectResponse
    {

        $users = User::findOrFail($id);

        $datas = new pelanggan();
        $datas->id_user = $users->id;
        $datas->nama_pelanggan = $users->name;
        $datas->username = $users->username;
        $datas->password = $users->password;
        $datas->alamat = $users->alamat;
        $datas->verti = 2;
        $datas->save();

        return redirect()->back()->with(['success' => 'Anda Telah Menjadi Pelanggan!']);
    }

}
