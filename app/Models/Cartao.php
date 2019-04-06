<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class Cartao extends Model
{
  protected $fillable = [
    'codg_barra',
    'status'
  ];


  public function getCartao($filtro)
  {
    if($filtro == null){
      return $this->where('status', '=', 'NL')->paginate(100);
    }
    else
    {
      $this->where('codg_barra', $filtro)->update(['status' => 'L']);
      return $this->where('status', '=', 'NL')->paginate(100);
    }
  }

  public function getTotalCartao()
  {
    return DB::table('cartaos')->count('id');
  }

  public function getTotalCartaoBaixado()
  {
    return DB::table('cartaos')->where('status', '=', 'L')->count('codg_barra');
  }

  public function getUltimosLidos()
  {
    return DB::table('cartaos')->where('status', '=', 'L')->orderBy('updated_at', 'desc')->limit(3)->get();
  }

}