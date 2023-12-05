<?php

namespace App\Http\Controllers;

use App\Models\Showroom;
use Illuminate\Http\Request;

class ShowroomController extends Controller
{
    public function index()
    {
        $showroom = Showroom::all(); //ambil data 
        return view('showroom.index', compact('showroom')); 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('showroom.create'); 
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        Showroom::create([
            'nama_mobil' => $data['name'],
            'brand_mobil' => $data['brand'],
            'warna_mobil' => $data['warna'],
            'tipe_mobil' => $data['tipe'],
            'harga_mobil' => $data['harga'],
        ]);


        return redirect(route('showroom.index'));
    }
}
