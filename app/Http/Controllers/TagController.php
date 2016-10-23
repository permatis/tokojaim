<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\Tag;
use App\Repository\TagRepository;

class TagController extends Controller
{
    protected $tag;
    protected $tags;

    public function __construct(
        Tag $tag,
        TagRepository $tags
    )
    {
        $this->tag = $tag;
        $this->tags = $tags;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tags = $this->tag->orderBy('updated_at', 'DESC')->get();

        return view('admin.tags.index', compact('tags'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags = $this->tag->get(['nama']);

        return view('admin.tags.create', compact('tags'));
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
            'nama' => 'required'
        ));

        $tags = $this->tags->getNewTag(
            explode(',', $request->get('nama')),
            $this->tag->get(['id','nama'])
        );

        foreach($tags as $tag) {
            $this->tag->create([ 'nama' => $tag ]);
        }

        // return redirect('admin/tags');
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
        $tag = $this->tag->find($id);

        return view('admin.tags.edit', compact('tag'));
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
        ));

        $tag = $this->tag->find($id);
        $tag->update( $request->all() );

        return redirect('admin/tags');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tag = $this->tag->find($id);
        $tag->produk()->detach();
        $this->tag->destroy($id);

        return redirect('admin/tags');
    }
}
