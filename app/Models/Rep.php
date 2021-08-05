<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rep extends Model
{
    use HasFactory;
    protected $fillable = [
        'nome',
        'cargo_id',
    ];



    public function cargo()
    {
        return $this->belongsTo(Cargos::class, 'id', 'cargo_id');
    }
}
