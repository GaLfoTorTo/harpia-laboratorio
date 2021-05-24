<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setor extends Model
{
    use HasFactory;
    protected $fillable = [
        'setor',
        'setors_id'
    ];
    public function setor_pai()
    {
        return $this->hasOne(Setor::class, 'id','setors_id');
    }
    public function filhos()
    {
        return $this->hasMany(Setor::class,'setors_id');
    }

}
