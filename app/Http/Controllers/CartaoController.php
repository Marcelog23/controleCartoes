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

  /** Busca o código do cartão e atualiza seu status, logo retorna para index atualizando demais campos
   * @param Request $request
   * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
   */
  public function index(Request $request)
  {
    $filtro             = $request->get('filtro');
    $totalCartao        = $this->cartao->getTotalCartao();
    $totalCartaoBaixado = $this->cartao->getTotalCartaoBaixado();
    $ultimosLidos       = $this->cartao->getUltimosLidos();
    //$cartoes            = $this->cartao->getCartao($filtro);

    return view('aplicacao.index', compact( 'totalCartao', 'totalCartaoBaixado', 'ultimosLidos'));
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
   * Cria a qtd de cartões conforme a necessidade
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
            'status'     => 'NL'
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
  public function edit(Request $request)
  {
    $filtro = $request->get("filtro");

    if (!$filtro)
    {
      return redirect()->back();
    }
    else
    {
      $cartao = DB::table('cartaos')->select('id', 'codg_barra', 'status', 'updated_at')->where('codg_barra', '=', $filtro)->get();
      if ($cartao[0]->status == "L")
      {
        flash()->overlay("Cartão lido as :" . \Carbon\Carbon::parse($cartao[0]->updated_at)->format('d/m/Y H:i:s'), 'Atenção');
        return redirect()->route('cartao.index');
      }
      else
      {
        DB::table('cartaos')->where('id', $cartao[0]->id)->update(['status' => 'L', 'updated_at' => date("Y-m-d H:i:s")]);
        return redirect()->route('cartao.index');
      }
    }
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
    //
  }

  /** Retorna o cartão para o status de Não Lido
   * @param $id
   * @return \Illuminate\Http\RedirectResponse
   */
  public function restore($id)
  {
    if (!$id)
    {
      return redirect()->back();
    }
    else
    {
     DB::table('cartaos')->where('id', $id)->update(['status' => 'NL', 'updated_at' => date("Y-m-d H:i:s")]);
     return redirect()->route('cartao.index');
    }
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


  /** Gera pdf
   * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
   */
  public function geraPdfCartao()
  {
    $cartoes = DB::table('cartaos')->get();
    return view('aplicacao.cartao', compact('cartoes'));
  }
}