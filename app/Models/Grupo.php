<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Http\Traits\Hashidable;

class Grupo extends Model
{
    use HasFactory, SoftDeletes, Hashidable;

    protected $appends = ['hashed_id'];

    protected $primaryKey = "idg";
    protected $fillable = [
        'nombre',
        'activo',
        'idca',
        'idce'
    ];

    protected $attributes = [
        'activo' => 1
    ];

    public function ciclo(){
        return $this->belongsTo(CicloEscolar::class, 'idce');
    }

    public function carrera(){
        return $this->belongsTo(Carrera::class, 'idca');
    }

    public function alumnos(){
        return $this->hasMany(Usuario::class, 'idg', 'idg');
    }

    public function getHashedIdAttribute($value)
    {
        return \Hashids::connection(get_called_class())->encode($this->getKey());
    }
}
