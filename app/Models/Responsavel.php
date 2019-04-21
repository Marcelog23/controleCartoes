<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Responsavel extends Model
{
    protected $fillable = ['nm_responsavel', 'nr_inicial', 'nr_final'];

  public function setNrInicialAttribute($value)
  {
    $this->attributes['nr_inicial'] = "190518".$value;
  }

  public function setNrFinalAttribute($value)
  {
    $this->attributes['nr_final'] = "190518".$value;
  }
}
