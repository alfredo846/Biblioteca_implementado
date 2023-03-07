<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Http\Traits\Hashidable;


class CicloEscolar extends Model
{
    use HasFactory, SoftDeletes, Hashidable;

    protected $appends = ['hashed_id'];

    protected $primaryKey = "idce";
    protected $fillable = [
        'nombre',
        'activo',
    ];

    protected $table = 'ciclo_escolars';

    public function getHashedIdAttribute($value)
    {
        return \Hashids::connection(get_called_class())->encode($this->getKey());
    }
}