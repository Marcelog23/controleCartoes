<?php

namespace App\Http\Controllers;

use App\Models\Cartao;
use Barryvdh\DomPDF\PDF as PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Mockery\Exception;

class CartaoController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */

  private $cartao;


  public function __construct(Cartao $cartao)
  {
    $this->cartao = $cartao;
  }


  public function index(Request $request)
  {
    $filtro             = $request->get('filtro');
    $cartoes            = $this->cartao->getCartao($filtro);
    $totalCartao        = $this->cartao->getTotalCartao();
    $totalCartaoBaixado = $this->cartao->getTotalCartaoBaixado();
    $ultimosLidos       = $this->cartao->getUltimosLidos();
    return view('aplicacao.index', compact('cartoes', 'totalCartao', 'totalCartaoBaixado', 'ultimosLidos'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    return view('aplicacao.create');

  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    $qtdCartao = $request->get('nrCartao');
    if ($qtdCartao)
    {
      try {
        for ($i = 1; $i <= $qtdCartao; $i++)
        {
          $this->cartao->create
          ([
            'codg_barra' => \Carbon\Carbon::now()->format('Ymd') . '0' . $i,
            'status' => 'NL'
          ]);
        }
        return redirect()->back();
      } catch (Exception $e)
      {
        return redirect()->back($e->getMessage());
      }
    }
  }

  /**
   * Display the specified resource.
   *
   * @param  int $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
//
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
    if (!$id)
    {
      return redirect()->back();
    }
    else
    {
      DB::table('cartaos')->where('id', $id)->update(['status' => 'L']);
      return redirect()->back();
    }
  }

  public function geraPdfCartao()
  {
    $cartoes = DB::table('cartaos')->get();
    return view('aplicacao.cartao', compact('cartoes'));
  }


  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request $request
   * @param  int $id
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, $id)
  {

  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
//
  }
}
