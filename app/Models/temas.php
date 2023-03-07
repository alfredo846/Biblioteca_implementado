<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Traits\Hashidable;
use Illuminate\Database\Eloquent\SoftDeletes;


class temas extends Model
{
	use HasFactory, Hashidable, SoftDeletes;

  protected $appends = ['hashed_id'];

  protected $primaryKey = 'id_t';

  protected $fillable = [
      'id_t',      
      'nombre_t',
      'activo'
  ];


  protected $table = 'temas';

  public function getHashedIdAttribute($value)
  {
      return \Hashids::connection(get_called_class())->encode($this->getKey());
  }
}
