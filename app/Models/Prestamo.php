<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Traits\Hashidable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Prestamo extends Model
{
    use HasFactory, Hashidable, SoftDeletes;

    protected $appends = ['hashed_id'];

    protected $primaryKey = 'id_p';

    protected $fillable = [
        'id_p',
        'idu',
        'fecha_p',
        'observacion_p',
        'fecha_dev',
        'observacion_dev',
        'id_l',
        'tipo_p',
        'status',
        'activo'
    ];


    protected $table = 'prestamos';

    public function usuario(){
        return $this->belongsTo( Usuario::class, 'idu', 'idu' );
    }

    public function libro(){
        return $this->hasOne( Libro::class, 'id_l', 'id_l' );
    }

    public function getHashedIdAttribute($value)
    {
        return \Hashids::connection(get_called_class())->encode($this->getKey());
    }

}
