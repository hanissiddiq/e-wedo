<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Store;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class StoreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['title'] = "Wedo";
        $data['subtitle'] = "Store";
        $data['tree'] = "Wedding Organizer";
        
        // $data['user'] = User::all();

        $role=Auth::user()->role;
        $id_user=Auth::user()->id;

        if ($role=='0') {
            $data['store'] = DB::table('stores')
            ->join('users', 'stores.id_user', '=', 'users.id')
            ->select('users.email as email_admin','stores.*')
            ->get();       
            return view('store',$data); 
        }else{
            $data['store'] = DB::table('stores')
            ->join('users', 'stores.id_user', '=', 'users.id')
            ->select('users.email as email_admin','stores.*')
            ->where('stores.id_user',$id_user)
            ->get();       
            return view('store',$data); 
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['title'] = "Wedo";
        $data['subtitle'] = "Store";
        $data['tree'] = "Wedding Organizer";
        $data['user'] = User::all();
        $data['store'] = DB::table('stores')
        ->join('users', 'stores.id_user', '=', 'users.id')
        ->select('users.email as email_admin','stores.*')
        ->get();
        return view('add_store',$data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate(
            [
                'nama' => 'required',
                'desa' => 'required',
                'kecamatan' => 'required',
                'kabupaten' => 'required',
                'provinsi' => 'required',
                'alamat' => 'required',
                'foto' => 'required|mimes:jpg,jpeg,png',
                'id_user' => 'required',
                'status_pengajuan' => 'required',
                'hidden' => 'required',
            ],
            [
                'nama.required' => 'Nama Wajib Diisi',
                'desa.required' => 'Desa Wajib Diisi',
                'kecamatan.required' => 'Kecamatan Wajib Diisi',
                'kabupaten.required' => 'Kabupaten Wajib Diisi',
                'provinsi.required' => 'Provinsi Wajib Diisi',
                'alamat.required' => 'Alamat Wajib Diisi',
                'foto.required' => 'Foto WO Wajib Diisi',
                'id_user.required' => 'Admin Wajib Diisi',
                'status_pengajuan.required' => 'Status WO Wajib Diisi',
                'hidden.required' => 'Hidden Status Wajib Diisi',               
            ]
        );

        $validated['foto'] = $request->file('foto')->store('foto_wo');
        Store::create($validated);
        return redirect('/store')->withSuccess(['Berhasil Menambahkan WO!']);
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
        $data['subtitle'] = "Store";
        $data['tree'] = "Wedding Organizer";     
        $data['id'] = $id;
        $data['user'] = User::all();
        $data['laundry'] = DB::table('stores')
        ->join('users', 'stores.id_user', '=', 'users.id')
        ->select('users.email as email_admin','stores.*')
        ->where('stores.id',$id)
        ->get();
        return view('edit_store',$data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate(
            [
                'nama' => 'required',
                'desa' => 'required',
                'kecamatan' => 'required',
                'kabupaten' => 'required',
                'provinsi' => 'required',
                'alamat' => 'required',
                'foto' => 'mimes:jpg,jpeg,png',
                'id_user' => 'required',
                'status_pengajuan' => 'required',
                'hidden' => 'required',
            ],
            [
                'nama.required' => 'Nama Wajib Diisi',
                'desa.required' => 'Desa Wajib Diisi',
                'kecamatan.required' => 'Kecamatan Wajib Diisi',
                'kabupaten.required' => 'Kabupaten Wajib Diisi',
                'provinsi.required' => 'Provinsi Wajib Diisi',
                'alamat.required' => 'Alamat Wajib Diisi',
                'id_user.required' => 'Admin Wajib Diisi',
                'status_pengajuan.required' => 'Status Laundry Wajib Diisi',
                'hidden.required' => 'Hidden Status Wajib Diisi',               
            ]
        );
        $validated['foto'] = $request->file('foto');
        if ($validated['foto']===null) {
            $validated['foto']=$request->input('foto_lama');
        }else{
            $validated['foto'] = $request->file('foto')->store('foto_wo');
        }

        $data = Store::find($id);
        $data->update($validated);
        return redirect('/store')->withSuccess(['Berhasil Update Data!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Store::find($id);
        $data->delete();
        return redirect('/store')->withSuccess(['Berhasil Hapus Data!']);

    }
}
