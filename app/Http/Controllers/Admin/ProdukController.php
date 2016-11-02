<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;
use App\Models\Produk;
use App\Models\Kategori;
use App\Models\Tag;
use App\Repository\TagRepository;
use App\Services\AllRequestService;
use App\Repository\ImageRepository;
use App\Models\AccessToken;
use App\Services\SosialMediaService;
use App\Http\Controllers\Controller;

class ProdukController extends Controller
{
    private $tags;
    private $produk;
    private $kategori;
    private $tag;
    private $request;
    private $image;
    private $acces;
    private $sosmed;

    /**
     * Konstruktor for ProdukController
     */
    public function __construct(
        TagRepository $tags,
        Produk $produk,
        Kategori $kategori,
        Tag $tag,
        AllRequestService $request,
        ImageRepository $image,
        AccessToken $access,
        SosialMediaService $sosmed
    )
    {
        $this->tags = $tags;
        $this->produk = $produk;
        $this->kategori = $kategori;
        $this->tag = $tag;
        $this->request = $request;
        $this->image = $image;
        $this->access = $access;
        $this->sosmed = $sosmed;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $produks = $this->produk->orderBy('updated_at', 'DESC')->get();
        return view('admin.produks.index', compact('produks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategori = $this->kategori->where('parent_id', 0)->orderBy('nama', 'ASC')->get();
        $tags = $this->tag->get(['nama']);
        $tag = ($tags) ? json_encode($tags) : '';

        return view('admin.produks.create', compact('kategori', 'tag'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        $produk = $this->produk->create( $this->request->produks($request) );

        $this->tags->saveWithRelation(
            explode(',', $request->get('tag')),
            $this->tag->get(['id','nama']),
            $produk
        );

        $produk->kategori()->attach($request->get('kategori'));

        $this->image->save(
            $request->file('gambar'), $produk
        );

        $token = $this->access->where('user_id', auth()->user()->id)->first();

        if( $token ) {
            $data = [
        		'message' => $produk->judul .' murah',
        		'link' => url('produk/'.$produk->slug)
        	];

            $sosmed = $this->sosmed->facebook($token->tk_facebook, $data, '1232603263447483');
        }

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
        $produk =  $this->produk->find($id);
        $kategori = $this->kategori->where('parent_id', 0)->orderBy('nama', 'ASC')->get();
        $tags = $this->tag->get(['id','nama']);
        $tag = ($tags) ? json_encode($tags) : '';

        return view('admin.produks.edit', compact('produk', 'kategori', 'tag'));
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
        $produk = $this->produk->find($id);

        $fileimages = $request->file('gambar');
        if( $fileimages ) {
            $this->image->deleteByRelation($produk);
            $this->image->save( $request->file('gambar'), $produk );
        }

       $produk->kategori()->sync([$request->get('kategori')]);

        $produk->tag()->detach();
        $this->tags->saveWithRelation(
            explode(',', $request->get('tag')),
            $this->tag->get(['id','nama']),
            $produk
        );

        $produk->update( $this->request->produks($request) );

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
        $produk = $this->produk->find($id);
        $this->image->deleteByRelation($produk);
        $produk->tag()->detach();
        $produk->kategori()->detach();
        $this->produk->destroy($id);

        return redirect('admin/produks');
    }


}
