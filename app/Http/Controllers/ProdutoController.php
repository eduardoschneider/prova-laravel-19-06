<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use App\Produto;

class ProdutoController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
	
	 $request->validate([
		'name'=>'required',
		'descricao'=> 'required',
	  ]);
	  $produto = new produto([
		'name' => $request->get('name'),
		'descricao'=> $request->get('descricao'),
		
	  ]);
	  $produto->save();
	  return redirect('/home')->with('success', 'Produto adicionado!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
	   $produto = Produto::find($id);
       return view('products.show', compact('produto'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
	   $produto = Produto::find($id);
       return view('products.edit', compact('produto'));
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
	 $request->validate([
		'name'=>'required',
		'descricao'=> 'required',
	  ]);

      $produto = Produto::find($id);
      $produto->name = $request->get('name');
      $produto->descricao = $request->get('descricao');

	  
      $produto->save();

      return redirect('/home')->with('success', 'Produto Alterado!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
	 $produto = Produto::find($id);
     $produto->delete();

     return redirect('/home')->with('success', 'Produto Deletado!');
    }
}
