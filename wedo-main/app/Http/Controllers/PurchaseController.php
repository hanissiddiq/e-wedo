<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Store;
use App\Models\User;
use App\Models\Product;
use App\Models\Purchase;
use Illuminate\Support\Facades\Auth;

class PurchaseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['title'] = "Wedo";
        $data['subtitle'] = "Purchase";
        $data['tree'] = "Transaksi";

        $role=Auth::user()->role;
        $id_user=Auth::user()->id;

        if ($role=='0') {
        $data['purchase'] = DB::table('purchases')
        ->join('users', 'purchases.id_user', '=', 'users.id')
        ->join('stores', 'purchases.id_toko', '=', 'stores.id')
        ->join('products', 'purchases.id_paket', '=', 'products.id')
        ->select('stores.nama as nama_laundry','users.nama as nama_user','users.no_hp','products.nama_paket','products.harga','purchases.*')
        ->where('purchases.status','Antrian')
        ->orwhere('purchases.status','Proses')
        ->get();
        return view('transaksi',$data);
        }
        else{
            $data['purchase'] = DB::table('purchases')
            ->join('users', 'purchases.id_user', '=', 'users.id')
            ->join('stores', 'purchases.id_toko', '=', 'stores.id')
            ->join('products', 'purchases.id_paket', '=', 'products.id')
            ->select('stores.nama as nama_laundry','users.nama as nama_user','users.no_hp','products.nama_paket','products.harga','purchases.*')
            ->where('stores.id_user',$id_user)
            ->where('purchases.status','Antrian')
            ->orwhere('purchases.status','Proses')
            ->get();
            return view('transaksi',$data);
        }
    }


    public function index_selesai()
    {
        $data['title'] = "Wedo";
        $data['subtitle'] = "History";
        $data['tree'] = "Transaksi";

        $role=Auth::user()->role;
        $id_user=Auth::user()->id;

        if ($role=='0') {
        $data['purchase'] = DB::table('purchases')
        ->join('users', 'purchases.id_user', '=', 'users.id')
        ->join('stores', 'purchases.id_toko', '=', 'stores.id')
        ->join('products', 'purchases.id_paket', '=', 'products.id')
        ->select('stores.nama as nama_laundry','users.nama as nama_user','users.no_hp','products.nama_paket','products.harga','purchases.*')
        ->where('purchases.status','Selesai')
        ->get();
        return view('selesai',$data);
        }
        else{
            $data['purchase'] = DB::table('purchases')
            ->join('users', 'purchases.id_user', '=', 'users.id')
            ->join('stores', 'purchases.id_toko', '=', 'stores.id')
            ->join('products', 'purchases.id_paket', '=', 'products.id')
            ->select('stores.nama as nama_laundry','users.nama as nama_user','users.no_hp','products.nama_paket','products.harga','purchases.*')
            ->where('stores.id_user',$id_user)
            ->where('purchases.status','Selesai')
            ->get();
            return view('selesai',$data);
        }
    }
    
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['title'] = "Wedo";
        $data['subtitle'] = "Purchase";
        $data['tree'] = "Transaksi";

        $role=Auth::user()->role;
        $id_user=Auth::user()->id;

        if ($role=='0') {
        $data['user'] = User::all();
        $data['store'] = Store::all();
        $data['product'] = DB::table('products')
        ->join('stores', 'products.id_toko', '=', 'stores.id')
        ->select('stores.nama as nama_wo','products.*')
        ->get();
        return view('add_transaksi',$data);
        }else{
        $data['user'] = User::where('role', '>', 0)->get();
        $data['store'] = Store::where('id_user', $id_user)->get();
        $data['product'] = DB::table('products')
        ->join('stores', 'products.id_toko', '=', 'stores.id')
        ->select('stores.nama as nama_wo','products.*')
        ->where('stores.id_user',$id_user)
        ->get();
        return view('add_transaksi',$data);
        }

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate(
            [
                'id_user' => 'required',
                'id_toko' => 'required',
                'id_paket' => 'required',
                'payment' => 'required',
                'status' => 'required'
            ],
            [
                'id_user.required' => 'Nama Pelanggan Wajib Diisi',
                'id_toko.required' => 'Nama Laundry Wajib Diisi',
                'id_paket.required' => 'Paket Wajib Diisi',
                'payment.required' => 'Metode Pembayaran Wajib Diisi',
                'status.required' => 'Status Wajib Diisi'          
            ]
        );

        Purchase::create($validated);
        return redirect('/purchase')->withSuccess(['Berhasil Menambahkan Transaksi!']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data['title'] = "Wedo";
        $data['subtitle'] = "Purchase";
        $data['tree'] = "Transaksi";    
        $data['id'] = $id;

        $role=Auth::user()->role;
        $id_user=Auth::user()->id;

        if ($role=='0') {
        $data['user'] = User::all();
        $data['store'] = Store::all();
        $data['product'] = DB::table('products')
        ->join('stores', 'products.id_toko', '=', 'stores.id')
        ->select('stores.nama as nama_wo','products.*')
        ->get();

        $data['purchase'] = DB::table('purchases')
        ->join('users', 'purchases.id_user', '=', 'users.id')
        ->join('stores', 'purchases.id_toko', '=', 'stores.id')
        ->join('products', 'purchases.id_paket', '=', 'products.id')
        ->select('stores.nama as nama_wo','users.nama as nama_user','users.email','products.nama_paket','purchases.*')
        ->where('purchases.id',$id)
        ->get();
        return view('edit_transaksi',$data);
        }
        else{
        $data['user'] = User::where('role', '>', 0)->get();
        $data['store'] = Store::where('id_user', $id_user)->get();
        $data['product'] = DB::table('products')
        ->join('stores', 'products.id_toko', '=', 'stores.id')
        ->select('stores.nama as nama_wo','products.*')
        ->where('stores.id_user',$id_user)
        ->get();

        $data['purchase'] = DB::table('purchases')
        ->join('users', 'purchases.id_user', '=', 'users.id')
        ->join('stores', 'purchases.id_toko', '=', 'stores.id')
        ->join('products', 'purchases.id_paket', '=', 'products.id')
        ->select('stores.nama as nama_wo','users.nama as nama_user','users.email','products.nama_paket','purchases.*')
        ->where('purchases.id',$id)
        ->get();
        return view('edit_transaksi',$data);
        }

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate(
            [
                'id_user' => 'required',
                'id_toko' => 'required',
                'id_paket' => 'required',
                'payment' => 'required',
                'status' => 'required'
            ],
            [
                'id_user.required' => 'Nama Pelanggan Wajib Diisi',
                'id_toko.required' => 'Nama Laundry Wajib Diisi',
                'id_paket.required' => 'Paket Wajib Diisi',
                'payment.required' => 'Metode Pembayaran Wajib Diisi',
                'status.required' => 'Status Wajib Diisi'          
            ]
        );

        $data = Purchase::find($id);
        $data->update($validated);
        return redirect('/purchase')->withSuccess(['Berhasil Update Transaksi!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Purchase::find($id);
        $data->delete();
        return redirect('/purchase')->withSuccess(['Berhasil Hapus Transaksi!']);
    }
}
