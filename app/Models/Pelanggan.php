<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pelanggan extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = "pelanggan";
    protected $guarded = ['id'];

    public function pencatatan_meteran()
    {
        return $this->hasMany(PencatatanMeteran::class);
    }

    public function scopeSearch(Builder $query, string $search = '')
    {
        return $query->where('nama', 'LIKE', '%' . $search . '%')
            ->orWhere('no_telepon', 'LIKE', '%' . $search . '%')
            ->orWhere('no_pelanggan', 'LIKE', '%' . $search . '%');
    }

    public function scopeIsAktif(Builder $query, $is_aktif)
    {
        return $query->when(($is_aktif != null), function ($query) use ($is_aktif) {
            $query->where('is_aktif', '=', $is_aktif);
        });
    }

    public static function getNoPelanggan()
    {
        $last_data = self::select('no_pelanggan')->orderBy('id', 'DESC')->limit(1)->first();
        $no_pel = (int)filter_var($last_data->no_pelanggan, FILTER_SANITIZE_NUMBER_INT);
        $new_no_pel = $no_pel + 1;
        return $new_no_pel;
    }
}
