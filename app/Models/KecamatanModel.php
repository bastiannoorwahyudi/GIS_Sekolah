<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class KecamatanModel extends Model
{
    public function AllData()
    {
        return DB::table('tabKecamatan')->get();
    }

    public function store($data)
    {
        DB::table('tabKecamatan')->insert($data);
    }
}
