<?php

namespace App\Http\Controllers;

use App\Models\Responsavel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ResponsavelController extends Controller
{
  private $responsavel;

  public function __construct(Responsavel $responsavel)
  {
    $this->responsavel = $responsavel;
  }

  /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $responsaveis = $this->responsavel->paginate(100);
        return view('aplicacao.responsavel.index', compact('responsaveis'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('aplicacao.responsavel.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

          if ($return = $this->responsavel->create($data))
          {
            \DB::update("UPDATE cartaos SET responsavel_id = {$return->id} 
                          WHERE codg_barra 
                        BETWEEN {$return->nr_inicial} 
                            AND {$return->nr_final}");
          }

      //return redirect()->route('cartao.index');
      return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
