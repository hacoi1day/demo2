<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tag;

class TagController extends Controller
{
    protected $tag;

    /**
     * TagController constructor.
     * @param Tag $tag
     */
    public function __construct(Tag $tag)
    {
        $this->tag = $tag;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $tags = $this->tag::all();
        return view('tag.list', ['tags' => $tags]);
    }


    public function store(Request $request)
    {
        $params = $request->all();
        $title = $params['title'];
        $content = $params['content'];

        $tag = $this->tag->create([
            'title' => $title,
            'content' => $content
        ]);

        return redirect()->route('tag.list');
    }

    public function edit($id)
    {
        $tag = $this->tag->find($id);
        return view('tag.edit', ['tag' => $tag]);
    }

    public function update(Request $request, $id)
    {
        $params = $request->all();
        $title = $params['title'];
        $content = $params['content'];

        $tag = $this->tag->find($id);
        $tag->update([
            'title' => $title,
            'content' => $content
        ]);

        return redirect()->route('tag.list');
    }

    public function delete($id)
    {
        $tag = $this->tag->find($id);
        // xóa tag trong bảng tag
        $tag->delete();
        // xóa tag trong bảng article_tag
        $tag->artiles()->detach();
        return redirect()->route('tag.list');
    }
}
