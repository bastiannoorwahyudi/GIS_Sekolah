<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KecamatanModel;

class KecamatanController extends Controller
{
    public function __construct()
    {
        $this->KecamatanModel = new KecamatanModel();
        $this->middleware('auth');
    }

    public function index()
    {
        $data = [
            'title' => 'Kecamatan',
            'kecamatan' => $this->KecamatanModel->AllData(),
        ];

        return view ('admin.kecamatan.v_index', $data);
    }

    public function add()
    {
        $data = [
            'title' => 'Add Data Kecamatan',
        ];

        return view('admin.kecamatan.v_add', $data);
    }

    public function store()
    {
        Request()->validate([
            'kecamatan' => 'required',
            'warna' => 'required',
            'geojson' => 'required',
        ],
        [
            'kecamatan.required' => 'Silahkan isi kecamatan !!!',
            'warna.required' => 'Warna wajib Isi !!!',
            'geojson.required' => 'GeoJson wajib Isi !!!',
        ]);
        // jika tidak ada validasi, maka lakukan penyimpanan ke database
        $data = [
            'nama' => Request()->kecamatan,
            'warna' => Request()->warna,
            'geojson' => Request()->geojson
        ];

        $this->KecamatanModel->store($data);
        return redirect()->route('kecamatan')->with('pesan','Data berhasil ditambahkan');
    }
}
