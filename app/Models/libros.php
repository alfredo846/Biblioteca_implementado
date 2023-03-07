<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Traits\Hashidable;
use Illuminate\Database\Eloquent\SoftDeletes;

class libros extends Model
{
    use HasFactory, Hashidable, SoftDeletes;

    protected $appends = ['hashed_id'];

    protected $primaryKey = 'id_l';

    protected $fillable = [
        'id_l',
        'titulo',
        'subtitulo',
        'lugar_p',
        'año_p',
        'edicion',
        'paginacion',
        'isbn',
        'notas',
        'titulo_v',
        'serie',
        'idca',
        'id_a',
        'id_e',
        'id_t',
        'ubicacion',
        'clasificacion',
        'status',
        'activo',
    ];


    protected $table = 'libros';

    public function getHashedIdAttribute($value)
    {
        return \Hashids::connection(get_called_class())->encode($this->getKey());
    }
}
