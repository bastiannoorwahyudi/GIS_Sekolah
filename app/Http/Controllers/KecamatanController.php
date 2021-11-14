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
            'kecamatan.required' => 'Wajib Isi !!',
            'warna.required' => 'Wajib Isi !!',
            'geojson.required' => 'Wajib Isi !!',
        ]);
    }
}
