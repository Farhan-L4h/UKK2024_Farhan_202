<?php

namespace App\Http\Controllers;

// model

use App\Models\kategori;
use App\Models\obat;
use App\Models\pelanggan;
use App\Models\pembayaran;
use App\Models\penjualan;
use App\Models\User;
// import
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    // index
    public function index(): View
    {

        $obats = obat::with('kategori')->paginate(5);
        $pelanggans = pelanggan::paginate(10);
        $penjualans = penjualan::paginate(10);

        return view('admin.index', compact('obats','pelanggans','penjualans'));
    }

    // kategori
    public function kategori(): View
    {

        $kategoris = kategori::paginate(5);

        return view('admin.kategori.kategori', compact('kategoris'));
    }
    // form Kategori
    public function kategoricreate(): View
    {

        $kategoris = kategori::paginate(5);

        return view('admin.kategori.form-kategori', compact('kategoris'));
    }
    // store
    public function kategoristore(Request $request): RedirectResponse
    {

        $this->validate($request, [
            'nama_kategori' => 'required',
        ]);


        kategori::create([
            'nama_kategori' => $request->nama_kategori,
        ]);


        session()->flash('success', 'Form submitted successfully.');
        return redirect()->route('admin.kategori');
    }

    //form update kategori
    public function kategoriedit(string $id): View
    {
        $kategoris = kategori::findOrFail($id);
        return view('admin.kategori.form-edit-kategori', compact('kategoris'));
    }

    // update kategori
    public function kategoriupdate(Request $request, $id): RedirectResponse
    {
        $kategoris = kategori::findOrFail($id);

        $kategoris->update([
            'nama_kategori' => $request->nama_kategori,
        ]);

        return redirect()->route('admin.kategori')->with(['success' => 'Data Berhasil Diubah!']);
    }

    // delete kategori
    public function kategoridelete($id): RedirectResponse
    {
        $kategoris = kategori::findOrFail($id);
        $kategoris->delete();
        return redirect()->route('admin.kategori')->with(['success' => 'Data Berhasil Dihapus!']);
    }

    // // //

    // obat
    public function obat(): View
    {

        $obats = obat::with('kategori')->paginate(5);

        return view('admin.obat.obat', compact('obats'));
    }

    // form obat
    public function obatcreate(): View
    {

        $obats = obat::with('kategori')->paginate(2);
        $kategoris = kategori::all();
        return view('admin.obat.form-obat', compact('obats', 'kategoris'));
    }

    // store
    public function obatstore(Request $request)
    {


        $image = $request->file('image');
        $image->storeAs('public/obat', $image->hashName());


        $this->validate($request, [
            'image' => 'required|image|mimes:jpeg,jpg,png|max:2048',
            'nama_obat' => 'required',
            'harga' => 'required',
            'exp' => 'required',
            'stock' => 'required',
            'keterangan' => 'required',
        ]);


        obat::create([
            'image' => $image->hashName(),
            'nama_obat' => $request->nama_obat,
            'id_kategori' => $request->id_kategori,
            'harga' => $request->harga,
            'stock' => $request->stock,
            'keterangan' => $request->keterangan,
            'exp' => $request->exp,
        ]);


        session()->flash('success', 'Form submitted successfully.');
        return redirect()->route('admin.obat');
    }

    //form edit masakan
    public function obatedit(string $id): View
    {
        //get post by ID
        $obats = obat::findOrFail($id);
        $kategoris = kategori::all();

        //render view with post
        return view('admin.obat.form-edit-obat', compact('obats', 'kategoris'));
    }

    // update masakan
    public function obatupdate(Request $request, $id): RedirectResponse
    {
        $obats = obat::findOrFail($id);

        //check if image is uploaded
        if ($request->hasFile('image')) {

            //upload new image
            $image = $request->file('image');
            $image->storeAs('public/obat', $image->hashName());

            //delete old image
            Storage::delete('public/obat' . $obats->image);

            //update post with new image
            $obats->update([
                'image' => $image->hashName(),
                'nama_obat' => $request->nama_obat,
                'id_kategori' => $request->id_kategori,
                'harga' => $request->harga,
                'stock' => $request->stock,
                'keterangan' => $request->keterangan,
                'exp' => $request->exp,
            ]);
        } else {

            //update post without image
            $obats->update([
                'nama_obat' => $request->nama_obat,
                'id_kategori' => $request->id_kategori,
                'harga' => $request->harga,
                'stock' => $request->stock,
                'keterangan' => $request->keterangan,
                'exp' => $request->exp,
            ]);
        }

        //redirect to index
        return redirect()->route('admin.obat')->with(['success' => 'Data Berhasil Diubah!']);
    }

    // delete Masakan
    public function obatdelete($id): RedirectResponse
    {
        $obats = obat::findOrFail($id);
        Storage::delete('public/obat' . $obats->image);
        $obats->delete();
        return redirect()->route('admin.obat')->with(['success' => 'Data Berhasil Dihapus!']);
    }

    /// /////////






    // Penjualan
    public function penjualan(): View
    {

        $penjualans = penjualan::paginate(5);

        return view('admin.penjualan.penjualan', compact('penjualans'));
    }
    // form penjualan
    public function penjualancreate(): View
    {

        $obats = obat::all();
        $pembayarans = pembayaran::all();
        $users = user::latest()->paginate(10);
        $pelanggans = pelanggan::all();
        $penjualans = penjualan::all();

        return view('admin.penjualan.form-penjualan', compact('penjualans', 'pembayarans', 'users', 'obats', 'pelanggans'));
    }
    // store
    public function penjualanstore(Request $request): RedirectResponse
    {

        $this->validate($request, [
            'tanggal' => 'required',
            'jumlah' => 'required',
        ]);

        $jumlah = $request->jumlah;
        $obat = $request->harga_obat;
        $total = $jumlah * $obat;

        $bayar = $request->total_bayar;
        $kembali = $bayar - $total;

        penjualan::create([
            'id_user' => $request->id_user,
            'id_obat' => $request->id_obat,
            'id_pembayaran' => $request->id_pembayaran,
            'id_pelanggan' => $request->id_pelanggan,
            'tanggal' => $request->tanggal,
            'jumlah' => $request->jumlah,
            'total_bayar' => $request->total_bayar,
            'kembali' => $kembali,
            'total' => $total
        ]);


        session()->flash('success', 'Form submitted successfully.');
        return redirect()->route('admin.penjualan');
    }

    //form update penjualan
    public function penjualanedit(string $id): View
    {
        $obats = obat::all();
        $pembayarans = pembayaran::all();
        $users = user::latest()->paginate(10);
        $pelanggans = pelanggan::all();
        $penjualan = penjualan::findOrFail($id);

        return view('admin.penjualan.form-edit-penjualan', compact('penjualan', 'pembayarans', 'users', 'obats', 'pelanggans'));
    }

    // update penjualan
    public function penjualanupdate(Request $request, $id): RedirectResponse
    {
        $penjualans = penjualan::findOrFail($id);

        $jumlah = $request->jumlah;
        $obat = $request->harga_obat;
        $total = $jumlah * $obat;

        $bayar = $request->total_bayar;
        $kembali = $bayar - $total;

        $penjualans->update([
            'id_user' => $request->id_user,
            'id_obat' => $request->id_obat,
            'id_pembayaran' => $request->id_pembayaran,
            'id_pelanggan' => $request->id_pelanggan,
            'tanggal' => $request->tanggal,
            'jumlah' => $request->jumlah,
            'total_bayar' => $request->total_bayar,
            'kembali' => $kembali,
            'total' => $total
        ]);

        return redirect()->route('admin.penjualan')->with(['success' => 'Data Berhasil Diubah!']);
    }

    // delete penjualan
    public function penjualandelete($id): RedirectResponse
    {
        $penjualans = penjualan::findOrFail($id);
        $penjualans->delete();
        return redirect()->route('admin.penjualan')->with(['success' => 'Data Berhasil Dihapus!']);
    }

    // print
    public function penjualanstruck($id)
    {
        $penjualans = penjualan::findOrFail($id)->with('obat', 'pelanggan', 'user', 'pembayaran')->first();

        return view('admin.penjualan.struck', compact('penjualans'));
    }

    // keuangan
    public function keuangan()
    {
        $penjualans = penjualan::with('obat', 'pelanggan', 'user', 'pembayaran')->paginate(10);

        foreach ($penjualans as $data) {
            $harga[] = $data->total;
        }
        $subtotal= array_sum($harga);

        return view('admin.penjualan.histori-keuangan', compact('penjualans','subtotal'));
    }






    // user
    public function user(): View
    {

        $users = User::paginate(5);

        return view('admin.user.user', compact('users'));
    }

    //form update user
    public function useredit(string $id): View
    {
        $users = user::findOrFail($id);
        return view('admin.user.form-edit-user', compact('users'));
    }

    // update user
    public function userupdate(Request $request, $id): RedirectResponse
    {
        $users = User::findOrFail($id);

        $users->update([
            'role' => $request->role,
        ]);

        return redirect()->route('admin.user')->with(['success' => 'Data Berhasil Diubah!']);
    }

    // delete user
    public function userdelete($id): RedirectResponse
    {
        $users = user::findOrFail($id);
        $users->delete();
        return redirect()->route('admin.user')->with(['success' => 'Data Berhasil Dihapus!']);
    }




    // transaksi 
    public function pelanggan(): View
    {

        $pelanggans = pelanggan::paginate(5);

        return view('admin.pelanggan.pelanggan', compact('pelanggans'));
    }



    // Pelanggan
    // form pelanggan
    public function pelanggancreate(): View
    {

        $users = user::paginate(5);

        return view('admin.pelanggan.form-pelanggan', compact('users'));
    }
    // store
    public function pelangganstore(Request $request): RedirectResponse
    {

        $users = User::findOrFail($request->id_user);
        $datas = new pelanggan();

        $datas->id_user = $users->id;
        $datas->nama_pelanggan = $users->name;
        $datas->username = $users->username;
        $datas->password = $users->password;
        $datas->alamat = $users->alamat;
        $datas->verti = 2;
        $datas->save();

        // penjualan::create([
        //     'id_user' => $users->id,
        //     'nama_pelanggan' => $users->name,
        //     'username' => $users->username,
        //     'password' => $users->password,
        //     'alamat' => $users->alamat,
        //     'verti' => 2,
        // ]);

        return redirect()->route('admin.pelanggan')->with(['success' => 'Data Berhasil Diubah!']);
    }

    //form update pelanggan
    public function pelangganedit(string $id): View
    {
        $pelanggans = pelanggan::findOrFail($id);
        return view('admin.pelanggan.form-edit-pelanggan', compact('pelanggans'));
    }

    // update pelanggan
    public function pelangganupdate(Request $request, $id): RedirectResponse
    {
        $pelanggans = pelanggan::findOrFail($id);

        $pelanggans->update([
            'nama_pelanggan' => $request->nama_pelanggan,
        ]);

        return redirect()->route('admin.pelanggan')->with(['success' => 'Data Berhasil Diubah!']);
    }

    // delete pelanggan
    public function pelanggandelete($id): RedirectResponse
    {
        $pelanggans = pelanggan::findOrFail($id);
        $pelanggans->delete();
        return redirect()->route('admin.pelanggan')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
