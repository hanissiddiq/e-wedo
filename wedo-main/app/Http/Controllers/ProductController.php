<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\Store;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['title'] = "Wedo";
        $data['subtitle'] = "Produk";
        $data['tree'] = "Wedding Organizer";

        $role=Auth::user()->role;
        $id_user=Auth::user()->id;

        if ($role=='0') {
        $data['produk'] = DB::table('products')
        ->join('stores', 'products.id_toko', '=', 'stores.id')
        ->select('stores.nama','products.*')
        ->get();
        return view('product',$data);
        }
        else{
            $data['produk'] = DB::table('products')
            ->join('stores', 'products.id_toko', '=', 'stores.id')
            ->select('stores.nama','products.*')
            ->where('stores.id_user',$id_user)
            ->get();
            return view('product',$data);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['title'] = "Wedo";
        $data['subtitle'] = "Produk";
        $data['tree'] = "Wedding Organizer";
        $role=Auth::user()->role;
        $id_user=Auth::user()->id;

        if ($role=='0') {
        $data['store'] = Store::all();
        return view('add_product',$data);
        }
        else{
        $data['store'] = Store::where('id_user', $id_user)->get();
        return view('add_product',$data);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate(
            [
                'id_toko' => 'required',
                'nama_paket' => 'required',
                'deskripsi' => 'required',
                'harga' => 'required',
                'foto' => 'required|mimes:jpg,jpeg,png',
            ],
            [
                'id_toko.required' => 'Nama WO Wajib Diisi',
                'nama_paket.required' => 'Nama Produk Wajib Diisi',
                'deskripsio.required' => 'Deskripsi Wajib Diisi',
                'harga.required' => 'Harga Wajib Diisi',
                'foto.required' => 'Foto Produk Wajib Diisi',
            ]
        );

        $validated['foto'] = $request->file('foto')->store('foto_produk');
        Product::create($validated);
        return redirect('/product')->withSuccess(['Berhasil Menambahkan Produk!']);
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
        $data['subtitle'] = "Produk";
        $data['tree'] = "Wedding Organizer";
        $role=Auth::user()->role;
        $id_user=Auth::user()->id;
        $data['id'] = $id;

        if ($role=='0') {
        $data['store'] = Store::all();
        $data['product'] = DB::table('products')
        ->join('stores', 'products.id_toko', '=', 'stores.id')
        ->select('products.*','stores.nama')
        ->where('products.id',$id)
        ->get();
        return view('edit_product',$data);
        }
        else{
        $data['store'] = Store::where('id_user', $id_user)->get();
        $data['product'] = DB::table('products')
        ->join('stores', 'products.id_toko', '=', 'stores.id')
        ->select('products.*','stores.nama')
        ->where('products.id',$id)
        ->get();
        return view('edit_product',$data);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate(
            [
                'id_toko' => 'required',
                'nama_paket' => 'required',
                'deskripsi' => 'required',
                'harga' => 'required',
            ],
            [
                'id_toko.required' => 'Nama WO Wajib Diisi',
                'nama_paket.required' => 'Nama Produk Wajib Diisi',
                'deskripsio.required' => 'Deskripsi Wajib Diisi',
                'harga.required' => 'Harga Wajib Diisi',
            ]
        );

        $validated['foto'] = $request->file('foto');
        if ($validated['foto']===null) {
            $validated['foto']=$request->input('foto_lama');
        }else{
            $validated['foto'] = $request->file('foto')->store('foto_produk');
        }

        $data = Product::find($id);
        $data->update($validated);
        return redirect('/product')->withSuccess(['Berhasil Update Produk!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Product::find($id);
        $data->delete();
        return redirect('/product')->withSuccess(['Berhasil Hapus Produk!']);
    }
}
