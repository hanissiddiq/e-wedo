<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Store;
use App\Models\Product;
use App\Models\User;
use App\Models\Purchase;
use Illuminate\Support\Facades\DB;
use PDF;
use Illuminate\Support\Facades\Hash;




class HomePageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['store'] = Store::take(4)->get();
        $data['page'] = "Home";
        $cekAuth=Auth::check(); 
        if ($cekAuth==1) {
            return view('homepage_auth',$data);
        }else{
            return view('homepage',$data);
        }
    }

     public function detail()
    {
        $cekAuth=Auth::check();
        $id=request()->get('str');
        
        if ($cekAuth==1) {
            $data['id'] = request()->get('str');
            $data['store'] = Store::where('id', $id)->get();
            $data['product'] = Product::where('id_toko', $id)->get();
            $data['page'] = "Store";
            return view('homepage_product',$data);
        }else{
            $data['id'] = request()->get('str');
            $data['store'] = Store::where('id', $id)->get();
            $data['product'] = Product::where('id_toko', $id)->get();
            $data['page'] = "Store";
            return view('homepage_product_guest',$data);
        }
    }


    public function stores()
    {
       $cekAuth=Auth::check();
       if ($cekAuth==1) {
           $id_user=Auth::user()->id;
           $data['store'] = Store::all();
           $data['page'] = "Store";
           $data['id_user']=Auth::user()->id;
           $data['profile'] = User::where('id', $id_user)->get();
           return view('homepage_store',$data);
       }else{
           $data['store'] = Store::all();
           $data['page'] = "Store";
           return view('homepage_store_guest',$data);
       }

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['page'] = "Store";
        $id_toko=request()->get('str');
        $id_paket=request()->get('prd');
        $data['user'] = User::where('id', Auth::user()->id)->get();
        $data['store'] = Store::where('id', $id_toko)->get();
        $data['product'] = Product::where('id', $id_paket)->get();
        return view('purchasing',$data);
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
        return redirect('/orderan')->withSuccess(['Berhasil Melakukan Orderan, Mohon Menunggu Konfirmasi Dari WO Bersangkutan!']);
    }

    public function orderan()
    {
       $data['page'] = "Orderan";
       $id_user=Auth::user()->id;
       $data['id_user']=Auth::user()->id;
       $data['purchase'] = DB::table('purchases')
       ->join('users', 'purchases.id_user', '=', 'users.id')
       ->join('stores', 'purchases.id_toko', '=', 'stores.id')
       ->join('products', 'purchases.id_paket', '=', 'products.id')
       ->select('stores.nama as nama_wo','users.nama as nama_user','products.nama_paket','products.harga','purchases.*')
       ->where('purchases.id_user',$id_user)
       ->get();
       return view('orderan',$data);

    }

    public function invoice(string $id)
    {
        $id_user=Auth::user()->id;
        $data['id']=$id;
        $data['page']="Orderan";
        $data['purchase'] = DB::table('purchases')
        ->join('users', 'purchases.id_user', '=', 'users.id')
        ->join('stores', 'purchases.id_toko', '=', 'stores.id')
        ->join('products', 'purchases.id_paket', '=', 'products.id')
        ->select('stores.nama as nama_wo','users.nama as nama_user','products.nama_paket','products.harga as harga_paket','purchases.*')
        ->where('purchases.id',$id)
        ->get();
 
        // return view('invoice',$data);

	    $pdf = PDF::loadview('invoice',$data)->setOptions(['defaultFont' => 'sans-serif']);
	    return $pdf->download('INV'.$id.'.pdf');
    }

    public function registration()
    {
        $data['page'] = "Registrasi Pengguna";
        return view('registration',$data);
    }


    public function registrationProcess(Request $request)
    {
        $validated = $request->validate(
            [
                'nama' => 'required',
                'email' => 'required|unique:users',
                'no_hp' => 'required',
                'password' => 'required',
                'role' => 'required',
            ],
            [
                'nama.required' => 'Nama Wajib Diisi',
                'email.required' => 'E-mail Wajib Diisi',
                'no_hp.required' => 'No HP Wajib Diisi',
                'password.required' => 'Password Wajib Diisi',
            ]
        );

        $validated['password'] = Hash::make($validated['password']);
        User::create($validated);
        return redirect('/login')->withSuccess(['Berhasil Mendaftarkan Akun, Silahkan Login.']);
    }
    /**
     * Display the specified resource.
     */

     public function profile()
     {
        $data['page'] = "Profile";
        $id_user=Auth::user()->id;
        $data['id_user']=Auth::user()->id;
        $data['profile'] = User::where('id', $id_user)->get();
        return view('profile',$data);

     }

     public function updateUser(Request $request, string $id)
     {
 
        $validated = $request->validate(
                 [
                     
                     'nama' => 'required',
                     'tempat_lahir'=>'',
                     'tanggal_lahir'=>'',
                     'no_hp'=>'',
                     'role'=>'',
                     'password'=>'',
                     'foto' => 'mimes:jpg,jpeg,png',
                     'alamat' => 'required',
                 ],
                 [
                     'nama.required' => 'Nama Wajib Diisi',
                     'alamat.required' => 'Alamat Wajib Diisi',
                 ]
         );
         $password = request()->input('password');
         $password_lama = request()->input('password_lama');
 
         $validated['foto'] = $request->file('foto');
 
         if ($validated['foto']===null) {
             $validated['foto']=$request->input('foto_lama');
         }else{
             $validated['foto'] = $request->file('foto')->store('profil');
         }
         
         if ($password === null) {
             $validated['password'] = $password_lama;
         } else {
             $validated['password'] = Hash::make(request()->input('password'));
         }
 
         $data = User::find($id);
         $data->update($validated);
         return redirect('/userprofile/'.$id)->withSuccess(['Berhasil Update Data!']);
 
     }

    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
