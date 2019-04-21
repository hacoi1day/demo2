<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Article;
use App\Tag;
use DB;

use App\Http\Requests\StoreArticle;

class ArticleController extends Controller
{
    protected $article;
    protected $tag;
    protected $category;
    public function __construct(Article $article, Tag $tag, Category $category)
    {
        $this->article = $article;
        $this->tag = $tag;
        $this->category = $category;
    }

    public function index()
    {
        $articles = $this->article::all();
        return view('article.list', ['articles' => $articles]);
    }

    public function create()
    {
        $tags = $this->tag::all();
        $categories = $this->category->all();
        return view('article.add', ['tags' => $tags, 'categories' => $categories]);
    }

    public function store(StoreArticle $request)
    {
        // validate
        // bail là kiểm tra lần lượt từng cái 1 thì dừng lại khi gặp lỗi luôn

        $title = $request->title;
        $body = $request->body;
        $status = ($request->has('status')) ? 1 : 0;
        $tags = $request->tags;
        $category_id = $request->category_id;
        // insert article_post table
        $article = $this->article->create([
            'title' => $title,
            'body' => $body,
            'status' => $status,
            'category_id' => $category_id,
        ]);
        // insert tags table
        $article->tags()->attach($tags);

        return redirect()->route('article.list');
    }

    public function edit($id)
    {
        $tags = $this->tag::all();
        $categories = $this->category->all();
        $article = $this->article::find($id);
        $tagsArticle = $article->tags()->pluck('tag_id');
        return view('article.edit', ['categories' => $categories, 'tags' => $tags, 'article' => $article, 'tagsArticle' => $tagsArticle]);
    }

    public function update(Request $request, $id)
    {
        // lấy dữ liệu từ form
        $title = $request->title;
        $body = $request->body;
        $status = ($request->has('status')) ? 1 : 0;
        $tags = $request->tags;
        $category_id = $request->category_id;
        // update article

        $article = $this->article::find($id);
        // hàm update sẽ trả về true - false
        $article->update([
            'title' => $title,
            'body' => $body,
            'status' => $status,
            'category_id' => $category_id,
        ]);
        // update article_post
        $article->tags()->sync($tags);

        // redirect
        return redirect()->route('article.list');
    }

    public function delete($id)
    {
        // lấy dữ liệu bài viết
        $article = $this->article->find($id);
        // xóa dữ liệu bài viết ở bảng articles
        $article->delete();
        // xóa dữ liệu ở bảng article_tag
        $article->tags()->detach();
        return redirect()->route('article.list');
    }
}
