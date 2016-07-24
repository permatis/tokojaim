<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\Produk;
use App\Models\Stok;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $produks = Produk::with('stok')->get();
        return view('admin.produks.index', compact('produks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.produks.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request, array(
            'judul' => 'required',
            'harga' => 'required',
            'berat' => 'required',
            'stok' => 'required|numeric',
            'deskripsi' => 'required',
        ));

        $stok = Stok::create(['jumlah' => $request->get('stok')]);
        
        $data_stok = array_merge( 
                    array_slice($request->all(), 0, -1), 
                    ['stok_id' => $stok->id] );

        Produk::create($data_stok);

        return redirect('admin/produks');
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
        $produk =  Produk::find($id);
        return view('admin.produks.edit', compact('produk'));
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
        $this->validate($request, array(
            'judul' => 'required',
            'harga' => 'required',
            'berat' => 'required',
            'stok' => 'required|numeric',
            'deskripsi' => 'required',
            ));

        $produk = Produk::find($id);
        $produk->stok->update(['jumlah' => $request->get('stok')]);
        $produk->update(array_slice($request->all(), 0, -1));
        
        return redirect('admin/produks');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $produk = Produk::find($id);
        Stok::destroy($produk->stok_id);
        Produk::destroy($id);
        return redirect('admin/produks');
    }
}
