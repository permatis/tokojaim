<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\Produk;
use App\Models\Kategori;
use App\Models\Stok;
use App\Models\Tag;

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
        $kategori = Kategori::where('parent_id', 0)->orderBy('nama', 'ASC')->get();

        return view('admin.produks.create', compact('kategori'));
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
            'kategori' => 'required',
            'deskripsi' => 'required',
            'gambar' => 'required',
            'harga' => 'required',
            'berat' => 'required',
            'stok' => 'required|numeric',
            'deskripsi' => 'required',
            'tag' => 'required'
        ));

        //deskripsikan inputan
        $tags = Tag::all()->toArray();
        $inputTag = explode(',', $request->get('tag'));
        $dataProduk = [
            'judul' =>  $request->get('judul'),
            'slug'  => str_slug($request->get('judul'), '-'),
            'deskripsi' => $request->get('deskripsi'),
            'berat' => $request->get('berat'),
            'harga' => $request->get('harga')
        ];

        //menambahkan data stok dan data produk
        $stok = Stok::create(['jumlah' => $request->get('stok')]);
        $produk = Produk::create(array_merge($dataProduk, ['stok_id' => $stok->id]));

        //jika tag sudah ada, tambahkan id tag ke relasi produk
        $this->relatedTag($inputTag, $tags, $produk);

        //jika tag belum ada, buat tag dan tambah ke relasi produk
        foreach($this->getTag($inputTag, $tags) as $val) {
            $tag = Tag::create(['nama'=> $val]);
            $produk->tag()->attach($tag);
        }

        // return redirect('admin/produks');
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

    private function getTag($input, $tags)
    {
        $newTags = [];
        foreach ($input as $tag) {
            if(in_array($tag, array_flatten($tags))) continue;
            $newTags[] = $tag;
        }        
        return $newTags;
    }

    private function relatedTag($input, $tags, $relation)
    {
        foreach($tags as $key => $tag) {
            foreach($input as $k => $arr) {
                if($arr === $tag['nama']) $relation->tag()->attach([$tag['id']]);
            }
        }
    }
}
