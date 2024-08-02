<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Purchase;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['title']="Dashboard";
        $data['subtitle']="Dashboard";
        $data['tree']="Dashboard";

        $role=Auth::user()->role;
        $id_user=Auth::user()->id;

        if ($role=='0') {
            $data['total']=Purchase::all()->count();
            $data['baru']=Purchase::where('status', 'Antrian')->count();
            $data['proses']=Purchase::where('status', 'Proses')->count();
            $data['selesai']=Purchase::where('status', 'Selesai')->count();
            $data['jmluser']=User::all()->count();
            return view('dashboard_admin',$data);
            }

            else{
                $data['total'] = DB::table('purchases')
                ->join('users', 'purchases.id_user', '=', 'users.id')
                ->join('stores', 'purchases.id_toko', '=', 'stores.id')
                ->select('purchases.*')
                ->where('stores.id_user',$id_user)
                ->count();
    
                $data['baru'] = DB::table('purchases')
                ->select('purchases.*')
                ->join('users', 'purchases.id_user', '=', 'users.id')
                ->join('stores', 'purchases.id_toko', '=', 'stores.id')
                ->where('purchases.status','Antrian')
                ->where('stores.id_user',$id_user)
                ->count();
                
                $data['proses'] = DB::table('purchases')
                ->select('purchases.*')
                ->join('users', 'purchases.id_user', '=', 'users.id')
                ->join('stores', 'purchases.id_toko', '=', 'stores.id')
                ->where('purchases.status','Proses')
                ->where('stores.id_user',$id_user)
                ->count();
    
                $data['selesai'] = DB::table('purchases')
                ->join('users', 'purchases.id_user', '=', 'users.id')
                ->join('stores', 'purchases.id_toko', '=', 'stores.id')
                ->select('purchases.*')
                ->where('stores.id_user',$id_user)
                ->where('purchases.status','Selesai')
                ->count();

                $data['jmluser']=User::all()->count();

            }    

        return view('dashboard_admin',$data);

        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
