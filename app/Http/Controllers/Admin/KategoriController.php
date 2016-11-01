<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\Kategori;
use App\Http\Controllers\Controller;

class KategoriController extends Controller
{
    protected $kategori;

    public function __construct(
        Kategori $kategori
    )
    {
        $this->kategori = $kategori;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kategoris = $this->kategori->orderBy('updated_at', 'DESC')->get();

        return view('admin.kategori.index', compact('kategoris'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $parent_id = $this->kategori->where('parent_id', 0)->orderBy('nama', 'ASC')->get();

        return view('admin.kategori.create', compact('parent_id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, array(
            'nama' => 'required',
            'deskripsi' => 'required',
        ));

        $this->kategori->create($request->all());

        return redirect('admin/kategori');
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
        $kategori = $this->kategori->find($id);
        $parent_id = $this->kategori->where('parent_id', 0)->orderBy('nama', 'ASC')->get();

        return view('admin.kategori.edit', compact('kategori', 'parent_id'));
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
            'nama' => 'required',
            'deskripsi' => 'required'
        ));

        $kategori = $this->kategori->find($id);
        $kategori->update($request->all());

        return redirect('admin/kategori');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kategori = $this->kategori->find($id);
        $kategori->produk()->detach();
        $this->kategori->destroy($id);

        return redirect('admin/kategori');
    }
}
