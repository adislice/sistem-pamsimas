<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PencatatanMeteran extends Model
{
    use HasFactory;
    protected $table = "pencatatan_meteran";
    protected $guarded = ['id'];

    public function pelanggan() {
        return $this->belongsTo(Pelanggan::class);
    }

    public function petugas() {
        return $this->belongsTo(Petugas::class);
    }
}
