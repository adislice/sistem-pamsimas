<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengeluaran extends Model
{
    use HasFactory;
    protected $table = 'pengeluaran';
    protected $guarded = ['id'];

    public function scopeSearch(Builder $query, string $search = '')
    {
        return $query->where('nama', 'LIKE', '%' . $search . '%');
    }
}
